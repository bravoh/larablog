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

// Homepage Route
Route::get('/', 'BlogController@index');

// RSS Feed Route
Route::feeds();

// Admin Routes
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Dynamic Pages Routes
Route::get('/{slug}/', 'BlogController@showPost');


