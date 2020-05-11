<?php

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get("/", "UserController@index")->name('index');
Route::resource('tasks','TaskController')->middleware('auth');
Route::resource('task-statuses','TaskStatusController')->middleware('isAdmin');
Route::resource('task-levels','TaskLevelController')->middleware('isAdmin');
Route::get('task-status-list-api', 'TaskStatusController@taskStatusListApi')->name('task_status_list_api');
Route::get('task-level-list-api', 'TaskLevelController@taskLevelListApi')->name('task_level_list_api');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
