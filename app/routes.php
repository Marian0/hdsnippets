<?php

//Homepage
Route::get('/', array('as' => 'homepage', 'uses' => 'StaticPageController@homepage'));

//Login/Logout
Route::any('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
//Registering
Route::any('user/register', array('as' => 'user.register', 'uses' => 'UserController@register'));
//Registering
Route::any('user/edit_profile', array('as' => 'user.edit_profile', 'uses' => 'UserController@edit_profile'));
//View Latest Snippets
Route::get('snippet/latest', array('as' => 'snippet.latest', 'uses' => 'SnippetController@show_latest'));
Route::get('snippet/popular', array('as' => 'snippet.popular', 'uses' => 'SnippetController@show_popular'));
//View Snippets profile
Route::get('snippet/private/{hash}', array('as' => 'snippet.show_private', 'uses' => 'SnippetController@show_private'));
Route::get('snippet/public/{slug}', array('as' => 'snippet.show_slug', 'uses' => 'SnippetController@show_slug') );

//Languages
Route::get('languages', array('as' => 'language.show_browse', 'uses' => 'LanguageController@show_browse'));
Route::get('language/{slug}', array('as' => 'snippet.show_by_language', 'uses' => 'SnippetController@show_by_language'));

//View profile
Route::get('user/{user_id}', array('as' => 'user.profile', 'uses' => 'UserController@profile'));


//Secured controllers
Route::group(array('before' => 'auth'), function() {
	Route::get('snippet/create', array('as' => 'snippet.create', 'uses' => 'SnippetController@create'));
    Route::post('snippet/store', array('as' => 'snippet.store', 'uses' => 'SnippetController@store'));
	Route::get('snippet/user/{user_id}', array('as' => 'snippet.show_by_user', 'uses' => 'SnippetController@show_by_user'));
});

//Tags
Route::get('tag/popular', array('as' => 'tag.popular', 'uses' => 'TagController@show_popular'));
Route::get('tag/latest', array('as' => 'tag.latest', 'uses' => 'TagController@show_latest'));


//Handling exceptions
App::missing(function($exception)
{
    return View::make('_partial/error')
				->with('exception' , $exception )
		;
});
