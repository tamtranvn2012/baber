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
	}