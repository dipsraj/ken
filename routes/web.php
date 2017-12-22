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

Route::get('/','PagesController@index');

Route::get('/view/books','BooksController@index');

Route::get('/insert/book','BooksController@create');
Route::post('/insert/book','BooksController@store');


Route::get('/edit/book/{bid}', ['uses' =>'BooksController@update']);
Route::post('/edit/book/{bid}', ['uses' =>'BooksController@update']);


Route::get('/delete/book/{bid}', ['uses' =>'BooksController@destroy']);