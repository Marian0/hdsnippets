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
	return View::make('auth/login');
});

//LOGIN
Route::get('user/login',   array('as' => 'user.login',       'uses' => 'AuthController@getLogin'));
Route::post('user/login',  array('as' => 'user.login.post',  'uses' => 'AuthController@postLogin'));
Route::get('user/logout',  array('as' => 'user.logout',      'uses' => 'AuthController@getLogout'));


Route::get('admin/logout',  array('as' => 'snippets.popular',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/logout',  array('as' => 'snippets.latest',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/logout',  array('as' => 'tags.popular',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/logout',  array('as' => 'tags.latest',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/logout',  array('as' => 'languages.browse',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login',   array('as' => 'user.register',       'uses' => 'App\Controllers\Admin\AuthController@getLogin'));

Route::get('snippets/create',  array('as' => 'snippets.create',      'uses' => 'SnippetsController@create'));
Route::post('snippets/store',  array('as' => 'snippets.store',      'uses' => 'SnippetsController@store'));


Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
	Route::any('/',                'App\Controllers\Admin\PagesController@index');
	Route::resource('articles',    'App\Controllers\Admin\ArticlesController');
	Route::resource('pages',       'App\Controllers\Admin\PagesController');
});