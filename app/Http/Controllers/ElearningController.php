<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElearningController extends Controller
{
    /**
     * Show the login page
     */
    public function login()
    {
        return view('elearning.login');
    }

    /**
     * Show the registration page
     */
    public function register()
    {
        return view('elearning.register');
    }

    /**
     * Show the main dashboard/beranda
     */
    public function beranda()
    {
        return view('elearning.beranda');
    }

    /**
     * Show a specific course
     */
    public function showCourse($courseId)
    {
        return view('elearning.course', ['courseId' => $courseId]);
    }
}

