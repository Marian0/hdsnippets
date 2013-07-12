<?php

class SnippetController extends BaseController {

	public function create() {
		return View::make('snippet/snippet_create');
	}

	public function store() {

		$snippet = new Snippet;

		$snippet->title = Input::get('title');
		$snippet->description = Input::get('description');
		$snippet->snippet = Input::get('snippet');
		$snippet->code_language = (int) Input::get('code_language', 0);
		$snippet->user_id = Sentry::getUser()->id;

		if ($snippet->save()) {
			Notification::success('The snippet is now created');
			return Redirect::route('snippet.show_slug', $snippet->slug);
		} else {
			return Redirect::back()->withInput()->withErrors($snippet->errors());
		}
	}
	
	public function show($id) {
		$snippet = Snippet::find($id); //TODO: VALIDATES IF EXISTS
		
		$snippet->addVisit();
		
		return View::make('snippet/snippet_show')
				->with('snippet' , $snippet )
		;
	}

	public function show_slug($slug) {
		$snippet = Snippet::where('slug' , '=', $slug )->get()->first();

		$snippet->addVisit();
		
		return View::make('snippet/snippet_show')
				->with('snippet' , $snippet )
		;

	}

	public function show_latest() {
		$snippets = Snippet::orderBy('updated_at', 'desc')->take(20)->get();
		return View::make('snippet/snippet_list')->with('snippets' , $snippets);

	}

}