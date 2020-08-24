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

//DB::listen(function($query){var_dump($query->sql, $query->binding);});

Route::get('/','HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/tweets','TweetsController@store');

Route::get('/profile/{user:username}','ProfileController@index')->name('profile');

Route::post('/profile/{user:username}/follow','FollowsController@store')->name('follow');

Route::get('/profile/{user:username}/edit','ProfileController@edit')->middleware('can:edit,user');

Route::patch('/profile/{user:username}','ProfileController@update')->name('profile/{user:username}');


Route::get('explore','ExploreController');
