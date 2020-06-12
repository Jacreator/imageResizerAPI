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

Route::get('/', "HomeController@index");
Route::get('/register', "HomeController@register");

Route::post('/save', "AuthController@register_user");
Route::get('/view_token', "AuthController@view_token");
Route::get('/token_show', "AuthController@token_show");



Route::group(['middleware' => ['auth:api']], function(){
	//post request to api to resize image
	Route::post('/v1/resizeImage', 'ResizerController@processImage');

	//get request to get documentation in JSON format
	Route::get('/v1/documentation', 'HomeController@documentation');

	//post request to configure API setting in JSON format
	Route::post('/v1/configure', 'HomeController@configure');
});

