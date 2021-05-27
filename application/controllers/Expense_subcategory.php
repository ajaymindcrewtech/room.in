<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expense_subcategory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Expense_subcategory_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $expense_subcategory = $this->Expense_subcategory_model->get_all();

        $data = array(
            'expense_subcategory_data' => $expense_subcategory
        );
          
          $data['content'] = 'expense_subcategory/expense_subcategory_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Expense_subcategory_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'exp_category_id' => $row->exp_category_id,
		'name' => $row->name,
		'status' => $row->status,
	    );
             $data['content'] = 'expense_subcategory/expense_subcategory_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expense_subcategory'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('expense_subcategory/create_action'),
	    'id' => set_value('id'),
	    'exp_category_id' => set_value('exp_category_id'),
	    'name' => set_value('name'),
	    'status' => set_value('status'),
	);
        $data['ex_cat_id']=$this->Expense_category_model->get_all();
        $data['content'] = 'expense_subcategory/expense_subcategory_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'exp_category_id' => $this->input->post('exp_category_id',TRUE),
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Expense_subcategory_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('expense_subcategory'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Expense_subcategory_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('expense_subcategory/update_action'),
		'id' => set_value('id', $row->id),
		'exp_category_id' => set_value('exp_category_id', $row->exp_category_id),
		'name' => set_value('name', $row->name),
		'status' => set_value('status', $row->status),
	    );
             $data['ex_cat_id']=$this->Expense_category_model->get_all();
            $data['content'] = 'expense_subcategory/expense_subcategory_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expense_subcategory'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'exp_category_id' => $this->input->post('exp_category_id',TRUE),
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Expense_subcategory_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('expense_subcategory'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Expense_subcategory_model->get_by_id($id);

        if ($row) {
            $this->Expense_subcategory_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('expense_subcategory'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expense_subcategory'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('exp_category_id', 'exp category id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "expense_subcategory.xls";
        $judul = "expense_subcategory";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Exp Category Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Expense_subcategory_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->exp_category_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

     public function truncate($value='')
    {  
       $this->Expense_subcategory_model->truncate_table();

         redirect(site_url('expense_subcategory'));
           

    }

}

/* End of file Expense_subcategory.php */
/* Location: ./application/controllers/Expense_subcategory.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-15 11:38:48 */
