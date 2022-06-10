<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view ('admin.classes.index',compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return view ('admin.classes.show',compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        return view ('classes.edit',compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'nombre_clase' => 'required|string',
            'tipo_clase' => 'required|string',
            'vigente_hasta' => 'required|date',
            'grado' => 'required',
        ]);
        $classroom->update($request->all());
        return redirect()->route('admin.classrooms.edit',$classroom)->with('info','La clase se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom -> delete();
        return redirect()->route('admin.classrooms.index')->with('info','La clase se eliminó con éxito');
    }
}
