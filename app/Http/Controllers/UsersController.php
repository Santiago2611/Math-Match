<?php

namespace App\Http\Controllers;

use App\Models\ModelEstudiantes;
use App\Models\student;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function Registro(){
        return view('registro');

    }
    public function Login(){
        return view('login');
    }
    public function Datos(Request $request){
        $estudiantes = new Student();



    }
}
