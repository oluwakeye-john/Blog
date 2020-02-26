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

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('', 'BlogController@index')->name('home');
Route::get('/home', 'BlogController@index')->name('home');

Route::get('blog/{blog_id}', 'BlogController@detail')->name('detail');

Route::get('new', 'BlogController@create')->middleware('auth')->name('new');
Route::post('new', 'BlogController@store')->middleware('auth')->name('store');

Route::get('blog/{blog_id}/edit', 'BlogController@edit')->middleware('auth')->name('edit');
Route::post('blog/{blog_id}/edit', 'BlogController@update')->middleware('auth')->name('update');

Route::delete('blog/{blog_id}/delete', 'BlogController@delete')->middleware('auth')->name('delete');

Route::post('contact', 'BlogController@contact')->name('contact');

Route::post('subscribe', 'BlogController@subscribe')->name('subscribe');

Route::get('all', 'BlogController@all')->middleware('auth')->name('all');

Route::get('feedback', 'BlogController@feedback')->middleware('auth')->name('feedback');


Route::get('layout', 'LookController@index')->middleware('auth')->name('layout');


