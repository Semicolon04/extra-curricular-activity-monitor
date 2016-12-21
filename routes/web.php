<?php
session_start();

use Illuminate\Http\Request;
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
    return view('login');
});

Route::post('/login', function (Request $request) {

  $user = DB::select('SELECT * FROM users WHERE id = '. "'".[$request->username][0]."'". ' and password ='. "'" .[$request->password][0]."'");
	if ($user != null) {
    $user = $user[0];
    $_SESSION["login_user"] = $user->id;
    $_SESSION["login_type"] = $user->type;
    if(((string)$_SESSION["login_type"])=="students"){
		return redirect('students/'.$user->id);
    }
    elseif (((string)$_SESSION["login_type"]) =='staff') {
      	return redirect('validate');
    }

    var_dump([$user->type][0]);
	} else {
		var_dump('A user tried to log in as '. $request->username);
    return response()->json(['message' => 'A user tried to log in as '. $request->username]);
	}

});

Route::get('/logout',function(){
  $_SESSION['login_user']=null;
  return View('login');
});




Route::resource('students', 'StudentController');
Route::resource('staff', 'StaffController');

Route::get('validate', 'StaffController@showActivitesToValidate');

Route::post('activities', 'ActivityController@storeActivity');
Route::patch('activities/{activity_id}','ActivityController@updateActivity');
Route::delete('activities/{activity_id}', 'ActivityController@deleteActivity');

Route::get('activities/all/{student_id}', 'ActivityController@getStudentsActivities');
Route::get('activity/{activity_id}', 'ActivityController@getCompleteActivityDetails');

Route::get('activities/unvalidated/{types}', 'ActivityController@getUnvalidatedActivities');
Route::post('activities/validate/{activity_id}', 'ActivityController@validateActivity');

Route::get('points/{student_id}', 'ActivityController@getTotalPoints');
