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
Route::get('/bills/{id}', 'Bills@show')->middleware('auth');
Route::get('/bills', 'Bills@showBills')->middleware('auth');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/measurements','MeasurementsController@showMeasurements')->middleware('auth');;
Route::post('/measurements','MeasurementsController@setShownMeasurementsType');
Route::post('/measurementDetails','MeasurementsController@showMeasurementDetails')->middleware('auth');;

Route::post('/login', 'ProfileController@loginWebUser');
Route::get('/profile', 'ProfileController@showProfile')->middleware('auth');
Route::post('/profile', 'ProfileController@editUser');

//API Calls
Route::get('api/v1/users/getUser/{email}/', 'API\V1\UserApiController@getUser');
Route::post('api/v1/users/getUser', 'API\V1\UserApiController@getUser')->middleware('apiAuth');
Route::post('api/v1/users/getToken', 'API\V1\UserApiController@login');
Route::post('api/v1/users/editUser', 'API\V1\UserApiController@editUser')->middleware('apiAuth');
Route::post('api/v1/bills/getBills', 'API\V1\BillsApiController@getBills')->middleware('apiAuth');
Route::post('api/v1/bills/getBill', 'API\V1\BillsApiController@getBill')->middleware('apiAuth');
Route::post('api/v1/measurements/getMeasurements', 'API\V1\MeasurementsApiController@getAllMeasurements')->middleware('apiAuth');
Route::post('/api/v1/measurements/getMeasurementDetail' ,'API\V1\MeasurementsApiController@getMeasurementDetails');
Route::post('api/v1/measurements/postPulse', 'API\V1\MeasurementsApiController@insertPulse')->middleware('apiAuth');
Route::post('api/v1/measurements/postEcg', 'API\V1\MeasurementsApiController@insertEcg')->middleware('apiAuth');
Route::post('api/v1/measurements/postBloodPressure', 'API\V1\MeasurementsApiController@insertBloodPressure')->middleware('apiAuth');