<?php 
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Cartalyst\Sentry\Users\Eloquent\User implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail() {
		return $this->email;
	}

	public function snippets() {
		return $this->hasMany('Snippet');
	}

    public static $rules = array(
        'first_name'      => 'required|min:3|max:80|alpha_dash',
        'last_name'      => 'required|min:3|max:80|alpha_dash',
        'email'     => 'required|between:3,64|email|unique:users',
        'password'  =>'required|alpha_num|between:4,8|confirmed',
        'password_confirmation'=>'required|alpha_num|between:4,8'
    );
	public $autoPurgeRedundantAttributes = true;


}