<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	}

	//Processes the signup information
	public function signup() {

		# Gets current unix timestamp(uses static Time method from framework)
		$_POST['created'] = Time::now();

		# Encrypts password (Salt = random string to make it more complicated)
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Give each user a token which will allow re-entry into website (ie- ticket at an event)
		# Combination of 1. Token Salt, 2. Users Email, 3. Random string
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

		# Check for duplicate email
		$uniqueEmail = $this->userObj->confirm_unique_email($_POST['email']);

		if($uniqueEmail) {

			# Prevent XSS by converting special characters
			function clean($string){
				return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
			}

			# Allows you to clean an Array
			$clean = array_map('clean', $_POST);

			# Insert the new user
			$new_user = DB::instance(DB_NAME)->insert_row('users', $clean);

			# Go ahead and log them in
			if($new_user) {
				setcookie('token',$_POST['token'], strtotime('+1 year'), '/');

				# Send them to their profile
				Router::redirect('/profile');

			} else {
				Router::redirect('/index/email/emailError'); /********************** CHANGE THIS ***************************/
			}

		}

	}
	 
}