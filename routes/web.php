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
    return view('welcome');
});
//blogs
Route::group(['middleware'=>'auth','prefix' => 'blogs'], function () {
     //create blog
     Route::get('/create','BlogController@show_create_page');
     Route::post('/create','BlogController@create');
     //show 
     Route::get('/','BlogController@show_blogs')->name('blogs');
     //show blog page
     Route::get('/{id}', 'BlogController@show_blog');
     //edit blog
     Route::get('/{id}/edit', 'BlogController@show_edit_page');
     Route::put('/{id}/edit','BlogController@update_blog');
     //delete blog
     Route::delete('/{id}/delete','BlogController@destroy')->name('blog.destroy');;
});
//authors
Route::group(['middleware'=>'auth','prefix' => 'authors'], function () {
    //create
    Route::get('/create','AuthorController@show');
    Route::post('/create','AuthorController@create');  
});
//comments
    //create
    Route::post('comments/create','CommentController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//github login
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
//facebook login
Route::get('login/fb', 'Auth\LoginController@redirectFBToProvider');
Route::get('login/fb/callback', 'Auth\LoginController@handleFBProviderCallback');