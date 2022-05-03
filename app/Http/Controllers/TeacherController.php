<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function store(Request $request){
        $teachers = new Teacher();
        $clave = rand(100000,999999);
        $teachers->nombre_docente = $request->registroNombres;
        $teachers->apellidos_docente = $request->registroApellidos;
        $teachers->email_docente = $request->registroEmail;
        $teachers->clave_docente = $clave;
        $teachers->especialidades_docente = $request->registroEspecialidades;
        $teachers->telefono_docente = $request->registroTelefono;
        $teachers->sexo_docente = $request->registroSexo;
        $teachers->save();
        return redirect()->route('show');

    }
    public function check(Request $request){

}
}
