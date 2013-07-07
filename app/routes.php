<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

//LOGIN
Route::get('user/login',   array('as' => 'user.login',       'uses' => 'AuthController@getLogin'));
Route::post('user/login',  array('as' => 'user.login.post',  'uses' => 'AuthController@postLogin'));
Route::get('user/logout',  array('as' => 'user.logout',      'uses' => 'AuthController@getLogout'));

//Secured controllers
Route::group(array('before' => 'auth'), function() {
	Route::get('snippets/create',  array('as' => 'snippets.create',      'uses' => 'SnippetsController@create'));
	Route::post('snippets/store',  array('as' => 'snippets.store',      'uses' => 'SnippetsController@store'));
});

Route::get('admin/logout',  array('as' => 'snippets.popular',      'uses' => 'SnippetsController@getPopular'));
Route::get('admin/logout',  array('as' => 'snippets.latest',      'uses' => 'SnippetsController@getLatest'));
Route::get('admin/logout',  array('as' => 'tags.popular',      'uses' => 'TagsController@getPopular'));
Route::get('admin/logout',  array('as' => 'tags.latest',      'uses' => 'TagsController@getLatest'));
Route::get('admin/logout',  array('as' => 'languages.browse',      'uses' => 'SnippetsController@getByLanguages'));
Route::get('admin/login',   array('as' => 'user.register',       'uses' => 'AuthController@Register'));
