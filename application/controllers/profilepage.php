<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilepage extends Main_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('post_model');
	}
	
	function index(){
		$username = $this->uri->segment(1, 0);
		$result = $this->user_model->checkusername($username);
		if($result){
			$userid = intval($result[0]->userid);
			$bpid = 0;
			$bpid = intval($this->user_model->getbpid($userid)[0]->bpid);
			if ($bpid){
				$apid = 0;
				$resutlapids = $this->user_model->getapid($bpid);
			}
			if(count($resutlapids)>0){
				$apidarr = array();
				foreach($resutlapids as $perapid){
					$apidarr[] = $perapid->apid;
				}
			}
			$postresults = array();
			$postresults = $this->post_model->get_posts_byapid($apidarr);
			$data['postresults'] = $postresults;
			$this->load->view('include/header');
			$this->load->view('profilepage',$data);
			$this->load->view('include/footer');						
		}else{
			$this->load->view('include/header');
			$this->load->view('notfoundusername');
			$this->load->view('include/footer');			
		}
	}	
}