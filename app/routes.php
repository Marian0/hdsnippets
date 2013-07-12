<?php

//Homepage
Route::get('/', array('as' => 'homepage', 'uses' => 'StaticPageController@homepage'));

//Login/Logout
Route::any('user/login', array('as' => 'user.login', 'uses' => 'AuthController@login'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'AuthController@getLogout'));
//Registering
Route::any('user/register', array('as' => 'user.register', 'uses' => 'AuthController@register'));
//View Latest Snippets
Route::get('snippet/latest', array('as' => 'snippet.latest', 'uses' => 'SnippetController@getLatest'));
//View Snippets profile
Route::get('snippet/view/{id}', array('as' => 'snippet.view', 'uses' => 'SnippetController@view'));

//Secured controllers
Route::group(array('before' => 'auth'), function() {
      Route::get('snippet/create', array('as' => 'snippet.create', 'uses' => 'SnippetController@create'));
      Route::post('snippet/store', array('as' => 'snippet.store', 'uses' => 'SnippetController@store'));
});

Route::get('admin/logout', array('as' => 'snippet.popular', 'uses' => 'SnippetController@getPopular'));
Route::get('admin/logout', array('as' => 'tag.popular', 'uses' => 'TagController@getPopular'));
Route::get('admin/logout', array('as' => 'tag.latest', 'uses' => 'TagController@getLatest'));
Route::get('admin/logout', array('as' => 'languages.browse', 'uses' => 'SnippetController@getByLanguages'));

