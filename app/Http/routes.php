<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});
//Internal Calls
Route::get('/bills/{id}', 'BillsController@Controller@show')->middleware('auth');
Route::get('/bills', 'BillsController@showBills')->middleware('auth');

Route::get('/measurements','MeasurementsController@showMeasurements');
Route::post('/measurements','MeasurementsController@setMeasurementsType');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('/dashboard', function () {
    return view('welcome');
});
Route::get('/profile', 'ProfileController@showProfile')->middleware('auth');
Route::post('/profile', 'ProfileController@editUser');

//API Calls
Route::get('api/v1/users/getUser/{email}/', 'API\V1\UserApiController@getUser');
Route::post('api/v1/users/getUser/', 'API\V1\UserApiController@getLogin');
Route::post('api/v1/users/getUser/login', 'API\V1\UserApiController@login');
Route::post('api/v1/users/editUser', 'API\V1\UserApiController@editUser');
Route::post('api/v1/bills/getBills', 'API\V1\BillsApiController@getBills');
Route::post('api/v1/bills/getBill', 'API\V1\BillsApiController@getBill');