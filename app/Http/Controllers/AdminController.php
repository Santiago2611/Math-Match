<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showStudents(){
        $students = Student::all();
        return $students;

    }
}
