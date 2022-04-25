<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
}
