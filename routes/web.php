<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
Route::get('/applicant/filter', 'HomeController@filter');

Route::get("/applicant/register", function(){
	return view("reg");
});
Route::get("/applicant/registration", "ApplicantController@showForm")->name('applicant.registration');
Route::post('applicant/form/submit' , "ApplicantController@store");
Route::post('applicant/file/upload' , "ApplicantController@upload");
Route::get('applicant/get/district' , "ApplicantController@district");
Route::get('applicant/get/upozila' , "ApplicantController@upozila");
