<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    public function saveClass(Request $request){
        $class = new Classroom();
        $class->nombre_clase = $request->nombreClase;
        $class->descripcion_clase = $request->descripcion;
        $class->tipo_clase = $request->tipoClase;
        $class->vigente_hasta = $request->culminacion;
        $class->save();
        return redirect()->route('create.class');
    }
}
