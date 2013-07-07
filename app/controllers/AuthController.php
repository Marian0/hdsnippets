<?php 
// use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends BaseController {

	/**
	 * Display the login page
	 * @return View
	 */
	public function getLogin() {
		return View::make('auth/login');
	}

	/**
	 * Login action
	 * @return Redirect
	 */
	public function postLogin()
	{
		$credentials = array(
			'email'    => Input::get('email'),
			'password' => Input::get('password')
		);

		try
		{
			$user = Sentry::authenticate($credentials, false);

			if ($user)
			{
				return Redirect::route('snippets.create');
			}
		}
		catch(\Exception $e)
		{
			return Redirect::route('user.login')->withInput()->withErrors(array('login' => $e->getMessage()));
		}
	}

	/**
	 * Logout action
	 * @return Redirect
	 */
	public function getLogout() {
		Sentry::logout();

		return Redirect::route('user.login');
	}


	public function register() {
		return View::make('users.register');
	}

	public function store() {

		$user = Sentry::getUserProvider()->create(array(
	        'email'    => Input::get('email'),
	        'password' => Input::get('password'),
	        'first_name' => Input::get('first_name'),
	        'last_name' => Input::get('last_name'),

    	));
	}

}