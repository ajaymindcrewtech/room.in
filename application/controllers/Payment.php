<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Customer_model');
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $payment = $this->Payment_model->get_all();

        $data = array(
            'payment_data' => $payment
        );

          $data['content'] = 'payment/payment_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Payment_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'customer_id' => $row->customer_id,
		'emp_id' => $row->emp_id,
		'payment' => $row->payment,
		'date' => $row->date,
		'status' => $row->status,
	    );
             $data['content'] = 'payment/payment_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('payment/create_action'),
	    'id' => set_value('id'),
	    'customer_id' => set_value('customer_id'),
	    'emp_id' => set_value('emp_id'),
	    'payment' => set_value('payment'),
	    'date' => set_value('date'),
	    'status' => set_value('status'),
	);
        $data['customer']=$this->Customer_model->get_all();
        $data['emp']=$this->Employee_model->get_all();
        $data['content'] = 'payment/payment_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'customer_id' => $this->input->post('customer_id',TRUE),
		'emp_id' => $this->input->post('emp_id',TRUE),
		'payment' => $this->input->post('payment',TRUE),
		'date' => date('Y-m-d',strtotime($this->input->post('date',TRUE))),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Payment_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('payment'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Payment_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('payment/update_action'),
		'id' => set_value('id', $row->id),
		'customer_id' => set_value('customer_id', $row->customer_id),
		'emp_id' => set_value('emp_id', $row->emp_id),
		'payment' => set_value('payment', $row->payment),
		'date' => set_value('date', $row->date),
		'status' => set_value('status', $row->status),
	    );
             $data['customer']=$this->Customer_model->get_all();
          $data['emp']=$this->Employee_model->get_all();
            $data['content'] = 'payment/payment_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'customer_id' => $this->input->post('customer_id',TRUE),
		'emp_id' => $this->input->post('emp_id',TRUE),
		'payment' => $this->input->post('payment',TRUE),
		'date' => date('Y-m-d',strtotime($this->input->post('date',TRUE))),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Payment_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('payment'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Payment_model->get_by_id($id);

        if ($row) {
            $this->Payment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('payment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
	$this->form_validation->set_rules('emp_id', 'emp id', 'trim|required');
	$this->form_validation->set_rules('payment', 'payment', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "payment.xls";
        $judul = "payment";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Emp Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Payment");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Payment_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->customer_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->emp_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->payment);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Payment.php */
/* Location: ./application/controllers/Payment.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-05 06:38:10 */
