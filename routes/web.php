<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', 'StudentController');
Route::resource('staff', 'StaffController');

Route::post('activities', 'ActivityController@storeActivity');
Route::patch('activities/{activity_id}','ActivityController@updateActivity');
Route::delete('activities/{activity_id}', 'ActivityController@deleteActivity');

Route::get('activities/all/{student_id}', 'ActivityController@getStudentsActivities');
Route::get('activity/{activity_id}', 'ActivityController@getCompleteActivityDetails');
// Route::get('activities/unvalidated/{type}', '');
//
// Route::post('activities/validate/{activity_id}', '');
