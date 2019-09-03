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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::resource('/projects', 'ProjectsController');
//Route::delete('projects/{project}','ProjectsController@destroy');
// Route::get('/projects','ProjectsController@index');
// Route::get('/projects/create','ProjectsController@create');
// Route::post('/projects','ProjectsController@store');
Route::get('/auth', 'Auth\LoginController@index');
Route::get('/admin', 'AdminController@admin')
->middleware('is_admin')
->name('admin');
Route::post('/tasks/{task}', 'ProjectTasksController@update');
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/contact', function(){
//   return view('contact');
// });
// Route::get('/about', function(){
//   $list = [
//     'This is first point about us',
//     'This is second point about us',
//     'This is third point about us'
//   ];
//   return view('about')->withList($list);
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
