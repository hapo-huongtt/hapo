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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('members', 'MemberController');

Route::resource('tasks', 'TaskController');

// Route::prefix('projects')->name('projects.')->group(function () {
//     Route::get('/', 'ProjectController@index')->name('index');
//     Route::get('create', 'ProjectController@create')->name('create');
// });

// Route::resource('customers', 'CustomerController');