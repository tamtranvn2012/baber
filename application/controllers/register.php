<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function add_user() {
		var_dump($_REQUEST);exit;
	}
    public function index() {
		$this->load->library('session');
		$data = array();
		//$session_id = $this->session->userdata('SessionID');
		$this->load->helper('cookie');	
		if (!($this->input->cookie('user_tmp_cookie', TRUE))){
			$this->load->model('testa_model');
			$useridobj = $this->testa_model->insert_tmp_user();
			$data['user_id_tmp'] = $useridobj[0]->user_id_tmp;
			$cookie = array(
			'name'   => 'user_tmp_cookie',
			'value'  => $useridobj[0]->user_id_tmp,
			'expire' => '86400'
			);
			$this->input->set_cookie($cookie);
		}
		if (!$data){
			$data['user_id_tmp'] = $this->input->cookie('user_tmp_cookie', TRUE);
		}
		$this->load->view('register',$data);
   }
}

?>
