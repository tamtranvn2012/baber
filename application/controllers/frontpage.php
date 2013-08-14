<?php if (!defined('BASEPATH')) die();
class Frontpage extends Main_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->model('photos_model');
		$this->db->from('postapprovedprofile')->order_by("ppid", "desc")->limit(4,0);
		$query = $this->db->get();	
		$data['photosarrrow1'] = $query->result();
		
		foreach ($data['photosarrrow1'] as $perphotoobj){
			$tempimgid = intval($perphotoobj->photo_id);
			$photo_obj_name = $this->photos_model->get_img_name($tempimgid);	
			$tempimglink = $photo_obj_name[0]->photo_img_link;
			$perphotoobj->photo_img_link = $this->get_img_loc($tempimglink);
		}
		$this->db->from('postapprovedprofile')->order_by("ppid", "desc")->limit(4,4);
		$query = $this->db->get();	
		$data['photosarrrow2'] = $query->result();
		foreach ($data['photosarrrow2'] as $perphotoobj){
			$tempimgid = intval($perphotoobj->photo_id);
			$photo_obj_name = $this->photos_model->get_img_name($tempimgid);	
			$tempimglink = $photo_obj_name[0]->photo_img_link;
			$perphotoobj->photo_img_link = $this->get_img_loc($tempimglink);
		}		
		$this->db->from('postapprovedprofile')->order_by("ppid", "desc")->limit(4,8);
		$query = $this->db->get();	
		$data['photosarrrow3'] = $query->result();
		foreach ($data['photosarrrow3'] as $perphotoobj){
			$tempimgid = intval($perphotoobj->photo_id);
			$photo_obj_name = $this->photos_model->get_img_name($tempimgid);	
			$tempimglink = $photo_obj_name[0]->photo_img_link;
			$perphotoobj->photo_img_link = $this->get_img_loc($tempimglink);
		}				
		$this->load->view('include/header');
		$this->load->view('frontpage',$data);
		$this->load->view('include/footer');
	}
	
	//Get image loc
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

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
