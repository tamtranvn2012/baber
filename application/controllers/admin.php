<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Main_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('post_model');
		$this->load->model('photos_model');
		
		$userid = 0;
		$userid = $this->input->cookie('userid', TRUE);		
		if(!$this->user_model->check_admin_site($userid)){
			redirect('/user/login/', 'refresh');
		}
	}
	
	function index(){
		$postfrontpage = $this->post_model->get_post_frontpage();
		foreach($postfrontpage as $perpostobj){
			$imagenameobj = $this->photos_model->get_img_name($perpostobj->photo_id)[0]->photo_img_link;
			$imageurl = $this->get_img_loc($imagenameobj);
			$perpostobj->photo_id = $imageurl;
		}
		$data['frontpage_post'] = $postfrontpage;
		$this->load->view('include/header');
        $this->load->view('controlpostfrontpage',$data);
		$this->load->view('include/footer');		
	}
	
	//test
	function completebabername(){
		$term = $_REQUEST['term'];
		$allpostinfo = $this->post_model->get_allinfo_by_term($term);
		$data = array();
		foreach($allpostinfo as $perpostobj){
			$imagenameobj = $this->photos_model->get_img_name($perpostobj->photo_id)[0]->photo_img_link;
			$imageurl = $this->get_img_loc($imagenameobj);
			$imglinksrc = '<img src="'.base_url($imageurl).'" width=50 height=50/>';
			$data[] = $perpostobj->baber_name;
		}
		echo json_encode($data);
		flush();
	}
	
	//unset post in frontpage
	function unset_post_frontpage(){
		$ppid = $this->uri->segment(3, 0);
		$this->post_model->unset_post_frontpage($ppid);
		redirect('/admin/', 'refresh');
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