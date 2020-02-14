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
Route::get('/login/admin', 'Auth\LoginController@getAdminLogin')->name('login');
Route::get('/login', 'Auth\LoginController@getUserLogin');
Route::get('/register', 'Auth\RegisterController@showUserRegister')->name('register');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login', 'Auth\LoginController@userLogin');
Route::post('/register', 'Auth\RegisterController@create');

// admin routes
Route::resource('/admin/students', 'StudentController');
Route::resource('/admin/courses', 'CourseController');
Route::resource('/admin/news', 'NewsController');
Route::resource('/admin/classes', 'ClassController');
Route::resource('/admin/lessons', 'LessonController');
Route::resource('/admin/registrations', 'RegistrationController');
