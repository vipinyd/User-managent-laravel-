<?php

use Illuminate\Support\Facades\Route;

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

Route::view('home','home');
//user
Route::view('userregister','user/user_register');
Route::post('usersubmit','App\Http\Controllers\ProfileController@usersubmit');
//logout
Route::get('logout', function () {
    session()->forget('adminid');
	return redirect('login');
});
//admin

Route::view('login','admin/login');
Route::post('loginsubmit','App\Http\Controllers\ProfileController@loginsubmit');

// group middleware 
Route::group(['middleware'=>['adminauth']],function(){
Route::view('adduser','admin/add_user');
Route::post('adminsubmit','App\Http\Controllers\ProfileController@adminsubmit');
Route::view('viewuser','admin/viewuser');
Route::get('alluser','App\Http\Controllers\ProfileController@showall');
Route::get('adminindex','App\Http\Controllers\ProfileController@adminshow');
Route::get('delete/{id}','App\Http\Controllers\ProfileController@destroy');
Route::get('edit/{id}','App\Http\Controllers\ProfileController@edit');
Route::post('update/{id}','App\Http\Controllers\ProfileController@update');
});