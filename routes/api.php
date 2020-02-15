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

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});

Route::apiResources(['user'=>'API\UserController']);
Route::apiResources(['userDetails'=>'API\UserDetailsController']);
Route::get('familylist','API\UserDetailsController@userlist');
Route::get('getbride','API\UserDetailsController@bride');
Route::get('getgroom','API\UserDetailsController@groom');
Route::post('myuserDetails','API\UserDetailsController@myUserDetails');
Route::apiResources(['job'=>'API\JobsController']);
Route::post('createJobCategory','API\JobsController@createjobcategory');
Route::get('getjobcategory','API\JobsController@getjobcategory');
Route::delete('removejobcategory/{id}','API\JobsController@deletejobcategory');
Route::post('applyjob','API\JobsController@applyjob');
Route::get('jobcategory','API\JobsController@getjob_category');
Route::get('get_applicants','API\JobsController@get_applicants');
Route::get('myApplications','API\JobsController@my_application');
Route::delete('deleteMyApplication/{id}','API\JobsController@delete_myapplication');
Route::put('updateApplication/{id}','API\JobsController@updateApplication');
Route::put('updatejob/{id}','API\JobsController@updateMyJob');
Route::delete('deletejob/{id}','API\JobsController@delete_myjobs');
Route::post('insertnews','API\SettingsController@insertnews');
Route::get('getnews','API\SettingsController@getnews');
Route::delete('deletenews/{id}','API\SettingsController@deletenews');
Route::post('addtodirectory','API\SettingsController@addtodirectory');
Route::get('showdirectory','API\SettingsController@showdirectory');
Route::get('getdirectory','API\SettingsController@getDirectory');
Route::delete('deletedirectory/{id}','API\SettingsController@deleteDirectory');
Route::put('updatedirectory/{id}','API\SettingsController@updateDirectory');
Route::apiResources(['event'=>'API\EventController']);
Route::get('familyuserlist','API\FamilyController@familyusers');
Route::get('getAuthenticatedUser','API\FamilyController@getAuthenticatedUser');
Route::get('myjobs','API\JobsController@my_jobs'); 
Route::put('updatePhoto','API\UserController@updatePhoto');
Route::put('updateUserType/{id}','API\UserDetailsController@updateUserType');

//Route::get('getFamilyMembers','API\FamilyController@getFamilyMembers');

//Route::get('my_applications','API')
// Route::get('jobcategory') 
