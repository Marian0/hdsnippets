<?php 
// use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends BaseController {

	/**
	 * Display the login page
	 * @return View
	 */
	public function getLogin() {
		if (Sentry::check()) {
			return Redirect::route('homepage');
		}
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

		//Hacemos esto para obtener las rules de validacion
		$user = new User();

		$rules = $user::$rules;
		$input = Input::get(); //receive input
		
		try {
			//validate the inputs
			$validation = Validator::make($input, $rules);
			

			if($validation->fails()) {
				return Redirect::route('user.register')->withInput()->withErrors($validation);
			} else {
				unset($input['password_confirmation']);			
				$input['activated'] = 1;
		  		$user = Sentry::getUserProvider()->create($input);
		  		Sentry::login($user, false);
		  		if($user) {
					Notification::success('Thanks for registering in HDShippets :)');
					return Redirect::route('homepage');
		  		}
			}
		}
		catch (Sentry\SentryException $e)
		{
			//create a real Laravel\Messages object from a sentry error.
			$errors = new Laravel\Messages();
			$errors->add('sentry', $e->getMessage());
			return Redirect::route('user.register')->withInput()->withErrors($errors);
		}
	}

}