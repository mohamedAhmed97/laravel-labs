<?php

use Illuminate\Support\Facades\Route;

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
});

//blogs
    //create blog
    Route::get('/blogs/create','BlogController@show_create_page');
    Route::post('/blogs/create','BlogController@create');
    //show blogs
    Route::get('blogs','BlogController@show_blogs')->name('blogs');
    //show blog page
    Route::get('blogs/{id}', 'BlogController@show_blog');
    //edit blog
    Route::get('blogs/{id}/edit', 'BlogController@show_edit_page');
    Route::put('blogs/{id}/edit','BlogController@update_blog');
    //delete blog
    Route::get('blogs/{id}/delete','BlogController@destroy');



//authors
    //create
    Route::get('/authors/create','AuthorController@show');
    Route::post('/authors/create','AuthorController@create');