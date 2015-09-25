<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use CodeProject\Services\ClientService;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('client','ClientController@index');
Route::post('client','ClientController@store');
Route::get('client/{id}','ClientController@show');
Route::delete('client/{id}','ClientController@destroy');
Route::put('client/{id}','ClientController@update');

Route::get('teste',function(){
//    $pj = new \CodeProject\Entities\ProjectMembers();
//    dd($pj->with('users')->get());
//    DB::enableQueryLog();
//    $user = new \CodeProject\Entities\User();
//    $resp = $user->with('projectsMember')->get();
//    dd(DB::getQueryLog());
});

Route::group(['prefix' => 'project'],function(){

    Route::get('{id}/member/{idMember}', 'ProjectMemberController@isMember');
    Route::get('{id}/members', 'ProjectMemberController@members');
    Route::post('{id}/member', 'ProjectMemberController@addMember');
    Route::delete('{id}/member/{idMember}', 'ProjectMemberController@destroy');

    Route::get('{id}/task', 'ProjectTaskController@index');
    Route::post('{id}/task', 'ProjectTaskController@store');
    Route::get('{id}/task/{taskId}','ProjectTaskController@show');
    Route::put('{id}/task/{taskId}', 'ProjectTaskController@update');
    Route::delete('{id}/task/{taskId}','ProjectTaskController@destroy');

    Route::get('{id}/note','ProjectNoteController@index');
    Route::post('{id}/note','ProjectNoteController@store');
    Route::get('{id}/note/{noteId}','ProjectNoteController@show');
    Route::put('{id}/note/{noteId}','ProjectNoteController@update');
    Route::delete('{id}/note/{noteId}','ProjectNoteController@destroy');

    Route::get('','ProjectController@index');
    Route::post('','ProjectController@store');
    Route::get('{id}','ProjectController@show');
    Route::delete('{id}','ProjectController@destroy');
    Route::put('{id}','ProjectController@update');


});