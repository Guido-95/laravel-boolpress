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



Auth::routes();

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
	->namespace('Admin')
	->group(function(){
		Route::get('/','HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
		Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
		Route::get('/tag/{tag}', 'TagController@show')->name('tag.show');
		
	});


Route::get("{any?}",function(){
	return view("guest.home");
})->where("any", ".*");
// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
