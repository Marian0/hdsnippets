<?php

use LaravelBook\Ardent\Ardent;

class Snippet extends Ardent {

	protected $table = 'snippets';

	public static function getLanguages() {
		$languages = array();
		$languages['plain'] = 'Plain Text';
		$languages['c'] = 'C';
		$languages['cpp'] = 'C++';
		$languages['csharp'] = 'C#';
		$languages['css'] = 'CSS';
		$languages['flex'] = 'Flex';
		$languages['html'] = 'HTML';
		$languages['java'] = 'Java';
		$languages['javascript'] = 'JavaScript';
		$languages['javascript_dom'] = 'JavaScript with DOM';
		$languages['perl'] = 'Perl';
		$languages['php'] = 'PHP';
		$languages['python'] = 'Python';
		$languages['ruby'] = 'Ruby';
		$languages['sql'] = 'SQL';
		$languages['xml'] = 'XML';
		
		return $languages;
	}
	
	public static function getLanguagesForPulldown() {
		$languages = self::getLanguages();
		return array_values($languages);
	}
	
	public function getLanguageShortCode() {
		$languages = self::getLanguages();
		
		$languages_keys = array_keys($languages);
		
		$language_code = $this->code_language;
		if (isset($languages_keys[$language_code])) {
			return $languages_keys[$language_code];
		}
		
		return 'Plain Text';
		
	}
	
	public function getFriendlyLanguage() {
		$languages_values = self::getLanguagesForPulldown();
		
		$language_code = $this->code_language;
		if (isset($languages_values[$language_code])) {
			return $languages_values[$language_code];
		}
		
		return 'plain';
	}

	public function tags() {
		return $this->belongsToMany('Tag');
	}

	public function author() {
		return $this->belongsTo('User', 'user_id');
	}

	public function author_name() {
		if (isset($this->author->first_name))
			return $this->author->first_name . ' ' . $this->author->last_name;
		return 'Anonymus';
	}

	public static $rules = array(
		'title' => 'required|between:4,200',
		'snippet' => 'required',
	);

}