<?php

class Tag extends \Eloquent {
	protected $table = 'tags';

	public $timestamps = false;

	public function snippets() {
		return $this->belongsToMany('Snippet');
	}
}