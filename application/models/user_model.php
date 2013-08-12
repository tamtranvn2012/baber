<?php
	Class User_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}


        function add_new_user($name, $pass)
        {
            $this->load->database();
            $nowtimestamp = intval(strtotime("now"));
            //Generate password hash
            $password = $pass;
            //$password = 'h5f9p5h4';
            $salt = 'h5f';
            $ps = $password . $salt;
            $joinps = md5($ps);
            $timehash = md5($nowtimestamp);
            $joinallstr = $joinps . $timehash;
            $hashpass = md5($joinallstr);
            $encodepass = substr(base64_encode($hashpass), 0, 32);
            $data = array(
                'username' => $name,
                'password' => $encodepass,
                'salt' => 'h5f',
                'created' => $nowtimestamp
            );
            $this->db->from('user');
            $query = $this->db->get();
            $userarr = $query->result();
            foreach ($userarr as $key => $check) {
                $flag = false;
                if ($name == $check->username) {
                    $flag = true;
                    break;
                } else {

                    $flag = false;
                }
            }
            if ($flag) {
                echo'username was  registed by another';
            } else {
                $this->db->insert('user', $data);
                // add profile
                $this->db->from('user');
                $this->db->where('username', $name);
                $query = $this->db->get();
                $userarr = $query->result();
                $dataprofile = array(
                    'userid' => $userarr[0]->userid,
                    'address' => $encodepass,
                    'city' => $_REQUEST['city'],
                    'state' => $_REQUEST['state'],
                    'zip' => $_REQUEST['zip'],
                    'phone' => $_REQUEST['phone'],
                    'instantgram' => $_REQUEST['instantgram'],
                    'facebook' => $_REQUEST['facebook'],
                    'favorites_tool' => $_REQUEST['favoritestool'],
                    'private' => $_REQUEST['private'],
                    'created' => $nowtimestamp,
                    'slug' => $_REQUEST['slug']
                );
                $this->db->insert('userprofile',$dataprofile);
                redirect('/user/successful/', 'refresh');
            }
            return true;
        }

        function checklogin($username, $password)
        {
            $this->load->database();
            //$this->db->select('username','userid','password','salt','created');
            $this->db->from('user');
            $this->db->where('username', $username);
            $query = $this->db->get();
            $userarr = $query->result();
            if($userarr!=null){
                $upassword = $userarr[0]->password;
                $utimestamp = $userarr[0]->created;
                $usalt = $userarr[0]->salt;
                $hashpass = $this->gethashpass($password, $usalt, $utimestamp);
                if ($hashpass == $upassword) {
					$this->load->helper('cookie');
					$userid = $userarr[0]->userid;
					$username = $userarr[0]->username;
					$cookie = array(
						'name'   => 'userid',
						'value'  => $userid,
						'expire' => '86400'
					);
					$this->input->set_cookie($cookie);									
                    redirect('/'.$username.'/manage/', 'refresh');
                    return $userarr[0]->userid;
                } else {
                    redirect('/user/loginfailed','refresh');
                    return false;
                }
            }
            else
                redirect('/user/loginfailed','refresh');
        }


        //check username is avaiable


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
				return $result;
			}else{
				return false;
			}
		}
		
		//Get bussiness profile id
		function getbpid($userid){
			$this->db->select('bpid');
			$this->db->where('userid', $userid);
			$query = $this->db->get('bussinessprofile');
			$result = $query->result();
			if(count($result)>0){
				return $result;
			}else{
				return false;
			}
		}		

		//Get approved id of bussiness profile id
		function getapid($bpid){
			$this->db->select('apid');
			$this->db->where('bpid', $bpid);
			$this->db->where('isapproved', 1);
			$query = $this->db->get('approveprofile');
			$result = $query->result();
			if(count($result)>0){
				return $result;
			}else{
				return false;
			}
		}		
    }
?>