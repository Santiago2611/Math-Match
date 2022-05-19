<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
class ClassroomController extends Controller
{
    public function showClass(){
        $classrooms = Classroom::where('tipo_clase','publica')->get();
        return view('classes.classrooms',compact('classrooms'));
    }
}
