<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allotment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Allotment_model');
        $this->load->model('Invoice_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $allotment = $this->Allotment_model->get_all();

        $data = array(
            'allotment_data' => $allotment
        );

          $data['content'] = 'allotment/allotment_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Allotment_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'customer_id' => $row->customer_id,
		'employee_id' => $row->employee_id,
		'building_id' => $row->building_id,
		'room_id' => $row->room_id,
		'rent' => $row->rent,
		'from_date' => $row->from_date,
		'to_date' => $row->to_date,
		'status' => $row->status,
	    );
             $data['content'] = 'allotment/allotment_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('allotment'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('allotment/create_action'),
	    'id' => set_value('id'),
	    'customer_id' => set_value('customer_id'),
	    'employee_id' => set_value('employee_id'),
	    'building_id' => set_value('building_id'),
	    'room_id' => set_value('room_id'),
	    'rent' => set_value('rent'),
      'amount' => set_value('amount'),
	    'from_date' => set_value('from_date'),
	    'to_date' => set_value('to_date'),
	    'status' => set_value('status'),
	);
        $data['customer']=$this->Customer_model->get_all();
        $data['employee']=$this->Employee_model->get_all();
        $data['building']=$this->Building_model->get_all();
        $data['details']=$this->Buil_details_model->get_all();
        $data['content'] = 'allotment/allotment_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
           $emp_id= $this->session->userdata('reg_id');
            $data = array(
		'customer_id' => $this->input->post('customer_id',TRUE),
		'employee_id' => $emp_id,
		'building_id' => $this->input->post('building_id',TRUE),
		'room_id' => $this->input->post('room_id',TRUE),
    'amount' => $this->input->post('amount',TRUE),
		'rent' => $this->input->post('rent',TRUE),
		'from_date' =>date('Y-m-d',strtotime($this->input->post('from_date',TRUE))),
		'to_date' => date('Y-m-d',strtotime($this->input->post('to_date',TRUE))),
		'status' => $this->input->post('status',TRUE),
	    );

           $id= $this->Allotment_model->insert($data);
            if($id){
                $cus_status=array(
                    'booking_status'=>2,
                    // 'status'=>3,
                );
                $this->Customer_model->update($this->input->post('customer_id'),$cus_status);

                $bed_status=array(
                    'booking_status'=>2
                );
                $this->Buil_details_model->update($this->input->post('room_id',TRUE),$bed_status);
                $this->Create_invoice($id,$data);
            }


            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('allotment'));

        }
    }

    public function Create_invoice($id,$data){
       $data1 = array(
        'customer_id' => $data['customer_id'],
        'month' => date('m-Y'),
        'amount' => $data['rent'],
        'total_amount' => $data['rent'],
        'status' =>0,
        );

            $this->Invoice_model->insert($data1);
            
        }
    
    
    public function update($id) 
    {
        $row = $this->Allotment_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('allotment/update_action'),
		'id' => set_value('id', $row->id),
		'customer_id' => set_value('customer_id', $row->customer_id),
		'employee_id' => set_value('employee_id', $row->employee_id),
		'building_id' => set_value('building_id', $row->building_id),
		'room_id' => set_value('room_id', $row->room_id),
		'rent' => set_value('rent', $row->rent),
    'amount' => set_value('amount', $row->amount),
		'from_date' => set_value('from_date', $row->from_date),
		'to_date' => set_value('to_date', $row->to_date),
		'status' => set_value('status', $row->status),
	    );

            $data['customer']=$this->Customer_model->get_all();
            $data['employee']=$this->Employee_model->get_all();
            $data['building']=$this->Building_model->get_all();
            $data['details']=$this->Buil_details_model->get_all();
            $data['content'] = 'allotment/allotment_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('allotment'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
             $emp_id= $this->session->userdata('reg_id');
            $data = array(
		'customer_id' => $this->input->post('customer_id',TRUE),
		'employee_id' =>$emp_id,
		'building_id' => $this->input->post('building_id',TRUE),
		'room_id' => $this->input->post('room_id',TRUE),
		'rent' => $this->input->post('rent',TRUE),
    'amount' => $this->input->post('amount',TRUE),
		'from_date' =>date('Y-m-d',strtotime($this->input->post('from_date',TRUE))),
        'to_date' => date('Y-m-d',strtotime($this->input->post('to_date',TRUE))),
		'status' => $this->input->post('status',TRUE),
	    );
            //  echo '<pre>';
            // print_r($data);die;
            $this->Allotment_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('allotment'));
        }
    }

    public function checkout($id){
      $row=$this->Allotment_model->get_by_id($id);

       if ($row) {
            $data['status']=2;
            $room['booking_status']=1;
            $customer=array(
            'booking_status'=>0,
            'status'=>2,
            );
            
            $this->Allotment_model->update_room_booking_status($row->room_id,$room);
            $this->Allotment_model->update_customer_booking_status($row->customer_id,$customer);
            $this->Allotment_model->update($id,$data);
            $this->session->set_flashdata('message', 'Inactive Record Success');
            redirect(site_url('allotment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('allotment'));
        }

    }
    
    public function delete($id) 
    {
        $row = $this->Allotment_model->get_by_id($id);

        if ($row) {
            $this->Allotment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('allotment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('allotment'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
	// $this->form_validation->set_rules('employee_id', 'employee id', 'trim|required');
	$this->form_validation->set_rules('building_id', 'building id', 'trim|required');
	// $this->form_validation->set_rules('room_id', 'room id', 'trim|required');
	$this->form_validation->set_rules('rent', 'rent', 'trim|required');
	$this->form_validation->set_rules('from_date', 'from date', 'trim|required');
	$this->form_validation->set_rules('to_date', 'to date', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
       $data=array(
         'from'=>$this->input->post('from'),
         'to'=>$this->input->post('to')
        );
       $result= $this->Allotment_model->filter($data);
        $this->load->helper('exportexcel');
        $namaFile = "allotment.xls";
        $judul = "allotment";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Customer Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Employee Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Building Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Room Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Rent");
	xlsWriteLabel($tablehead, $kolomhead++, "From Date");
	xlsWriteLabel($tablehead, $kolomhead++, "To Date");
	// xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($result as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	   xlsWriteLabel($tablebody, $kolombody++, $data->cust.'-'.$data->customer_id);
	     xlsWriteLabel($tablebody, $kolombody++, $data->emp.'-'.$data->emp_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bul);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rent);
	    xlsWriteLabel($tablebody, $kolombody++, $data->from_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->to_date);
	    // xlsWriteNumber($tablebody, $kolombody++, $data->status);

      


	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

 // ************** for allotment code start *************  
    public function get_room($value='')
    {
       $id=$this->input->post('id');
       $this->db->where('Bullding_id',$id);
       // $this->db->where('status',1);
       $this->db->where('booking_status',1);
      $res=$this->db->get('buil_details')->result();
      // echo $this->db->last_query();
   
      $str="";
        $str="<option value=''>--Select--</option>";
      foreach ($res as $key => $value) {

        $str=$str.'<option value="'.$value->id.'">"'.$value->name.'"</option>';
    } 
    echo $str; 
  }

     public function get_room_price($value='')
    {
       $id=$this->input->post('id');
       $this->db->where('id',$id);
       $res=$this->db->get('buil_details')->row();
       echo $res->rent;
  }
   // ************** for expense code start *************  
  
    public function get_expensecategory($value='')
    {  
        $str="";
        $str2="";
       $id=$this->input->post('id');
       $this->db->where('exp_category_id',$id);
       $this->db->where('status',1);
       $res=$this->db->get('expense_subcategory')->result();
      // echo $this->db->last_query();
         $str='<option>--Select--</option>';
      foreach ($res as $key => $value) {
        $str=$str.'<option value="'.$value->id.'">"'.$value->name.'"</option>';
   } 
     
       $this->db->where('exep_category',$id);
       $this->db->where('stauts',1);
       $vender=$this->db->get('vender')->result(); 
        $str2='<option>--Select--</option>';
        foreach ($vender as $key => $value) {
       $str2=$str2.'<option value="'.$value->id.'">"'.$value->vendor_name.'"</option>';
   } 
     $data=array(
      'sub'=>$str,
      'vender'=>$str2,
     );
   $result=json_encode($data);
   echo $result;
  }

  public function get_vender_detials(){
     $id= $this->input->post('id');
    $this->db->select('v.*,vt.name');
    $this->db->from('vender as v');
    $this->db->join('vender_type as vt','vt.id=v.vendor_type');
    $this->db->where('v.id',$id);
   $res=$this->db->get()->row();

   $res= json_encode($res);
    echo $res;
  }

}

/* End of file Allotment.php */
/* Location: ./application/controllers/Allotment.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-07 09:39:38 */
