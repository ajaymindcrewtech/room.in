<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Emp_to_emp extends CI_Controller

{

    function __construct()

    {

        parent::__construct();

        $this->load->model('Emp_to_emp_model');

        $this->load->library('form_validation');

    }



    public function index()

    {

        $income_register = $this->Emp_to_emp_model->get_all();



        $data = array(

            'income_register_data' => $income_register

        );



          $data['content'] = 'emp_to_emp/list';

        $this->load->view('common/master', $data);    

            

    }



  


    public function create() 

    {

        

        $data = array(

            'button' => 'Create',

            'action' => site_url('emp_to_emp/create_action'),

	    'register_id' => set_value('register_id'),

	    'customer_id' => set_value('customer_id'),

        'other_emp_id' => set_value('other_emp_id'),

	    'employee_id' => set_value('employee_id'),

	    'income' => set_value('income'),

	    'expense' => set_value('expense'),

        'comment' => set_value('comment'),

        'mode' => set_value('mode'),

        'other_mode' => set_value('other_mode'),
        'delete_status' => set_value('delete_status'),
        'date' => set_value('date'),

     
	);

        $data['payment_mode']=$this->Payment_mode_model->get_all();

         $data['employee']=$this->Employee_model->get_all();

        $data['content'] = 'emp_to_emp/view';

        $this->load->view('common/master', $data);       

    }

    

    public function create_action() 

    {

        $this->_rules();



        if ($this->form_validation->run() == FALSE) {

            $this->create();

        } else { 
            

             $emp_id= $this->session->userdata('reg_id');

             $today=date_create(date('d-m-Y'));
           $enter_date=date_create($this->input->post('date',TRUE));
           $diff=date_diff($today,$enter_date);
            $days=$diff->format("%a");

            $data = array(

               'employee_id' =>$emp_id,

          	   'expense' => $this->input->post('expense',TRUE),

               'mode' => $this->input->post('mode',TRUE),

               'other_emp_id' =>$this->input->post('other_emp_id'),

          	   'other_mode' => $this->input->post('other_mode',TRUE),

               'date' => date('Y-m-d h:i:s',strtotime($this->input->post('date',TRUE))),

               'comment' => $this->input->post('comment',TRUE),

               'payment_status'=>1,
               'delete_status'=>1,
                'date_diff'=>$days,

           );    
              
                $id=$this->Emp_to_emp_model->insert($data);
                // echo $id;die;
                 if($id){

                      $this->other_emp_id($id,$data);
                    
                    $dataupdate = array('transaction_id' => $id );
                    $this->Emp_to_emp_model->update($id,$dataupdate);

                      $this->income_register($id,$data);
                      $this->income_register2($id,$data);
                       
                 }

                $this->session->set_flashdata('message', 'Create Record Success');

                redirect(site_url('emp_to_emp'));

        }

    }
               
             public function income_register($id1,$data1){

               $data = array(
                'transaction_id'=>$id1,
                'employee_id' =>$data1['employee_id'],
                'mode' =>$data1['mode'],
                'expense' => $data1['expense'],
                'other_emp_id'=>$data1['other_emp_id'],
                'other_mode'=>$data1['other_mode'],
                'comment' => $data1['comment'],
                 'payment_status'=>$data['payment_status'],
                'source'=>'E'
          ); 
              $this->Income_register_model->insert($data);

         }

                public function income_register2($id1,$data1){

               $data = array(
                'transaction_id'=>$id1,
                'employee_id' =>$data1['other_emp_id'],
                'mode' =>$data1['other_mode'],
                'income' => $data1['expense'],
                'other_emp_id'=>$data1['employee_id'],
                'other_mode'=>$data1['mode'],
                'comment' => $data1['comment'],
                 // 'payment_status'=>$data['payment_status'],
                'source'=>'E'

          ); 



           $this->Income_register_model->insert($data);

          }



              public function other_emp_id($id,$data){

                   $data = array(

                  'transaction_id'=>$id,
                  'employee_id' =>$data['other_emp_id'],

                  'other_emp_id'=>$data['employee_id'],

                  'income' => $data['expense'],

                  'comment' => $data['comment'],

                  'mode' => $data['other_mode'],

                  'other_mode' => $data['mode'],
                  'date' => date('Y-m-d h:i:s',strtotime($data['date'])),

                  );


                 
                    $this->Emp_to_emp_model->insert($data);

              }

    

  //   public function update($id) 

  //   {

  //       $row = $this->Emp_to_emp_model->get_by_id($id);



  //       if ($row) {

  //           $data = array(

  //               'button' => 'Update',

  //               'action' => site_url('income_register/update_action'),

		// 'register_id' => set_value('register_id', $row->register_id),

		// 'customer_id' => set_value('customer_id', $row->customer_id),

  //       'other_emp_id' => set_value('other_emp_id', $row->other_emp_id),

		// 'employee_id' => set_value('employee_id', $row->employee_id),

		// 'income' => set_value('income', $row->income),

		// 'expense' => set_value('expense', $row->expense),

  //       'comment' => set_value('comment', $row->comment),

  //       'mode' => set_value('mode', $row->mode),

  //       'key_value' => set_value('key_value', $row->key_value),

	 //    );

  //           $data['payment_mode']=$this->Payment_mode_model->get_all();

  //           $data['employee']=$this->Employee_model->get_all();

  //           $data['content'] = 'income_register/income_register_form';

  //           $this->load->view('common/master', $data);       

  //       } else {

  //           $this->session->set_flashdata('message', 'Record Not Found');

  //           redirect(site_url('income_register'));

  //       }

  //   }

    

  //   public function update_action() 

  //   {

  //       $this->_rules();



  //       if ($this->form_validation->run() == FALSE) {

  //           $this->update($this->input->post('register_id', TRUE));

  //       } else {

  //            if($this->input->post('other_emp_id')){

  //               $other_id=$this->input->post('other_emp_id');

  //            }

  //            else{

  //               $other_id="";

  //            }

  //         $emp_id= $this->session->userdata('reg_id');

  //           $data = array(

		// // 'customer_id' => $this->input->post('customer_id',TRUE),

		// 'other_emp_id' =>$other_id,

  //       // 'employee_id' =>$emp_id,

		// 'income' => 0,

		// 'expense' => $this->input->post('expense',TRUE),

  //       'comment' => $this->input->post('comment',TRUE),

  //       'mode' => $this->input->post('mode',TRUE),

	 //    );



  //           $this->Emp_to_emp_model->update($this->input->post('register_id', TRUE), $data);

  //            if($other_id){

  //               $this->other_emp_id_update($this->input->post('register_id'),$data);

  //            }



  //           $this->session->set_flashdata('message', 'Update Record Success');

  //           redirect(site_url('income_register'));

  //       }

  //   }



   //     public function other_emp_id_update($id,$data)

   // {

   //       $data1 = array(

   //      // 'customer_id' => 0,

   //      'employee_id' =>$data['other_emp_id'],

   //      'other_emp_id' =>$data['employee_id'],

   //      'income' => $data['expense'],

   //      'expense' => $data['income'],

   //      'comment' => $data['comment'],

   //      'mode' => $data['mode'],

   //      );



   //          $this->Emp_to_emp_model->update($id,$data1);

   //   }

    

    public function delete() 

    {

    	 $id=$this->input->post('emp_id');
        $reason=$this->input->post('reason');

        $row = $this->Emp_to_emp_model->get_by_id($id);
        $transaction_record = $this->Emp_to_emp_model->get_by_transaction_id($row->transaction_id);

  
     // echo '<pre>';
     //    print_r($transaction_record);die;
     //    echo '</pre>';

        if ($transaction_record) {

            $data=array(
             'delete_status'=>2,
             'reason'=>$reason,
            );
            foreach ($transaction_record as $key => $value) {
               $this->Emp_to_emp_model->update($value->id,$data);
            $this->Income_register_model->delete($row->transaction_id);

            }
           
            $this->session->set_flashdata('message', 'Delete Record Success');

            redirect(site_url('income_register'));

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('income_register'));

        }

    }



    public function _rules() 

    {

	 $this->form_validation->set_rules('expense', 'expense', 'trim|required');

   $this->form_validation->set_rules('mode', 'mode', 'trim|required');



	$this->form_validation->set_rules('other_emp_id', 'register_id', 'trim');

  $this->form_validation->set_rules('other_mode', 'other_mode', 'trim');

	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }



    public function excel()

    {

       $data=array(
         'from'=>$this->input->post('from'),
         'to'=>$this->input->post('to')
        );
       $result= $this->Emp_to_emp_model->filter($data);
    // echo '<pre>';
    // print_r($result);die;

        $this->load->helper('exportexcel');

        $namaFile = "income_register.xls";

        $judul = "income_register";

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

	xlsWriteLabel($tablehead, $kolomhead++, "Transaction Id");

	xlsWriteLabel($tablehead, $kolomhead++, "Employee Id");

	xlsWriteLabel($tablehead, $kolomhead++, "other_emp_id");

	xlsWriteLabel($tablehead, $kolomhead++, "income");
  xlsWriteLabel($tablehead, $kolomhead++, "expense");
  xlsWriteLabel($tablehead, $kolomhead++, "mode");
  xlsWriteLabel($tablehead, $kolomhead++, "other_mode");
  xlsWriteLabel($tablehead, $kolomhead++, "comment");
  xlsWriteLabel($tablehead, $kolomhead++, "payment_status");
  xlsWriteLabel($tablehead, $kolomhead++, "reason");
  xlsWriteLabel($tablehead, $kolomhead++, "createdat");
  xlsWriteLabel($tablehead, $kolomhead++, "date");
  xlsWriteLabel($tablehead, $kolomhead++, "date_diff");



	foreach ($result as $data) {
 
 $res=$this->Employee_model->get_by_id($data->other_emp_id);
 $pmode=$this->Payment_mode_model->get_by_id($data->other_mode);
            $kolombody = 0;



            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric

            xlsWriteNumber($tablebody, $kolombody++, $nourut);

	    xlsWriteNumber($tablebody, $kolombody++, $data->transaction_id);
      xlsWriteLabel($tablebody, $kolombody++, $data->emp.'-'.$data->employee_id);

	    xlsWriteLabel($tablebody, $kolombody++, $res->name);

	    xlsWriteNumber($tablebody, $kolombody++, $data->income);

	    xlsWriteNumber($tablebody, $kolombody++, $data->expense);
      xlsWriteLabel($tablebody, $kolombody++, $data->pm);
      xlsWriteLabel($tablebody, $kolombody++, $data->pmode);
      xlsWriteLabel($tablebody, $kolombody++, $data->comment);
      xlsWriteNumber($tablebody, $kolombody++, $data->payment_status);
      xlsWriteLabel($tablebody, $kolombody++, $data->reason);
      xlsWriteLabel($tablebody, $kolombody++, date('d-m-Y',strtotime($data->createdat)));
       xlsWriteLabel($tablebody, $kolombody++, date('d-m-Y',strtotime($data->date)));
        xlsWriteNumber($tablebody, $kolombody++, $data->date_diff);



	    $tablebody++;

            $nourut++;

        }



        xlsEOF();

        exit();

    }



}



/* End of file Income_register.php */

/* Location: ./application/controllers/Income_register.php */

/* Please DO NOT modify this information : */

/* Generated on Codeigniter2020-02-11 17:43:46 */

