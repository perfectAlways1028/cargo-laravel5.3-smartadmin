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
Route::post('/user/signup', 'Api\WebServiceUserController@serviceRegister');
Route::post('/user/packages', 'Api\WebServiceUserController@servicePackages');
Route::post('/user/giftcards', 'Api\WebServiceUserController@serviceGiftcards');