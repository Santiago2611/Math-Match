<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Image;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ClassroomController extends Controller
{
    public function showClasses(){
        $classrooms = Classroom::where('grado',auth()->user()->group)->paginate(3);
        return view('classes.classrooms' ,compact('classrooms'));
    }

    public function seeClass($id){
        $classInfo = Classroom::where('id', $id)->first();
        $hasSentJoinRequest = DB::table('join_requests')->where('user_id',auth()->user()->id)
            ->where('classroom_id',$id)
            ->where('estado','enviada')->count() > 0;
        $inClass = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id',$id)->count() > 0;
        $publications = Publication::join('users', 'publications.user_id','=','users.id')
            ->where('publications.classroom_id', $id)
            ->get(['name','last','profile_photo_path','mensaje_publicacion','archivo_adjunto']);
        return view('classes.class', compact('classInfo','inClass','publications','hasSentJoinRequest'));
    }

    public static function getIfAlreadyInClass($class){
        $inClass = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id',$class)->count() > 0;
        return $inClass;
    }

    public function searchClass(Request $request){
        if ($request->queryType == "id"){
            $classrooms = Classroom::where($request->queryType, $request->queryStr)
                ->where('grado',auth()->user()->group)->get();
        } else {
            $classrooms = Classroom::where($request->queryType, "like", "%".$request->queryStr."%")
                ->where('grado',auth()->user()->group)->get();
        }
        return view('classes.classrooms' ,compact('classrooms'));
    }

    public function joinClass(Request $request){
        DB::table('user_classroom')->insert(['user_id' => auth()->user()->id, 'classroom_id' => $request->class]);
        return redirect()->back();
    }

    public function sendJoinRequest(Request $request){
        DB::table('join_requests')->insert(['user_id' => auth()->user()->id, 'classroom_id' => $request->class]);
        return redirect()->back();
    }

    public function cancelJoinRequest(Request $request){
        DB::table('join_requests')->where('user_id', auth()->user()->id)
            ->where('classroom_id', $request->class)
            ->delete();
        return redirect()->back();
    }

    public function showJoinRequests(){
        $requests = Classroom::join('join_requests', 'classrooms.id','=','classroom_id')
            ->join('users', 'users.id','=','join_requests.user_id')
            ->where('classrooms.teacher_id', auth()->user()->id)
            ->where('join_requests.estado', 'enviada')
            ->get(['join_requests.id as request_id','teacher_id','classroom_id','nombre_clase','name','last']);
        
        return view('classes.joinRequests', compact('requests'));
    }

    public function replyJoinRequest(Request $request){
        $requestInfo = DB::table('join_requests')->where('id', $request->requestId)->first();
        if ($request->accepted){
            DB::table('user_classroom')->insert([
                'user_id' => $requestInfo->user_id,
                'classroom_id' => $requestInfo->classroom_id
            ]);
            $status = 'aceptada';
        } else {
            $status = 'rechazada';
        }
        DB::table('join_requests')->where('id', $request->requestId)->update(['estado' => $status]);
        return redirect()->back()->with('info','Solicitud '.$status);
    }

    public function leaveClass(Request $request){
        $query = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id', $request->class)->delete();
        return redirect()->back();
    }

    public function store(Request $request){
        $request->validate([
            'nombre_clase' => 'required|string',
            'tipo_clase' => 'required|string',
            'vigente_hasta' => 'required|date|after:tomorrow',
            'grado' => 'required',
            'slug' => 'required'
        ]);
        $request->url_images = "asset('images/default-classroom-image.png')";
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

    public function showStudentClasses(){
        $studentClassrooms = DB::table('user_classroom')->where('user_id',auth()->user()->id)->get('classroom_id');
        $classrooms = [];
        if ($studentClassrooms->count() > 0){
            for ($i = 0; $i < $studentClassrooms->count(); $i++){
                $classrooms[$i] = Classroom::where('id',auth()->user()->id)->first();
            }
        }
        return view('classes.myclass',compact('classrooms'));
    }

    public function updateStatus(Request $request){
        $NotiUpdate = Classroom::findOrFail($request->id)->update(['status' => $request->estatus]);

    if($request->estatus == 0)  {
        $newStatus = '<br> <button type="button" class="btn btn-sm btn-danger">Inactiva</button>';
    }else{
        $newStatus ='<br> <button type="button" class="btn btn-sm btn-success">Activa</button>';
    }

    return response()->json(['var'=>''.$newStatus.'']);
    }
    public function edit(Classroom $classroom){

    }
    public function update(Request $request, Classroom $classroom){

    }
    public function destroy(Classroom $classroom){

    }
}
