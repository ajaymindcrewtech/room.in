<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice_install extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_install_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $invoice_install = $this->Invoice_install_model->get_all();

        $data = array(
            'invoice_install_data' => $invoice_install
        );

          $data['content'] = 'invoice_install/invoice_install_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Invoice_install_model->get_by_id($id);
        if ($row) {
            $data = array(
		'invoice_instaill_id' => $row->invoice_instaill_id,
		'invoice_id' => $row->invoice_id,
		'amount' => $row->amount,
	    );
             $data['content'] = 'invoice_install/invoice_install_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice_install'));
        }
    }

    public function create($id) 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('invoice_install/create_action'),
	    'invoice_instaill_id' => set_value('invoice_instaill_id'),
	    'invoice_id' => set_value('invoice_id',$id),
	    'amount' => set_value('amount'),
	);
        $data['content'] = 'invoice_install/invoice_install_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'invoice_id' => $this->input->post('invoice_id',TRUE),
		'amount' => $this->input->post('amount',TRUE),
	    );

            $this->Invoice_install_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('invoice_install'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Invoice_install_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('invoice_install/update_action'),
		'invoice_instaill_id' => set_value('invoice_instaill_id', $row->invoice_instaill_id),
		'invoice_id' => set_value('invoice_id', $row->invoice_id),
		'amount' => set_value('amount', $row->amount),
	    );
            $data['content'] = 'invoice_install/invoice_install_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice_install'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('invoice_instaill_id', TRUE));
        } else {
            $data = array(
		'invoice_id' => $this->input->post('invoice_id',TRUE),
		'amount' => $this->input->post('amount',TRUE),
	    );

            $this->Invoice_install_model->update($this->input->post('invoice_instaill_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('invoice_install'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Invoice_install_model->get_by_id($id);

        if ($row) {
            $this->Invoice_install_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('invoice_install'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice_install'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('invoice_id', 'invoice id', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');

	$this->form_validation->set_rules('invoice_instaill_id', 'invoice_instaill_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "invoice_install.xls";
        $judul = "invoice_install";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Invoice Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");

	foreach ($this->Invoice_install_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->invoice_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Invoice_install.php */
/* Location: ./application/controllers/Invoice_install.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-11 16:58:06 */
