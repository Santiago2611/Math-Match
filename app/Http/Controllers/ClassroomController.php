<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ClassroomController extends Controller
{
    public function showClasses(){
        $image = new Classroom();
        $images = Classroom::where('grado',auth()->user()->group)->get();
        return view('classes.classrooms' ,compact('images'));
    }

    public function seeClass($id){
        $classInfo = Classroom::where('id', $id)->first();
        $inClass = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id',$id)->count() > 0;
        return view('classes.class', compact('classInfo','inClass'));
    }

    public static function getIfAlreadyInClass($class){
        $inClass = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id',$class)->count() > 0;
        return $inClass;
    }

    public function searchClass(Classroom $name){
        $classrooms = Image::where('nombre_c',$name);
        return view('classes.classrooms' ,compact('classrooms'));
    }

    public function joinClass(Request $request){
        $join = DB::table('user_classroom')->insert(['user_id' => auth()->user()->id, 'classroom_id' => $request->class]);
        return redirect()->back();
    }

    public function leaveClass(Request $request){
        $query = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id', $request->class)->delete();
        return redirect()->back();
    }

    public function store(Request $request){
        $request->validate([
            'nombre_clase' => 'required|string',
            'tipo_clase' => 'required|string',
            'vigente_hasta' => 'required|date',
            'grado' => 'required',
            'slug' => 'required'
        ]);
        $classroom = Classroom::create($request->all());
        return redirect()->route('admin.classrooms.edit',$classroom)->with('info','La clase se creó con éxito');
    }

    public function create(){
        return view('classes.create');
    }

    public function index(){
        $classrooms = Classroom::where('teacher_id',auth()->user()->id)->get();
        return view('classes.myclass',compact('classrooms'));
    }
    public function edit(Classroom $classroom){

    }
    public function update(Request $request, Classroom $classroom){

    }
    public function destroy(Classroom $classroom){

    }
}
