<?php
	Class User_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		function add_new_user()
		{
			$nowtimestamp = intval(strtotime("now"));
			//Generate password hash
			$password = 'h5f9p5h4';
			$salt = 'h5f';
			$ps = $password.$salt;
			$joinps = md5($ps);
			$timehash = md5($nowtimestamp);
			$joinallstr = $joinps.$timehash;
			$hashpass = md5($joinallstr);
			$encodepass = substr(base64_encode($hashpass),0,32);
			
			$data = array(
			   'username' => 'rvengine' ,
			   'password' => $encodepass ,
			   'salt' => 'h5f' ,
			   'created' => $nowtimestamp
			);
			$this->db->insert('user', $data); 			
			return true;
		}
		
		function checklogin($username,$password) {
				$query = '';
				$upassword = '';
				$upassword = '';
				$utimestamp = '';
				$usalt = '';
				$hashpass = '';
				$this->load->database();
				$this->db->from('user');
				$this->db->where('username', $username); 
				$query = $this->db->get();	
				$userarr = $query->result();
				$upassword = $userarr[0]->password;
				$utimestamp = $userarr[0]->created;
				$usalt = $userarr[0]->salt;
				$hashpass = $this->gethashpass($password,$usalt,$utimestamp);
				if ($hashpass == $upassword){
					return $userarr[0]->userid;
				}
				else{
					return false;
				}
			}
		//Gethash password
		function gethashpass($password,$salt,$timestamp) {
			$ps = $password.$salt;
			$joinps = md5($ps);
			$timehash = md5($timestamp);
			$joinallstr = $joinps.$timehash;
			$hashpass = md5($joinallstr);
			$encodepass = substr(base64_encode($hashpass),0,32);
			return $encodepass;
		}		

		//check username is avaiable
		function checkusername($username){
			$this->db->select('userid');
			$this->db->where('username', $username);
			$query = $this->db->get('user');
			$result = $query->result();
			if(count($result)>0){
				return true;
			}else{
				return false;
			}
		}
	}
?>