<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CourseWorkController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Authentication routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});

// Google Authentication routes
Route::prefix('google')->group(function () {
    Route::get('/initiate', [GoogleAuthController::class, 'initiate']);
    Route::post('/callback', [GoogleAuthController::class, 'callback']);
    
    // Protected Google routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/check-connection', [GoogleAuthController::class, 'checkConnection']);
        Route::post('/connect', [GoogleAuthController::class, 'connect']);
        Route::post('/refresh-token', [GoogleAuthController::class, 'refreshToken']);
    });
});

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
    // User profile
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::get('/user-profiles/{id}', [UserProfileController::class, 'show']);
    Route::put('/user-profiles/{id}', [UserProfileController::class, 'update']);

    /*
    |--------------------------------------------------------------------------
    | Course Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']);
        Route::post('/', [CourseController::class, 'store']);
        Route::get('/{id}', [CourseController::class, 'show']);
        Route::put('/{id}', [CourseController::class, 'update']);
        Route::delete('/{id}', [CourseController::class, 'destroy']);
        
        // Course announcements
        Route::get('/{courseId}/announcements', [AnnouncementController::class, 'index']);
        Route::post('/{courseId}/announcements', [AnnouncementController::class, 'store']);
        
        // Course work
        Route::get('/{courseId}/coursework', [CourseWorkController::class, 'index']);
        Route::post('/{courseId}/coursework', [CourseWorkController::class, 'store']);
        
        // Course materials
        Route::get('/{courseId}/materials', [MaterialController::class, 'index']);
        Route::post('/{courseId}/materials', [MaterialController::class, 'store']);
        
        // Course topics
        Route::get('/{courseId}/topics', [TopicController::class, 'index']);
        Route::post('/{courseId}/topics', [TopicController::class, 'store']);
    });

    /*
    |--------------------------------------------------------------------------
    | Coursework Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('coursework')->group(function () {
        Route::get('/{id}', [CourseWorkController::class, 'show']);
        Route::put('/{id}', [CourseWorkController::class, 'update']);
        Route::delete('/{id}', [CourseWorkController::class, 'destroy']);
        
        // Submissions
        Route::get('/{courseWorkId}/submissions', [SubmissionController::class, 'index']);
        Route::post('/{courseWorkId}/submissions', [SubmissionController::class, 'store']);
    });

    /*
    |--------------------------------------------------------------------------
    | Submission Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('submissions')->group(function () {
        Route::get('/{id}', [SubmissionController::class, 'show']);
        Route::put('/{id}', [SubmissionController::class, 'update']);
    });

    /*
    |--------------------------------------------------------------------------
    | Invitation Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('invitations')->group(function () {
        Route::get('/', [InvitationController::class, 'index']);
        Route::get('/{invitationId}', [InvitationController::class, 'show']);
        Route::post('/', [InvitationController::class, 'store']);
        Route::delete('/{invitationId}', [InvitationController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| User Management Routes (For testing only)
|--------------------------------------------------------------------------
*/
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
    Route::get('/email/{email}', [UserController::class, 'findByEmail']);
});

/*
|--------------------------------------------------------------------------
| Testing Routes
|--------------------------------------------------------------------------
*/
Route::prefix('test')->group(function () {
    Route::middleware('auth:sanctum')->post('/initiate', [GoogleAuthController::class, 'initiate']);
    Route::post('/callback', [GoogleAuthController::class, 'callback']);
});

Route::middleware('auth:sanctum')->get('/test_sanctum', function () {
    return response()->json(['message' => 'API jalan!']);
});