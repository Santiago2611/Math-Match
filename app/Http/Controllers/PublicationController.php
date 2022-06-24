<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    //método index no usado por ahora, ya que las publicaciones se llaman desde ClassroomController

    public function create($classId){
        return view('classes/newPublication', compact('classId'));
    }

    public function store(Request $request){
        $publication = Publication::insert(request()->except('_token'));
        return redirect()->route('see.class', $request->classroom_id)->with('info','Publicación creada con éxito');
    }
}
