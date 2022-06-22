<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    
    public function index($classId){
        $publications = Publication::where('classroom_id', $classId);
        return $publications;
    }

    public function create(){
        return view('classes/newPublication');
    }

    public function store(Request $request){
        $publication = Publication::insert(request()->except('_token'));
        return redirect()->back();
    }
}
