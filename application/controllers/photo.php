<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Photo extends Main_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('cookie');
		if(!$this->input->cookie('userid', TRUE)){
			redirect('/user/login/', 'refresh');
		}
		$this->load->helper(array('form', 'url'));
	}
	
	function addnew(){
		$this->load->view('include/headerbt');
		$this->load->view('addphoto');
		$this->load->view('include/footerbt');		
	}
	
	function savephoto(){
		
	}
}