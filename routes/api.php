<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//The following routes are protected by Passport. Therefore, the API consumers should specify their access token as a Bearer token in the Authorization header of their request.
Route::group(['middleware' => ['auth:api']], function(){
	Route::post('/', 'ResizerController@processImage');
}
