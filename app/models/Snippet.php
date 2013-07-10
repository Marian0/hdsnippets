<?php
use LaravelBook\Ardent\Ardent;

class Snippet extends Ardent {
	protected $table = 'snippets';

	public function tags() {
		return $this->belongsToMany('Tag');
	}

	public function author() {
		return $this->belongsTo('User', 'user_id');
	}

	public function author_name() {
		if (isset($this->author->first_name ))
			return $this->author->first_name . ' ' . $this->author->last_name;
		return 'Anonymus';
	}

	public static $rules = array(
	    'title' => 'required|between:4,200',
	    'snippet' => 'required',
  	);
}