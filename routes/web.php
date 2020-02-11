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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/login/admin', 'Auth\LoginController@getAdminLogin');
Route::get('/login/user', 'Auth\LoginController@getUserLogin');
Route::get('/register', 'Auth\RegisterController@showUserRegister')->name('register');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login', 'Auth\LoginController@userLogin');
Route::post('/register', 'Auth\RegisterController@create');

// admin routes
Route::get('/admin', 'StudentController@index');
Route::resource('/admin/students', 'StudentController', ['only' => [
    'index',
    'create',
    'store',
    'edit',
    'update',
    'destroy'
]]);

Route::resource('/admin/courses', 'CourseController', ['only' => [
    'index', 
    'create', 
    'show', 
    'edit',
    'update',
    'destroy'
]]);
Route::resource('/admin/lessons', 'LessonController', ['only' => [
    'create', 
    'edit',
    'update',
    'destroy'
]]);
