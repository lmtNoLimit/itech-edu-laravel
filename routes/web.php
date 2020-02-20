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
Route::get('/nganh-dao-tao/ccna', 'HomeController@showLandingPages')->name('ccna');
Route::get('/nganh-dao-tao/mcsa', 'HomeController@showLandingPages')->name('mcsa');
Route::get('/nganh-dao-tao/linux', 'HomeController@showLandingPages')->name('linux');
Route::get('/nganh-dao-tao/ceh', 'HomeController@showLandingPages')->name('ceh');
Route::get('/nganh-dao-tao/chfi', 'HomeController@showLandingPages')->name('chfi');
Route::get('/nganh-dao-tao/php', 'HomeController@showLandingPages')->name('php');
Route::get('/nganh-dao-tao/android', 'HomeController@showLandingPages')->name('android');
Route::get('/nganh-dao-tao/graphic-design', 'HomeController@showLandingPages')
    ->name('graphic');
// tuyen sinh
Route::get('/tuyen-sinh/tin-tuyen-sinh', 'HomeController@index')->name('tin_tuyen_sinh');
Route::get('/tuyen-sinh/quy-che-tuyen-sinh', 'HomeController@index')
    ->name('quy_che_tuyen_sinh');
Route::get('/tuyen-sinh/hoc-phi-hoc-bong', 'HomeController@index')
    ->name('hoc_phi_hoc_bong');
Route::get('/tuyen-sinh/hoi-dap', 'HomeController@index')->name('hoi_dap');
// tin tuc
Route::get('/tin-tuc/tin-noi-bo', 'HomeController@index')->name('tin_noi_bo');
Route::get('/tin-tuc/tin-cong-nghe', 'HomeController@index')->name('tin_cong_nghe');
Route::get('/tin-tuc/su-kien', 'HomeController@index')->name('events');
// hoi nhap quoc te
Route::get('/hoi-nhap-quoc-te', 'HomeController@index')->name('hoi_nhap_quoc_te');
// sinh vien
Route::get('/sinh-vien/thoi-khoa-bieu', 'HomeController@index')
    ->name('thoi_khoa_bieu');
Route::get('/sinh-vien/ket-qua-hoc-tap', 'HomeController@index')
    ->name('ket_qua_hoc_tap');
Route::get('/sinh-vien/mau_van_ban', 'HomeController@index')
    ->name('mau_van_ban');
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
Route::resource('/admin/sales', 'SaleController');


Route::get('/admin/classes/{classId}/addStudent', 'ClassController@getAddStudent');
Route::post('/admin/classes/{classId}', 'ClassController@postAddStudent');
Route::post('/admin/classes/{classId}/{studentID}', 'ClassController@postDeleteStudent');
Route::get('/admin/students/export', 'ExcelController@export')->name('export');


Route::get('/test', 'RegistrationController@create')->name('registration');
Route::post('/test', 'RegistrationController@store');


Route::get('/admin/results/test', 'ResultController@test');