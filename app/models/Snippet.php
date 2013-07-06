<?php

namespace App\Models;
use Eloquent;

class Snippet extends Eloquent {
	protected $table = 'snippets';

	public function tags() {
		return $this->belongsToMany('App\Models\Tag');
	}

	public function author() {
		return $this->belongsTo('App\Models\User');
	}
}