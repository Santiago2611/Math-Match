<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
class ClassroomController extends Controller
{
    public function showClass(){
        $users = new User();
        $images = Image::select()->where('grado',$users->group)->get();
        return view('classes.classrooms' ,compact('images'));
    }
    public function searchClass(Image $name){
        $classrooms = Image::where('nombre_c',$name);
        return view('classes.classrooms' ,compact('classrooms'));;
    }
}
