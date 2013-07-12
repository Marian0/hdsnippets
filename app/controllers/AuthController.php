<?php 
// use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends BaseController {

	/*
		Login function
	*/
	public function login() {

		//Check if it is already logged
		if (Sentry::check()) {
			return Redirect::route('homepage');
		}

		//Check if the form was submitted
		$input = Input::get();
		if (isset($input['email']) || isset($input['password']) ) {
			$credentials = array(
				'email'    => $input['email'],
				'password' => $input['password']
			);

			try {
				
				$user = Sentry::authenticate($credentials, false);
				
				if ($user) {
					return Redirect::route('snippet.create');
				}
			}
			catch(\Exception $e) {
				return Redirect::route('user.login')->withInput()->withErrors(array('login' => $e->getMessage()));
			}
		} 
		return View::make('auth/login');
	}

	/**
	 * Logout action
	 * @return Redirect
	 */
	public function getLogout() {
		Sentry::logout();

		return Redirect::route('homepage');
	}


	public function register() {

		$input = Input::get(); //get input

		//Check if submitting form
		if (isset($input['email'])) {
			//Create an user object for getting the ardent validation rules from the model
			$user = new User();
			$rules = $user::$rules;
			
			try {
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
			} catch (Sentry\SentryException $e) {
				$errors = new Laravel\Messages();
				$errors->add('sentry', $e->getMessage());
				return Redirect::route('user.register')->withInput()->withErrors($errors);
			}
		}
		return View::make('users.register');
	}


}