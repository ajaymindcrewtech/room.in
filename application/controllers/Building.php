<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Building extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Building_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $building = $this->Building_model->get_all();

        $data = array(
            'building_data' => $building
        );

          $data['content'] = 'building/building_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Building_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'address' => $row->address,
		'status' => $row->status,
	    );
             $data['content'] = 'building/building_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('building'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('building/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'address' => set_value('address'),
	    'status' => set_value('status'),
	);
        $data['content'] = 'building/building_form';
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
		'address' => $this->input->post('address',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Building_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('building'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Building_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('building/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'address' => set_value('address', $row->address),
		'status' => set_value('status', $row->status),
	    );
            $data['content'] = 'building/building_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('building'));
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
		'address' => $this->input->post('address',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Building_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('building'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Building_model->get_by_id($id);

        if ($row) {
            $this->Building_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('building'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('building'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "building.xls";
        $judul = "building";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Building_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Building.php */
/* Location: ./application/controllers/Building.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-06 05:27:19 */
