<?php
	Class Post_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		//Get posts by apid 
		function get_posts_byapid($apidarr)
		{
			$this->db->where_in('apid', $apidarr);
			$query = $this->db->get('postapprovedprofile');
			$result = $query->result();			
			return $result;
		}
		
		//Insert new post to db
		function add_new_post($apid,$photo_id,$babershopname,$baber_type,$baber_name,$tag,$private){
			$created = strtotime(now);
			$datapost = array(
				'apid' => $apid,
				'photo_id' => $photo_id,
				'babershopname' => $babershopname,
				'baber_type' => $baber_type,
				'baber_name' => $baber_name,
				'created' => $created,
				'tag' => $tag,
				'private' => $private,
			);
			$this->db->insert('postapprovedprofile',$datapost);		
		}
	}