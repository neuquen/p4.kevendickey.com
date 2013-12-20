<?php
class profile_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index($user_name = NULL) {
		
		# If the user isn't authenticated, redirect them to index
		if(!$this->user) {
			Router::redirect('/');
			//die('Please enter a name and password. <a href="/">Login</a>');
		}

		# Set up the view
		$this->template->content = View::instance('v_profile_index');
		$this->template->title = "Don't Budge";
		
		$client_files_body = Array(
				"/js/jquery.form.js"
		);
		
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		 
		# Grab total from DB
		$q = "SELECT * FROM budgets WHERE user_id=".$this->user->user_id;
		$total = DB::instance(DB_NAME)->select_row($q);
		
		# Pass the data to the view
		$this->template->content->user_name = $user_name;
		$this->template->content->total = $total;
		 
		# Display the view
		echo $this->template;
	}
	
	
	//Process the login information
	public function login(){
			
		# Sanitize the user entered data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		# Encrypts password (Salt = random string to make it more complicated)
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		 
			
		# Get token from DB
		$query =
		"SELECT token
				FROM users
				WHERE email = '".$_POST['email']."'
				AND password = '".$_POST['password']."'";

		$token = DB::instance(DB_NAME)->select_field($query);
		 
		# Success
		if ($token){
			# Sets session cookie to allow for re-entry
			# setcookie() = 1. name of cookie, 2. value of cookie, 3. expiration date, 4. Where available (everywhere)
			setcookie('token', $token, strtotime('+1 year'), '/');

			Router::redirect('/profile');
		}
		# Fail
		else {
			Router::redirect('/index/login/loginerror');
		}
	}
	
	public function logout() {
		#Generate a new token
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

		#Set up Data
		$data = Array("token" => $new_token);

		#Update the users table
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

		#Delete the other cookie
		setcookie('token', '', strtotime('-1 year'), '/');

		#Route them to index
		Router::redirect('/');
	}

	
	public function update(){
		
		$_POST['user_id']  = $this->user->user_id;
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		$q = "SELECT * FROM budgets WHERE user_id=".$this->user->user_id;
		$total = DB::instance(DB_NAME)->select_row($q);
		
		# Add updated income to current income
		if (isset($_POST['income'])){
			$_POST['income'] = $_POST['income'] + $total['income'];
		}
		
		# Add updated expenses to current expenses
		if (isset($_POST['expenses'])){
			$_POST['expenses'] = $_POST['expenses'] + $total['expenses'];
			$_POST['housing'] = $_POST['housing'] + $total['housing'];
			$_POST['utilities'] = $_POST['utilities'] + $total['utilities'];
			$_POST['food'] = $_POST['food'] + $total['food'];
			$_POST['automobile'] = $_POST['automobile'] + $total['automobile'];
			$_POST['debt'] = $_POST['debt'] + $total['debt'];
			$_POST['medical'] = $_POST['medical'] + $total['medical'];
			$_POST['insurance'] = $_POST['insurance'] + $total['insurance'];
			$_POST['personal'] = $_POST['personal'] + $total['personal'];
			$_POST['entertainment'] = $_POST['entertainment'] + $total['entertainment'];
			$_POST['other'] = $_POST['other'] + $total['other'];
		}
		/*
		foreach ($_POST as $key => $value){
			if ($key >= 3) continue;
				$_POST[$value] = $_POST[$value] + $total[$value];
		}*/

		// Prevent XSS by converting special characters
		function clean($string){
			return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
		}
	
		# Allows you to clean an Array
		$clean = array_map('clean', $_POST);		
		
		# Insert totals into database
		DB::instance(DB_NAME)->update_or_insert_row('budgets', $clean);
		
		$this->getBudgetData();
	}
	
	public function clearIncome(){
		$clear = Array("income" => "0");
		DB::instance(DB_NAME)->update("budgets", $clear, "WHERE user_id =".$this->user->user_id);

		$this->getBudgetData();
	}
	
	public function clearExpenses(){
		$clear = Array("expenses" => "0", 
									 "housing" => "0", 
									 "utilities" => "0", 
									 "food" => "0",
									 "automobile" => "0", 
									 "debt" => "0", 
									 "medical" => "0",
									 "insurance" => "0",
									 "personal" => "0",
									 "entertainment" => "0",
									 "other" => "0");
		DB::instance(DB_NAME)->update("budgets", $clear, "WHERE user_id =".$this->user->user_id);
		
		$this->getBudgetData();
	}
	
	public function getBudgetData(){
		# Grab total from DB
		//$total = Array();
		$q = "SELECT * FROM budgets WHERE user_id=".$this->user->user_id;
		$total = DB::instance(DB_NAME)->select_row($q);
		
		# Send back json results to the JS, formatted in json
		echo json_encode($total);
	}
	
} # end of class