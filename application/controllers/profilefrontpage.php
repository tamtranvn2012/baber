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
		$this->load->model('profile_model');
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
    // list all post by slug
    function findslug()
    {
        $data['postapprovide'] = '';
        $data['postapprovide1'] = '';
        $username = $this->uri->segment(1, 0);
        $slug = $this->uri->segment(2, 0);
        $userid = $this->user_model->get_userid_by_username($username)[0]->userid;
        if ($this->profile_model->get_info_profile_by_slug_independent($userid, $slug)) {
            $independentinfo = $this->profile_model->get_info_profile_by_slug_independent($userid, $slug)[0];
            $data['info'] = $independentinfo;
            $upid = $independentinfo->upid;
            $apidarr = $this->profile_model->getapid_by_upid_and_upidpost($upid);
            $postupid = $this->profile_model->get_info_postapprovide_by_apid($apidarr[0]->apid);
            $data['postapprovide'] = $postupid;
        }
        elseif ($this->profile_model->get_info_profile_by_slug_bussiness($userid, $slug)) {
            $bussinessinfo = $this->profile_model->get_info_profile_by_slug_bussiness($userid, $slug)[0];
            $data['info'] = $bussinessinfo;
            $bpid = $bussinessinfo->bpid;
            if( $this->profile_model->getapid_by_bpid_and_bpidpost($bpid)){
                $apidarr = $this->profile_model->getapid_by_bpid_and_bpidpost($bpid);
                $postapid = $this->profile_model->get_info_postapprovide_by_apid($apidarr[0]->apid);
                $data['postapprovide'] = $postapid;
            }if($this->profile_model->getapid_by_upid_post_bpid($bpid)){
                $apidarr = $this->profile_model->getapid_by_upid_post_bpid($bpid);
                $postdataarr = array();
                foreach ($apidarr as $perapidobj) {
                    $perapid = $perapidobj->apid;

                    $postapprovide = $this->profile_model->get_info_postapprovide_by_apid($perapid);
                    foreach ($postapprovide as $perpostapprove) {
                        $postdataarr[] = $perpostapprove;
                    }
                }
                $data['postapprovide1'] = $postdataarr;

                foreach ($data['postapprovide1'] as $perpost) {
                    $photo_id = intval($perpost->photo_id);
                    $photoname = $this->photos_model->get_img_name($photo_id)[0]->photo_img_link;
                    $perpost->photo_img_link = $this->get_img_loc($photoname);
                }
            }
        }
        foreach ($data['postapprovide'] as $perpost) {
            $photo_id = intval($perpost->photo_id);
            $photoname = $this->photos_model->get_img_name($photo_id)[0]->photo_img_link;
            $perpost->photo_img_link = $this->get_img_loc($photoname);
        }
        $this->load->view('include/header');
        $this->load->view('listpostapprovedprofile', $data);
        $this->load->view('include/footer');
    }
}