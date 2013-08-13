<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends Main_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->model('profile_model');
		$this->load->model('post_model');
		$this->load->model('photos_model');
	}
	
	//Get result by zipcode search
	function search_by_zipcode(){
		$zipcode = $_REQUEST['zipcode'];
		$resultsearchbyzip = $this->profile_model->search_by_zipcode($zipcode);
		$apidarr = array();
		$apidarr[] = 0;
		foreach($resultsearchbyzip as $perupid){
			$upidsearch = $perupid->upid;
			$apidarr[] = intval($this->profile_model->get_apid_by_upid($upidsearch)[0]->apid);
		}
		$postresults = $this->post_model->get_posts_byapid($apidarr);
		foreach ($postresults as $perpost){
			$photo_id = intval($perpost->photo_id);
			$photoname = $this->photos_model->get_img_name($photo_id)[0]->photo_img_link;
			$perpost->photo_img_link = $this->get_img_loc($photoname);
		}
		$data['zipcode'] = $zipcode;
		$data['postresults'] = $postresults;
		$this->load->view('include/header');
		$this->load->view('searchpage',$data);
		$this->load->view('include/footer');						
		
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