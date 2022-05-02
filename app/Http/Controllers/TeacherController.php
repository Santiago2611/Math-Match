<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function store(Request $request){
        $teachers = new Teacher();
        $clave = rand(100000,999999);
        $teachers->nombre = $request->registroNombres;
        $teachers->apellidos = $request->registroApellidos;
        $teachers->email = $request->registroEmail;
        $teachers->password = $clave;
        $teachers->especialidades = $request->registroEspecialidades;
        $teachers->telefono = $request->registroTelefono;
        $teachers->sexo = $request->registroSexo;
        $teachers->save();
        return redirect()->route('show');

    }
    public function check(Request $request){

}
}
