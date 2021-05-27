<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Report_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $emp = $this->Employee_model->get_all();
        $emp = $this->Login_create_model->get_all();

        $data = array(
            'emp' => $emp
        );

          $data['content'] = 'report/sheet';
        $this->load->view('common/master', $data);    
            
    }

    
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "building.xls";
        $judul = "building";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Customer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function report_form($value='')
    {   
         $res2="";
         $res="";
      
             if($this->input->post('fro')){
               $fro= $this->input->post('fro');
               $to= $this->input->post('to');
             
               $data1=array(
                 'from'=>date('Y-m-d',strtotime($fro)),
                 'to'=>date('Y-m-d',strtotime($to)),
                 'emp'=>$this->input->post('emp'), 
                 'mode'=>$this->input->post('mode'), 
                 'bul'=>$this->input->post('bul'), 
                 'room'=> $this->input->post('type'), 
                 'cus'=>$this->input->post('cus'),               
       );
               // echo '<pre>';
               // print_r($data1);die;

        $res=$this->Report_model->get_report($data1);
       // echo $this->db->last_query();die;

       }

        $data['building']=$this->Building_model->get_all();
       $data['employee']=$this->Employee_model->get_all();
       $data['customer']=$this->Customer_model->get_all();
       $data['type']=$this->Room_type_model->get_all();
       $data['mode']=$this->Payment_mode_model->get_all();
       $data['res']= $res;
       $data['res2']= $res2;
       $data['from']=$this->input->post('fro');
       $data['to']= $this->input->post('to');
       $data['emp']=$this->input->post('emp');
       $data['pay_mode']=$this->input->post('mode'); 
       $data['bul']=$this->input->post('bul'); 
       $data['room']=$this->input->post('type');
       $data['cus']=$this->input->post('cus');
        $data['content'] = 'report/report';
        $this->load->view('common/master', $data);    
    }    



       public function report_form2($value='')
        {   
         $res="";
         $res2="";
      
             if($this->input->post('fro')){
               $fro= $this->input->post('fro');
               $to= $this->input->post('to');
             
               $data1=array(
                 'from'=>date('Y-m-d',strtotime($fro)),
                 'to'=>date('Y-m-d',strtotime($to)),
                 'emp'=>$this->input->post('emp'), 
                 'mode'=>$this->input->post('mode'), 
                 'bul'=>$this->input->post('bul'), 
                 'room'=> $this->input->post('type'), 
                 'cus'=>$this->input->post('cus'),               
       );
             

        $res2=$this->Report_model->get_report2($data1);
     
       }

        $data['building']=$this->Building_model->get_all();
       $data['employee']=$this->Employee_model->get_all();
       $data['customer']=$this->Customer_model->get_all();
       $data['type']=$this->Room_type_model->get_all();
       $data['mode']=$this->Payment_mode_model->get_all();
       $data['res2']= $res2;
       $data['res']= $res;
       $data['from']=$this->input->post('fro');
       $data['to']= $this->input->post('to');
       $data['emp']=$this->input->post('emp');
       $data['pay_mode']=$this->input->post('mode'); 
       $data['bul']=$this->input->post('bul'); 
       $data['room']=$this->input->post('type');
       $data['cus']=$this->input->post('cus');
       $data['content'] = 'report/report';
        $this->load->view('common/master', $data);    
    }


    // public function report_get($value='')
    // {

    //    $fro= $this->input->post('fro');
    //    $to= $this->input->post('to');
    //    $emp= $this->input->post('emp');
    //    $mode= $this->input->post('mode');
    //    $bul= $this->input->post('bul');
    //    $room= $this->input->post('type');
    //    $cus= $this->input->post('cus');
    //    $data1=array(
    //      'from'=>date('Y-m-d',strtotime($fro)),
    //      'to'=>date('Y-m-d',strtotime($to)),
    //      'emp'=>$emp, 
    //      'mode'=>$mode, 
    //      'bul'=>$bul, 
    //      'room'=>$room, 
    //      'cus'=>$cus,               
    //    );
    //     $res=$this->Report_model->get_report($data1);
    //     if($res){ 
    //          $this->report_form($res);
    //     // $data['building']=$this->Building_model->get_all();
    //     // $data['employee']=$this->Employee_model->get_all();
    //     // $data['customer']=$this->Customer_model->get_all();
    //     // $data['type']=$this->Room_type_model->get_all();
    //     // $data['mode']=$this->Payment_mode_model->get_all();
    //     // $data['res']=$res;
    //   }

    //     // $data['content'] = 'report/report';
    //     // $this->load->view('common/master', $data); 
    // }

}

/* End of file Building.php */
/* Location: ./application/controllers/Building.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-06 05:27:19 */
