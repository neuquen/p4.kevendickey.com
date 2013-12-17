<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			$this->template->title = "Don't Budge";
			$this->template->bodyID = "index";
	      					     		
		# Render the view
			echo $this->template;

	} # End of method
	
	// Display an error message if an incorrect email or password is entered
	public function login($loginerror = NULL){
		$this->template->content = View::instance('v_index_index');
		$this->template->title = "Login Error";
		$this->template->content->loginerror = $loginerror;
		echo $this->template;
	}
	
	// Display an error message if the email already exists
	public function signup($signuperror = NULL){
		$this->template->content = View::instance('v_index_index');
		$this->template->title = "Signup Error";
		$this->template->content->signuperror = $signuperror;
		echo $this->template;
	}
	
	
} # End of class
