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
Route::group(['middleware' => 'auth'], function() {
	// Projects
	Route::get('/projects', 'ProjectsController@index');
	Route::get('/projects/create', 'ProjectsController@create');
	Route::get('/projects/{project}', 'ProjectsController@show');
	Route::get('/projects/{project}/edit', 'ProjectsController@edit');
	Route::patch('/projects/{project}', 'ProjectsController@update');
	Route::post('/projects', 'ProjectsController@store');
	// Tasks
	Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
	Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');
	// Threads
	Route::post('/threads', 'ThreadController@store');
	// Replies
	Route::post('/threads/{thread}/replies', 'ReplyController@store');
});

Route::get('/threads', 'ThreadController@index');
Route::get('/threads/{thread}', 'ThreadController@show');



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
