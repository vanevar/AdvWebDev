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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
	Feature
**/

Route::get('/features/{project}', 'FeatureController@index');

Route::get('/features/{project}/create', 'FeatureController@create');

Route::post('/features/{project}/store', 'FeatureController@store');

Route::get('/features/{feature}/edit', 'FeatureController@edit');

Route::post('/features/{feature}/update', 'FeatureController@update');

/**
	Task
**/

Route::get('/tasks/{feature}', 'TaskController@index');

Route::get('/tasks/{feature}/create', 'TaskController@create');

Route::post('/tasks/{feature}/store', 'TaskController@store');

Route::get('/tasks/{task}/edit', 'TaskController@edit');

Route::post('/tasks/{task}/update', 'TaskController@update');

/**
	Project
**/

Route::get('/projects', 'ProjectController@index');

Route::get('/projects/create', 'ProjectController@create');

Route::post('/projects/store', 'ProjectController@store');

Route::get('/projects/{feature}/edit', 'ProjectController@edit');

Route::post('/projects/{feature}/update', 'ProjectController@update');

/**
	Iteration
**/

Route::get('/iterations/{project}', 'IterationController@index');

Route::get('/iterations/{project}/create', 'IterationController@create');

Route::post('/iterations/{project}/store', 'IterationController@store');

Route::get('/iterations/{iteration}/edit', 'IterationController@edit');

Route::post('/iterations/{iteration}/update', 'IterationController@update');

/**
	AcceptanceTest
**/

Route::get('/acceptance-tests/{feature}', 'AcceptanceTestController@index');

Route::get('/acceptance-tests/{feature}/create', 'AcceptanceTestController@create');

Route::post('/acceptance-tests/{feature}/store', 'AcceptanceTestController@store');

Route::get('/acceptance-tests/{acceptance-test}/edit', 'AcceptanceTestController@edit');

Route::post('/acceptance-tests/{acceptance-test}update', 'AcceptanceTestController@update');