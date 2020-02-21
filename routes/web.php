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

// home
Route::get('/', 'HomeController@index')->name('home');

// gioi thieu
Route::get('/about', 'HomeController@index')->name('about');

// nganh dao tao
Route::get('/nganh-dao-tao/{courseId}', 'HomeController@showLandingPages');


// tuyen sinh
Route::group(['prefix' => 'tuyen-sinh'], function(){
    Route::get('tin-tuyen-sinh', 'HomeController@index')->name('tin_tuyen_sinh');
    Route::get('quy-che-tuyen-sinh', 'HomeController@index')
        ->name('quy_che_tuyen_sinh');
    Route::get('hoc-phi-hoc-bong', 'HomeController@index')
        ->name('hoc_phi_hoc_bong');
    Route::get('hoi-dap', 'HomeController@index')->name('hoi_dap');
    
});

// tin tuc
Route::group(['prefix' => 'tin-tuc'], function(){
    Route::get('tin-noi-bo', 'HomeController@index')->name('tin_noi_bo');
    Route::get('tin-cong-nghe', 'HomeController@index')->name('tin_cong_nghe');
    Route::get('su-kien', 'HomeController@index')->name('events');
});
// hoi nhap quoc te
Route::get('/hoi-nhap-quoc-te', 'HomeController@index')->name('hoi_nhap_quoc_te');
// sinh vien
Route::group(['prefix' => 'sinh-vien'], function(){
    Route::get('thoi-khoa-bieu', 'HomeController@index')
        ->name('thoi_khoa_bieu');
    Route::get('ket-qua-hoc-tap', 'HomeController@index')
        ->name('ket_qua_hoc_tap');
    Route::get('mau_van_ban', 'HomeController@index')
        ->name('mau_van_ban');
});
// lien he
Route::get('/lien-he', 'HomeController@index')->name('contact');


Route::get('/login/admin', 'Auth\LoginController@getAdminLogin')->name('login');
Route::get('/login', 'Auth\LoginController@getUserLogin');
Route::get('/register', 'Auth\RegisterController@showUserRegister')->name('register');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login', 'Auth\LoginController@userLogin');
Route::post('/register', 'Auth\RegisterController@create');

// admin routes
Route::resource('/admin/students', 'StudentController')->except(['show']);
Route::resource('/admin/majors', 'MajorsController');
Route::resource('/admin/news', 'NewsController');
Route::resource('/admin/classes', 'ClassController');
Route::resource('/admin/lessons', 'LessonController');
Route::resource('/admin/registrations', 'RegistrationController');
Route::resource('/admin/subjects', 'SubjectController');
Route::resource('/admin/results', 'ResultController');
Route::resource('/admin/documents', 'DocumentController');
Route::resource('/admin/courses', 'CoursesController');
// Route::resource('/admin/section', 'SectionController');
Route::resource('/admin/sales', 'SaleController');

Route::post('/admin/courses/{courseId}', 'CoursesController@addSection');
Route::delete('/admin/courses/{courseId}/sections/{sectionId}', 'CoursesController@deleteSection');


Route::get('/admin/classes/{classId}/addStudent', 'ClassController@getAddStudent');
Route::post('/admin/classes/{classId}', 'ClassController@postAddStudent');
Route::post('/admin/classes/{classId}/{studentID}', 'ClassController@postDeleteStudent');
Route::get('/admin/students/export', 'ExcelController@export')->name('export');


Route::get('/test', 'RegistrationController@create')->name('registration');
Route::post('/test', 'RegistrationController@store');


Route::get('/admin/results/test', 'ResultController@test');