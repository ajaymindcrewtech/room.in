<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pament_mode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pament_mode_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pament_mode = $this->Pament_mode_model->get_all();

        $data = array(
            'pament_mode_data' => $pament_mode
        );

          $data['content'] = 'pament_mode/pament_mode_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Pament_mode_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'status' => $row->status,
	    );
             $data['content'] = 'pament_mode/pament_mode_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pament_mode'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pament_mode/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'status' => set_value('status'),
	);
        $data['content'] = 'pament_mode/pament_mode_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pament_mode_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pament_mode'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pament_mode_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pament_mode/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'status' => set_value('status', $row->status),
	    );
            $data['content'] = 'pament_mode/pament_mode_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pament_mode'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pament_mode_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pament_mode'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pament_mode_model->get_by_id($id);

        if ($row) {
            $this->Pament_mode_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pament_mode'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pament_mode'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pament_mode.xls";
        $judul = "pament_mode";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Pament_mode_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pament_mode.php */
/* Location: ./application/controllers/Pament_mode.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-10 12:33:28 */
