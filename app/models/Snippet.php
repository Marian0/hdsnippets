<?php

namespace App\Models;

use LaravelBook\Ardent\Ardent;
use Eloquent;

class Snippet extends Ardent {
	protected $table = 'snippets';

	public function tags() {
		return $this->belongsToMany('App\Models\Tag');
	}

	public function author() {
		return $this->belongsTo('App\Models\User');
	}


	public static $rules = array(
	    'title' => 'required|between:4,200',
	    'snippet' => 'required',
  	);
}