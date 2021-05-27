<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('login_model');
        $this->load->library('session');
    }

    public function index($msg = NULL) {
        
        $data['msg'] = $msg;
        $this->load->view('login', $data);
    }
    public function index_1(){
       
        $this->load->view('login', $data);
    }

    public function process() {
        $result = $this->login_model->validate();
        // print_r($result);die;
      //  $data['result'] = $this->login_model->read_member_information($this->input->post('emailid'));
        if ($result > '0') {
            redirect('dashboard');
        } else {
            $msg = '<font color=red>Invalid Email and/or password.</font><br />';
            $this->index($msg);
        }
    }
    
    
         public function cus() {
        $result = $this->login_model->cusvalidate();
        // print_r($result);die;
      //  $data['result'] = $this->login_model->read_member_information($this->input->post('emailid'));
        if ($result > '0') {
            redirect('dashboard');
        } else {
            $msg = '<font color=red>Invalid Email and/or password.</font><br />';
            $this->index($msg);
        }
    }
    

   
       public function emp() {
        $result = $this->login_model->empvalidate();
        // print_r($result);die;
      //  $data['result'] = $this->login_model->read_member_information($this->input->post('emailid'));
        if ($result > '0') {
            redirect('dashboard');
        } else {
            $msg = '<font color=red>Invalid Email and/or password.</font><br />';
            $this->index($msg);
        }
    }
    
     public function logout() {
        $this->session->sess_destroy();
//      echo '<script> alert("Successfully Loggout")';
        redirect('login');
    }

}

?>