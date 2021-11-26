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
        $estudiante = new Student();
        $estudiante->name = $request->registroNombres;
        $estudiante->apellidos = $request->registroApellidos;
        $estudiante->email = $request->registroEmail;
        $estudiante->password = $request->registroClave;
        $estudiante->genero = $request->registroSexo;
        $estudiante->grado = $request->registroGrado;
        $estudiante->fecha_naci = $request->fechaNacimiento;

        $estudiante->save();
        return redirect()->route('index');



    }

    public function NotFound($unknown){
        return "Página $unknown no encontrada";
    }
}
