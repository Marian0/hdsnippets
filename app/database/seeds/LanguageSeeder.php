<?php

class LanguageSeeder extends Seeder {

	public function run()
	{
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
		$languages['sh'] = 'Shell';
		$languages['sml'] = 'Standard ML';
		$languages['xml'] = 'XML';
	
		DB::table('languages')->delete();

		foreach ($languages as $key => $value) {
			Language::create(
				array(
					'short_name' => $key,
					'name' => $value
				)
			);

		}
	}

}