<?php

if (!defined('BASEPATH'))
    exit('No Direct Script Access Allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Dashborad_model');
        //$this->load->model('Member_model');
    }

    public function index() {
      
        $data['emp']=$this->Dashborad_model->count_all_employee();
        $data['customer']=$this->Dashborad_model->count_all_customer();
        // print_r($data['emp']);
        $data['content'] = 'dash/home';
        $this->load->view('common/master', $data);
    }
    public function user() {
          $data['customer']=$this->Dashborad_model->count_all_customer();
         $data['emp']=$this->Dashborad_model->count_all_employee();
        $data['content'] = 'dash/user';
        $this->load->view('common/master', $data);
    }

    // public function last_week() {
    //  $data=$this->Dashborad_model->last_week();   
    //     echo json_encode($data);
    // }

    public function employee(){
        $data['content'] = 'dash/employee';
      $this->load->view('common/master', $data);
    }

}

?>
