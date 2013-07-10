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

// Route::get('/test', function() {
//     $user = new User;
//     dd($user);
// });

Route::get('/', array('as' => 'homepage', 'uses' => 'HomeController@homepage'));

//LOGIN
Route::get('user/login', array('as' => 'user.login', 'uses' => 'AuthController@getLogin'));
Route::post('user/login', array('as' => 'user.login.post', 'uses' => 'AuthController@postLogin'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'AuthController@getLogout'));
//Register
Route::get('user/register', array('as' => 'user.register', 'uses' => 'AuthController@register'));
Route::post('user/store', array('as' => 'user.store', 'uses' => 'AuthController@store'));

//View Snippets
Route::get('snippets/latest', array('as' => 'snippets.latest', 'uses' => 'SnippetsController@getLatest'));
Route::get('snippets/view/{id}', array('as' => 'snippets.view', 'uses' => 'SnippetsController@view'));
//Secured controllers
Route::group(array('before' => 'auth'), function() {
      Route::get('snippets/create', array('as' => 'snippets.create', 'uses' => 'SnippetsController@create'));
      Route::post('snippets/store', array('as' => 'snippets.store', 'uses' => 'SnippetsController@store'));
});

Route::get('admin/logout', array('as' => 'snippets.popular', 'uses' => 'SnippetsController@getPopular'));
Route::get('admin/logout', array('as' => 'tags.popular', 'uses' => 'TagsController@getPopular'));
Route::get('admin/logout', array('as' => 'tags.latest', 'uses' => 'TagsController@getLatest'));
Route::get('admin/logout', array('as' => 'languages.browse', 'uses' => 'SnippetsController@getByLanguages'));

