<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function createTeacher(){
        return view('admin.create_teacher');
    }
}
