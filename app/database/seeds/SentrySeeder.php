<?php

use App\Models\User;

class SentrySeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		DB::table('groups')->delete();
		DB::table('users_groups')->delete();

		Sentry::getUserProvider()->create(array(
			'email'       => 'germanazo@gmail.com',
			'password'    => "admin",
			'first_name'  => 'German',
			'last_name'   => 'Bortoli',
			'activated'   => 1,
		));

		Sentry::getUserProvider()->create(array(
			'email'       => 'marianosantafe@gmail.com',
			'password'    => "admin",
			'first_name'  => 'Mariano',
			'last_name'   => 'Peyregne',
			'activated'   => 1,
		));

		Sentry::getUserProvider()->create(array(
			'email'       => 'user@user.com',
			'password'    => "user",
			'first_name'  => 'User',
			'last_name'   => 'HDSnippets',
			'activated'   => 1,
		));

		Sentry::getGroupProvider()->create(array(
			'name'        => 'Admin',
			'permissions' => array('admin' => 1),
		));

		// Assign user permissions
		$adminUser  = Sentry::getUserProvider()->findByLogin('marianosantafe@gmail.com');
		$adminUser2  = Sentry::getUserProvider()->findByLogin('germanazo@gmail.com');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admin');
		$adminUser->addGroup($adminGroup);
		$adminUser2->addGroup($adminGroup);
	}

}