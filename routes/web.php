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

    Route::view('/student/coursework', 'elearning.student_coursework')->name('elearning.student.coursework');
    Route::view('/student/coursework/detail', 'elearning.student_coursework_detail')->name('elearning.student.coursework.detail');
    Route::view('/student/people', 'elearning.student.people')->name('elearning.student.people');
    Route::view('/student/stream', 'elearning.student.stream')->name('elearning.student.stream');

    // ==========================
    // Views untuk Teacher
    // ==========================

    Route::view('/teacher/coursework', 'elearning.teacher_coursework')->name('elearning.teacher.coursework');
    Route::view('/teacher/coursework/assignment', 'elearning.teacher_coursework_assignment')->name('elearning.teacher.coursework.assignment');
    Route::view('/teacher/coursework/material', 'elearning.teacher_coursework_material')->name('elearning.teacher.coursework.material');
    Route::view('/teacher/grades', 'elearning.teacher_grades')->name('elearning.teacher.grades');
    Route::view('/teacher/grades/student-work', 'elearning.teacher_grades_student_work')->name('elearning.teacher.grades.student-work');
    Route::view('/teacher/grades/student-work/submission', 'elearning.teacher_grades_student_work_submission')->name('elearning.teacher.grades.student-work.submission');
    Route::view('/teacher/people', 'elearning.teacher_people')->name('elearning.teacher.people');
    Route::view('/teacher/stream', 'elearning.teacher_stream')->name('elearning.teacher.stream');

});





