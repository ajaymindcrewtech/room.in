<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Com_sub_category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Com_sub_category_model');
        $this->load->model('Com_category_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $com_sub = $this->Com_sub_category_model->get_all();

        $data = array(
            'com_subcategory_data' => $com_sub
        );
          
          $data['content'] = 'com_sub_category/list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Com_sub_category_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'com_cat_id' => $row->com_cat_id,
		'name' => $row->name,
		'status' => $row->status,
	    );
             $data['content'] = 'com_sub_category/read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('com_sub_category'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('com_sub_category/create_action'),
	    'id' => set_value('id'),
	    'com_cat_id' => set_value('com_cat_id'),
	    'name' => set_value('name'),
	    'status' => set_value('status'),
	);
        $data['com_category_id']=$this->Com_category_model->get_all();
        $data['content'] = 'com_sub_category/form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'com_cat_id' => $this->input->post('com_cat_id',TRUE),
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Com_sub_category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('com_sub_category'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Com_sub_category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('com_sub_category/update_action'),
		'id' => set_value('id', $row->id),
		'com_cat_id' => set_value('com_cat_id', $row->com_cat_id),
		'name' => set_value('name', $row->name),
		'status' => set_value('status', $row->status),
	    );
             $data['com_category_id']=$this->Com_category_model->get_all();
            $data['content'] = 'com_sub_category/form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('com_sub_category'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'com_cat_id' => $this->input->post('com_cat_id',TRUE),
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Com_sub_category_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('com_sub_category'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Com_sub_category_model->get_by_id($id);

        if ($row) {
            $this->Com_sub_category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('com_sub_category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('com_sub_category'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('com_cat_id', 'exp category id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "com_sub_category.xls";
        $judul = "com_sub_category";
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

	foreach ($this->Com_sub_category_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->com_cat_id);
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
       $this->Com_sub_category_model->truncate_table();

         redirect(site_url('com_sub_category'));
           

    }

}

/* End of file com_sub_category.php */
/* Location: ./application/controllers/com_sub_category.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-15 11:38:48 */
