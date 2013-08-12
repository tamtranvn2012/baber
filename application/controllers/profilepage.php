<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilepage extends Main_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('post_model');
		$this->load->model('profile_model');
		$this->load->model('photos_model');
		$this->load->helper(array('form', 'url'));
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
			foreach ($postresults as $perpost){
				$photo_id = intval($perpost->photo_id);
				$photoname = $this->photos_model->get_img_name($photo_id)[0]->photo_img_link;
				$perpost->photo_img_link = $this->get_img_loc($photoname);
			}
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
	
	//get full path for image
	function get_img_loc($imginfo)
	{
		$imageinfo = explode('___',$imginfo);			
		$useridownimg = $imageinfo[0];
		$datefolder = str_replace('_','/',$imageinfo[1]);
		$imgname = $imageinfo[2];
		$fullimgpath = 'uploads/'. $datefolder . '/' . $useridownimg . '/' . $imgname;
		return $fullimgpath;
	}	
	
	//Baber profile manage page
	function profile_manage(){
		$username = $this->uri->segment(1, 0);
		$result = $this->user_model->checkusername($username);
		if($result){
			$this->load->helper('cookie');
			$userid = 0;
			$userid = $this->input->cookie('userid', TRUE);
			if(!$userid){
				redirect('/user/login/', 'refresh');
			}
			$this->load->view('include/header');
			$this->load->view('profilemanage');
			$this->load->view('include/footer');						
		}
	}
	//Baber request approve on Babershop to work
	function request_approve(){
		$username = $this->uri->segment(1, 0);
		$result = $this->user_model->checkusername($username);
		if($result){
			$this->load->helper('cookie');
			$userid = 0;
			$userid = $this->input->cookie('userid', TRUE);
			if(!$userid){
				redirect('/user/login/', 'refresh');
			}
			$resultbussinessprofiles = $this->profile_model->get_all_invidual_info('all');
			$resultownbussinessprofiles = $this->profile_model->get_all_invidual_info($userid);
			$bpownarray = array();
			foreach ($resultownbussinessprofiles as $perbussinessprofile){
				$upid = $perbussinessprofile->upid;
				$bpownarray[$upid] = $perbussinessprofile->babershopname;
			}
			$bparray = array();
			foreach ($resultbussinessprofiles as $perbussinessprofile){
				$upid = $perbussinessprofile->upid;
				$bparray[$upid] = $perbussinessprofile->babershopname;
			}
			$data['bpchoice'] = $bparray;
			$data['bpownchoice'] = $bpownarray;
			$this->load->view('include/header');
			$this->load->view('request_approve_form',$data);
			$this->load->view('include/footer');						
		}
	}
	function save_request_approve(){
		$this->load->helper('cookie');
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		if(!$userid){
			redirect('/user/login/', 'refresh');
		}
		$yourupid = intval($_REQUEST['yourbpprofile']);
		if($this->profile_model->check_userid_upid($userid,$yourupid)){
			//Place code to get bussiness profile id here : get $approvetobpid
			$approvetobpid = intval($_REQUEST['bussinessprofileid']);
			if($this->profile_model->check_existing_approve($yourupid,$approvetobpid)){
				echo 'You already approve to this bussiness page';
			}
			else{
				$this->profile_model->save_request_approve($yourupid,$approvetobpid);
				echo 'Save approved Done';
			}
		}else{
			echo 'Load view bpid not containt with userid here';
		}	
	}
	
	//Listing all approved
	function listing_approved_by_bpid(){
		$this->load->helper('cookie');
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		if(!$userid){
			redirect('/user/login/', 'refresh');
		}
		$data['username'] = $this->uri->segment(1, 0);
		$bpid = intval($this->uri->segment(4, 0));
		//Check bpid containt with userid or not
		//Place $userid=9 for test
		$userid = 9;
		if($this->profile_model->check_userid_bpid($userid,$bpid)){
			$data['listapproved'] = $this->profile_model->get_all_approved($bpid,1);
			$data['listunapproved'] = $this->profile_model->get_all_approved($bpid,0);
			$this->load->view('include/header');
			$this->load->view('approvelisting',$data);
			$this->load->view('include/footer');												
		}else{
			echo 'Load view bpid not containt with userid here';
		}
	}
	
	//Approve profile id 
	function approved_apid(){
		$apid = 0;
		$username = intval($this->uri->segment(1, 0));
		$apid = intval($this->uri->segment(5, 0));
		$bpid = intval($this->uri->segment(4, 0));
		$this->load->helper('cookie');
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);		
		//Place $userid=9 for test
		$userid = 9;
		if($this->profile_model->check_userid_bpid($userid,$bpid)){
			if($this->profile_model->check_apid_bpid($apid,$bpid)){
				$this->profile_model->approved_apid($apid);
				echo 'Load view approved apid here or redirect to user/manage page';
			}
			else{
				echo 'Load view bpid not containt with bpid here';
			}
		}else{
			echo 'Load view bpid not containt with userid here';
		}		
	}

	//UnApprove profile id 
	function unapproved_apid(){
		$apid = 0;
		$username = intval($this->uri->segment(1, 0));
		$apid = intval($this->uri->segment(5, 0));
		$bpid = intval($this->uri->segment(4, 0));
		$this->load->helper('cookie');
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);		
		//Place $userid=9 for test
		$userid = 9;
		if($this->profile_model->check_userid_bpid($userid,$bpid)){
			if($this->profile_model->check_apid_bpid($apid,$bpid)){
				$this->profile_model->unapproved_apid($apid);
				echo 'Load view unapproved apid here or redirect to user/manage page';
			}
			else{
				echo 'Load view bpid not containt with bpid here';
			}
		}else{
			echo 'Load view bpid not containt with userid here';
		}		
	}
	
	//Add new post action
	function add_new_post(){
		$this->load->helper('cookie');
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		if(!$userid){
			redirect('/user/login/', 'refresh');
		}
		$upid = intval($this->uri->segment(4, 0));
		$bpid = intval($this->uri->segment(5, 0));
		if($this->profile_model->check_upid_bpid($upid,$bpid,$userid)){
			$data['upid'] = $upid;
			$data['bpid'] = $bpid;
			$this->load->view('include/headerbt');
			$this->load->view('addnewpost',$data);
			$this->load->view('include/footerbt');																
		}else{
			$this->load->view('include/headerbt');
			echo 'Display not authorizer btw upid and bpid here';
			$this->load->view('include/footerbt');																			
		}
	}
	
}