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
Route::apiResources(['job'=>'API\JobsController']);
Route::get('getbride','API\UserDetailsController@bride');
Route::post('createJobCategory','API\JobsController@createjobcategory');
Route::get('getjobcategory','API\JobsController@getjobcategory');
Route::delete('removejobcategory/{id}','API\JobsController@deletejobcategory');
Route::post('applyjob','API\JobsController@applyjob');
Route::get('jobcategory','API\JobsController@getjob_category');
Route::post('insertnews','API\SettingsController@insertnews');
Route::get('getnews','API\SettingsController@getnews');
Route::delete('deletenews/{id}','API\SettingsController@deletenews');
Route::post('addtodirectory','API\SettingsController@addtodirectory');
Route::get('showdirectory','API\SettingsController@showdirectory');
// Route::get('jobcategory') 
