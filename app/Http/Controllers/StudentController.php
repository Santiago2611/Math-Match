<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
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
        $teacher = new Teacher();
        $student = Student::all()->where('email',$request->ingresoEmail)->where('password',$request->ingresoClave);
        if($student->count() > 0){
            return view('student',compact('student'));
        }else{
        $teachers = Teacher::all()->where('email_docente',$request->ingresoEmail)->where('clave_docente',$request->ingresoClave);
        if($teachers->count() > 0){
            return view('teacher',compact('teachers'));
    }else{
        return "<script>alert('Contraseña y/o correo electrónico incorrecto')</script>";
    }
        }
    }

}
