<?php
Class User_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	//Add new user info independent
    function add_new_user($username, $password, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $babershopname)
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
			$private = 0;
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
                    'private' => $private,
                    'created' => $nowtimestamp,
                    'babershopname' => $babershopname,
                );
                $this->db->insert('userprofile', $dataprofile);
                return true;
            }
        }
        return false;
    }
	//Add new user info bussiness
    function add_new_user_bussiness($username, $password,$photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private,$babershopname,$slug)
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
                    'private' => $private,
                    'created' => $nowtimestamp,
                    'slug' => $slug,
                    'babershopname' => $babershopname,
                );
                $this->db->insert('bussinessprofile', $dataprofile);
                return true;
            }
        }
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
    function add_profile_bus( $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $slug,$babershopname){
        $this->load->database();
        $nowtimestamp = intval(strtotime("now"));
        $this->load->helper('cookie');
        $this->load->helper('url');
        $userid=$this->input->cookie('userid');
        $this->load->model('user_model');
        $username=$this->user_model->get_username_by_userid($userid);
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
                'private' => $private,
                'created' => $nowtimestamp,
                'slug' => $slug,
                'babershopname' => $babershopname
            );
            $this->db->insert('bussinessprofile', $dataprofile);
            return true;
			//test
        }
    }
}
?>