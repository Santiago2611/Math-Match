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
        $classrooms = Classroom::join('users', 'users.id','=','classrooms.teacher_id')
            ->where('grado',auth()->user()->group)->paginate(3, ['*', 'classrooms.id as id_class']);
        return view('classes.classrooms' ,compact('classrooms'));
    }

    public function seeClass($id){
        $classInfo = Classroom::join('users', 'users.id','=','classrooms.teacher_id')
            ->where('classrooms.id', $id)->first(['*','classrooms.id as id_class']);
        if ($classInfo->grado != auth()->user()->group) return redirect()->back();

        $hasSentJoinRequest = DB::table('join_requests')->where('user_id',auth()->user()->id)
            ->where('classroom_id',$id)
            ->where('estado','enviada')->count() > 0;
        $inClass = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id',$id)->count() > 0;
        $publications = Publication::join('users', 'publications.user_id','=','users.id')
            ->where('publications.classroom_id', $id)
            ->get(['publications.id as id_publication','name','last','profile_photo_path','mensaje_publicacion','archivo_adjunto']);
        return view('classes.class', compact('classInfo','inClass','publications','hasSentJoinRequest'));
    }

    // para el docente
    public function show($id){
        $classInfo = Classroom::where('id', $id)->first();
        if ($classInfo->teacher_id != auth()->user()->id){
            return redirect()->back();
        } else {
            $students = DB::table('user_classroom')->join('users','users.id','=','user_classroom.user_id')
                ->where('user_classroom.classroom_id', $id)
                ->get(['*','user_classroom.id as id_uc']);
            $publications = Publication::join('users', 'publications.user_id','=','users.id')
            ->where('publications.classroom_id', $id)
            ->get(['publications.id as id_publication','name','last','profile_photo_path','mensaje_publicacion','archivo_adjunto']);
            return view('classes.teacher.classAsTeacher', compact('classInfo','publications','students'));
        }
    }

    public static function getIfAlreadyInClass($class){
        $inClass = DB::table('user_classroom')->where('user_id',auth()->user()->id)->where('classroom_id',$class)->count() > 0;
        return $inClass;
    }

    public function searchClass(Request $request){
        if ($request->queryType == "id"){
            $classrooms = Classroom::join('users', 'users.id','=','classrooms.teacher_id')
                ->where('classrooms.'.$request->queryType, $request->queryStr)
                ->where('grado',auth()->user()->group)->paginate(3);
        } else {
            $classrooms = Classroom::join('users', 'users.id','=','classrooms.teacher_id')
                ->where($request->queryType, "like", "%".$request->queryStr."%")
                ->where('grado',auth()->user()->group)->paginate(3, ['*','classrooms.id as id_class']);
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

        return view('classes.teacher.joinRequests', compact('requests'));
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
            'slug' => 'required',
        ]);
        $classroom = Classroom::create($request->all());
        return redirect()->route('teacher.classrooms.index',$classroom)->with('info','La clase se creó con éxito');
    }

    public function create(){
        return view('classes.teacher.create');
    }

    public function index(){
        $classrooms = Classroom::where('teacher_id',auth()->user()->id)->get();
        return view('classes.myclass',compact('classrooms'));
    }

    public function showStudentClasses(){
        $classrooms = Classroom::join('user_classroom', 'classrooms.id','=','user_classroom.classroom_id')
            ->where('user_classroom.user_id', auth()->user()->id)->get();
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

    public function expelStudent(Request $request){
        DB::table('user_classroom')->delete($request->id);
        return redirect()->back()->with('info','Estudiante expulsado exitosamente');
    }

    public function edit(Classroom $classroom){

    }
    public function update(Request $request, Classroom $classroom){

    }
    public function destroy($id){
        Classroom::where('id', $id)->delete();
        return redirect()->route('teacher.classrooms.index');
    }
}
