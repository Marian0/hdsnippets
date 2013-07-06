<?php

namespace App\Models;

class Tag extends \Eloquent {
	protected $table = 'tags';

	public $timestamps = false;

	public function snippets() {
		return $this->belongsToMany('App\Models\Snippet');
	}
}