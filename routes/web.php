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

Route:: group(['prefix' => 'member', 'middleware' => 'auth'], function() {
    
    Route:: get('news/create', 'Member\NewsController@add');
    Route:: post('news/create', 'Member\NewsController@create');
    
    Route:: get('profile/create', 'Member\ProfileController@add');
    Route:: post('profile/create', 'Member\ProfileController@create');
    Route:: get('profile/edit', 'Member\ProfileController@edit');
    Route:: post('profile/edit', 'Member\ProfileController@update');
    
});


//Route:: get('XXX','AAAController@bbb');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
