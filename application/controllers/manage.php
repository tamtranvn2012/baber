<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function request_approve(){
	
	}
}