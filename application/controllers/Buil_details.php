<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buil_details extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Buil_details_model');
        $this->load->model('Building_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $buil_details = $this->Buil_details_model->get_all();

        $data = array(
            'buil_details_data' => $buil_details
        );

          $data['content'] = 'buil_details/buil_details_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Buil_details_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Bullding_id' => $row->Bullding_id,
		'name' => $row->name,
		'rent' => $row->rent,
		'status' => $row->status,
	    );
             $data['content'] = 'buil_details/buil_details_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buil_details'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('buil_details/create_action'),
	    'id' => set_value('id'),
	    'Bullding_id' => set_value('Bullding_id'),
	    'name' => set_value('name'),
	    'rent' => set_value('rent'),
	    'status' => set_value('status'),
	);
        $data['bullding']=$this->Building_model->get_all();
        $data['content'] = 'buil_details/buil_details_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Bullding_id' => $this->input->post('Bullding_id',TRUE),
		'name' => $this->input->post('name',TRUE),
		'rent' => $this->input->post('rent',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Buil_details_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('buil_details'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Buil_details_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('buil_details/update_action'),
		'id' => set_value('id', $row->id),
		'Bullding_id' => set_value('Bullding_id', $row->Bullding_id),
		'name' => set_value('name', $row->name),
		'rent' => set_value('rent', $row->rent),
		'status' => set_value('status', $row->status),
	    );
            $data['bullding']=$this->Building_model->get_all();
            $data['content'] = 'buil_details/buil_details_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buil_details'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Bullding_id' => $this->input->post('Bullding_id',TRUE),
		'name' => $this->input->post('name',TRUE),
		'rent' => $this->input->post('rent',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Buil_details_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('buil_details'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Buil_details_model->get_by_id($id);

        if ($row) {
            $this->Buil_details_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('buil_details'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buil_details'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Bullding_id', 'bullding id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('rent', 'rent', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "buil_details.xls";
        $judul = "buil_details";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Bullding Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Rent");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Buil_details_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Bullding_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rent);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Buil_details.php */
/* Location: ./application/controllers/Buil_details.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-06 05:49:12 */
