<?php
Class Profile_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all_bussiness_info($userid)
    {
        if ($userid == 'all') {
            $query = $this->db->get('bussinessprofile');
            $result = $query->result();
        }
        if ($userid != 'all') {
            $userid = intval($userid);
            $this->db->where('userid', $userid);
            $query = $this->db->get('bussinessprofile');
            $result = $query->result();
        }
        return $result;
    }

    function get_all_userprofile_info($userid)
    {
        if ($userid == 'all') {
            $query = $this->db->get('userprofile');
            $result = $query->result();
        }
        if ($userid != 'all') {
            $userid = intval($userid);
            $this->db->where('userid', $userid);
            $query = $this->db->get('userprofile');
            $result = $query->result();
        }
        return $result;
    }

    //Get user profile by userid - all info
    function get_all_invidual_info($userid)
    {
        if ($userid == 'all') {
            $query = $this->db->get('baberindependent');
            $result = $query->result();
        }
        if ($userid != 'all') {
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
    function check_userid_upid($userid, $upid)
    {
        $this->db->where('userid', $userid);
        $this->db->where('upid', $upid);
        $query = $this->db->get('userprofile');
        $result = $query->result();
        if (count($result)) {
            return true;
        } else {
            return false;
        }
    }

    //Check baber independent profile id containt with userid or not?
    function check_userid_upid_bi($userid, $upid)
    {
        $this->db->where('userid', $userid);
        $this->db->where('upid', $upid);
        $query = $this->db->get('baberindependent');
        $result = $query->result();
        if (count($result)) {
            return true;
        } else {
            return false;
        }
    }

    //Check profile bpid contant with bussiness profile or not?
    function check_userid_bpid($userid, $bpid)
    {
        $this->db->where('userid', $userid);
        $this->db->where('bpid', $bpid);
        $query = $this->db->get('bussinessprofile');
        $result = $query->result();
        if (count($result)) {
            return true;
        } else {
            return false;
        }
    }

    //Save request approve result
    function save_request_approve($upid, $bpid)
    {
        $data = array(
            'upid' => $upid,
            'bpid' => $bpid,
            'isapproved' => 0,
        );
        $this->db->insert('approveprofile', $data);
    }

    //Check existing approve result
    function check_existing_approve($upid, $bpid)
    {
        $this->db->where('upid', $upid);
        $this->db->where('bpid', $bpid);
        $query = $this->db->get('approveprofile');
        $result = $query->result();
        if (count($result)) {
            return true;
        } else {
            return false;
        }
    }

    //List all result approve by userid
    function get_all_approved($bpid, $isapproved)
    {
        $this->db->where('bpid', $bpid);
        $this->db->where('isapproved', $isapproved);
        $query = $this->db->get('approveprofile');
        $result = $query->result();
        if (count($result)) {
            return $result;
        } else {
            return false;
        }
    }

    //Check approve  apid containt of bussiness profile id or not
    function check_apid_bpid($apid, $bpid)
    {
        $this->db->where('apid', $apid);
        $this->db->where('bpid', $bpid);
        $query = $this->db->get('approveprofile');
        $result = $query->result();
        if (count($result)) {
            return $result;
        } else {
            return false;
        }
    }

    //Approve profile id
    function approved_apid($apid)
    {
        $data = array(
            'isapproved' => 1,
        );
        $this->db->where('apid', $apid);
        $this->db->update('approveprofile', $data);
    }

    //UnApprove profile id
    function unapproved_apid($apid)
    {
        $data = array(
            'isapproved' => 0,
        );
        $this->db->where('apid', $apid);
        $this->db->update('approveprofile', $data);
    }

    //Check userprofile containt with bussisness profile or not
    function check_upid_bpid($upidrq, $bpid, $userid)
    {
        $this->db->select('upid');
        $this->db->where('userid', $userid);
        $query = $this->db->get('baberindependent');
        $result = $query->result();
        $upiddb = 0;
        $upiddb = $result[0]->upid;
        if (intval($upiddb) == intval($upidrq)) {
            $this->db->select('upid');
            $this->db->where('bpid', $bpid);
            $query1 = $this->db->get('approveprofile');
            $result1 = $query1->result();
            if (count($result1)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //Get apid from upid and bpid
    function get_apid($upid, $bpid)
    {
        $this->db->select('apid');
        $this->db->where('upid', $upid);
        $this->db->where('bpid', $bpid);
        $query = $this->db->get('approveprofile');
        $result = $query->result();
        return $result;
    }

    //Get all results for search by zipcode
    function search_by_zipcode($zipcode)
    {
        $this->db->select('upid');
        $this->db->like('zip', $zipcode);
        $query = $this->db->get('userprofile');
        return $query->result();
    }

    //Get approve id (apid) by userprofile id (upid)
    function get_apid_by_upid($upid)
    {
        $this->db->select('apid');
        $this->db->where('upid', $upid);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    //Get bussiness profile bpid by userid
    function get_bpid_by_userid($userid)
    {
        $this->db->select('bpid');
        $this->db->where('userid', $userid);
        $query = $this->db->get('bussinessprofile');
        return $query->result();
    }

    //Get approve id apid from user profile id upid
    function get_apid_by_upid_allinfo($upid)
    {
        $this->db->where('upid', $upid);
        $this->db->where('bpid >', 0);
        $this->db->where('isapproved', 1);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    //Get all approve info from approveprofile by upid
    function get_all_by_upid_allinfo($upid)
    {
        $this->db->where('upid', $upid);
        $this->db->where('bpid >', 0);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    //Get apid from upid and bpid
    function get_apid_by_upid_bpid($upid, $bpid)
    {
        $this->db->select('apid');
        $this->db->where('isapproved', 1);
        $this->db->where('upid', $upid);
        $this->db->where('bpid', $bpid);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    //Get all info of posts by apid
    function get_all_info_by_apid($apid)
    {
        $this->db->where('apid', $apid);
        $query = $this->db->get('postapprovedprofile');
        return $query->result();
    }

    //function get babershop name from bpid
    function get_babershop_name_by_bpid($bpid)
    {
        $this->db->select('babershopname');
        $this->db->where('bpid', $bpid);
        $query = $this->db->get('bussinessprofile');
        return $query->result();
    }


    function get_bp_by_bpid($bpid)
    {
        $this->db->where('bpid', $bpid);
        $query = $this->db->get('bussinessprofile');
        return $query->result();
    }

    //Check approveid containt with userid or not
    function check_userid_by_ppid($ppid, $userid)
    {
        $this->db->select('apid');
        $this->db->where('ppid', $ppid);
        $query = $this->db->get('postapprovedprofile');
        $apid = $query->result()[0]->apid;
        $this->db->select('upid');
        $this->db->where('apid', $apid);
        $query = $this->db->get('approveprofile');
        $upid = $query->result()[0]->upid;
      //  var_dump($upid);exit;
        $this->db->select('userid');
        $this->db->where('upid', $upid);
        $query = $this->db->get('baberindependent');
        $useriddb = $query->result()[0]->userid;
        if ($useriddb == $userid) {
            return true;
        } else {
            return false;
        }
    }

    function check_userid_by_ppid_bp($ppid, $userid)
{
    $this->db->select('apid');
    $this->db->where('ppid', $ppid);
    $query = $this->db->get('postapprovedprofile');
    $apid = $query->result()[0]->apid;
    $this->db->select('bpid');
    $this->db->where('apid', $apid);
    $query = $this->db->get('approveprofile');
    $bpid = $query->result()[0]->bpid;
    $this->db->select('userid');
    $this->db->where('bpid', $bpid);
    $query = $this->db->get('bussinessprofile');
    $useriddb = $query->result()[0]->userid;
    if ($useriddb == $userid) {
        return true;
    } else {
        return false;
    }
}
    function check_userid_by_ppid_pu($ppid, $userid)
    {
        $this->db->select('apid');
        $this->db->where('ppid', $ppid);
        $query = $this->db->get('postapprovedprofile');
        $apid = $query->result()[0]->apid;
        $this->db->select('puid');
        $this->db->where('apid', $apid);
        $query = $this->db->get('approveprofile');
        $puid = $query->result()[0]->puid;
        $this->db->select('userid');
        $this->db->where('upid', $puid);
        $query = $this->db->get('userprofile');
     //   var_dump($userid);exit;
        $useriddb = $query->result()[0]->userid;
      //  var_dump($useriddb);exit;
        if ($useriddb == $userid) {
            return true;
        } else {
            return false;
        }
    }

    //Update baber bussiness profile
    function update_bussiness_profile($bpid, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $babershopname)
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
        $this->db->where('bpid', $bpid);
        $this->db->update('bussinessprofile', $dataprofile);
    }

    function update_independent_profile($upid, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $babershopname)
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
        $this->db->where('upid', $upid);
        $this->db->update('baberindependent', $dataprofile);
    }

    function update_user_profile($upid, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $babershopname)
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
        $this->db->where('upid', $upid);
        $this->db->update('userprofile', $dataprofile);
    }

    //Check bpid post on their page and make approve same bpid
    function check_bpid_post_bpid($bpid)
    {
        $this->db->where('bpid', $bpid);
        $this->db->where('bpidpost', $bpid);
        $query = $this->db->get('approveprofile');
        if (!count($query->result())) {
            //insert new record with bpid number
            $data = array(
                'bpid' => $bpid,
                'bpidpost' => $bpid,
                'isapproved' => 1,
            );
            $this->db->insert('approveprofile', $data);
        }
    }

    //Get apid for bpid post on their profile
    function get_apid_from_bpid_bpid($bpid)
    {
        $this->db->select('apid');
        $this->db->where('bpid', $bpid);
        $this->db->where('bpidpost', $bpid);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    function get_apid_from_puid($puid)
    {
        $this->db->select('apid');
        $this->db->where('puid', $puid);
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

    function get_upid_by_userid_u($userid)
    {
        $userid = intval($userid);
        $this->db->select('upid');
        $this->db->where('userid', $userid);
        $query = $this->db->get('userprofile');
        $result = $query->result();
        return $result;
    }

    //Get apid by upid
    function get_apid_by_upid_upid($upid)
    {
        $this->db->select('apid');
        $this->db->where('upid', $upid);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    function get_apid_by_upid_upidpost($upid)
    {
        $this->db->select('apid');
        $this->db->where('upid', $upid);
        $this->db->where('upidpost', $upid);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    function get_apid_by_upid_up($upid)
    {
        $this->db->select('apid');
        $this->db->where('puid', $upid);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    function get_apid_by_bpid_bpidpost($bpid)
    {
        $this->db->select('apid');
        $this->db->where('bpid', $bpid);
        $this->db->where('bpidpost', $bpid);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }

    //get info by userid and slug
    function get_info_profile_by_slug_bussiness($userid, $slug)
    {

        $this->db->where('userid', $userid);
        $this->db->where('slug', $slug);
        $query = $this->db->get('bussinessprofile');
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    function get_info_profile_by_slug_independent($userid, $slug)
    {
        $this->db->where('userid', $userid);
        $this->db->where('slug', $slug);
        $query = $this->db->get('baberindependent');
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    // get apid by uid from table approvide
    function getapid_by_upid_and_upidpost($upid)
    {
        $this->db->select('apid');
        $this->db->where('upidpost', $upid);
        $query = $this->db->get('approveprofile');
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // get apid by bpid from table approvide
    function getapid_by_upid_post_bpid($bpid)
    {
        $this->db->select('apid');
        $this->db->where('bpid', $bpid);
        $this->db->where('bpidpost !=', $bpid);
        $this->db->where('isapproved', 1);
        $query = $this->db->get('approveprofile');
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //get apid bay bpidpost
    function getapid_by_bpid_and_bpidpost($bpid)
    {
        $this->db->select('apid');
        $this->db->where('bpid', $bpid);
        $this->db->where('bpidpost', $bpid);
        $query = $this->db->get('approveprofile');
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //get info approvide from table approveprofile
    function get_info_postapprovide_by_apid($apid)
    {
        $this->db->where('apid', $apid);
        $query = $this->db->get('postapprovedprofile');
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }

    }
	
	//Delete user profile by id
    function delete_user_profile_by_upid($upid)
    {
        $this->db->where('upid', $upid);
        $this->db->delete('userprofile');
    }
	
	//Delete bussiness profile by bpid
    function delete_bussiness_profile_by_bpid($bpid)
    {
        $this->db->where('bpid', $bpid);
        $this->db->delete('bussinessprofile');
    }
			
	//function get babershopname from bussiness profile
	function get_all_babershopname_bp(){
		$this->db->where('slug', $slug);
		$query = $this->db->get('bussinessprofile');				
	}
			
    function delete_independent_profile_by_upid($upid)
    {
        $this->db->where('upid', $upid);
        $this->db->delete('baberindependent');
    }

    function get_all_info_apid($apid){
        $this->db->where('apid', $apid);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }
    //Get all info of approvideprofile by apid
    function get_upid_by_independent($apid){
        $this->db->select('upid');
        $this->db->where('apid', $apid);
        $this->db->where('upidpost >', 0);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }
    function get_bpid_by_bussiness($apid){
        $this->db->select('bpid');
        $this->db->where('apid', $apid);
        $this->db->where('bpidpost >', 0);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }
    function get_upid_by_upid_post_bpid($apid){
        $this->db->select('upid');
        $this->db->where('apid', $apid);
        $this->db->where('bpid >', 0);
        $this->db->where('bpidpost', 0);
        $query = $this->db->get('approveprofile');
        return $query->result();
    }
    function get_info_indepdent_by_upid($upid){
        $this->db->where('upid',$upid);
        $query = $this->db->get('baberindependent');
        return $query->result();

    }
    function get_info_business_by_bpid($bpid){
        $this->db->where('bpid',$bpid);
        $query = $this->db->get('bussinessprofile');
        return $query->result();

    }
    function get_upid_in_userprofile_by_userid($userid){
        $this->db->select('upid');
        $this->db->where('userid',$userid);
        $query = $this->db->get('userprofile');
        return $query->result();
    }
    function save_follows($slug,$upid,$ppid,$uid)
    {
        $data = array(
            'slug' => $slug ,
            'upid' => $upid ,
            'isfollow' => 1 ,
            'ppid' =>$ppid ,
            'uid' =>$uid ,
        );
        $this->db->insert('follows', $data);
    }
    function check_follows($slug,$upid,$ppid,$uid){
        $this->db->where('slug',$slug);
        $this->db->where('upid',$upid);
        $this->db->where('ppid',$ppid);
        $this->db->where('uid',$uid);
        $query = $this->db->get('follows');
        //var_dump(count($query->result()));exit;
        if($query->result()==null){
            return false;
        }
        if(count($query->result()>0)){
            return true;
        }else{
            return false;
        }
    }
    function update_follows($slug,$upid,$ppid,$uid){
        $this->db->where('slug',$slug);
        $this->db->where('upid',$upid);
        $this->db->where('ppid',$ppid);
        $this->db->where('uid',$uid);
        $data =array(
            'slug' => $slug ,
            'upid' => $upid ,
            'isfollow' => 1,
            'ppid' => $ppid ,
            'uid' => $uid ,
        );
        $this->db->update('follows',$data);
    }
    function check_unfollows($slug,$upid,$ppid,$uid){
        $this->db->where('slug',$slug);
        $this->db->where('upid',$upid);
        $this->db->where('isfollow',1);
        $this->db->where('ppid',$ppid);
        $this->db->where('uid',$uid);
        $query = $this->db->get('follows');

        if(count($query->result()>0)){
            return true;
        }else{
            return false;
        }
    }
    function update_unfollows($slug,$upid,$ppid,$uid){
        $this->db->where('slug',$slug);
        $this->db->where('upid',$upid);
        $this->db->where('ppid',$ppid);
        $this->db->where('uid',$uid);
        $data =array(
            'slug' => $slug ,
            'upid' => $upid ,
            'isfollow' => 0 ,
            'ppid' => $ppid ,
            'uid' => $uid ,
        );
        $this->db->update('follows',$data);
    }
    function get_apid_by_ppid($ppid){
        $this->db->select('apid');
        $this->db->where('ppid',$ppid);
        $query = $this->db->get('postapprovedprofile');
        return $query->result();
    }
}

