<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function request_approve()
    {

    }

    function addprofile()
    {
        $this->load->helper('cookie');
        $this->load->helper('url');
        $userid = $this->input->cookie('userid');
        if (intval($userid) == 0) {
            redirect('/user/login', 'refresh');
        } else {
            $this->load->view('include/headerbt');
            $this->load->view('addprofile');
            $this->load->view('include/footerbt');
        }
    }

    public function profilebussiness()
    {
        $this->load->helper('cookie');
        $this->load->helper('url');
        $userid = $this->input->cookie('userid');
        if (intval($userid) == 0) {
            redirect('/user/login', 'refresh');
        } else {
            $this->load->model('user_model');
            $username = $this->user_model->get_username_by_userid($userid);
            $photolink = $_REQUEST['photolink'];
            $address = $_REQUEST['address'];
            $city = $_REQUEST['city'];
            $state = $_REQUEST['state'];
            $zip = $_REQUEST['zip'];
            $phone = $_REQUEST['phone'];
            $instantgram = $_REQUEST['instantgram'];
            $facebook = $_REQUEST['facebook'];
            $favorites_tool = $_REQUEST['favorites_tool'];
            $private = $_REQUEST['private'];
            $babershopname = $_REQUEST['babershopname'];
            $slug = $_REQUEST['slug'];
            $this->load->model('user_model');
            if ($this->user_model->add_profile_bus($photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $slug, $babershopname)) {
                redirect('/' . $username[0]->username . '/manage/', 'refresh');
            }
        }

    }
}