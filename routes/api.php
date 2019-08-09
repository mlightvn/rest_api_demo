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



Route::resource('employee', 'Api\EmployeeController');
// Route::post('employee/create', 'Api\EmployeeController@store');

// Route::group(['prefix' => 'employee'], function(){
// 	Route::delete('{id}', 'Api\EmployeeController@destroy');
// });


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
