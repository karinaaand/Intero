<?php

use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('satas.home');
})->name('home');

// Grup route untuk E-Learning
Route::prefix('elearning')->group(function () {

    // Halaman awal E-Learning (misalnya tampilan seperti Google Classroom)
    Route::get('/', function () {
        return view('elearning.home');
    })->name('elearning.home');

    // Sign Up ke Google Classroom
    Route::get('/register', function () {
        return view('w.elearning.register');
    })->name('elearning.register');

    // Login ke Google Classroom
    Route::get('/login', function () {
        return view('w.elearning.login');
    })->name('elearning.login');

    // ==========================
// Views untuk Student
// ==========================
    Route::prefix('student')->name('elearning.student.')->group(function () {
        // menampilkan daftar coursework dan daftar material
        Route::get('/coursework/{courseId}', function ($courseId) {
            return view('elearning.student_coursework', compact('courseId'));
        })->name('coursework');

        // menampilkan detail coursework
        Route::get('/coursework/{courseId}/detail/{courseworkId}', function ($courseId, $courseworkId) {
            return view('elearning.student_coursework_detail', compact('courseId', 'courseworkId'));
        })->name('coursework.detail');

        // menampilkan daftar teacher dan student
        Route::get('/people/{courseId}', function ($courseId) {
            return view('elearning.student.people', compact('courseId'));
        })->name('people');
    });


    // ==========================
// Views untuk Teacher
// ==========================
    Route::prefix('teacher')->name('elearning.teacher.')->group(function () {

        // menampilkan semua data coursework dan daftar material
        // Route::get('/coursework', function ($courseId) {
        //     return view('elearning.teacher_coursework', compact('courseId'));
        // })->name('coursework');

            Route::get('/coursework/{courseId}', function ($courseId) {
            return view('elearning.teacher_coursework', compact('courseId'));
        })->name('coursework');

        // buat create coursework
        Route::get('/coursework/{courseId}/assignment/{courseworkId}', function ($courseId, $courseworkId) {
            return view('elearning.teacher_coursework_assignment', compact('courseId', 'courseworkId'));
        })->name('coursework.assignment');

        // buat create material
        Route::get('/coursework/{courseId}/material', function ($courseId) {
            return view('elearning.teacher_coursework_material', compact('courseId'));
        })->name('coursework.material');

        // Buat guru menilai submission per assignment
        Route::get('/grades/{courseId}', function ($courseId) {
            return view('elearning.teacher_grades', compact('courseId'));
        })->name('grades');

        // invite teacher dan student , menampilkan teachers dan student
        Route::get('/people/{courseId}', function ($courseId) {
            return view('elearning.teacher_people', compact('courseId'));
        })->name('people');
    });




});





        // Route::get('/stream/{courseId}', function ($courseId) {
        //     return view('elearning.teacher_stream', compact('courseId'));
        // })->name('stream');
        // Route::get('/grades/{courseId}/student-work/{courseworkId}', function ($courseId) {
        //     return view('elearning.teacher_grades_student_work', compact('courseId'));
        // })->name('grades.student-work');

        // Route::get('/grades/{courseId}/student-work/{courseworkId}/submission/{submissionId}', function ($courseId) {
        //     return view('elearning.teacher_grades_student_work_submission', compact('courseId'));
        // })->name('grades.student-work.submission');
        // Route::get('/stream/{courseId}', function ($courseId) {
        //     return view('elearning.student.stream', compact('courseId'));
        // })->name('stream');
