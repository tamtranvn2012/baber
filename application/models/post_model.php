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
		function add_new_post($apid,$photo_id,$babershopname,$baber_type,$baber_name,$tag,$isprivate){
			$created = strtotime(now);
			$datapost = array(
				'apid' => $apid,
				'photo_id' => $photo_id,
				'babershopname' => $babershopname,
				'baber_type' => $baber_type,
				'baber_name' => $baber_name,
				'created' => $created,
				'tag' => $tag,
				'isprivate' => $isprivate,
			);
			$this->db->insert('postapprovedprofile',$datapost);		
		}
		
		//Delete post with ppid
		function delete_post_by_ppid($ppid){
			$this->db->where('ppid', $ppid);
			$this->db->delete('postapprovedprofile');
		}

		//Get all info from postapproveprofile
		function get_post_info_by_ppid($ppid){
			$this->db->where('ppid', $ppid);
			$query = $this->db->get('postapprovedprofile');
			$result = $query->result()[0];			
			return $result;
		}
		
		//Update post by post id
		function update_post_by_postid($ppid,$photo_id,$babershopname,$baber_type,$baber_name,$tag,$isprivate){
			$data = array(
						   'photo_id' => $photo_id,
						   'babershopname' => $babershopname,
						   'baber_type' => $baber_type,
						   'baber_name' => $baber_name,
						   'tag' => $tag,
						   'isprivate' => $isprivate,
						);
			$this->db->where('ppid', $ppid);
			$this->db->update('postapprovedprofile', $data); 						
		}
	}