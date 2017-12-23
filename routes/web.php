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

//Show all Books
Route::get('/books','BooksController@index');
//Create new Book
Route::get('/insert/book','BooksController@create');
Route::post('/insert/book','BooksController@store');
//Update Book Details
Route::get('/edit/book/{bid}', ['uses' =>'BooksController@edit']);
Route::post('/edit/book/{bid}', ['uses' =>'BooksController@update']);
//Show particular book
Route::get('/book/{bid}', ['uses' =>'BooksController@show']);
//Delete Book
Route::get('/delete/book/{bid}', ['uses' =>'BooksController@destroy']);