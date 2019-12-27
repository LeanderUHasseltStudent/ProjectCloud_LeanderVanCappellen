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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/dives', 'DivesController@index')->name('home');
//Route::get('/home/test', 'MaakDiveController@index');
//Route::post('/home/test/test2', 'MaakDiveController@store');

Route::resource('dives', 'DivesController');
Route::resource('reviews', 'ReviewController');
Route::post('/home/review/create', 'ReviewController@postReview');
Route::post('/home/review', 'ReviewController@getReview');
Route::get('/gradesBook', 'GradesBookController@index');
Route::get('/gradesBook/update', 'GradesBookController@update');
Route::post('/gradesBook/update/submit', 'GradesBookController@submitUpdate');

/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/