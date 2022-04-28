<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class UserController extends Controller
{
    public function signup(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function student(){
        return view('student');
    }
    public function signup_teacher(){
        return view('register_teacher');
    }
}
