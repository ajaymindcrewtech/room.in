<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Income_register extends CI_Controller

{

    function __construct()

    {

        parent::__construct();

        $this->load->model('Income_register_model');

        $this->load->library('form_validation');

    }



    public function index()

    {

        $income_register = $this->Income_register_model->get_all();



        $data = array(

            'income_register_data' => $income_register

        );



          $data['content'] = 'income_register/income_register_list';

        $this->load->view('common/master', $data);    

            

    }



    public function read($id) 

    {

        $row = $this->Income_register_model->get_by_id($id);

        if ($row) {

            $data = array(

		'register_id' => $row->register_id,

		'customer_id' => $row->customer_id,

		'employee_id' => $row->employee_id,

		'income' => $row->income,

		'expense' => $row->expense,

	    );

             $data['content'] = 'income_register/income_register_read';

        $this->load->view('common/master', $data);       

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('income_register'));

        }

    }



    public function create() 

    {

        $keyowrd= $this->uri->segment(3);

         if($keyowrd){

            $key=$keyowrd;

         }else{

            $key="";

         }



        $data = array(

            'button' => 'Create',

            'action' => site_url('income_register/create_action'),

	    'register_id' => set_value('register_id'),

	    'customer_id' => set_value('customer_id'),

        'other_emp_id' => set_value('other_emp_id'),

	    'employee_id' => set_value('employee_id'),

	    'income' => set_value('income'),

	    'expense' => set_value('expense'),

        'comment' => set_value('comment'),

        'mode' => set_value('mode'),

        'other_mode' => set_value('other_mode'),

        'key_value'=>$key

	);

        $data['payment_mode']=$this->Payment_mode_model->get_all();

         $data['employee']=$this->Employee_model->get_all();

        $data['content'] = 'income_register/income_register_form';

        $this->load->view('common/master', $data);       

    }

    

    public function create_action() 

    {

        $this->_rules();



        if ($this->form_validation->run() == FALSE) {

            $this->create();

        } else {

             

             $emp_id= $this->session->userdata('reg_id');

            $data = array(

               'employee_id' =>$emp_id,

          	   'expense' => $this->input->post('expense',TRUE),

               'mode' => $this->input->post('mode',TRUE),

               'other_emp_id' =>$this->input->post('other_emp_id'),

          	   'other_mode' => $this->input->post('other_mode',TRUE),

               'comment' => $this->input->post('comment',TRUE),

               'payment_status'=>1,

           );    
                 
                if($this->input->post('other_emp_id')){

                    $this->other_emp_id($data);

                  }


                $this->Income_register_model->insert($data);

                $this->session->set_flashdata('message', 'Create Record Success');

                redirect(site_url('income_register'));

        }

    }



              public function other_emp_id($data){

                   $data = array(

                 

                  'employee_id' =>$data['other_emp_id'],

                  'other_emp_id'=>$data['employee_id'],

                  'income' => $data['expense'],

                  'comment' => $data['comment'],

                  'mode' => $data['other_mode'],

                  'other_mode' => $data['mode'],

                  );



                      $this->Income_register_model->insert($data);

              }

    

  //   public function update($id) 

  //   {

  //       $row = $this->Income_register_model->get_by_id($id);



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



  //           $this->Income_register_model->update($this->input->post('register_id', TRUE), $data);

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



   //          $this->Income_register_model->update($id,$data1);

   //   }

    

    // public function delete($id) 

    // {

    //     $row = $this->Income_register_model->get_by_id($id);



    //     if ($row) {

    //         $this->Income_register_model->delete($id);

    //         $this->session->set_flashdata('message', 'Delete Record Success');

    //         redirect(site_url('income_register'));

    //     } else {

    //         $this->session->set_flashdata('message', 'Record Not Found');

    //         redirect(site_url('income_register'));

    //     }

    // }



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

	xlsWriteLabel($tablehead, $kolomhead++, "Customer Id");

	xlsWriteLabel($tablehead, $kolomhead++, "Employee Id");

	xlsWriteLabel($tablehead, $kolomhead++, "Income");

	xlsWriteLabel($tablehead, $kolomhead++, "Expense");



	foreach ($this->Income_register_model->get_all() as $data) {

            $kolombody = 0;



            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric

            xlsWriteNumber($tablebody, $kolombody++, $nourut);

	    xlsWriteNumber($tablebody, $kolombody++, $data->customer_id);

	    xlsWriteNumber($tablebody, $kolombody++, $data->employee_id);

	    xlsWriteNumber($tablebody, $kolombody++, $data->income);

	    xlsWriteNumber($tablebody, $kolombody++, $data->expense);



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

