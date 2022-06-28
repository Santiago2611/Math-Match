<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{

    public function create(Request $request){
        $classId = $request->classId;
        return view('classes/teacher/newPublication', compact('classId'));
    }

    public function store(Request $request){
        if ($request->archivo_adjunto != null){
            Storage::disk('local')->put($request->archivo_adjunto, 'Contents');
        }
        
        $publication = Publication::insert([
            'classroom_id' => $request->classroom_id,
            'user_id' => $request->user_id,
            'mensaje_publicacion' => $request->mensaje_publicacion,
            'archivo_adjunto' => $request->archivo_adjunto
        ]);
        return redirect()->route('teacher.classrooms.show', $request->classroom_id)->with('info','Publicación creada con éxito');
    }

    public function destroy($id){
        Publication::where('id', $id)->delete();
        return redirect()->back()->with('info','Publicación eliminada con éxito');
    }

    public function downloadFile(Request $request){
        try {
            $path = storage_path('app/'.$request->filename);
            return response()->download($path);
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
