<?php

namespace App\Http\Controllers;

use App\task;
use App\User;
use App\role;
use App\TaskLevel;
use App\TaskStatus;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskLevels = TaskLevel::all();
        $taskStatuses = TaskStatus::all();
        $tasks = task::all();
        $users = User::all();
        return view('task.index', compact('tasks', 'taskLevels','taskStatuses','users'));
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
      $task = task::where('user_id', $request->user_id)->first();
        if ($task == NULL) {
          $task = new task;
        }

        $task->user_id = $request->user_id;
        $task->task_level_id = $request->task_level_id;
        $task->task_status_id = $request->task_status_id;
        $task->link = $request->link;
        $task->title = $request->title;
        $task->comment = $request->comment;

        $user = User::find($request->user_id);
        $user->save();
        $user->role_id = 2;

        $task->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        $task->task_level_id = $request->task_level_id;
        $task->task_status_id = $request->task_status_id;
        $task->link = $request->link;
        $task->comment = $request->comment;
        $task->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task->delete();

        $user = User::find($task->user_id);
        $user->role_id = 4;
        $user->save();

        return  back();
    }
}
