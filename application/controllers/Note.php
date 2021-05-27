<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Note extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Note_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $note = $this->Note_model->get_all();

        $data = array(
            'note_data' => $note
        );

          $data['content'] = 'note/note_list';
        $this->load->view('common/master', $data);    
            
    }


     public function note_page($value='')
    {
        $data['noti']=$this->Note_model->get_row();
          $data['content'] = 'note';
        $this->load->view('common/master', $data); 
    }

    public function read($id) 
    {
        $row = $this->Note_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'description' => $row->description,
		'image' => $row->image,
		'status' => $row->status,
		// 'createdat' => $row->createdat,
		'note' => $row->note,
		'date' => $row->date,
	    );
             $data['content'] = 'note/note_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('note'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('note/create_action'),
	    'id' => set_value('id'),
	    'description' => set_value('description'),
	    'image' => set_value('image'),
	    'status' => set_value('status'),
	    // 'createdat' => set_value('createdat'),
	    'note' => set_value('note'),
	    'date' => set_value('date'),
	);
        $data['content'] = 'note/note_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'description' => $this->input->post('description',TRUE),
		// 'image' => $this->input->post('image',TRUE),
		'status' => $this->input->post('status',TRUE),
		// 'createdat' => $this->input->post('createdat',TRUE),
		'note' => $this->input->post('note',TRUE),
		'date' => $this->input->post('date',TRUE),
	    );
             $this->load->view('customer/slim', $data);
            $images = Slim::getImages();
            if ($images != false) {
                foreach ($images as $image) {
                    $file = Slim::saveFile_admin($image['output']['data'], $image['input']['name'], FCPATH . "uploads");
                    $data['image'] = 'uploads/' . $file['name'];
                }
            } else {
                $data['image'] = $this->input->post('image', TRUE);
            }

            $this->Note_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('note'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Note_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('note/update_action'),
		'id' => set_value('id', $row->id),
		'description' => set_value('description', $row->description),
		'image' => set_value('image', $row->image),
		'status' => set_value('status', $row->status),
		'createdat' => set_value('createdat', $row->createdat),
		'note' => set_value('note', $row->note),
		'date' => set_value('date', $row->date),
	    );
            $data['content'] = 'note/note_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('note'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'description' => $this->input->post('description',TRUE),
		// 'image' => $this->input->post('image',TRUE),
		'status' => $this->input->post('status',TRUE),
		// 'createdat' => $this->input->post('createdat',TRUE),
		'note' => $this->input->post('note',TRUE),
		'date' => $this->input->post('date',TRUE),
	    );

             $this->load->view('customer/slim', $data);
            $images = Slim::getImages();
            if ($images != false) {
                foreach ($images as $image) {
                    $file = Slim::saveFile_admin($image['output']['data'], $image['input']['name'], FCPATH . "uploads");
                    $data['image'] = 'uploads/' . $file['name'];
                }
            } else {
                $data['image'] = $this->input->post('image', TRUE);
            }

            $this->Note_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('note'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Note_model->get_by_id($id);

        if ($row) {
            $this->Note_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('note'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('note'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('description', 'description', 'trim|required');
	// $this->form_validation->set_rules('image', 'image', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	// $this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	// $this->form_validation->set_rules('note', 'note', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');

	// $this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "note.xls";
        $judul = "note";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Createdat");
	xlsWriteLabel($tablehead, $kolomhead++, "Note");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");

	foreach ($this->Note_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->createdat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->note);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Note.php */
/* Location: ./application/controllers/Note.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-04-09 13:55:12 */
