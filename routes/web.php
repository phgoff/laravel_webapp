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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/myhome', 'HomeController@myhome')->name('myhome');
Route::get('/question', 'QuestionsController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('questions', 'QuestionsController');
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('topics', 'TopicsController');


});
