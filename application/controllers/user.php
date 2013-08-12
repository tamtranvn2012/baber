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

    public function checklogin(){
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $this->load->model('user_model');
        $this->user_model->checklogin($username,$password);
    }

    public function register(){
        $this->load->view('include/headerbt');
        $this->load->view('register_user');
        $this->load->view('include/footerbt');
    }

    public function check(){
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $this->load->model('user_model');
        $this->user_model->add_new_user($username,$password);
    }
    public function successful(){
        
    }
    public function loginfailed(){
        echo "login is failed";
    }
    public function loginsuccess(){
        echo "login is success";
    }
}