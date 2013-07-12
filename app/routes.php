<?php

//Homepage
Route::get('/', array('as' => 'homepage', 'uses' => 'StaticPageController@homepage'));

//Login/Logout
Route::any('user/login', array('as' => 'user.login', 'uses' => 'AuthController@login'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'AuthController@logout'));
//Registering
Route::any('user/register', array('as' => 'user.register', 'uses' => 'AuthController@register'));
//View Latest Snippets
Route::get('snippet/latest', array('as' => 'snippet.latest', 'uses' => 'SnippetController@show_latest'));
//View Snippets profile
Route::get('snippet/private/{hash}', array('as' => 'snippet.show_private', 'uses' => 'SnippetController@show_private'));
Route::get('snippet/public/{slug}', array('as' => 'snippet.show_slug', 'uses' => 'SnippetController@show_slug') );

//Secured controllers
Route::group(array('before' => 'auth'), function() {
	Route::get('snippet/create', array('as' => 'snippet.create', 'uses' => 'SnippetController@create'));
    Route::post('snippet/store', array('as' => 'snippet.store', 'uses' => 'SnippetController@store'));
});

Route::get('admin/logout', array('as' => 'snippet.popular', 'uses' => 'SnippetController@show_popular'));
Route::get('admin/logout', array('as' => 'tag.popular', 'uses' => 'TagController@getPopular'));
Route::get('admin/logout', array('as' => 'tag.latest', 'uses' => 'TagController@getLatest'));
Route::get('admin/logout', array('as' => 'languages.browse', 'uses' => 'SnippetController@getByLanguages'));

