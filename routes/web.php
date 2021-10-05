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
    Route:: get('news/edit', 'Member\NewsController@edit');
    Route:: post('news/edit', 'Member\NewsController@update');
    Route:: get('news', 'Member\NewsController@index');
    Route:: get('news/delete', 'Member\NewsController@delete');
    
    Route:: get('profile/create', 'Member\ProfileController@add');
    Route:: post('profile/create', 'Member\ProfileController@create');
    Route:: get('profile/edit', 'Member\ProfileController@edit');
    Route:: post('profile/edit', 'Member\ProfileController@update');
    Route:: get('profile', 'Member\ProfileController@index');
    Route:: get('profile/delete', 'Member\ProfileController@delete');
    
    

});


//Route:: get('XXX','AAAController@bbb');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'NewsController@index');

Route::get('/profile', 'ProfileController@index');