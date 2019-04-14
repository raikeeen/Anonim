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
Route::get('/news', 'newsController@index')->name('news');
Route::get('/news/detail', 'newsController@detail')->name('detail');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tasks', 'tasksController@index')->name('tasks');
Route::get('/tasks/detail', 'tasksController@detail')->name('tasks1');



Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'AdminController@welcome');
    Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});
