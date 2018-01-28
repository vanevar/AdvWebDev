<?php

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

Route::get('/', 'AcceptanceTestController@index');


// Vanessa's Controllers Tests
Route::get('/home/{name}', 'AcceptanceTestController@getAcceptanceTestsForFeature');


/* Rohit's version !!!!!*/

Route::get('/project/features', function()
{
	$feature = DB::table('feature')->get();
	return view('project/feature',['feature' => $feature]);
});

Route::get('/project/iterations', function()
{
	$iteration = DB::table('iteration')->get();
	return view('project/iteration',['iteration' => $iteration]);
});

Route::get('/project/features/tasks', function()
{
	$task = DB::table('task')->get();
	return view('project/task',['task' => $task]);
});

Route::get('/project/features/acceptancetests', function()
{
	$acceptance_test = DB::table('acceptance_test')->get();
	return view('project/acceptancetest',['acceptance_test' => $acceptance_test]);
});

Route::get('/project', function(){
	$project = DB::table('project')->get();
	return view('project/project',['project' => $project]);
});
<<<<<<< HEAD
=======
Route::get('/', function(){

return view('project/login');
>>>>>>> c639e7e33463ccb70038775149df76daf396b43e

Route::get('/', function(){
	return view('login');
});