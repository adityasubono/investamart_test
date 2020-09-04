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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','HomeController@index');
Route::get('/artboard/{id}','HomeController@artboard');


Route::get('/profile/','ProfileController@index');


Route::get('/question/','QuestionController@index');
Route::post('/question/','QuestionController@store');
Route::put('/question/{id}','QuestionController@update');


Route::post('/answer','AnswerController@index');
