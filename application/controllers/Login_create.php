<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_create extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_create_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $login = $this->Login_create_model->get_all();
        // print_r($login);
        $data = array(
            'login_data' => $login
        );

          $data['content'] = 'login_create/login_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Login_create_model->get_by_id($id);
         if($row->type==3){
                    $log='User';
                }
                 elseif($row->type==2){
                    $log='Employee';
                }
                 elseif($row->type==1){
                    $log='Admin';
                }
                else{
                    $log=''; 
                }
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'email' => $row->email, 
		'password' => $row->password,
		// 'designation' => $row->designation,
		'type' => $log,
		'status' => $row->status,
	    );
             $data['content'] = 'login_create/login_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login_create'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('login_create/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
        'number' => set_value('number'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    // 'designation' => set_value('designation'),
	    'type' => set_value('type'),
	    'status' => set_value('status'),
	);
        $data['content'] = 'login_create/login_form';
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
        'number' => $this->input->post('number',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		// 'designation' => $this->input->post('designation',TRUE),
		'type' => $this->input->post('type',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Login_create_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('login_create'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Login_create_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('login_create/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
        'number' => set_value('name', $row->number),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		// 'designation' => set_value('designation', $row->designation),
		'type' => set_value('type', $row->type),
		'status' => set_value('status', $row->status),
	    );
            $data['content'] = 'login_create/login_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login_create'));
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
        'number' => $this->input->post('number',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		// 'designation' => $this->input->post('designation',TRUE),
		'type' => $this->input->post('type',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Login_create_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('login_create'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Login_create_model->get_by_id($id);

        if ($row) {
            $this->Login_create_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('login_create'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login_create'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	// $this->form_validation->set_rules('designation', 'designation', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-04 07:34:06 */
