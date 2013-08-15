<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends Main_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //Add new user function
    public function add_new()
    {
        $this->load->model('user_model');
        $this->user_model->add_new_user();
    }

    //Manage function
    public function manage()
    {
        $this->islogin();
        $this->load->view('include/headerbt');
        $this->load->view('manage');
        $this->load->view('include/footerbt');
    }

    //Check is login
    public function islogin()
    {
        $this->load->helper('cookie');
        $this->load->helper('url');
        if (!$this->input->cookie('userid', TRUE)) {
            redirect('/user/login/', 'refresh');
        }
    }

    //Login function
    public function login()
    {
        $this->load->view('include/headerbt');
        $this->load->view('login');
        $this->load->view('include/footerbt');
    }

    //Check login info
    public function checklogin()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $this->load->model('user_model');
        $userInfo = $this->user_model->checklogin($username, $password);
        if ($userInfo) {
            $cookie = array(
                'name' => 'userid',
                'value' => $userInfo[0]->userid,
                'expire' => '86400'
            );
            $this->input->set_cookie($cookie);
            $this->load->helper('url');
            redirect('/' . $username . '/manage/', 'refresh');
        } else {
            redirect('/user/loginfailed/', 'refresh');
        }
    }

    //Register user info
    public function register()
    {
        $this->load->view('include/headerbt');
        //$this->load->view('register_user');
        $this->load->view('registeruserphoto');
        $this->load->view('include/footerbt');
    }

    //Check  profile
    public function check()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
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
        $private = 0;
        $babershopname = $_REQUEST['babershopname'];
        $slug = $_REQUEST['slug'];
        $this->load->model('user_model');
        $this->user_model->add_new_user($username, $password, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $babershopname, $slug);
        redirect('/' . $username . '/manage/', 'refresh');
    }


    //Check bussiness profile
    public function checkbussiness()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
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
        $this->load->helper('cookie');
        $this->load->helper('url');
        $this->load->model('user_model');
        $userid = $this->input->cookie('userid');
        $this->load->model('user_model');
        if ($this->user_model->add_new_user_bussiness($username, $password, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $babershopname, $private, $slug)) {
            redirect('/' . $username . '/manage/', 'refresh');
        } else {
            echo "error";
        }
    }

    //Register bussiness profile
    public function registerbussinessprofile()
    {
        $this->load->view('include/headerbt');
        $this->load->view('registerbussinessprofile');
        $this->load->view('include/footerbt');
    }

    //Logout function
    public function logout()
    {
        $cookie = array(
            'name' => 'userid',
            'value' => '',
            'expire' => '86400'
        );
        $this->input->set_cookie($cookie);
        $this->load->view('include/header');
        $this->load->view('login');
        $this->load->view('include/footer');
    }

}