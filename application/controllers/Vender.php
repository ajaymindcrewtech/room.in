 <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vender extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vender_model');
        $this->load->model('Vender_type_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $vender = $this->Vender_model->get_all();

        $data = array(
            'vender_data' => $vender
        );

          $data['content'] = 'vender/vender_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Vender_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'vendor_name' => $row->vendor_name,
		'vendor_type' => $row->vendor_type,
		'vdor_business' => $row->vdor_business,
		'building_id' => $row->building_id,
		'date_of_onboarding' => $row->date_of_onboarding,
		'date_of_leaving' => $row->date_of_leaving,
		'refrence_name' => $row->refrence_name,
		'mobile' => $row->mobile,
		'mobile2' => $row->mobile2,
		'landline' => $row->landline,
		'shop_address' => $row->shop_address,
		'gst' => $row->gst,
		'stauts' => $row->stauts,
		'createdat' => $row->createdat,
		'exep_category' => $row->exep_category,
	    );
             $data['content'] = 'vender/vender_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vender'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('vender/create_action'),
	    'id' => set_value('id'),
	    'vendor_name' => set_value('vendor_name'),
	    'vendor_type' => set_value('vendor_type'),
	    'vdor_business' => set_value('vdor_business'),
	    'building_id' => set_value('building_id'),
	    'date_of_onboarding' => set_value('date_of_onboarding'),
	    'date_of_leaving' => set_value('date_of_leaving'),
	    'refrence_name' => set_value('refrence_name'),
	    'mobile' => set_value('mobile'),
	    'mobile2' => set_value('mobile2'),
	    'landline' => set_value('landline'),
	    'shop_address' => set_value('shop_address'),
	    'gst' => set_value('gst'),
	    'stauts' => set_value('stauts'),
	    'createdat' => set_value('createdat'),
	    'exep_category' => set_value('exep_category'),
	    'exep_subcategory' => set_value('exep_subcategory'),
	);   
        $data['vender_type']=$this->Vender_type_model->get_all();
        $data['category']=$this->Expense_category_model->get_all();
        $data['exep_subcategory']=$this->Expense_subcategory_model->get_all();
        $data['building_id']=$this->Building_model->get_all();
        $data['content'] = 'vender/vender_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'exep_category' => $this->input->post('exep_category',TRUE),
		'vendor_name' => $this->input->post('vendor_name',TRUE),
		'vendor_type' => $this->input->post('vendor_type',TRUE),
		'vdor_business' => $this->input->post('vdor_business',TRUE),
		'building_id' => $this->input->post('building_id',TRUE),
		'date_of_onboarding' =>date('Y-m-d',strtotime($this->input->post('date_of_onboarding',TRUE))) ,
		'date_of_leaving' =>date('Y-m-d',strtotime($this->input->post('date_of_leaving',TRUE))),
		'refrence_name' => $this->input->post('refrence_name',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'mobile2' => $this->input->post('mobile2',TRUE),
		'landline' => $this->input->post('landline',TRUE),
		'shop_address' => $this->input->post('shop_address',TRUE),
		'gst' => $this->input->post('gst',TRUE),
		'stauts' => $this->input->post('stauts',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
	    );

            $id=$this->Vender_model->insert($data);
              if($id){
                $this->insert_login($id,$data);
              }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('vender'));
        }
    }

       public function insert_login($id,$data){
        $data = array(
        'log_id'=>$id,      
        'name' => $data['vendor_name'],
        'number' =>$data['mobile'],
        // 'email' => $data['email'],
        'password' => md5($data['mobile']),
        'type' =>5,
        'status' =>1,
        );

            $this->Login_create_model->insert($data);
        }
    
    public function update($id) 
    {
        $row = $this->Vender_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('vender/update_action'),
		'id' => set_value('id', $row->id),
		'vendor_name' => set_value('vendor_name', $row->vendor_name),
		'vendor_type' => set_value('vendor_type', $row->vendor_type),
		'vdor_business' => set_value('vdor_business', $row->vdor_business),
		'building_id' => set_value('building_id', $row->building_id),
		'date_of_onboarding' => set_value('date_of_onboarding', $row->date_of_onboarding),
		'date_of_leaving' => set_value('date_of_leaving', $row->date_of_leaving),
		'refrence_name' => set_value('refrence_name', $row->refrence_name),
		'mobile' => set_value('mobile', $row->mobile),
		'mobile2' => set_value('mobile2', $row->mobile2),
		'landline' => set_value('landline', $row->landline),
		'shop_address' => set_value('shop_address', $row->shop_address),
		'gst' => set_value('gst', $row->gst),
		'stauts' => set_value('stauts', $row->stauts),
		'createdat' => set_value('createdat', $row->createdat),
		'exep_category' => set_value('exe_category', $row->exep_category),
		);
            $data['vender_type']=$this->Vender_type_model->get_all();
            $data['category']=$this->Expense_category_model->get_all();
            $data['exep_subcategory']=$this->Expense_subcategory_model->get_all();
             $data['building_id']=$this->Building_model->get_all();
            $data['content'] = 'vender/vender_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vender'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'exep_category' => $this->input->post('exep_category',TRUE),
		'vendor_name' => $this->input->post('vendor_name',TRUE),
		'vendor_type' => $this->input->post('vendor_type',TRUE),
		'vdor_business' => $this->input->post('vdor_business',TRUE),
		'building_id' => $this->input->post('building_id',TRUE),
		'date_of_onboarding' =>date('Y-m-d',strtotime($this->input->post('date_of_onboarding',TRUE))) ,
		'date_of_leaving' =>date('Y-m-d',strtotime($this->input->post('date_of_leaving',TRUE))),
		'refrence_name' => $this->input->post('refrence_name',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'mobile2' => $this->input->post('mobile2',TRUE),
		'landline' => $this->input->post('landline',TRUE),
		'shop_address' => $this->input->post('shop_address',TRUE),
		'gst' => $this->input->post('gst',TRUE),
		'stauts' => $this->input->post('stauts',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
	    );

            $this->Vender_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('vender'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Vender_model->get_by_id($id);

        if ($row) {
            $this->Vender_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('vender'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vender'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('vendor_name', 'vendor name', 'trim|required');
	// $this->form_validation->set_rules('vendor_type', 'vendor type', 'trim|required');
	// $this->form_validation->set_rules('vdor_business', 'vdor business', 'trim|required');
	// $this->form_validation->set_rules('building_id', 'building id', 'trim|required');
	// $this->form_validation->set_rules('date_of_onboarding', 'date of onboarding', 'trim|required');
	// $this->form_validation->set_rules('date_of_leaving', 'date of leaving', 'trim|required');
	// $this->form_validation->set_rules('refrence_name', 'refrence name', 'trim|required');
	// $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	// $this->form_validation->set_rules('mobile2', 'mobile2', 'trim|required');
	// $this->form_validation->set_rules('landline', 'landline', 'trim|required');
	// $this->form_validation->set_rules('shop_address', 'shop address', 'trim|required');
	// $this->form_validation->set_rules('gst', 'gst', 'trim|required');
	$this->form_validation->set_rules('stauts', 'stauts', 'trim|required');
	// $this->form_validation->set_rules('createdat', 'createdat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "vender.xls";
        $judul = "vender";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Vendor Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Vendor Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Vdor Business");
	xlsWriteLabel($tablehead, $kolomhead++, "Building Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Date Of Onboarding");
	xlsWriteLabel($tablehead, $kolomhead++, "Date Of Leaving");
	xlsWriteLabel($tablehead, $kolomhead++, "Refrence Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Mobile");
	xlsWriteLabel($tablehead, $kolomhead++, "Mobile2");
	xlsWriteLabel($tablehead, $kolomhead++, "Landline");
	xlsWriteLabel($tablehead, $kolomhead++, "Shop Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Gst");
	xlsWriteLabel($tablehead, $kolomhead++, "Stauts");
	xlsWriteLabel($tablehead, $kolomhead++, "Createdat");

	foreach ($this->Vender_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->vendor_name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->vendor_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->vdor_business);
	    xlsWriteNumber($tablebody, $kolombody++, $data->building_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date_of_onboarding);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date_of_leaving);
	    xlsWriteLabel($tablebody, $kolombody++, $data->refrence_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mobile);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mobile2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->landline);
	    xlsWriteLabel($tablebody, $kolombody++, $data->shop_address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->gst);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stauts);
	    xlsWriteLabel($tablebody, $kolombody++, $data->createdat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }


     public function truncate($value='')
    {  
       $this->Vender_model->truncate_table();

         redirect(site_url('vender'));
           

    }

}

/* End of file Vender.php */
/* Location: ./application/controllers/Vender.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-15 09:12:53 */
