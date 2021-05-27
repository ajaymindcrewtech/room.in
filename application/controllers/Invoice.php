<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $invoice = $this->Invoice_model->get_all();

        $data = array(
            'invoice_data' => $invoice
        );

          $data['content'] = 'invoice/invoice_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Invoice_model->get_by_id($id);
        if ($row) {
            $data = array(
		'invoice_id' => $row->invoice_id,
		'customer_id' => $row->customer_id,
		'month' => $row->month,
		'amount' => $row->amount,
		'total_amount' => $row->total_amount,
		'status' => $row->status,
	    );
             $data['content'] = 'invoice/invoice_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('invoice/create_action'),
	    'invoice_id' => set_value('invoice_id'),
	    'customer_id' => set_value('customer_id'),
	    'month' => set_value('month'),
	    'amount' => set_value('amount'),
	    'total_amount' => set_value('total_amount'),
	    'status' => set_value('status'),
	);
        $data['content'] = 'invoice/invoice_form';
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
		'month' => $this->input->post('month',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'total_amount' => $this->input->post('total_amount',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Invoice_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('invoice'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Invoice_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('invoice/update_action'),
		'invoice_id' => set_value('invoice_id', $row->invoice_id),
		'customer_id' => set_value('customer_id', $row->customer_id),
		'month' => set_value('month', $row->month),
		'amount' => set_value('amount', $row->amount),
		'total_amount' => set_value('total_amount', $row->total_amount),
		'status' => set_value('status', $row->status),
	    );
            $data['content'] = 'invoice/invoice_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('invoice_id', TRUE));
        } else {
            $data = array(
		'customer_id' => $this->input->post('customer_id',TRUE),
		'month' => $this->input->post('month',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'total_amount' => $this->input->post('total_amount',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Invoice_model->update($this->input->post('invoice_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('invoice'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Invoice_model->get_by_id($id);

        if ($row) {
            $this->Invoice_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('invoice'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
	$this->form_validation->set_rules('month', 'month', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('total_amount', 'total amount', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('invoice_id', 'invoice_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "invoice.xls";
        $judul = "invoice";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Month");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Invoice_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->customer_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->month);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total_amount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Invoice.php */
/* Location: ./application/controllers/Invoice.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-11 16:38:03 */
