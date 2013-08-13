<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends Main_Controller {
	
	function index(){
		$this->load->database();
		$this->load->model('user_model');
		$this->load->helper('cookie');
		$userid = $this->input->cookie('userid', TRUE);
		$result = $this->user_model->get_username_by_userid($userid);
		$username = $result[0]->username;
		redirect('/'.$username.'/manage/', 'refresh');
	}
}