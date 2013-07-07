<?php

// namespace App\Controllers;
//use Auth, BaseController, Form, Input, Redirect, Sentry, View;
// use Snippet;

class SnippetsController extends BaseController {

	public function create() {
		return View::make('snippets/snippets_create');
	}

	public function store() {

		$snippet = new Snippet;

		$snippet->title = Input::get('title');
		$snippet->description = Input::get('description');
		$snippet->snippet = Input::get('snippet');
		$snippet->code_language = (int) Input::get('code_language', 0);
		$snippet->user_id = Sentry::getUser()->id;

		if ($snippet->save()) {
//			return "HOLA ?";
			return Redirect::route('snippets.view', $snippet->id);
		} else {
			return Redirect::back()->withInput()->withErrors($snippet->errors());
		}
	}
	
	public function view($id) {
		$snippet = Snippet::find($id); //TODO: VALIDATES IF EXISTS
		return View::make('snippets/snippets_show')->with('snippet' , $snippet );
	}

}