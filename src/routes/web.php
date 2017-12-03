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

Route::get('/learnvue', 'LearnVueController@index')->name('learnvue');
Route::get('/learnvue/app/{route}', 'LearnVueController@index');
Route::get('/learnvue/app/api/{route}', 'LearnVueController@api')->name('learnvue-api');

Route::get('/learn-es2015', 'LearnES2015Controller@index')->name('learn-es2015');

Route::get('/testapi', function () {
    return date("l jS \of F Y h:i:s A");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
