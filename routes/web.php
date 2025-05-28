<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('satas.home');
})->name('home');

// E-Learning
Route::prefix('elearning')->group(function () {
    // Halaman awal E-Learning (menampilkan Google Classroom / tombol login)
    Route::get('/', function () {
        return view('elearning.beranda');
    })->name('elearning.beranda');

    //Koneksi ke Google Classroom
    Route::get('/connect', function () {
        return view('elearning.connect');
    })->name('elearning.connect');

    // Sign Up ke Google Classroom
    Route::get('/register', function () {
        return view('w.elearning.register');
    })->name('elearning.register');

    //Login ke Google Classroom
    Route::get('/login', function () {
        return view('w.elearning.login');
    })->name('elearning.login');

    // Google callback route
    Route::get('/google/callback', function () {
        // This route will handle the redirect from Google OAuth
        // The frontend will extract the token from the URL and store it
        return view('elearning.callback');
    })->name('elearning.google.callback');
});


