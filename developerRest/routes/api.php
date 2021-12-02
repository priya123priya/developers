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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('/register', 'App\Http\Controllers\UserController@register');
// Route::post('/login', 'App\Http\Controllers\UserController@login');
// Route::post('/addDeveloper', 'App\Http\Controllers\UserController@register');
// Route::post('/delete', 'App\Http\Controllers\UserController@deleteDeveloper');
// Route::post('/update/{id}', 'App\Http\Controllers\UserController@updateDeveloper');
// Route::get('/listDeveloper', 'App\Http\Controllers\UserController@listDeveloper');
// Route::post('/forget-password', 'App\Http\Controllers\ForgotPasswordController@submitForgetPasswordMail');
// Route::post('/reset-password', 'App\Http\Controllers\ForgotPasswordController@updatePassword');


Route::post('/register', 'App\Http\Controllers\DeveloperController@register');
Route::post('/login', 'App\Http\Controllers\DeveloperController@login');
Route::post('/addDeveloper', 'App\Http\Controllers\DeveloperController@register');
Route::post('/delete', 'App\Http\Controllers\DeveloperController@deleteDeveloper');
Route::post('/update/{id}', 'App\Http\Controllers\DeveloperController@updateDeveloper');
Route::get('/listDeveloper', 'App\Http\Controllers\DeveloperController@listDeveloper');
Route::post('/forget-password', 'App\Http\Controllers\ForgotPasswordController@submitForgetPasswordMail');
Route::post('/reset-password', 'App\Http\Controllers\ForgotPasswordController@updatePassword');