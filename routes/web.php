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


    // Sign Up ke Google Classroom
    Route::get('/register', function () {
        return view('w.elearning.register');
    })->name('elearning.register');

    //Login ke Google Classroom
    Route::get('/login', function () {
        return view('w.elearning.login');
    })->name('elearning.login');



    Route::get('/guru', function () {
    return view('elearning.guru');
    })->name('guru');

    Route::get('/guru_create', function () {
        return view('elearning.guru_create');
    })->name('guru_create');

    Route::get('/guru_people', function () {
        return view('elearning.guru_people');
    })->name('guru_people');

});


