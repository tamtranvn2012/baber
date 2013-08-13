<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilefrontpage extends Main_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('post_model');
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
			$this->load->view('profilefrontpage',$data);
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
}