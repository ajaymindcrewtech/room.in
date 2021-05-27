<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Refund extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Refund_model');
        $this->load->model('Payment_mode_model');
        $this->load->model('Income_register_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $revenue = $this->Refund_model->get_all();

        $data = array(
            'revenue_data' => $revenue
        );
          $data['content'] = 'refund/refund_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Refund_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'building_id' => $row->building_id,
        'room_id' => $row->room_id,
		'customer_id' => $row->customer_id,
		'payment_type' => $row->payment_type,
		'amount' => $row->amount,
		'payment_mode' => $row->payment_mode,
		'date' => $row->date,
		'comment' => $row->comment,
		// 'status' => $row->status,
	    );
             $data['content'] = 'refund/refund_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('refund'));
        }
    }

    public function create() 
    {
        $ref="";
        $data = array(
            'button' => 'Create',
            'action' => site_url('refund/create_action'),
	    'id' => set_value('id'),
	    'building_id' => set_value('building_id'),
        'room_id' => set_value('room_id'),
	    'customer_id' => set_value('customer_id'),
	    'payment_type' => set_value('payment_type'),
	    'amount' => set_value('amount'),
        'rent' => set_value('rent'),
	    'payment_mode' => set_value('payment_mode'),
	    'date' => set_value('date'),
	    'comment' => set_value('comment'),
	    'ref' => set_value($ref),
	);
         $data['building']=$this->Building_model->get_all();
         $data['details']=$this->Buil_details_model->get_all();
         $data['cus']=$this->Customer_model->get_all();
         $data['payment_m']=$this->Payment_mode_model->get_all();
          // echo '<pre>';
          // print_r($data['payment_mode']);die;   
        $data['content'] = 'refund/refund_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $emp_id=$this->session->userdata('reg_id');
            // echo $emp_id;die;
            $data = array(
            'emp_id'=>$emp_id,  
		'building_id' => $this->input->post('building_id',TRUE),
        'room_id' => $this->input->post('room_id',TRUE),
		'customer_id' => $this->input->post('customer_id',TRUE),
		'payment_type' => $this->input->post('payment_type',TRUE),
		'amount' => $this->input->post('amount',TRUE),
        'rent' => $this->input->post('rent',TRUE),
		'payment_mode' => $this->input->post('payment_mode',TRUE),
		'date' => date('Y-m-d h:i:s',strtotime($this->input->post('date',TRUE))),
		'comment' => $this->input->post('comment',TRUE),
		// 'status' => $this->input->post('status',TRUE),
	    );

           $id=$this->Refund_model->insert($data);
            $dataupdate = array('transaction_id' => $trid );
            $this->Refund_model->update($id,$dataupdate);
            $this->income_register($id,$data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('refund'));
        }
    }

      public function income_register($id1,$data1){
        $data = array(
          'transaction_id'=>$id1,
          'customer_id'=>$data1['customer_id'],
          'employee_id' => $data1['emp_id'],
          'income' =>0,
          'expense' => $data1['amount'],
          'mode'=>$data1['payment_mode'],
          'source'=>'Re'
        );

            $this->Income_register_model->insert($data);
            
        } 

   

    
    public function update($id) 
    {
        $ref= $this->uri->segment(4);
        if($ref){
            $url='refund/refund_action';
            $btn="Refund";
            $re=$ref;
        }
        else{
            $url='refund/update_action';
             $btn="Update";
             $re="";
        }
        $row = $this->Refund_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => $btn,
                'action' => site_url($url),
		'id' => set_value('id', $row->id),
		'building_id' => set_value('building_id', $row->building_id),
        'room_id' => set_value('room_id', $row->room_id),
		'customer_id' => set_value('customer_id', $row->customer_id),
		'payment_type' => set_value('payment_type', $row->payment_type),
		'amount' => set_value('amount', $row->amount),
        'rent' => set_value('rent', $row->rent),
		'payment_mode' => set_value('payment_mode', $row->payment_mode),
		'date' => set_value('date', $row->date),
		'comment' => set_value('comment', $row->comment),
		'ref' => set_value('ref', $re),
	    );
            print_r($data['date']);
            $data['building']=$this->Building_model->get_all();
            $data['details']=$this->Buil_details_model->get_all();
         $data['cus']=$this->Customer_model->get_all();
        $data['payment_m']=$this->Payment_mode_model->get_all();
            // echo '<pre>';   
            // print_r($data['customer']);
            $data['content'] = 'refund/refund_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('refund'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $emp_id=$this->session->userdata('reg_id');
            $data = array(
        'emp_id'=>$emp_id,
		'building_id' => $this->input->post('building_id',TRUE),
        'room_id' => $this->input->post('room_id',TRUE),
		'customer_id' => $this->input->post('customer_id',TRUE),
		'payment_type' => $this->input->post('payment_type',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'payment_mode' => $this->input->post('payment_mode',TRUE),
		'date' => date('Y-m-d h:i:s',strtotime($this->input->post('date',TRUE))),
		'comment' => $this->input->post('comment',TRUE),
		// 'status' => $this->input->post('status',TRUE),
	    );

            $this->Refund_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('refund'));
        }
    }


    //  public function Refund_action() 
    // {
       
    //         $emp_id=$this->session->userdata('reg_id');
    //         $data = array(
    //     'emp_id'=>$emp_id,
    //     'building_id' => $this->input->post('building_id',TRUE),
    //     'room_id' => $this->input->post('room_id',TRUE),
    //     'customer_id' => $this->input->post('customer_id',TRUE),
    //     'payment_type' => $this->input->post('payment_type',TRUE),
    //     'amount' => $this->input->post('amount',TRUE),
    //     'payment_mode' => $this->input->post('payment_mode',TRUE),
    //     'date' => date('Y-m-d h:i:s',strtotime($this->input->post('date',TRUE))),
    //     'comment' => $this->input->post('comment',TRUE),
    //     // 'status' => $this->input->post('status',TRUE),
    //     );
             
    //         $this->Refund_model->refund_insert($data);
    //         $this->refund_create($data);
    //         $this->session->set_flashdata('message', 'Refund Record Success');
    //         redirect(site_url('refund'));
    
    // }




    
    public function delete($id) 
    {    
         $id=$this->input->post('refund_id');
        $reason=$this->input->post('reason');
        $row = $this->Refund_model->get_by_id($id);

        if ($row) {
           $data=array(
             'delete_status'=>2,
             'reason'=>$reason,
            );
            $this->Refund_model->update($id,$data);
            $this->Income_register_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('refund'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('refund'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('building_id', 'building id', 'trim|required');
	// $this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
	// $this->form_validation->set_rules('payment_type', 'payment type', 'trim|required');
	// $this->form_validation->set_rules('amount', 'amount', 'trim|required');
	// $this->form_validation->set_rules('payment_mode', 'payment mode', 'trim|required');
	// $this->form_validation->set_rules('date', 'date', 'trim|required');
	// $this->form_validation->set_rules('comment', 'comment', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "refund.xls";
        $judul = "refund";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Building Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Customer Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Payment Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Payment Mode");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Comment");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Refund_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->building_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->customer_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->payment_type);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->payment_mode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->comment);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file refund.php */
/* Location: ./application/controllers/Revenue.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-10 05:43:32 */
