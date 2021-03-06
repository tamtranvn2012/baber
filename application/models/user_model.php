<?php
Class User_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	//Add new user profile info 
    function add_new_user($username, $password, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate, $babershopname,$slug)
    {
        $this->load->database();
        $nowtimestamp = intval(strtotime("now"));
        $salt = 'h5f';
        $ps = $password . $salt;
        $joinps = md5($ps);
        $timehash = md5($nowtimestamp);
        $joinallstr = $joinps . $timehash;
        $hashpass = md5($joinallstr);
        $encodepass = substr(base64_encode($hashpass), 0, 32);
        $data = array(
            'username' => $username,
            'password' => $encodepass,
            'salt' => 'h5f',
            'created' => $nowtimestamp
        );
        $result = $this->checkusername($username);
        if ($result) {
            echo 'username was  registed by another';
            return false;
        } else {
            $this->db->insert('user', $data);
            // add profile
            $user = $this->checkusername($username);
			$isprivate = 0;
            if ($user) {

                $dataprofile = array(
                    'userid' => $user[0]->userid,
                    'photo_link' => $photolink,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip' => $zip,
                    'phone' => $phone,
                    'instantgram' => $instantgram,
                    'facebook' => $facebook,
                    'favorites_tool' => $favorites_tool,
                    'isprivate' => $isprivate,
                    'created' => $nowtimestamp,
                    'babershopname' => $babershopname,
                    'slug' => $slug
                );
                $this->db->insert('userprofile', $dataprofile);

                return true;
            }
        }
        return false;
    }    
	
	//Add new user profile (logged)
	function add_new_user_ck($useid, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate, $babershopname,$slug)
    {
        $this->load->database();
        $nowtimestamp = intval(strtotime("now"));
		$dataprofile = array(
			'userid' => $useid,
			'photo_link' => $photolink,
			'address' => $address,
			'city' => $city,
			'state' => $state,
			'zip' => $zip,
			'phone' => $phone,
			'instantgram' => $instantgram,
			'facebook' => $facebook,
			'favorites_tool' => $favorites_tool,
			'isprivate' => $isprivate,
			'created' => $nowtimestamp,
			'babershopname' => $babershopname,
			'slug' => $slug
		);
		$this->db->insert('userprofile', $dataprofile);
        return true;
    }
	
	//Add new user info bussiness
    function add_new_user_bussiness($username, $password,$photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate,$babershopname,$slug)
    {
        $this->load->database();
        $nowtimestamp = intval(strtotime("now"));
        //Generate password hash
        $salt = 'h5f';
        $ps = $password . $salt;
        $joinps = md5($ps);
        $timehash = md5($nowtimestamp);
        $joinallstr = $joinps . $timehash;
        $hashpass = md5($joinallstr);
        $encodepass = substr(base64_encode($hashpass), 0, 32);
        $data = array(
            'username' => $username,
            'password' => $encodepass,
            'salt' => 'h5f',
            'created' => $nowtimestamp
        );
        $result = $this->checkusername($username);
        if ($result) {
            echo'username was  registed by another';
            return false;
        } else {
            $this->db->insert('user', $data);
            // add profile
            $user = $this->checkusername($username);
            if($user){
                $dataprofile = array(
                    'userid' => $user[0]->userid,
                    'photo_link' =>$photolink,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip' => $zip,
                    'phone' => $phone,
                    'instantgram' => $instantgram,
                    'facebook' => $facebook,
                    'favorites_tool' => $favorites_tool,
                    'isprivate' => $isprivate,
                    'created' => $nowtimestamp,
                    'slug' => $slug,
                    'babershopname' => $babershopname,
                );
                $this->db->insert('bussinessprofile', $dataprofile);

                $this->db->select('bpid');
                $this->db->where('userid',$user[0]->userid);
                $this->db->where('created',$nowtimestamp);
                $query = $this->db->get('bussinessprofile');
                $data = $query->result();
                $dataapp = array(
                    'bpid' => $data[0]->bpid,
                    'bpidpost' => $data[0]->bpid,
                    'isapproved' => 1,
                );
                $this->db->insert('approveprofile', $dataapp);
                return true;
            }
        }
        return true;
    }	
	
	//Add new user info bussiness(Logged)
    function add_new_user_bussiness_ck($userid, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate,$babershopname,$slug)
    {
		$nowtimestamp = intval(strtotime("now"));
		$this->load->database();
		$dataprofile = array(
			'userid' => $userid,
			'photo_link' =>$photolink,
			'address' => $address,
			'city' => $city,
			'state' => $state,
			'zip' => $zip,
			'phone' => $phone,
			'instantgram' => $instantgram,
			'facebook' => $facebook,
			'favorites_tool' => $favorites_tool,
			'isprivate' => $isprivate,
			'created' => $nowtimestamp,
			'slug' => $slug,
			'babershopname' => $babershopname,
		);
		$this->db->insert('bussinessprofile', $dataprofile);

		$this->db->select('bpid');
		$this->db->where('userid',$$userid);
		$this->db->where('created',$nowtimestamp);
		$query = $this->db->get('bussinessprofile');
		$data = $query->result();
		$dataapp = array(
			'bpid' => $data[0]->bpid,
			'bpidpost' => $data[0]->bpid,
			'isapproved' => 1,
		);
		$this->db->insert('approveprofile', $dataapp);
		return true;
    }
	//Check login correct or not
    function checklogin($username, $password)
    {
        $this->load->database();
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
                return false;
            }
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
    function getupid($userid){
        $this->db->select('upid');
        $this->db->where('userid', $userid);
        $query = $this->db->get('userprofile');
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

    //Get all userid
    function get_all_userid(){
        $this->db->select('userid');
        $query = $this->db->get('user');
        return $query->result();
    }

    //Get username by userid
    function get_username_by_userid($userid){
        $this->db->select('username');
        $this->db->where('userid', $userid);
        $query = $this->db->get('user');
        return $query->result();
    }

    //Check username containt with userid or not
    function check_username_userid($username,$userid){
        $this->db->select('userid');
        $this->db->where('userid', $userid);
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        if(count($query->result())){
            return true;
        }else{
            return false;
        }
    }
    function add_profile_bus( $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate, $slug,$babershopname){
        $this->load->database();
        $nowtimestamp = intval(strtotime("now"));
        $this->load->helper('cookie');
        $this->load->helper('url');
        $userid = $this->input->cookie('userid');
        $this->load->model('user_model');
        $username = $this->user_model->get_username_by_userid($userid);
        //var_dump($username);exit;
        $user = $this->checkusername($username[0]->username);
        if ($user) {
            $dataprofile = array(
                'userid' => $user[0]->userid,
                'photo_link' => $photolink,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'phone' => $phone,
                'instantgram' => $instantgram,
                'facebook' => $facebook,
                'favorites_tool' => $favorites_tool,
                'isprivate' => $isprivate,
                'created' => $nowtimestamp,
                'slug' => $slug,
                'babershopname' => $babershopname
            );
            $this->db->insert('bussinessprofile', $dataprofile);

            $this->db->select('bpid');
            $this->db->where('userid',$user[0]->userid);
            $this->db->where('created',$nowtimestamp);
            $query = $this->db->get('bussinessprofile');
            $data = $query->result();
            $dataapp = array(
                'bpid' => $data[0]->bpid,
                'bpidpost' => $data[0]->bpid,
                'isapproved' => 1,
            );
            $this->db->insert('approveprofile', $dataapp);
            return true;
        }
    }
    function add_user_profile( $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate, $slug,$babershopname){
        $this->load->database();
        $nowtimestamp = intval(strtotime("now"));
        $this->load->helper('cookie');
        $this->load->helper('url');
        $userid = $this->input->cookie('userid');
        $this->load->model('user_model');
        $username = $this->user_model->get_username_by_userid($userid);
      //  var_dump($babershopname);exit;
        $user = $this->checkusername($username[0]->username);
        if ($user) {
            $dataprofile = array(
                'userid' => $user[0]->userid,
                'photo_link' => $photolink,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'phone' => $phone,
                'instantgram' => $instantgram,
                'facebook' => $facebook,
                'favorites_tool' => $favorites_tool,
                'isprivate' => $isprivate,
                'created' => $nowtimestamp,
                'slug' => $slug,
                'babershopname' => $babershopname
            );
            $this->db->insert('userprofile', $dataprofile);


            return true;
        }
    }
    function add_profile_independent( $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate, $slug,$babershopname){
        $this->load->database();
        $nowtimestamp = intval(strtotime("now"));
        $this->load->helper('cookie');
        $this->load->helper('url');
        $userid = $this->input->cookie('userid');
        $this->load->model('user_model');
        $username = $this->user_model->get_username_by_userid($userid);
        //var_dump($username);exit;
        $user = $this->checkusername($username[0]->username);
        if ($user) {
            $dataprofile = array(
                'userid' => $user[0]->userid,
                'photo_link' => $photolink,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'phone' => $phone,
                'instantgram' => $instantgram,
                'facebook' => $facebook,
                'favorites_tool' => $favorites_tool,
                'isprivate' => $isprivate,
                'created' => $nowtimestamp,
                'slug' => $slug,
                'babershopname' => $babershopname
            );
            $this->db->insert('baberindependent', $dataprofile);

            $this->db->select('upid');
            $this->db->where('userid',$user[0]->userid);
            $query = $this->db->get('baberindependent');
            $data = $query->result();
            $dataapp = array(
                'upid' => $data[0]->upid,
                'upidpost' => $data[0]->upid,
                'isapproved' => 1,
            );
            $this->db->insert('approveprofile', $dataapp);


            return true;
        }
    }
	
	//Add new independent user
    function add_new_user_independent($username, $password,$photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate,$babershopname,$slug)
    {
        $this->load->database();
        $nowtimestamp = intval(strtotime("now"));
        //Generate password hash
        $salt = 'h5f';
        $ps = $password . $salt;
        $joinps = md5($ps);
        $timehash = md5($nowtimestamp);
        $joinallstr = $joinps . $timehash;
        $hashpass = md5($joinallstr);
        $encodepass = substr(base64_encode($hashpass), 0, 32);
        $data = array(
            'username' => $username,
            'password' => $encodepass,
            'salt' => 'h5f',
            'created' => $nowtimestamp
        );
        $result = $this->checkusername($username);
        if ($result) {
            echo'username was  registed by another';
            return false;
        } else {
            $this->db->insert('user', $data);
            // add profile
            $user = $this->checkusername($username);

            if($user){
                $dataprofile = array(
                    'userid' => $user[0]->userid,
                    'photo_link' =>$photolink,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip' => $zip,
                    'phone' => $phone,
                    'instantgram' => $instantgram,
                    'facebook' => $facebook,
                    'favorites_tool' => $favorites_tool,
                    'isprivate' => $isprivate,
                    'created' => $nowtimestamp,
                    'slug' => $slug,
                    'babershopname' => $babershopname,
                );
                $this->db->insert('baberindependent', $dataprofile);

                $this->db->select('upid');
                $this->db->where('userid',$user[0]->userid);
                $query = $this->db->get('baberindependent');
                $data = $query->result();
                $dataapp = array(
                    'upid' => $data[0]->upid,
                    'upidpost' => $data[0]->upid,
                    'isapproved' => 1,
                );

                $this->db->insert('approveprofile', $dataapp);
                return true;
            }
        }
        return true;
    }

	//Add new independent user
    function add_new_user_independent_ck($userid, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $isprivate,$babershopname,$slug)
    {
        $nowtimestamp = intval(strtotime("now"));
		$dataprofile = array(
			'userid' => $userid,
			'photo_link' =>$photolink,
			'address' => $address,
			'city' => $city,
			'state' => $state,
			'zip' => $zip,
			'phone' => $phone,
			'instantgram' => $instantgram,
			'facebook' => $facebook,
			'favorites_tool' => $favorites_tool,
			'isprivate' => $isprivate,
			'created' => $nowtimestamp,
			'slug' => $slug,
			'babershopname' => $babershopname,
		);
		$this->db->insert('baberindependent', $dataprofile);
		$this->db->select('upid');
		$this->db->where('userid',$userid);
		$query = $this->db->get('baberindependent');
		$data = $query->result();
		$dataapp = array(
			'upid' => $data[0]->upid,
			'upidpost' => $data[0]->upid,
			'isapproved' => 1,
		);
		$this->db->insert('approveprofile', $dataapp);
        return true;
    }
	
	//Check user is admin or not
	function check_admin_site($userid){
		$this->db->where('userid',$userid);
		$this->db->where('siterole','admin');
		$query = $this->db->get('user');
		if(count($query->result())){
			return true;
		}else{
			return false;
		}
	}
    //Get userid by username
    function get_userid_by_username($username){
        $this->db->select('userid');
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->result();
    }
}
?>