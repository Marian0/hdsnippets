<?php

class Language extends \Eloquent {
	protected $table = 'languages';
	public $timestamps = false;

	
	public static function getLanguagesForPulldown() {
		$languages = Language::all( array('id', 'name') );

		$pulldown = array();
		foreach ($languages as $lang) {
			$pulldown[$lang->id] = $lang->name;
		}
		// dd($pulldown);

		return $pulldown;
	}
	
}