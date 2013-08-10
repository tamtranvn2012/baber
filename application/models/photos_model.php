<?php
	Class Photos_model extends CI_Model{
		
		public function __construct()
		{
		  parent::__construct();
			$this->load->helper('cookie');
			if(!$this->input->cookie('userid', TRUE)){
				redirect('/user/login/', 'refresh');
			}
			$this->load->helper('date');
			$os = PHP_OS;
			switch($os)
			{
				case "Linux": define("DS", "/"); break;
				case "Windows": define("DS", "\\"); break;
				default: define("DS", "\\"); break;
			}					
		}
		
		function add_new_photo($baber_name,$photo_link,$photo_tag,$photo_img_link,$isprivate,$baber_type,$userid)
		{
			$this->load->database();
			$nowtimestamp = intval(strtotime("now"));
			$data = array(
			   'photo_link' => $photo_link,
			   'baber_name' => $baber_name,
			   'photo_tag' => $photo_tag,
			   'created' => $nowtimestamp,
			   'photo_img_link' => $photo_img_link,
			   'isprivate' => $isprivate,
			   'baber_type' => $baber_type,
			   'userid' => $userid,
			   
			);
			$this->db->insert('photos', $data); 			
		}

		//get image name from image id
		function get_img_name($imgid)
		{
			$this->db->select('photo_img_link');
			$this->db->where('photo_id', $imgid);
			$query = $this->db->get('photos');
			return $query->result();		
		}
		
	}