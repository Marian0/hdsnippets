<?php
use LaravelBook\Ardent\Ardent;

class Snippet extends Ardent {
	protected $table = 'snippets';

	public function tags() {
		return $this->belongsToMany('Tag');
	}

	public function author() {
		return $this->belongsTo('User');
	}


	public static $rules = array(
	    'title' => 'required|between:4,200',
	    'snippet' => 'required',
  	);
}