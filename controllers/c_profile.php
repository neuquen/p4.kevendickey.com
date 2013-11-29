<?php
class profile_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index($user_name = NULL) {
		# Set up the view
		$this->template->content = View::instance('v_profile_index');
		$this->template->title = "Don't Budge";
		 
		# Pass the data to the view
		$this->template->content->user_name = $user_name;
		 
		# Display the view
		echo $this->template;
	}
	
	public function signup() {
		echo "This is the signup page";
	}
	
	public function login() {
		echo "This is the login page";
	}
	
	public function logout() {
		echo "This is the logout page";
	}
	
	public function profile($user_name = NULL) {
		# Set up the view
		$this->template->content = View::instance('v_profile_index');
		$this->template->title = "Don't Budge";
			
		# Pass the data to the view
		$this->template->content->user_name = $user_name;
			
		# Display the view
		echo $this->template;

	}
	
	
} # end of class