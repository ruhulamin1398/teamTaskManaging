<?php

namespace App\Http\Controllers;

use App\TaskLevel;
use Illuminate\Http\Request;

class TaskLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = TaskLevel::all();
       return view('task.level',compact('levels'));
    }
    public function taskLevelListApi()
    {
        $taskLevels = TaskLevel::all();

        return $taskLevels;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taskLevel = new TaskLevel;
      $taskLevel->name= $request->name;
      $taskLevel->description = $request->description;
      $taskLevel->save();
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskLevel  $taskLevel
     * @return \Illuminate\Http\Response
     */
    public function show(TaskLevel $taskLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskLevel  $taskLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskLevel $taskLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskLevel  $taskLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskLevel $taskLevel)
    {
        $taskLevel->name= $request->name;
      $taskLevel->description = $request->description;
      $taskLevel->save();
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskLevel  $taskLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskLevel $taskLevel)
    {
        $taskLevel->delete();
      return back();
    }
}
