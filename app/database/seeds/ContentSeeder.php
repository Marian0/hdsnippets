<?php

class ContentSeeder extends Seeder {

	public function run()
	{
		DB::table('tags')->delete();
		DB::table('snippet_tag')->delete();
		DB::table('snippets')->delete();


		Tag::create(array(
			'title'   => 'Laravel',
		));

		Tag::create(array(
			'title'   => 'Symfony2',
		));

		Tag::create(array(
			'title'   => 'Linux',
		));

		Tag::create(array(
			'title'   => 'PHP',
		));

		Tag::create(array(
			'title'   => 'C++',
		));

		Tag::create(array(
			'title'   => 'Wordpress',
		));


		Snippet::create(array(
			'title'   => 'Scapping chars in php',
			'description'    => 'Esto es un ejemplo de como formatear el linuxito.',
			'snippet'    => '<?php 
 				 print("<font color=\"red\">Red text</font>"); 
				?> ',
			'language_id' => rand(1,10),
			'user_id' => rand(1,2),
		));
		
		Snippet::create(array(
			'title'   => 'Como instalar laravel',
			'description'    => 'Esto es un ejemplo de como formatear el linuxito.',
			'snippet'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'language_id' => rand(1,10),
			'user_id' => rand(1,2),
		));

		Snippet::create(array(
			'title'   => 'Como hacer andar los drivers de Nvidia',
			'description'    => 'Esto es un ejemplo de como formatear el linuxito.',
			'snippet'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'language_id' => rand(1,10),
			'user_id' => rand(1,2),
		));


		Snippet::create(array(
			'title'   => 'Esto es una pruebita',
			'description'    => 'Esto es un ejemplo de como formatear el linuxito.',
			'snippet'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'language_id' => rand(1,10),
			'user_id' => rand(1,2),
		));
	}

}