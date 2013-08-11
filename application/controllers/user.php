<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends Main_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function add_new(){
		$this->load->model('user_model');
		$this->user_model->add_new_user();	
	}

	public function checklogin(){
		$this->load->model('user_model');
		$this->load->helper('cookie');
		$this->load->helper('url');
		$userinfo = $this->user_model->checklogin('rvengine','h5f9p5h4');
		if($userinfo){
			$cookie = array(
				'name'   => 'userid',
				'value'  => $userinfo,
				'expire' => '86400'
			);
			$this->input->set_cookie($cookie);
			redirect('/rvengine/manage/listapprove/2', 'refresh');
		}else{
			$cookie = array(
				'name'   => 'userid',
				'value'  => 0,
				'expire' => '86400'
			);
			$this->input->set_cookie($cookie);
			redirect('/user/login/', 'refresh');
		}
	}	
	
	public function manage(){
		$this->islogin();
		$this->load->view('include/headerbt');
		$this->load->view('manage');
		$this->load->view('include/footerbt');
	}
	
	public function islogin(){
		$this->load->helper('cookie');
		$this->load->helper('url');
		if(!$this->input->cookie('userid', TRUE)){
			redirect('/user/login/', 'refresh');
		}
	}
	public function login(){
		$this->load->view('include/headerbt');
		$this->load->view('login');
		$this->load->view('include/footerbt');		
	}	
}