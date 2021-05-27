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

    

    public function report_form($value='')
    {   
         $res2="";
         $res="";
         $dat="";
      
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

        $dat=$this->Report_model->get_report($data1);
        
       // echo $this->db->last_query();die;
            // echo '<pre>';
            // print_r($dat);die;
       }

        $data['building']=$this->Building_model->get_all();
       $data['employee']=$this->Employee_model->get_all();
       $data['customer']=$this->Customer_model->get_all();
       $data['type']=$this->Room_type_model->get_all();
       $data['mode']=$this->Payment_mode_model->get_all();
       $data['result']= $dat;
       $data['res2']= $res2;
       $data['res']= $res2;
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



    //    public function report_form2($value='')
    //     {   
    //      $res="";
    //      $res2="";
      
    //          if($this->input->post('fro')){
    //            $fro= $this->input->post('fro');
    //            $to= $this->input->post('to');
             
    //            $data1=array(
    //              'from'=>date('Y-m-d',strtotime($fro)),
    //              'to'=>date('Y-m-d',strtotime($to)),
    //              'emp'=>$this->input->post('emp'), 
    //              'mode'=>$this->input->post('mode'), 
    //              'bul'=>$this->input->post('bul'), 
    //              'room'=> $this->input->post('type'), 
    //              'cus'=>$this->input->post('cus'),               
    //    );
             

    //     $res2=$this->Report_model->get_report2($data1);
     
    //    }

    //     $data['building']=$this->Building_model->get_all();
    //    $data['employee']=$this->Employee_model->get_all();
    //    $data['customer']=$this->Customer_model->get_all();
    //    $data['type']=$this->Room_type_model->get_all();
    //    $data['mode']=$this->Payment_mode_model->get_all();
    //    $data['res2']= $res2;
    //    $data['res']= $res;
    //    $data['from']=$this->input->post('fro');
    //    $data['to']= $this->input->post('to');
    //    $data['emp']=$this->input->post('emp');
    //    $data['pay_mode']=$this->input->post('mode'); 
    //    $data['bul']=$this->input->post('bul'); 
    //    $data['room']=$this->input->post('type');
    //    $data['cus']=$this->input->post('cus');
    //    $data['content'] = 'report/report';
    //     $this->load->view('common/master', $data);    
    // }



       public function expreport_form($value='')
        {   
         $res="";
         $result="";
      
             if($this->input->post('fro'))
             {
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
                     

                $result=$this->Report_model->exp_get_report($data1);

                // echo '<pre>';
                // print_r($result);die;
             
         }

           $data['building']=$this->Building_model->get_all();
           $data['employee']=$this->Employee_model->get_all();
           $data['customer']=$this->Customer_model->get_all();
           $data['type']=$this->Room_type_model->get_all();
           $data['mode']=$this->Payment_mode_model->get_all();
           // $data['res2']= $res2;
           $data['result']= $result;
           $data['from']=$this->input->post('fro');
           $data['to']= $this->input->post('to');
           $data['emp']=$this->input->post('emp');
           $data['pay_mode']=$this->input->post('mode'); 
           $data['bul']=$this->input->post('bul'); 
           $data['room']=$this->input->post('type');
           $data['cus']=$this->input->post('cus');
           $data['content'] = 'report/expreport';
           $this->load->view('common/master', $data);    
    }
         




          public function emp_report($value='')
        { 
        $res2="";  
        $res="";
         $result="";
      
             if($this->input->post('fro'))
             {
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
                    // print_r($data1); 

                $result=$this->Report_model->emp_to_emp_get_report($data1);
                // echo $this->db->last_query();
                // echo '<pre>';
                // print_r($result);die;
             
         }

           $data['building']=$this->Building_model->get_all();
           $data['employee']=$this->Employee_model->get_all();
           $data['customer']=$this->Customer_model->get_all();
           $data['type']=$this->Room_type_model->get_all();
           $data['mode']=$this->Payment_mode_model->get_all();
           // $data['res']= $res;
           // $data['res2']= $res2;
           $data['result']= $result;
           $data['from']=$this->input->post('fro');
           $data['to']= $this->input->post('to');
           $data['emp']=$this->input->post('emp');
           $data['pay_mode']=$this->input->post('mode'); 
           $data['bul']=$this->input->post('bul'); 
           $data['room']=$this->input->post('type');
           $data['cus']=$this->input->post('cus');
           $data['content'] = 'report/empreport';
           $this->load->view('common/master', $data);    
    }




     public function profit_report($value='')
        { 
        $res2="";  
        $res="";
         $result="";
      
             if($this->input->post('fro'))
             {
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
                    // print_r($data1); 

                $result=$this->Report_model->final_report_from_register($data1);
                // echo $this->db->last_query();
                // echo '<pre>';
                // print_r($result);die;
             
         }

           $data['building']=$this->Building_model->get_all();
           $data['employee']=$this->Employee_model->get_all();
           $data['customer']=$this->Customer_model->get_all();
           $data['type']=$this->Room_type_model->get_all();
           $data['mode']=$this->Payment_mode_model->get_all();
           // $data['res']= $res;
           // $data['res2']= $res2;
           $data['result']= $result;
           $data['from']=$this->input->post('fro');
           $data['to']= $this->input->post('to');
           $data['emp']=$this->input->post('emp');
           $data['pay_mode']=$this->input->post('mode'); 
           $data['bul']=$this->input->post('bul'); 
           $data['room']=$this->input->post('type');
           $data['cus']=$this->input->post('cus');
           $data['content'] = 'report/final';
           $this->load->view('common/master', $data);    
    }




     public function excel($data)
    {   
      
        $this->load->helper('exportexcel');
        $namaFile = "revenue.xls";
        $judul = "revenue";
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
;
    xlsWriteLabel($tablehead, $kolomhead++, "emp_id");
 
    xlsWriteLabel($tablehead, $kolomhead++, "Cash");
    xlsWriteLabel($tablehead, $kolomhead++, "Cash Ref");
    xlsWriteLabel($tablehead, $kolomhead++, "Phone");
    xlsWriteLabel($tablehead, $kolomhead++, "Phone Refund");
    xlsWriteLabel($tablehead, $kolomhead++, "Paytm");
    xlsWriteLabel($tablehead, $kolomhead++, "Paytm Refund");
    xlsWriteLabel($tablehead, $kolomhead++, "Bank");
    xlsWriteLabel($tablehead, $kolomhead++, "Bank Rf");
 

   $net=0;
              $re=0;
              $net_rev=0;
              $total;
              // echo '<pre>';
              //  print_r($result['res2']);
                
                    $cashbal=0;
                   
                    $cashbal_ex=0;
                    $paytm=0;
                    $phone_bal=0;
                    $phone_bal_ex=0;
                    $pyatm_bal=0;
                    $pyatm_bal_ex=0;
                    $bank=0;
                    $bank_ex=0;
                    $phone=0;
                     

                   
           foreach ($result['res2'] as $key => $value) {
                  if($value->delete_status==1){
                   $cashbal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,1,1,$bul,$room,$cus);
                   $ref_cashbal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,1,2,$bul,$room,$cus);
                  // echo $this->db->last_query();
                   $phone_bal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,2,1,$bul,$room,$cus);
                   $ref_phone_bal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,2,2,$bul,$room,$cus);
                   $pyatm_bal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,3,1,$bul,$room,$cus);
                   $ref_pyatm_bal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,3,2,$bul,$room,$cus);
                   $bank=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,5,1,$bul,$room,$cus);  
                  $ref_bank=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,5,2,$bul,$room,$cus); 

                   $cash_total+=$cashbal->income;
                   $cash_r_total+=$ref_cashbal->income;
                   $phon_total+=$phone_bal->income;
                   $phon_r_total+=$ref_phone_bal->income;
                   $pyatm_total+=$pyatm_bal->income;
                   $pyatm_r_total+=$ref_pyatm_bal->income;
                   $bank_total+=$bank->income;
                   $bank_r_total+=$ref_bank->income;

                  $total+=$cashbal->income-$ref_cashbal->income+$phone_bal->income-$ref_phone_bal->income+$pyatm_bal->income-$ref_pyatm_bal->income+$bank->income-$ref_bank->income;            
  // foreach ($result as $data) {
            $kolombody = 0;
                
                $res=$this->Employee_model->get_by_id($value->emp_id);  

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    
      xlsWriteLabel($tablebody, $kolombody++, $res->name.'-'.$value->emp_id);
      // xlsWriteNumber($tablebody, $kolombody++, $cashbal);
      // xlsWriteNumber($tablebody, $kolombody++, $ref_cashbal);
      // xlsWriteNumber($tablebody, $kolombody++, $phone_bal);
      // xlsWriteNumber($tablebody, $kolombody++, $ref_phone_bal);
      // xlsWriteNumber($tablebody, $kolombody++, $pyatm_bal);
      // xlsWriteNumber($tablebody, $kolombody++, $ref_pyatm_bal);
      //   xlsWriteNumber($tablebody, $kolombody++, $bank);
      //   xlsWriteNumber($tablebody, $kolombody++, $ref_bank);
       

      $tablebody++;
            $nourut++;
        } } 

        xlsEOF();
        exit();
         // redirect(site_url('report/report_form'));
    }






    

}

/* End of file Building.php */
/* Location: ./application/controllers/Building.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-06 05:27:19 */
