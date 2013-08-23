<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Youfollow extends Main_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('profile_model');
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));



    }

    function index()
    {

    }

    function check_follows_by_apid()
    {



            $uid = $this->input->cookie('userid', TRUE);

            if(!$uid){
                redirect('/user/login/', 'refresh');
            }else{
            $ppid = $this->uri->segment(2, 0);
            $apid = $this->profile_model->get_apid_by_ppid($ppid);

            if ($this->profile_model->get_all_info_apid($apid[0]->apid)) {
                $apidinfo = $this->profile_model->get_all_info_apid($apid[0]->apid);
                if ($this->profile_model->get_upid_by_independent($apidinfo[0]->apid)) {
                    $upid = $this->profile_model->get_upid_by_independent($apidinfo[0]->apid);
                    $upidinfo = $this->profile_model->get_info_indepdent_by_upid($upid[0]->upid);
                    $upidprofile = $this->profile_model->get_upid_in_userprofile_by_userid($upidinfo[0]->userid);
                    if ($this->profile_model->check_follows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid)) {
                        $this->profile_model->update_follows($upidinfo[0]->slug, $upidprofile[0]->upid,$ppid,$uid);
                    } else {
                        $this->profile_model->save_follows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid);
                    }
                } elseif ($this->profile_model->get_bpid_by_bussiness($apidinfo[0]->apid)) {
                    $bpid = $this->profile_model->get_bpid_by_bussiness($apidinfo[0]->apid);
                    $bpidinfo = $this->profile_model->get_info_business_by_bpid($bpid[0]->bpid);
                    $upidprofile = $this->profile_model->get_upid_in_userprofile_by_userid($bpidinfo[0]->userid);
                    if ($this->profile_model->check_follows($bpidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid)) {
                        $this->profile_model->update_follows($bpidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid);
                    } else {
                        $this->profile_model->save_follows($bpidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid);
                    }
                } elseif ($this->profile_model->get_upid_by_upid_post_bpid($apidinfo[0]->apid)) {
                    $upid = $this->profile_model->get_upid_by_upid_post_bpid($apidinfo[0]->apid);
                    $upidinfo = $this->profile_model->get_info_indepdent_by_upid($upid[0]->upid);
                    $upidprofile = $this->profile_model->get_upid_in_userprofile_by_userid($upidinfo[0]->userid);
                    if ($this->profile_model->check_follows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid)) {
                        $this->profile_model->update_follows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid);
                    } else {
                        $this->profile_model->save_follows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid);
                    }

                }
                redirect('/', 'refresh');
            }
            }

        }
    function check_unfollows_by_apid()
    {
        $uid = $this->input->cookie('userid', TRUE);
        //var_dump($userid);exit;
        if(!$uid){
            redirect('/user/login/', 'refresh');
        }else{

        $ppid = $this->uri->segment(2, 0);
        $apid = $this->profile_model->get_apid_by_ppid($ppid);
        if ($this->profile_model->get_all_info_apid($apid[0]->apid)) {
            $apidinfo = $this->profile_model->get_all_info_apid($apid[0]->apid);
            if ($this->profile_model->get_upid_by_independent($apidinfo[0]->apid)) {
                $upid = $this->profile_model->get_upid_by_independent($apidinfo[0]->apid);
                $upidinfo = $this->profile_model->get_info_indepdent_by_upid($upid[0]->upid);
                $upidprofile = $this->profile_model->get_upid_in_userprofile_by_userid($upidinfo[0]->userid);
                if ($this->profile_model->check_unfollows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid)) {
                    $this->profile_model->update_unfollows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid);
                }
            } elseif ($this->profile_model->get_bpid_by_bussiness($apidinfo[0]->apid)) {
                $bpid = $this->profile_model->get_bpid_by_bussiness($apidinfo[0]->apid);
                $bpidinfo = $this->profile_model->get_info_business_by_bpid($bpid[0]->bpid);
                $upidprofile = $this->profile_model->get_upid_in_userprofile_by_userid($bpidinfo[0]->userid);
                if ($this->profile_model->check_unfollows($bpidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid)) {
                    $this->profile_model->update_unfollows($bpidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid);
                }
            } elseif ($this->profile_model->get_upid_by_upid_post_bpid($apidinfo[0]->apid)) {
                $upid = $this->profile_model->get_upid_by_upid_post_bpid($apidinfo[0]->apid);
                $upidinfo = $this->profile_model->get_info_indepdent_by_upid($upid[0]->upid);
                $upidprofile = $this->profile_model->get_upid_in_userprofile_by_userid($upidinfo[0]->userid);
                if ($this->profile_model->check_unfollows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid)) {
                    $this->profile_model->update_unfollows($upidinfo[0]->slug, $upidprofile[0]->upid, $ppid,$uid);
                }
            }
            redirect('/', 'refresh');
        }
        }
    }

}