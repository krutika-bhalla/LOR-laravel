<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/formdetails','FormController@index' )->name('formdetails');

    Route::post('/formdetails','FormController@store')->name('save-formdetails');

    Route::get('/facultyside', 'FormController@viewAllForms')->name('view-forms'); //view forms of all students

    Route::get('/viewform/{id}', 'FormController@view')->name('view-form'); //view form of specific student
});
