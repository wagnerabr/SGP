<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('ola/{usuario?}', 'HomeController@ola');

/* add new task */
Route::get('task/add', 'TaskController@getAdd');
Route::post('task/add', 'TaskController@postAdd');

/* listing tasks */
Route::any('task', 'TaskController@listar');
Route::any('tasks', 'TaskController@listar');

/*    checking tasks    */
Route::post('task/check', 'TaskController@check');