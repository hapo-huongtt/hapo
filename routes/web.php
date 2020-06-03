<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

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

Route::get('/', 'MemberController@index');
Route::resource('members', 'MemberController');
Route::get('/list', 'MemberController@list');
Route::resource('tasks', 'TaskController');
Route::get('/searchs', 'TaskController@index');
Route::resource('customers', 'CustomerController');
Route::get('/keyword', 'CustomerController@index');
Route::resource('projects', 'ProjectController');
Route::get('/search', 'ProjectController@index');
