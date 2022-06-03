<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ClassroomController extends Controller
{
    public function showClass(){
        $image = new Image();
        $images = Image::where('grado',auth()->user()->group)->get();
        return view('classes.classrooms' ,compact('images'));
    }
    public static function getIfAlreadyInClass($class){
        $query = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id',$class)->count();
        $inClass = ($query == 0) ? false : true;
        return $inClass;
    }
    public function searchClass(Image $name){
        $classrooms = Image::where('nombre_c',$name);
        return view('classes.classrooms' ,compact('classrooms'));
    }
    public function joinClass(Request $request){
        $join = DB::table('user_classroom')->insert(['user_id' => auth()->user()->id, 'classroom_id' => $request->clase]);
        return redirect()->back();
    }

}
