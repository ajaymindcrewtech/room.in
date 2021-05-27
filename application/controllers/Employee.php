<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $employee = $this->Employee_model->get_all();

        $data = array(
            'employee_data' => $employee
        );

          $data['content'] = 'employee/employee_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Employee_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'phone' => $row->phone,
		'email' => $row->email,
		'address' => $row->address,
        'type' => $row->type,
		'status' => $row->status,
	    );
             $data['content'] = 'employee/employee_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('employee/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'phone' => set_value('phone'),
	    'email' => set_value('email'),
	    'address' => set_value('address'),
	    'status' => set_value('status'),
        'type' => set_value('type'),
	);
        $data['content'] = 'employee/employee_form';
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
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'address' => $this->input->post('address',TRUE),
		'status' => $this->input->post('status',TRUE),
        'type' => $this->input->post('type',TRUE),
	    );

           $id= $this->Employee_model->insert($data);
             if($id){
                $this->insert_login($id,$data);
             }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employee'));
        }
    }

      public function insert_login($id,$data){
            $data = array(
          'log_id'=>$id,      
        'name' => $data['name'],
        'number' =>$data['phone'],
        'email' => $data['email'],
        'password' => md5($data['phone']),
        'type' =>$data['type'],
        'status' =>1,
        );

            $this->Login_create_model->insert($data);
        }
    
    public function update($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'phone' => set_value('phone', $row->phone),
		'email' => set_value('email', $row->email),
		'address' => set_value('address', $row->address),
        'type' => set_value('address', $row->type),
		'status' => set_value('status', $row->status),
	    );
            $data['content'] = 'employee/employee_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
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
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'address' => $this->input->post('address',TRUE),
        'type' => $this->input->post('type',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Employee_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $this->Employee_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('employee'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "employee.xls";
        $judul = "employee";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Employee_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
      public function profile($id)
    {      
        $data['res']=$this->Employee_model->get_by_id($id);
        $data['income_register_data']=$this->Income_register_model->get_all_emp_tranj($id);
        
        $data['content'] = 'employee/profile';
            $this->load->view('common/master', $data);     
    }

    public function truncate($value='')
    {  
       $this->Employee_model->truncate_table();

           redirect(site_url('employee'));
           

    }

}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-04 05:54:49 */
