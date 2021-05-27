<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $customer = $this->Customer_model->get_all();

        $data = array(
            'customer_data' => $customer
        );

          $data['content'] = 'customer/customer_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'email' => $row->email,
		'pri_mobile' => $row->pri_mobile,
		'whatsup_no' => $row->whatsup_no,
		'sec_mobile' => $row->sec_mobile,
		'dob' => $row->dob,
		'address' => $row->address,
		'aadharcard_no' => $row->aadharcard_no,
		'image' => $row->image,
		'status' => $row->status,
	    );
             $data['content'] = 'customer/customer_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customer/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'email' => set_value('email'),
	    'pri_mobile' => set_value('pri_mobile'),
	    'whatsup_no' => set_value('whatsup_no'),
	    'sec_mobile' => set_value('sec_mobile'),
	    'dob' => set_value('dob'),
	    'address' => set_value('address'),
	    'aadharcard_no' => set_value('aadharcard_no'),
	    'image' => set_value('image'),
        'status' => set_value('status'),
	);
        $data['content'] = 'customer/customer_form';
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
		'email' => $this->input->post('email',TRUE),
		'pri_mobile' => $this->input->post('pri_mobile',TRUE),
		'whatsup_no' => $this->input->post('whatsup_no',TRUE),
		'sec_mobile' => $this->input->post('sec_mobile',TRUE),
		'dob' => date('Y-m-d',strtotime($this->input->post('dob',TRUE))),
		'address' => $this->input->post('address',TRUE),
		'aadharcard_no' => $this->input->post('aadharcard_no',TRUE),
		'status' => $this->input->post('status',TRUE),
        'booking_status'=>1
	    );
            // echo '<pre>';
            // print_r($data);
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
            // echo '<pre>';
            // print_r($data);die;
           $id= $this->Customer_model->insert($data);
             if($id){
                $this->insert_login($id,$data);
             }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customer'));
        }
    }
        
        public function insert_login($id,$data){
            $data = array(
          'log_id'=>$id,      
        'name' => $data['name'],
        'number' =>$data['pri_mobile'],
        'email' => $data['email'],
        'password' => md5($data['pri_mobile']),
        // 'designation' => $this->input->post('designation',TRUE),
        'type' =>3,
        'status' =>1,
        );

            $this->Login_create_model->insert($data);
        }

    public function update($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'email' => set_value('email', $row->email),
		'pri_mobile' => set_value('pri_mobile', $row->pri_mobile),
		'whatsup_no' => set_value('whatsup_no', $row->whatsup_no),
		'sec_mobile' => set_value('sec_mobile', $row->sec_mobile),
		'dob' => set_value('dob', $row->dob),
		'address' => set_value('address', $row->address),
		'aadharcard_no' => set_value('aadharcard_no', $row->aadharcard_no),
		'image' => set_value('image', $row->image),
      	'status' => set_value('status', $row->status),
        
	    );
            $data['content'] = 'customer/customer_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if($this->input->post('status',TRUE)==1){
                $booking_status=1; 
            }else{
                $booking_status=0;
            }
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'email' => $this->input->post('email',TRUE),
		'pri_mobile' => $this->input->post('pri_mobile',TRUE),
		'whatsup_no' => $this->input->post('whatsup_no',TRUE),
		'sec_mobile' => $this->input->post('sec_mobile',TRUE),
		'dob' => date('Y-m-d',strtotime($this->input->post('dob',TRUE))),
		'address' => $this->input->post('address',TRUE),
		'aadharcard_no' => $this->input->post('aadharcard_no',TRUE),
		'image' => $this->input->post('image',TRUE),
        'status' => $this->input->post('status',TRUE),
        'booking_status' => $booking_status,
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

            $this->Customer_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|valid_email|required');
	$this->form_validation->set_rules('pri_mobile', 'pri mobile', 'trim|required');
	$this->form_validation->set_rules('whatsup_no', 'whatsup no', 'trim|required');
	$this->form_validation->set_rules('dob', 'dob', 'trim|required');
	// $this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('aadharcard_no', 'aadharcard no', 'trim|required');
	// $this->form_validation->set_rules('image', 'image', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');

	// $this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "customer.xls";
        $judul = "customer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Pri Mobile");
	xlsWriteLabel($tablehead, $kolomhead++, "Whatsup No");
	xlsWriteLabel($tablehead, $kolomhead++, "Sec Mobile");
	xlsWriteLabel($tablehead, $kolomhead++, "Dob");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Aadharcard No");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Customer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pri_mobile);
	    xlsWriteLabel($tablebody, $kolombody++, $data->whatsup_no);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sec_mobile);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dob);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->aadharcard_no);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function profile($id)
    {
        $data['res']=$this->Customer_model->get_by_id($id);
        $data['content'] = 'customer/profile';
            $this->load->view('common/master', $data);     
    }

     public function truncate($value='')
    {  
       $this->Customer_model->truncate_table();

         redirect(site_url('customer'));
           

    }

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-06 06:46:17 */
