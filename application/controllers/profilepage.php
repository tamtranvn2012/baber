<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilepage extends Main_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function index(){
		$this->load->model('user_model');
		$username = $this->uri->segment(1, 0);
		$result = $this->user_model->checkusername($username);
		if($result){
			
		}else{
			$this->load->view('include/header');
			$this->load->view('notfoundusername');
			$this->load->view('include/footer');			
		}
	}
	
}