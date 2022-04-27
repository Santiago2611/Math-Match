<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rules\Exists;

class StudentController extends Controller
{
    public function store(Request $request){
        $student = new Student();
        $student->nombres = $request->registroNombres;
        $student->apellidos = $request->registroApellidos;
        $student->email = $request->registroEmail;
        $student->password = $request->registroClave;
        $student->grado = $request->registroGrado;
        $student->sexo = $request->registroSexo;
        $student->fecha_naci = $request->fechaNacimiento;
        $student->save();
        return redirect()->route('login');
    }
    public function check(Request $request){
        $student = new Student();
        $student = Student::all()->where('email',$request->ingresoEmail)->where('password',$request->ingresoClave);
        if($student->count() > 0){
            return view('student');
        }else{
            return "<script>alert('Usuario y/o contraseña inválida')</script>";
        }
    }

}
