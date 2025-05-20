<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\PersonalAccessToken;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        $clientId = config('services.google.client_id');
        $redirectUri = config('services.google.redirect');
        
        $url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/classroom.courses.readonly https://www.googleapis.com/auth/classroom.coursework.me https://www.googleapis.com/auth/classroom.announcements.readonly https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
            'access_type' => 'offline',
            'prompt' => 'consent',
        ]);
        
        return redirect($url);
    }
    
    /**
     * Handle Google callback
     */
    public function handleGoogleCallback(Request $request)
    {
        if ($request->has('error')) {
            return redirect()->route('elearning.login')
                ->with('error', 'Google authentication failed: ' . $request->get('error'));
        }
        
        $code = $request->get('code');
        
        try {
            $response = Http::post('https://oauth2.googleapis.com/token', [
                'client_id' => config('services.google.client_id'),
                'client_secret' => config('services.google.client_secret'),
                'code' => $code,
                'redirect_uri' => config('services.google.redirect'),
                'grant_type' => 'authorization_code',
            ]);
            
            if ($response->failed()) {
                return redirect()->route('elearning.login')
                    ->with('error', 'Failed to exchange authorization code for tokens');
            }
            
            $tokens = $response->json();
            
            // Get user info from Google
            $userInfo = Http::withToken($tokens['access_token'])
                ->get('https://www.googleapis.com/oauth2/v2/userinfo')
                ->json();
            
            // Find or create user
            $user = User::where('email', $userInfo['email'])->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $userInfo['name'],
                    'email' => $userInfo['email'],
                    'password' => bcrypt(str_random(16)),
                    'google_id' => $userInfo['id'],
                    'google_access_token' => $tokens['access_token'],
                    'google_refresh_token' => $tokens['refresh_token'] ?? null,
                    'google_token_expires_at' => now()->addSeconds($tokens['expires_in']),
                ]);
            } else {
                $user->update([
                    'google_id' => $userInfo['id'],
                    'google_access_token' => $tokens['access_token'],
                    'google_refresh_token' => $tokens['refresh_token'] ?? $user->google_refresh_token,
                    'google_token_expires_at' => now()->addSeconds($tokens['expires_in']),
                ]);
            }
            
            // Create token and login
            $token = $user->createToken('google-token')->plainTextToken;
            
            // Store token in session for JavaScript to retrieve
            session(['auth_token' => $token, 'user_id' => $user->id]);
            
            return redirect()->route('elearning.beranda')
                ->with('auth_token', $token)
                ->with('user_id', $user->id);
                
        } catch (\Exception $e) {
            return redirect()->route('elearning.login')
                ->with('error', 'An error occurred during Google authentication: ' . $e->getMessage());
        }
    }
    
    /**
     * API: Initiate Google OAuth flow
     */
    public function initiate()
    {
        $clientId = config('services.google.client_id');
        $redirectUri = config('services.google.redirect');
        
        $url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/classroom.courses.readonly https://www.googleapis.com/auth/classroom.coursework.me https://www.googleapis.com/auth/classroom.announcements.readonly https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
            'access_type' => 'offline',
            'prompt' => 'consent',
        ]);
        
        return response()->json(['url' => $url]);
    }
    
    /**
     * API: Handle Google callback
     */
    public function callback(Request $request)
    {
        $code = $request->get('code');
        
        try {
            $response = Http::post('https://oauth2.googleapis.com/token', [
                'client_id' => config('services.google.client_id'),
                'client_secret' => config('services.google.client_secret'),
                'code' => $code,
                'redirect_uri' => config('services.google.redirect'),
                'grant_type' => 'authorization_code',
            ]);
            
            if ($response->failed()) {
                return response()->json(['error' => 'Failed to exchange authorization code for tokens'], 400);
            }
            
            $tokens = $response->json();
            
            // Get user info from Google
            $userInfo = Http::withToken($tokens['access_token'])
                ->get('https://www.googleapis.com/oauth2/v2/userinfo')
                ->json();
            
            // Find or create user
            $user = User::where('email', $userInfo['email'])->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $userInfo['name'],
                    'email' => $userInfo['email'],
                    'password' => bcrypt(str_random(16)),
                    'google_id' => $userInfo['id'],
                    'google_access_token' => $tokens['access_token'],
                    'google_refresh_token' => $tokens['refresh_token'] ?? null,
                    'google_token_expires_at' => now()->addSeconds($tokens['expires_in']),
                ]);
            } else {
                $user->update([
                    'google_id' => $userInfo['id'],
                    'google_access_token' => $tokens['access_token'],
                    'google_refresh_token' => $tokens['refresh_token'] ?? $user->google_refresh_token,
                    'google_token_expires_at' => now()->addSeconds($tokens['expires_in']),
                ]);
            }
            
            // Create token
            $token = $user->createToken('google-token')->plainTextToken;
            
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
                
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Check if user is connected to Google
     */
    public function checkConnection(Request $request)
    {
        $user = $request->user();
        
        $connected = !empty($user->google_access_token);
        $needsRefresh = $connected && now()->isAfter($user->google_token_expires_at);
        
        return response()->json([
            'connected' => $connected,
            'needs_refresh' => $needsRefresh
        ]);
    }
    
    /**
     * Connect user to Google
     */
    public function connect(Request $request)
    {
        // This is handled by the initiate and callback methods
        return response()->json(['message' => 'Use the initiate endpoint to start the OAuth flow']);
    }
    
    /**
     * Refresh Google token
     */
    public function refreshToken(Request $request)
    {
        $user = $request->user();
        
        if (empty($user->google_refresh_token)) {
            return response()->json(['error' => 'No refresh token available'], 400);
        }
        
        try {
            $response = Http::post('https://oauth2.googleapis.com/token', [
                'client_id' => config('services.google.client_id'),
                'client_secret' => config('services.google.client_secret'),
                'refresh_token' => $user->google_refresh_token,
                'grant_type' => 'refresh_token',
            ]);
            
            if ($response->failed()) {
                return response()->json(['error' => 'Failed to refresh token'], 400);
            }
            
            $newTokens = $response->json();
            
            $user->update([
                'google_access_token' => $newTokens['access_token'],
                'google_token_expires_at' => now()->addSeconds($newTokens['expires_in']),
            ]);
            
            return response()->json([
                'access_token' => $newTokens['access_token'],
                'expires_in' => $newTokens['expires_in'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}


