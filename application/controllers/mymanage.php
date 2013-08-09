<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mymanage extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function add_new(){
		$this->load->view('add_new');
	}	
}