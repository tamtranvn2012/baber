<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Main_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('user_model');
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);		
		if(!$this->user_model->check_admin_site($userid)){
			redirect('/user/login/', 'refresh');
		}
	}
	
	function index(){
		echo 'aabbccdd';
	}
	
}