<?php

class LanguageController extends BaseController {

	public function show_browse() {
		$languages = Language::orderBy('name')->get();
		return View::make('language/list')->with('languages' , $languages);
	}

}