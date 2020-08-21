<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome2', function () {
    return view('welcome2');
});

Auth::routes();

//Route::get('/flogin', 'Auth\LoginController@showFacultyLoginForm');
//Route::get('/flogin', 'Auth\LoginController@facultyLogin')->name('faculty-login');

Route::get('/auth/flogin', 'Auth\FacultyLoginController@showFacultyLoginForm')->name('f-login');
Route::post('/auth/attemptLogin', 'Auth\FacultyLoginController@facultyLogin')->name('flogin');


Route::get('/auth/fregister', 'Auth\FacultyRegisterController@showFacultyRegisterForm')->name('register-faculty');
Route::post('/facultyside', 'Auth\FacultyRegisterController@createFaculty')->name('faculty-credentials');


//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/formdetails','FormController@index' )->name('formdetails');

    Route::post('/formdetails','FormController@store')->name('save-formdetails');

    Route::view('/form-filled-successfully', 'form-filled-successfully');
});

// faculty routes below
Route::group([ 'middleware' => 'auth:faculty'], function() {
    Route::get('/facultyside', 'FacultyController@viewAllForms')->name('view-forms'); //view forms of all students

    Route::get('/viewform/{id}', 'FacultyController@view')->name('view-form'); //view form of specific student

    Route::get('/editform/{id}', 'FacultyController@uploadImage')->name('upload-image');

    Route::post('/editform', 'FacultyController@storeImage')->name('store-image');
});
