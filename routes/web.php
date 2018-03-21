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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users','user_controller');

Route::get('/home','HomeController@index');

Route::resource('questions', 'question_controller');

route::get('usercontest','user_contest_controller@index');
route::get('histories/{$id}','user_contest_controller@show_histories');

route::post('userreceive_answer','user_contest_controller@receive_answer');
route::post('usertransmit_answer','user_contest_controller@transmit_answer');


Route::get('/admincontest','admin_contest_controller@index')->name('/admincontest');
Route::post('/admincontest','admin_contest_controller@change')->name('/admincontest');
<<<<<<< HEAD
Route::post('/admincontest','admin_contest_controller@changecontest')->name('/admincontest');
//Route::post('/admincontest','admin_contest_controller@show_history')->name('/admincontest'); //Route Test Cua History
=======
Route::post('/admincontest','admin_contest_controller@show_history')->name('/admincontest'); //Route Test Cua History
>>>>>>> e241deaf1f0779b1320255cdbe1ce2fef3593479

Route::get('/logout', function () {
	Auth::logout();
    return view('welcome');
});

Route::get('time','user_contest_controller@time');