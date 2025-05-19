<?php

use Illuminate\Support\Facades\Route;

// Halaman utama home-satas
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
        return view('elearning.register');
    })->name('elearning.register');


    //Login ke Google Classroom
    Route::get('/login', function () {
        return view('elearning.login');
    })->name('elearning.login');

    // Sign Up ke Google Classroom
    Route::get('/register', function () {
        return view('elearning.register');
    })->name('elearning.register');


    // Halaman mata pelajaran setelah login
    // Route::get('/mapel', function () {
    //     return view('elearning.mapel');
    // })->middleware('auth')->name('elearning.mapel');

    Route::get('/mapel', function () {
        return view('elearning.mapel');
    })->name('elearning.mapel');

});
