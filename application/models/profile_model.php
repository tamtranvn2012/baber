<?php
	Class Profile_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

        function get_all_bussiness_info($userid)
        {
            if ($userid == 'all'){
                $query = $this->db->get('bussinessprofile');
                $result = $query->result();
            }
            if ($userid != 'all'){
                $userid = intval($userid);
                $this->db->where('userid', $userid);
                $query = $this->db->get('bussinessprofile');
                $result = $query->result();
            }
            return $result;
        }
		//Get user profile by userid - all info
		function get_all_invidual_info($userid)
		{
			if ($userid == 'all'){
				$query = $this->db->get('baberindependent');
				$result = $query->result();			
			}
			if ($userid != 'all'){
				$userid = intval($userid);
				$this->db->where('userid', $userid);
				$query = $this->db->get('baberindependent');
				$result = $query->result();			
			}			
			return $result;
		}

		//Get user profile by userid
		function get_upid_userid($userid)
		{
			$userid = intval($userid);
			$this->db->select('upid');
			$this->db->where('userid', $userid);
			$query = $this->db->get('baberindependent');
			$result = $query->result();			
			return $result;
		}
		
		//Check profile id containt with bussiness profile or not?
		function check_userid_upid($userid,$upid)
		{
			$this->db->where('userid', $userid);
			$this->db->where('upid', $upid);
			$query = $this->db->get('userprofile');
			$result = $query->result();			
			if(count($result)){
				return true;
			}else{
				return false;
			}
		}
		
		//Check baber independent profile id containt with userid or not?
		function check_userid_upid_bi($userid,$upid)
		{
			$this->db->where('userid', $userid);
			$this->db->where('upid', $upid);
			$query = $this->db->get('baberindependent');
			$result = $query->result();			
			if(count($result)){
				return true;
			}else{
				return false;
			}
		}
		
		//Check profile bpid contant with bussiness profile or not?
		function check_userid_bpid($userid,$bpid)
		{
			$this->db->where('userid', $userid);
			$this->db->where('bpid', $bpid);
			$query = $this->db->get('bussinessprofile');
			$result = $query->result();			
			if(count($result)){
				return true;
			}else{
				return false;
			}
		}
		
		//Save request approve result
		function save_request_approve($upid,$bpid)
		{
			$data = array(
			   'upid' => $upid ,
			   'bpid' => $bpid ,
			   'isapproved' => 0,
			);
			$this->db->insert('approveprofile', $data); 			
		}

		//Check existing approve result 
		function check_existing_approve($upid,$bpid)
		{
			$this->db->where('upid', $upid);
			$this->db->where('bpid', $bpid);
			$query = $this->db->get('approveprofile');
			$result = $query->result();			
			if(count($result)){
				return true;
			}else{
				return false;
			}			
		}

		//List all result approve by userid
		function get_all_approved($bpid,$isapproved)
		{
			$this->db->where('bpid', $bpid);
			$this->db->where('isapproved', $isapproved);
			$query = $this->db->get('approveprofile');
			$result = $query->result();			
			if(count($result)){
				return $result;
			}else{
				return false;
			}			
		}
		
		//Check approve  apid containt of bussiness profile id or not
		function check_apid_bpid($apid,$bpid){
			$this->db->where('apid', $apid);
			$this->db->where('bpid', $bpid);
			$query = $this->db->get('approveprofile');
			$result = $query->result();			
			if(count($result)){
				return $result;
			}else{
				return false;
			}						
		}
		
		//Approve profile id 
		function approved_apid($apid){
			$data = array(
						   'isapproved' => 1,
						);
			$this->db->where('apid', $apid);
			$this->db->update('approveprofile', $data); 			
		}

		//UnApprove profile id 
		function unapproved_apid($apid){
			$data = array(
						   'isapproved' => 0,
						);
			$this->db->where('apid', $apid);
			$this->db->update('approveprofile', $data); 			
		}

		//Check userprofile containt with bussisness profile or not
		function check_upid_bpid($upidrq,$bpid,$userid){
			$this->db->select('upid');
			$this->db->where('userid', $userid);
			$query = $this->db->get('baberindependent');
			$result = $query->result();			
			$upiddb = 0;
			$upiddb = $result[0]->upid;
			if(intval($upiddb) == intval($upidrq)){
				$this->db->select('upid');
				$this->db->where('bpid', $bpid);
				$query1 = $this->db->get('approveprofile');
				$result1 = $query1->result();
				if(count($result1)){
					return true;
				}else{
					return false;
				}	
			}else{
				return false;
			}									
		}
		
		//Get apid from upid and bpid
		function get_apid($upid,$bpid){
			$this->db->select('apid');
			$this->db->where('upid', $upid);
			$this->db->where('bpid', $bpid);
			$query = $this->db->get('approveprofile');
			$result = $query->result();			
			return $result;
		}
		
		//Get all results for search by zipcode
		function search_by_zipcode($zipcode){
			$this->db->select('upid');
			$this->db->like('zip', $zipcode); 
			$query = $this->db->get('userprofile');
			return $query->result();
		}
		
		//Get approve id (apid) by userprofile id (upid)
		function get_apid_by_upid($upid){
			$this->db->select('apid');
			$this->db->where('upid', $upid);
			$query = $this->db->get('approveprofile');
			return $query->result();
		}
		
		//Get bussiness profile bpid by userid
		function get_bpid_by_userid($userid){
			$this->db->select('bpid');
			$this->db->where('userid', $userid);
			$query = $this->db->get('bussinessprofile');
			return $query->result();
		}
		
		//Get approve id apid from user profile id upid
		function get_apid_by_upid_allinfo($upid){
			$this->db->where('upid', $upid);
			$this->db->where('isapproved', 1);
			$query = $this->db->get('approveprofile');
			return $query->result();
		}
		
		//Get all approve info from approveprofile by upid
		function get_all_by_upid_allinfo($upid){
			$this->db->where('upid', $upid);
			$query = $this->db->get('approveprofile');
			return $query->result();
		}
		
		//Get apid from upid and bpid
		function get_apid_by_upid_bpid($upid,$bpid){
			$this->db->select('apid');
			$this->db->where('isapproved', 1);
			$this->db->where('upid', $upid);
			$this->db->where('bpid', $bpid);
			$query = $this->db->get('approveprofile');
			return $query->result();
		}
		
		//Get all info of posts by apid
		function get_all_info_by_apid($apid){
			$this->db->where('apid', $apid);
			$query = $this->db->get('postapprovedprofile');
			return $query->result();
		}
		
		//function get babershop name from bpid
		function get_babershop_name_by_bpid($bpid){
			$this->db->select('babershopname');
			$this->db->where('bpid', $bpid);
			$query = $this->db->get('bussinessprofile');
			return $query->result();
		}
		
		//Check approveid containt with userid or not
		function check_userid_by_ppid($ppid,$userid){
			$this->db->select('apid');
			$this->db->where('ppid', $ppid);
			$query = $this->db->get('postapprovedprofile');
			$apid = $query->result()[0]->apid;
			$this->db->select('upid');
			$this->db->where('apid', $apid);
			$query = $this->db->get('approveprofile');
			$upid = $query->result()[0]->upid;			
			$this->db->select('userid');
			$this->db->where('upid', $upid);
			$query = $this->db->get('baberindependent');
			$useriddb = $query->result()[0]->userid;
			if ($useriddb == $userid){
				return true;
			}else{
				return false;
			}
		}
        
		//Update baber bussiness profile
		function update_bussiness_profile($bpid,$photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $babershopname)
        {
            $dataprofile = array(
                'photo_link' => $photolink,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'phone' => $phone,
                'instantgram' => $instantgram,
                'facebook' => $facebook,
                'favorites_tool' => $favorites_tool,
                'isprivate' => $private,
                'babershopname' => $babershopname,
            );
            $this->load->helper('url');
            $this->db->where('bpid',$bpid);
            $this->db->update('bussinessprofile', $dataprofile);
        }
		
		//Check bpid post on their page and make approve same bpid
		function check_bpid_post_bpid($bpid){
			$this->db->where('bpid',$bpid);
			$this->db->where('bpidpost',$bpid);
			$query = $this->db->get('approveprofile');
			if(!count($query->result())){
				//insert new record with bpid number
				$data = array(
				   'bpid' => $bpid ,
				   'bpidpost' => $bpid ,
				   'isapproved' => 1,
				);
				$this->db->insert('approveprofile', $data); 							
			}
		}
		
		//Get apid for bpid post on their profile
		function get_apid_from_bpid_bpid($bpid){
			$this->db->select('apid');
			$this->db->where('bpid',$bpid);
			$this->db->where('bpidpost',$bpid);
			$query = $this->db->get('approveprofile');
			return $query->result();
		}

		//Get upid by userid
        function get_upid_by_userid($userid)
        {
            $userid = intval($userid);
            $this->db->select('upid');
            $this->db->where('userid', $userid);
            $query = $this->db->get('baberindependent');
            $result = $query->result();
            return $result;
        }
		
		//Get apid by upid
        function get_apid_by_upid_upid($upid){
            $this->db->select('apid');
            $this->db->where('upid', $upid);
            $query = $this->db->get('approveprofile');
            return $query->result();
        }
        //get info by userid and slug
        function get_info_profile_by_slug_bussiness($userid,$slug){

            $this->db->where('userid', $userid);
            $this->db->where('slug', $slug);
            $query = $this->db->get('bussinessprofile');
            if(count($query)>0){
                return $query->result();
            }
            else{
                return false;
            }
        }
        function get_info_profile_by_slug_independent($userid,$slug){
            $this->db->where('userid', $userid);
            $this->db->where('slug', $slug);
            $query = $this->db->get('baberindependent');
            if(count($query)>0){
                return $query->result();
            }
            else{
                return false;
            }

        }
        // get apid by uid from table approvide
        function getapid_by_upid_and_upidpost($upid){
            $this->db->select('apid');
            $this->db->where('upidpost',$upid);
            $query = $this->db->get('approveprofile');
            if(count($query)>0){
                return $query->result();
            }
            else{
                return false;
            }
        }
        // get apid by bpid from table approvide
        function getapid_by_upid_post_bpid($bpid){
            $this->db->select('apid');
            $this->db->where('bpid',$bpid);
            $this->db->where('bpidpost !=',$bpid);
            $this->db->where('isapproved',1);
            $query = $this->db->get('approveprofile');
            if(count($query)>0){
                return $query->result();
            }
            else{
                return false;
            }
        }
        //get apid bay bpidpost
        function getapid_by_bpid_and_bpidpost($bpid){
            $this->db->select('apid');
            $this->db->where('bpid',$bpid);
            $this->db->where('bpidpost',$bpid);
            $query = $this->db->get('approveprofile');
            if(count($query)>0){
                return $query->result();
            }
            else{
                return false;
            }
        }

        //get info approvide from table approveprofile
        function get_info_postapprovide_by_apid($apid){
            $this->db->where('apid', $apid);
            $query = $this->db->get('postapprovedprofile');
            if(count($query)>0){
                return $query->result();
            }
            else{
                return false;
            }

        }
	}