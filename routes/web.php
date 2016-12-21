<?php


// use DB;

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

  $user = DB::select('SELECT * FROM students WHERE id = ?', [$request->username]);
	if ($user != null) {
    $user = $user[0];
    $_SESSION["login_user"] = $user->id;
		return redirect('students/'.$user->id);
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

Route::post('activities', 'ActivityController@storeActivity');
Route::patch('activities/{activity_id}','ActivityController@updateActivity');
Route::delete('activities/{activity_id}', 'ActivityController@deleteActivity');

Route::get('activities/all/{student_id}', 'ActivityController@getStudentsActivities');
Route::get('activity/{activity_id}', 'ActivityController@getCompleteActivityDetails');
// Route::get('activities/unvalidated/{type}', '');
//
// Route::post('activities/validate/{activity_id}', '');
