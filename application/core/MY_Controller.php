<?php

class Admin_Controller extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
               		
		$this->load->library('Auth');
		$this->auth->is_logged_in(uri_string());
		
		//load the base language file
		
		

	}
}