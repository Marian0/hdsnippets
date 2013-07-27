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
		$snippet->private = Input::get('private',0);
		$snippet->language_id = (int) Input::get('language_id', 0);
		$snippet->user_id = Sentry::getUser()->id;

		  // Now that we have the snippet ID we need to move the image
        if (Input::hasFile('image')) {
            $snippet->image = Image::upload(Input::file('image'), 'snippets' . $snippet->id);
        }

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
		$snippets = Snippet::orderBy('updated_at', 'desc')->where('private' , '=', 0 )->take(20)->get();
		return View::make('snippet/snippet_list')->with('snippets' , $snippets);
	}

	public function show_by_user($user_id) {
		$snippets = Snippet::where('user_id' , '=', $user_id )->get();
		return View::make('snippet/snippet_list')->with('snippets' , $snippets);

	}

}