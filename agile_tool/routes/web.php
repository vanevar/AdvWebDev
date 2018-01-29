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

/*
Routes for the controllers -- BEGIN
*/

Route::resource('acceptanceTests', 'AcceptanceTestController');
Route::resource('acceptanceTestsStatus', 'AcceptanceTestStatusController');
Route::resource('features', 'FeatureController');
Route::resource('iterations', 'IterationController');
Route::resource('members', 'MemberController');
Route::resource('projects', 'ProjectController');
Route::resource('projectMembers', 'ProjectMemberController');
Route::resource('projectRoles', 'ProjectRoleController');
Route::resource('tasks', 'TaskController');
Route::resource('taskStatus', 'TaskStatusController');
Route::resource('userRoles', 'UserRoleController');
/*
Routes for the controllers -- END
*/
// Vanessa's Controllers Tests
Route::get('/home/{name}', 'ProjectController@getProjectsByUser');


/* Rohit's version !!!!!*/
/*
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

Route::get('/', function(){
return view('project/login');
});
Route::get('/project/create', function(){
return view('create/createproject');
});
Route::get('/project/edit', function(){
return view('edit/editproject');
});
Route::get('/project/features/create', function(){
return view('create/createfeature');
});
Route::get('/project/features/edit', function(){
return view('edit/editfeature');
});
Route::get('/project/features/tasks/create', function(){
return view('create/createtask');
});
Route::get('/project/features/tasks/edit', function(){
return view('edit/edittask');
});
Route::get('/project/features/acceptancetests/create', function(){
return view('create/createacpttest');
});
Route::get('/project/features/acceptancetests/edit', function(){
return view('edit/editacpttest');
});
Route::get('/project/iterations/create', function(){
return view('create/createiteration');
});
Route::get('/project/iterations/edit', function(){
return view('edit/edititeration');
});
*/
Route::get('/', function(){
	return view('login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/features/{project}', 'FeatureController@show');

Route::get('/features/{project}/create', 'FeatureController@create');

Route::post('/features/{project}/store', 'FeatureController@store');

Route::get('/features/{feature}/edit', 'FeatureController@edit');

Route::post('/features/update', 'FeatureController@update');