<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/getGradesBook/{id}', 'Controller@getGradesBook');
Route::post('/postGradesBook/{id}/{eenster}/{tweester}/{driester}/{vierster}/{eensterI}/{tweesterI}/{basicNitrox}/{advancedNitrox}/{basicTrimix}', 'Controller@postGradesBook');