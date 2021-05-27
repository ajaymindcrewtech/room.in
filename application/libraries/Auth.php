<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    var $CI;
    var $perms = array();       //Array : Stores the permissions for the user
    var $userID;            //Integer : Stores the ID of the current user
    var $userRoles = array();   //Array : Stores the roles of the current user

    //this is the expiration for a non-remember session
    //var $session_expire	= 600;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('encrypt');
    }

    /*
      this checks to see if the admin is logged in
      we can provide a link to redirect to, and for the login page, we have $default_redirect,
      this way we can check if they are already logged in, but we won't get stuck in an infinite loop if it returns false.
     */

    function is_logged_in($redirect = false, $default_redirect = true) {
        $user = $this->CI->session->userdata('cvm_admin_in');
        
        if (!$user) {
            if ($default_redirect) {
                redirect('site/adminIndex');
            } else {
                redirect('welcome/index');
            }
            return false;
        } 
        
    }
    
    function is_seeker_in($redirect = false, $default_redirect = true) {
        $user = $this->CI->session->userdata('cvm_seeker_in');
        
        if (!$user) {
            if ($default_redirect) {
                redirect('site/seekerIndex');
            } else {
                redirect('welcome/index');
            }
            return false;
        } 
        
    }
    
    function is_crm_in($redirect = false, $default_redirect = true) {
        $user = $this->CI->session->userdata('cvm_crm_in');
        
        if (!$user) {
            if ($default_redirect) {
                redirect('site/crmIndex');
            } else {
                redirect('welcome/index');
            }
            return false;
        } 
        
    }
    
    function is_recruiter_in($redirect = false, $default_redirect = true) {
        $user = $this->CI->session->userdata('cvm_recruiter_in');
        
        if (!$user) {
            if ($default_redirect) {
                redirect('site/recruiterIndex');
            } else {
                redirect('welcome/index');
            }
            return false;
        } 
        
    }
    
  

    /*
      this function does the logging in.
     */


    /*
      this function does the logging out
     */

    function logout() {
        $this->CI->session->unset_userdata('id');
        $this->CI->session->unset_userdata('logged_in');
        $this->CI->session->sess_destroy();
    }

    public function checkUserSession($redirect = false, $default_redirect = true) {
        $admin = $this->CI->session->userdata('logged_in');
        
        if (!$admin) {
            if ($default_redirect) {
                redirect('site/adminIndex');
            } else {
                redirect('welcome/index');
            }
            return false;
        } 
       
    }
    
    

    /*
      This function resets the admins password and emails them a copy
     */

    function reset_password($email) {
        $admin = $this->get_admin_by_email($email);
        if ($admin) {
            $this->CI->load->helper('string');
            $this->CI->load->library('email');

            $new_password = random_string('alnum', 8);
            $admin['password'] = sha1($new_password);
            $this->save_admin($admin);

            $this->CI->email->from($this->CI->config->item('email'), $this->CI->config->item('site_name'));
            $this->CI->email->to($email);
            $this->CI->email->subject($this->CI->config->item('site_name') . ': Admin Password Reset');
            $this->CI->email->message('Your password has been reset to ' . $new_password . '.');
            $this->CI->email->send();
            return true;
        } else {
            return false;
        }
    }

}
