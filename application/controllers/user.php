<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends Main_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

    }

    public function add_new(){
        $this->load->model('user_model');
        $this->user_model->add_new_user();
    }


    public function manage(){
        $this->islogin();
        $this->load->view('include/headerbt');
        $this->load->view('manage');
        $this->load->view('include/footerbt');
    }

    public function islogin(){
        $this->load->helper('cookie');
        $this->load->helper('url');
        if(!$this->input->cookie('userid', TRUE)){
            redirect('/user/login/', 'refresh');
        }
    }
    public function login(){
        $this->load->view('include/headerbt');
        $this->load->view('login');
        $this->load->view('include/footerbt');
    }

    public function checklogin()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $this->load->model('user_model');
        $userInfo=$this->user_model->checklogin($username, $password);
        var_dump($userInfo);exit;
        if ($userInfo) {
            $cookie = array(
                'name'   => 'userid',
                'value'  => $userInfo[0]->userid,
                'expire' => '86400'
            );
            $this->input->set_cookie($cookie);
            $this->load->helper('url');
            //  $username = $this->uri->segment(1, 0);
            //  var_dump($username);exit;
            redirect('/'.$username.'/manage/', 'refresh');
        } else
            redirect('/user/loginfailed/', 'refresh');
    }

    public function register(){
        $this->load->view('include/headerbt');
        $this->load->view('register_user');
        $this->load->view('include/footerbt');
    }

    public function check(){
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $photolink=$_REQUEST['photolink'];
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $zip = $_REQUEST['zip'];
        $phone = $_REQUEST['phone'];
        $instantgram = $_REQUEST['instantgram'];
        $facebook = $_REQUEST['facebook'];
        $favorites_tool = $_REQUEST['favorites_tool'];
        $private = $_REQUEST['private'];
        //   $babershopname = $_REQUEST['babershopname'];
        $slug = $_REQUEST['slug'];
        $this->load->helper('cookie');
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('user_model');
        $this->user_model->add_new_user($username, $password, $photolink, $address, $city, $state, $zip, $phone, $instantgram, $facebook, $favorites_tool, $private, $slug);
        redirect('/'.$username.'/manage/', 'refresh');
    }

    public function checkbussiness(){
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $photolink=$_REQUEST['photolink'];
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
        $userid=$this->input->cookie('userid');
//        $username=$this->user_model->get_username_by_userid($userid);
        $this->load->model('user_model');
        if($this->user_model->add_new_user_bussiness($username,$password,$photolink,$address,$city,$state,$zip,$phone,$instantgram,$facebook,$favorites_tool,$babershopname,$private,$slug)){
            redirect('/'.$username.'/manage/', 'refresh');
        }
        else{
            echo"error";
        }
    }
    public function registerbussiness(){
        $this->load->view('include/headerbt');
        $this->load->view('registerbussiness');
        $this->load->view('include/footerbt');
    }
}