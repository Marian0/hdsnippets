<?php 
// namespace App\Controllers;

// use Auth, BaseController, Form, Input, Redirect, Sentry, View;

// use Snippet;

class SnippetsController extends BaseController {
	

	public function create() {
		return View::make('snippets/snippets_create');
	}


	public function store()
	{

		$snippet = new Snippet;

		$snippet->title   = Input::get('title');
		$snippet->description   = Input::get('description');
		$snippet->snippet   = Input::get('snippet');
		$snippet->code_language   = (int) Input::get('code_language', 0);
		$snippet->user_id = Sentry::getUser()->id;
		
		if ($snippet->save()) {
			// return Redirect::route('admin.articles.edit', $article->id);
			// Notification::success('The article was saved.');
			return 'Guardado correctamente';
		} else {
			return 'errores';
			return Redirect::back()->withInput()->withErrors($snippet->errors);
		}

	}

}