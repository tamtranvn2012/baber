<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilepage extends Main_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->load->database();
		$this->load->model('user_model');
		$username = $this->uri->segment(1, 0);
		$result = $this->user_model->checkusername($username);
		$this->load->helper('cookie');
		if($result){
			$userid = 0;
			$userid = $this->input->cookie('userid', TRUE);
			if(!$userid){
				redirect('/user/login/', 'refresh');
			}
		}else{
			redirect('/user/login/', 'refresh');
		}
		$this->load->model('post_model');
		$this->load->model('profile_model');
		$this->load->model('photos_model');
		$this->load->helper(array('form', 'url'));
	}
	
	function index(){

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
		$data['username'] = $username;
		$datamenu['username'] = $username;
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		//data for manage links approve
		$bpidofuser = $this->profile_model->get_bpid_by_userid($userid);
		$data['bpidsmanage'] = $bpidofuser;
		//end data		
		
		//data for make new post to approve bussiness profile id
		$upidarrobj = $this->profile_model->get_upid_userid($userid);
		$apidsobjs = array();
		foreach($upidarrobj as $perupidobj){
			$perupid = $perupidobj->upid;
			$apidarrobj = $this->profile_model->get_apid_by_upid_allinfo($perupid);
			foreach($apidarrobj as $perapidobj){
				$apidsobjs[] = $perapidobj;
			}
		}
		$data['apidsobjs'] = $apidsobjs;
		//data
		$this->load->view('include/header');
		$this->load->view('include/menu',$datamenu);
		$this->load->view('profilemanage',$data);
		$this->load->view('include/footer');						
	}
	
	//Baber request approve on Babershop to work
	function request_approve(){
		$username = $this->uri->segment(1, 0);
		$data['username'] = $username;
		$datamenu['username'] = $username;
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		if(!$this->user_model->check_username_userid($username,$userid)){
			redirect('/user/login/', 'refresh');
		}
		$result = $this->user_model->checkusername($username);
		if($result){
			//data for search bpid by username
			$useridarr = $this->user_model->get_all_userid();
			$userinfoarr = array();
			foreach($useridarr as $peruserid){
				$peruserinfo = array();
				$useridofarr = $peruserid->userid;
				$bpidarr = $this->profile_model->get_bpid_by_userid($useridofarr);
				foreach($bpidarr as $perbp){
					$perbpid = $perbp->bpid;
					$usernamebpid = $this->user_model->get_username_by_userid($useridofarr)[0]->username;
					$peruserinfo['username'] = $usernamebpid;
					$peruserinfo['bpid'] = $perbpid;
					$userinfoarr[] = $peruserinfo;
				}
			}
			$data['userbpids'] = $userinfoarr;
			//data
			
			$userid = 0;
			$userid = $this->input->cookie('userid', TRUE);
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
			$data['username'] = $username;
			$this->load->view('include/header');
			$this->load->view('include/menu',$datamenu);
			$this->load->view('request_approve_form',$data);
			$this->load->view('include/footer');						
		}
	}
	
	function save_request_approve(){
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		$username = $this->user_model->get_username_by_userid($userid)[0]->username;
		$yourupid = intval($_REQUEST['yourbpprofile']);
		if($this->profile_model->check_userid_upid($userid,$yourupid)){
			//Place code to get bussiness profile id here : get $approvetobpid
			$approvetobpid = intval($_REQUEST['bussinessprofileid']);
			if($this->profile_model->check_existing_approve($yourupid,$approvetobpid)){
				redirect('/'.$username.'/manage/approvelisting/', 'refresh');
			}
			else{
				$this->profile_model->save_request_approve($yourupid,$approvetobpid);
				redirect('/'.$username.'/manage/approvelisting/', 'refresh');
			}
		}else{
			echo 'Load view bpid not containt with userid here';
		}	
	}
	
	//Listing all approved
	function listing_approved_by_bpid(){
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		$data['username'] = $this->uri->segment(1, 0);
		$bpid = intval($this->uri->segment(4, 0));
		//Check bpid containt with userid or not
		if($this->profile_model->check_userid_bpid($userid,$bpid)){
			$data['listapproved'] = $this->profile_model->get_all_approved($bpid,1);
			$data['listunapproved'] = $this->profile_model->get_all_approved($bpid,0);
			$username = $this->user_model->get_username_by_userid($userid)[0]->username;
			$datamenu['username'] = $username;
			$this->load->view('include/header');
			$this->load->view('include/menu',$datamenu);
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
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);		
		if($this->profile_model->check_userid_bpid($userid,$bpid)){
			if($this->profile_model->check_apid_bpid($apid,$bpid)){
				$this->profile_model->approved_apid($apid);
				$username = $this->user_model->get_username_by_userid($userid)[0]->username;
				redirect('/'.$username.'/manage/listapprove/'.$bpid.'/', 'refresh');
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
		if($this->profile_model->check_userid_bpid($userid,$bpid)){
			if($this->profile_model->check_apid_bpid($apid,$bpid)){
				$this->profile_model->unapproved_apid($apid);
				$username = $this->user_model->get_username_by_userid($userid)[0]->username;
				redirect('/'.$username.'/manage/listapprove/'.$bpid.'/', 'refresh');
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
		$username = $this->uri->segment(1, 0);
		$data['username'] = $username;
		$datamenu['username'] = $username;
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		if(!$this->user_model->check_username_userid($username,$userid)){
			redirect('/user/login/', 'refresh');
		}
		$upid = intval($this->uri->segment(4, 0));
		$bpid = intval($this->uri->segment(5, 0));
		if($this->profile_model->check_upid_bpid($upid,$bpid,$userid)){
			$data['upid'] = $upid;
			$data['bpid'] = $bpid;
			$this->load->view('include/headerbt');
			$this->load->view('include/menu',$datamenu);
			$this->load->view('addnewpost',$data);
			$this->load->view('include/footerbt');																
		}else{
			$this->load->view('include/headerbt');
			echo 'Display not authorizer btw upid and bpid here';
			$this->load->view('include/footerbt');																			
		}
	}
	
	//Manage post had approve
	function manage_bp_posts(){
		$data = array();
		$username = $this->uri->segment(1, 0);
		$data['username'] = $username;
		$datamenu['username'] = $username;
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		if(!$this->user_model->check_username_userid($username,$userid)){
			redirect('/user/login/', 'refresh');
		}
		$upid = intval($this->uri->segment(4, 0));
		$bpid = intval($this->uri->segment(5, 0));
		if($this->profile_model->check_upid_bpid($upid,$bpid,$userid)){
			$resultapid = $this->profile_model->get_apid_by_upid_bpid($upid,$bpid);
			$apid = intval($resultapid[0]->apid);
			if($apid){
				$allinforesutlapid = $this->profile_model->get_all_info_by_apid($apid);
				$data['allinfoposts'] = $allinforesutlapid;
			}else{
				$data['allinfoposts'] = '';
			}
			$this->load->view('include/header');
			$this->load->view('include/menu',$datamenu);
			$this->load->view('listbppostapproved',$data);
			$this->load->view('include/footer');																					
		}else{
			echo 'Load error view not contain with bpid here';
		}		
	}	

	//Add new post action
	function manage_post_bpid(){
		$data = array();
		$username = $this->uri->segment(1, 0);
		$data['username'] = $username;
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);
		if(!$this->user_model->check_username_userid($username,$userid)){
			redirect('/user/login/', 'refresh');
		}
		$upid = intval($this->uri->segment(4, 0));
		$bpid = intval($this->uri->segment(5, 0));
		$userid = $this->input->cookie('userid', TRUE);
		if($this->profile_model->check_upid_bpid($upid,$bpid,$userid)){
			$this->load->view('include/header');
			$this->load->view('listbppostapproved',$data);
			$this->load->view('include/footer');																					
		}else{
			echo 'Load error view not contain with bpid here';
		}
	}	
	
	//Mange approve listing
	function manage_approve_listing_client(){
		$data = array();
		$username = $this->uri->segment(1, 0);
		$datamenu['username'] = $username;
		$userid = $this->input->cookie('userid', TRUE);
		$upid = intval($this->profile_model->get_upid_userid($userid)[0]->upid);
		$allinfo = $this->profile_model->get_all_by_upid_allinfo($upid);
		foreach($allinfo as $perinfo){
			$datainfoarr = array();
			$datainfoarr['bpid'] = $perinfo->bpid;
			$datainfoarr['isapproved'] = $perinfo->isapproved;
			$datainfoarr['babershopname'] = $this->profile_model->get_babershop_name_by_bpid($perinfo->bpid)[0]->babershopname;
			$data['allinfo'][] = $datainfoarr;
		}
		$this->load->view('include/header');
		$this->load->view('include/menu',$datamenu);
		$this->load->view('approvelistingall',$data);
		$this->load->view('include/footer');																					
	}
	
	//Control approve listing
	function control_approve_listing_bussiness(){
		$data = array();
		$username = $this->uri->segment(1, 0);
		$datamenu['username'] = $username;
		$userid = $this->input->cookie('userid', TRUE);
		//data for manage links approve
		$bpidofuser = $this->profile_model->get_bpid_by_userid($userid);
		foreach($bpidofuser as $perbp){
			$bpinfo =array();
			$bpinfo['bpid'] = $perbp->bpid;
			$bpinfo['babershopname'] = $this->profile_model->get_babershop_name_by_bpid($perbp->bpid)[0]->babershopname;
			$data['bpidsmanage'][] = $bpinfo;
		}
		//end data		
		
		$this->load->view('include/header');
		$this->load->view('include/menu',$datamenu);
		$this->load->view('controlapprove',$data);
		$this->load->view('include/footer');																					
	}
	
	//Control Post listing
	function control_post_listing_client(){
		$data = array();
		$username = $this->uri->segment(1, 0);
		$datamenu['username'] = $username;
		$userid = $this->input->cookie('userid', TRUE);
		//data for make new post to approve bussiness profile id
		$upidarrobj = $this->profile_model->get_upid_userid($userid);
		$apidsobjs = array();
		foreach($upidarrobj as $perupidobj){
			$perupid = $perupidobj->upid;
			$apidarrobj = $this->profile_model->get_apid_by_upid_allinfo($perupid);
			foreach($apidarrobj as $perapidobj){
				$apidsobjs[] = $perapidobj;
				$allinfoobj = array();
				$allinfoobj['upid'] = $perapidobj->upid;
				$allinfoobj['apid'] = $perapidobj->apid;
				$allinfoobj['bpid'] = $perapidobj->bpid;
				$allinfoobj['isapproved'] = $perapidobj->isapproved;
				$allinfoobj['babershopname'] = $this->profile_model->get_babershop_name_by_bpid($perapidobj->bpid)[0]->babershopname;
				$data['apidsobjs'][] = $allinfoobj;
			}
		}		
		$this->load->view('include/header');
		$this->load->view('include/menu',$datamenu);
		$this->load->view('controlpost',$data);
		$this->load->view('include/footer');																					
	}
	
	//Delete post by apid
	function delete_post_by_ppid(){
		$username = $this->uri->segment(1, 0);
		$ppid = $this->uri->segment(5, 0);
		$userid = $this->input->cookie('userid', TRUE);
		$checkppid = $this->profile_model->check_userid_by_ppid($ppid,$userid);
		if($checkppid){
			$this->post_model->delete_post_by_ppid($ppid);
			$username = $this->user_model->get_username_by_userid($userid)[0]->username;
			redirect('/'.$username.'/manage/controlpost/', 'refresh');
		}else{
			echo 'Load view ppid not containt userid here';
		}
	}
	
	//Edit Post
	function edit_post_by_ppid(){
		$ppid = $this->uri->segment(5, 0);
		$userid = $this->input->cookie('userid', TRUE);
		$username = $this->user_model->get_username_by_userid($userid)[0]->username;
		$checkppid = $this->profile_model->check_userid_by_ppid($ppid,$userid);
		if($checkppid){
			$data = array();
			$postinfo = $this->post_model->get_post_info_by_ppid($ppid);
			$imagenameobj = $this->photos_model->get_img_name($postinfo->photo_id)[0]->photo_img_link;
			$imageurl = $this->get_img_loc($imagenameobj);
			//set cookie photo_id
			$cookie = array(
				'name'   => 'photo_img_id',
				'value'  => $postinfo->photo_id,
				'expire' => '86400'
			);
			$this->input->set_cookie($cookie);				
			//set cookie
			$postinfo->photo_id = $imageurl;
			$datamenu['username'] = $username;
			$data['postinfo'] = $postinfo;
			$this->load->view('include/headerbt');
			$this->load->view('include/menu',$datamenu);
			$this->load->view('editpost',$data);
			$this->load->view('include/footerbt');																					
		}
	}
    function displaybussiness(){
        $this->load->helper('cookie');
        $this->load->helper('url');
        $userid=$this->input->cookie('userid');
        $this->load->model('profile_model');
        $data['listBusiness']=$this->profile_model->get_all_bussiness_info($userid);
        //var_dump($data);exit;

        $this->load->view('include/headerbt');
        $this->load->view('displaybussinessprofile',$data);
        $this->load->view('include/footerbt');
    }

    function editbussiness()
    {
        $bpid= $this->uri->segment(4, 0);
        $this->db->where('bpid',$bpid);
        $query = $this->db->get('bussinessprofile');
        $data['bprofile']= $query->result();
        $this->load->view('editbussiness',$data);
    }
	
}