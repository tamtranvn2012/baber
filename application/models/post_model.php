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
         //   var_dump($datapost);exit;
        $this->db->insert('postapprovedprofile',$datapost);
    }

        function add_new_post_user_profile($userid,$comment){
         //   $created = strtotime(now);
            $datapost = array(

                'userid' => $userid,
                'comment' => $comment,
            );
            $this->db->insert('haircutdiary',$datapost);


        }
        function get_all_post_user_by_userid($userid){
            $userid = $this->input->cookie('userid', TRUE);
            $this->db->where('userid',$userid);
            $query = $this->db->get('haircutdiary');
            return $query->result();
        }
        function get_post_user_by_ppid($ppid){

            $this->db->where('ppid',$ppid);
            $query = $this->db->get('haircutdiary');
            return $query->result();
        }
        function edit_post_user_profile($ppid,$userid,$comment){
            if($this->check_ppid_userid($ppid,$userid)){
                $datapost = array(
                    'ppid' => $ppid,
                    'userid' => $userid,
                    'comment' => $comment,
                );
                $this->db->where('ppid', $ppid);
                $this->db->update('haircutdiary',$datapost);
            }

        }
        function delete_post_user_by_ppid($ppid){
            $this->db->where('ppid', $ppid);
            $this->db->delete('haircutdiary');
        }

        function check_ppid_userid($ppid,$userid){
        $this->db->where('ppid', $ppid);
        $this->db->where('userid', $userid);
        $query=$this->db->get('haircutdiary');
        return $query->result();
    }
        function get_ppid($userid){
            $this->db->where('userid', $userid);
            $query=$this->db->get('haircutdiary');
            return $query->result();
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
		
		//list post has in frontpage property
		function get_post_frontpage(){
			$this->db->where('is_frontpage',1);
			$query = $this->db->get('postapprovedprofile');
			return $query->result();
		}
		
		//Unset post in frontpage
		function unset_post_frontpage($ppid){
			$data = array(
						   'is_frontpage' => 0,
						);
			$this->db->where('ppid', $ppid);
			$this->db->update('postapprovedprofile', $data); 						
		}
		
		//Get all post info by term-auto complete
		function get_allinfo_by_term($term){
			$this->db->like('baber_name', $term);
			$query = $this->db->get('postapprovedprofile');
			return $query->result();			
		}
	}