<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::resource('home', 'ClientController');

Auth::routes();
Route::resource('/admin', 'AdminController');
Route::resource('/categories', 'CategoryController');
Route::resource('/manageUser', 'UserController');
Route::get('/blacklistUser', 'UserController@getBlackListUser')->name('blacklistUser');
// Route::get('/home', 'HomeController@index')->name('home');
