<?php 


class UserController extends BaseController {

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
	public function logout() {
		Sentry::logout();

		return Redirect::route('homepage');
	}


	public function register() {

		//Check if it is already logged
		if (Sentry::check()) {
			return Redirect::route('homepage');
		}

		$input = Input::get(); //get input

		//Check if submitting form
		if (Request::getMethod() == 'POST' && isset($input['email'])) {
			//Create an user object for getting the ardent validation rules from the model
			$user = new User();
			$rules = $user::$rules;

			$rules['captcha'] = array('required', 'captcha');
			
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
		return View::make('user.register');
	}


	public function edit_profile() {
		// dd(Sentry::check());

		//Check if it is already logged
		if (!Sentry::check()) {
			return Redirect::route('user.login');
		}

		//Current user
		$current_user = Sentry::getUser();

		$input = Input::get(); //get input
		if (isset( $input['current_password'] ) ) {
			//1) Check credentials
			$credentials = array(
				'email'    => $current_user->email,
				'password' => $input['current_password']
			);
			try {
				$user = Sentry::authenticate($credentials, false);
				if (!$user) {
					return Redirect::route('user.edit_profile')->withInput()->withErrors( array( 'login' => 'Bad credentials' ) );
				}
			} catch(\Exception $e) {
				return Redirect::route('user.edit_profile')->withInput()->withErrors(array('login' => $e->getMessage()));
			}

			//2) Validate input
		 	$rules = array(
		        'first_name'      => 'required|min:3|max:80|alpha_dash',
		        'last_name'      => 'required|min:3|max:80|alpha_dash',
		        // 'email'     => 'required|between:3,64|email|unique:users',
		        'password'  =>'alpha_num|between:4,8|confirmed',
		        'password_confirmation'=>'alpha_num|between:4,8'
		    );

			try {
				$validation = Validator::make($input, $rules);
				
				if($validation->fails()) {
					return Redirect::route('user.edit_profile')->withInput()->withErrors($validation);
				} else {
					unset($input['password_confirmation']);			

					$user->first_name = $input['first_name'];
					$user->last_name = $input['last_name'];
					if (!empty($input['password']))
						$user->password = $input['password'];

					$user->save();

					Notification::success('Your profile has been updated.');
					return Redirect::route('user.edit_profile');

				}
			} catch (Sentry\SentryException $e) {
				$errors = new Laravel\Messages();
				$errors->add('sentry', $e->getMessage());
				return Redirect::route('user.edit_profile')->withInput()->withErrors($errors);
			}

			
		}
		return View::make('user.edit_profile')->with('user' , $current_user );
	}

	public function profile($user_id) {
		$user = User::find($user_id);

		if (!$user) {
			App:abort(404, 'User not found');
		}

		$snippets = Snippet::where('user_id' , '=', $user_id )->where('private' , '=' , 0)->take(10)->get();

		return View::make('user.profile')->with('user' , $user )->with('snippets' , $snippets);


	}


}