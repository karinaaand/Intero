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

    // Login ke Google Classroom
    Route::get('/login', function () {
        return view('elearning.login');
    })->name('elearning.login');

    // Halaman mata pelajaran setelah login
    // Route::get('/mapel', function () {
    //     return view('elearning.mapel');
    // })->middleware('auth')->name('elearning.mapel');

    Route::get('/mapel', function () {
        return view('elearning.mapel');
    })->name('elearning.mapel');

});
