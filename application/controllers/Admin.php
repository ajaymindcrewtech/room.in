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
       
     $admin= $this->uri->segment(3);
      echo $admin;die;
        $result = $this->login_model->validate();
        // print_r($result);die;
      //  $data['result'] = $this->login_model->read_member_information($this->input->post('emailid'));
        if ($result==4 ) {
            redirect('dashboard');
        } 

         if ($result==1 ) {
            redirect('dashboard');
        } 

         elseif($result==2 ) {
            redirect('dashboard/employee');
        //    $data['content'] = 'common/de';
        // $this->load->view('common/master', $data);
           
        }

          elseif ($result==3 ) {
             redirect('dashboard/user');
            
        }

        else {
            $msg = '<font color=red>Invalid Email and/or password.</font><br />';
            $this->index($msg);
        }
    }
    
    
     public function password_reset(){
         
          $data['content'] = 'login_create/password_reset';
        $this->load->view('common/master', $data);   
      }
      public function password_update(){
      $log_id=$this->session->userdata('reg_id');
      
     $data=array(
    'password'=>md5($this->input->post('password')),
     );
     $this->Login_create_model->update_password($log_id,$data);
     $this->session->set_flashdata('mess','Your Password change Successfully');
         redirect('dashboard');
     }
    
     public function logout() {
        $this->session->sess_destroy();
//      echo '<script> alert("Successfully Loggout")';
        redirect('login');
    }

}

?>