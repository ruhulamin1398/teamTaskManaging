<?php

namespace App\Http\Controllers;

use App\level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = level::all();
        return view('level.l_create',compact('levels'));
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
        $level = new level;
        $level->name = $request->name;
        $level->description = $request->description;
        $level->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, level $level)
    {
        $level->name= $request->name;
        $level->description = $request->description;
        $level->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(level $level)
    {
        $level->delete();
        return back();
    }
}
