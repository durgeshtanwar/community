<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Notifications\AdminSpeaks;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $user= Auth::user();
    User::find($user->id)->notify(new AdminSpeaks);
    return view('home');
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("markasread",function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');

//Route::get('{path}','HomeController@index')->where('path','([A-z\d-\/_.]+)?');
Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d\-\/_.]+)' );

Route::post('/forgetpassword','ForgetPassword@index');