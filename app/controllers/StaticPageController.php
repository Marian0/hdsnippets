<?php

class StaticPageController extends BaseController {

	public function homepage() {
		$snippets = Snippet::orderBy('updated_at', 'desc')->take(20)->get();
		return View::make('home')->with('snippets', $snippets);
	}

}