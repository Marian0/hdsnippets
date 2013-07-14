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

    public function language() {
		return $this->belongsTo('Language', 'language_id');
    }

	public function author_name() {
		if (isset($this->author->first_name))
			return $this->author->first_name . ' ' . $this->author->last_name;
		return 'Anonymus';
	}

    public function language_name() {
        if (isset($this->language->name))
            return $this->language->name;
        return 'Plain Text';
    }

     public function language_short_name() {
        if (isset($this->language->short_name))
            return $this->language->short_name;
        return 'plain';
    }

    //Ardent validation rules
	public static $rules = array(
		'title' => 'required|between:4,200',
		'snippet' => 'required',
	);

	/**
     * Recalculate slug after save
     */
     public function beforeSave($forced = true) {
        //Set a slug
        $this->slug = Str::slug($this->title);


        //Check if more than 1 has the same slug
    	$count_snippet = Snippet::where('slug' , '=', $this->slug )->count();
    	if ($count_snippet > 1 ) {
        	//Slug colission => recalculate slug
        	$this->slug = $this->id . '-' . $this->slug;
        }

        //Calculate private hash

        $this->private_hash = md5( microtime() . $this->id . $this->author->password );

        return true;
    }

    public $timestamps = true;

    public function addVisit() {
    	//Cancel updating timestamps
    	$this->timestamps = false;
    	$this->visits++;
    	$this->save();    	
    }
}