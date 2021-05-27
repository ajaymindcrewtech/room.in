<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Revenue extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Revenue_model');
        $this->load->model('Payment_mode_model');
        $this->load->model('Income_register_model');
        $this->load->model('Allotment_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $revenue = $this->Revenue_model->get_all();

        $data = array(
            'revenue_data' => $revenue
        );
          $data['content'] = 'revenue/revenue_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Revenue_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
        'emp_id' => $row->emp_id,
		'building_id' => $row->building_id,
        'room_id' => $row->room_id,
		'customer_id' => $row->customer_id,
	    'amount' => $row->amount,
        'ref_no' => $row->ref_no,
		'payment_mode' => $row->payment_mode,
		'date' => $row->date,
		'comment' => $row->comment,
		'type' => $row->type,
	    );
             $data['content'] = 'revenue/revenue_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('revenue'));
        }
    }

    public function create() 
    {
        $ref="";
        $data = array(
            'button' => 'Create',
            'action' => site_url('revenue/create_action'),
	    'id' => set_value('id'),
	    'building_id' => set_value('building_id'),
        'room_id' => set_value('room_id'),
	    'customer_id' => set_value('customer_id'),
	    'room_type' => set_value('room_type'),
	    'amount' => set_value('amount'),
        'rent' => set_value('rent'),
	    'payment_mode' => set_value('payment_mode'),
        'ref_no' => set_value('ref_no'),
	    'date' => set_value('date'),
	    'comment' => set_value('comment'),
	    'ref' => set_value($ref),
        'type' => set_value('type'),
	);
         $data['building']=$this->Building_model->get_all();
         $data['details']=$this->Buil_details_model->get_all();
          $data['room_typ']=$this->Room_type_model->get_all();
          $data['cus']=$this->Allotment_model->get_all();
         // $data['cus']=$this->Customer_model->get_all();
         $data['payment_m']=$this->Payment_mode_model->get_all();
          // echo '<pre>';
          // print_r($data['payment_mode']);die;   
        $data['content'] = 'revenue/revenue_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $emp_id=$this->session->userdata('reg_id');
           
           $today=date_create(date('d-m-Y'));
           $enter_date=date_create($this->input->post('date',TRUE));
           $diff=date_diff($today,$enter_date);
            $days=$diff->format("%a");
           // print_r($days);die;
            $data = array(
            'emp_id'=>$emp_id,  
		'building_id' => $this->input->post('building_id',TRUE),
        'room_id' => $this->input->post('room_id',TRUE),
		'customer_id' => $this->input->post('customer_id',TRUE),
		'room_type' => $this->input->post('room_type',TRUE),
		'amount' => $this->input->post('amount',TRUE),
        'rent' => $this->input->post('rent',TRUE),
		'payment_mode' => $this->input->post('payment_mode',TRUE),
        'ref_no' => $this->input->post('ref_no',TRUE),
		'date' => date('Y-m-d h:i:s',strtotime($this->input->post('date',TRUE))),
		'comment' => $this->input->post('comment',TRUE),
		'type' => $this->input->post('type',TRUE),
        'date_diff'=>$days,
	    );

           $id=$this->Revenue_model->insert($data);
               if($id){

                 // $trid=rand(10,100).$id;
            $dataupdate = array('transaction_id' => $id );
           $this->Revenue_model->update($id,$dataupdate);
            // $msg="Your transaction id is:".$trid;

            $this->income_register($id,$data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('revenue'));
        }
     }
    }

    public function income_register($id1,$data1){
        if($data1['type']==2){
            $inc=0;
            $exp=$data1['amount'];
        }else{ 
              $inc=$data1['amount'];
            $exp=0;
        }
        $data = array(
        'transaction_id'=>$id1,
        'customer_id'=>$data1['customer_id'],
        'employee_id' => $data1['emp_id'],
        'income' =>$inc,
        'expense' =>$exp,
        'mode'=>$data1['payment_mode'],
        'source'=>'Rev'
        );

            $this->Income_register_model->insert($data);
            
        } 

    
    public function update($id) 
    {
        $ref= $this->uri->segment(4);
        if($ref){
            $url='revenue/refund_action';
            $btn="Refund";
            $re=$ref;
        }
        else{
            $url='revenue/update_action';
             $btn="Update";
             $re="";
        }
        $row = $this->Revenue_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => $btn,
                'action' => site_url($url),
		'id' => set_value('id', $row->id),
		'building_id' => set_value('building_id', $row->building_id),
        'room_id' => set_value('room_id', $row->room_id),
		'customer_id' => set_value('customer_id', $row->customer_id),
		'room_type' => set_value('room_type', $row->payment_type),
		'amount' => set_value('amount', $row->amount),
        'rent' => set_value('rent', $row->rent),
		'payment_mode' => set_value('payment_mode', $row->payment_mode),
        'ref_no' => set_value('ref_no', $row->ref_no),
		'date' => set_value('date', $row->date),
		'comment' => set_value('comment', $row->comment),
		'ref' => set_value('ref', $re),
        'type' => set_value('type',$row->type),
	    );
            print_r($data['date']);
            $data['building']=$this->Building_model->get_all();
            $data['details']=$this->Buil_details_model->get_all();
         $data['cus']=$this->Customer_model->get_all();
         $data['room_typ']=$this->Room_type_model->get_all();
        $data['payment_m']=$this->Payment_mode_model->get_all();
            // echo '<pre>';   
            // print_r($data['customer']);
            $data['content'] = 'revenue/revenue_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('revenue'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $emp_id=$this->session->userdata('reg_id');
            $data = array(
        'emp_id'=>$emp_id,
		'building_id' => $this->input->post('building_id',TRUE),
        'room_id' => $this->input->post('room_id',TRUE),
		'customer_id' => $this->input->post('customer_id',TRUE),
		'room_type' => $this->input->post('room_type',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'payment_mode' => $this->input->post('payment_mode',TRUE),
        'ref_no' => $this->input->post('ref_no',TRUE),
		'date' => date('Y-m-d h:i:s',strtotime($this->input->post('date',TRUE))),
		'comment' => $this->input->post('comment',TRUE),
		'type' => $this->input->post('type',TRUE),
	    );

            $this->Revenue_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('revenue'));
        }
    }   



 


    
    public function delete() 
    {   
        $id=$this->input->post('revenue_id');
        $reason=$this->input->post('reason');

        $row = $this->Revenue_model->get_by_id($id);

        if ($row) {
            $data=array(
             'delete_status'=>2,
             'reason'=>$reason,
            );
            $this->Revenue_model->update($id,$data);
            $this->Income_register_model->delete_revenue_record($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('revenue'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('revenue'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('building_id', 'building id', 'trim|required');
	$this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('payment_mode', 'payment mode', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	// $this->form_validation->set_rules('comment', 'comment', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {   
        $data=array(
         'from'=>$this->input->post('from'),
         'to'=>$this->input->post('to')
        );
       $result= $this->Revenue_model->filter($data);
    // echo '<pre>';
    // print_r($result);die;
        $this->load->helper('exportexcel');
        $namaFile = "revenue.xls";
        $judul = "revenue";
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
	xlsWriteLabel($tablehead, $kolomhead++, "transaction_id ");
	xlsWriteLabel($tablehead, $kolomhead++, "emp_id");
	xlsWriteLabel($tablehead, $kolomhead++, "building_id ");
	xlsWriteLabel($tablehead, $kolomhead++, "room_id");
	xlsWriteLabel($tablehead, $kolomhead++, "customer_id ");
	xlsWriteLabel($tablehead, $kolomhead++, "rent");
	xlsWriteLabel($tablehead, $kolomhead++, "room_type");
	xlsWriteLabel($tablehead, $kolomhead++, "amount");
    xlsWriteLabel($tablehead, $kolomhead++, "payment_mode");
    xlsWriteLabel($tablehead, $kolomhead++, "ref_no");
    xlsWriteLabel($tablehead, $kolomhead++, "date");
    xlsWriteLabel($tablehead, $kolomhead++, "comment");
    xlsWriteLabel($tablehead, $kolomhead++, "createdat");
    xlsWriteLabel($tablehead, $kolomhead++, "date_diff");

	foreach ($result as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->transaction_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->emp.'-'.$data->emp_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cust.'-'.$data->customer_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->rent);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rt);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);
        xlsWriteLabel($tablebody, $kolombody++, $data->pm);
        xlsWriteNumber($tablebody, $kolombody++, $data->ref_no);
        xlsWriteLabel($tablebody, $kolombody++, date('d-m-Y',strtotime($data->date)));
        xlsWriteLabel($tablebody, $kolombody++, $data->comment);
        xlsWriteLabel($tablebody, $kolombody++, date('d-m-Y',strtotime($data->createdat)));
        xlsWriteNumber($tablebody, $kolombody++, $data->date_diff);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }


      public function get_building_cus($value='')
    {
       $id= $this->input->post('id'); 
    $this->db->select('cus.name,allot.customer_id');
    $this->db->from('allotment as allot');
    $this->db->join('customer as cus','cus.id=allot.customer_id');
     $this->db->where('allot.building_id',$id);
     $this->db->where('allot.status',1);
    
     $res= $this->db->get()->result();
          // echo  $this->db->last_query();
       $str="";
        $str="<option value=''>--Select--</option>";
    foreach ($res as $key => $value) {
       $str =$str.'<option value="'.$value->customer_id.'">'.$value->name.'-'.$value->customer_id.'</option>'; 
      
   } 
   echo $str; 
           
    }

   public function get_alloted_rooms(){ 
    $id= $this->input->post('id');
    $this->db->select('allot.rent,bd.name,bd.id');
    $this->db->from('allotment as allot');
    $this->db->join('buil_details as bd','bd.id=allot.room_id');
     $this->db->where('allot.customer_id',$id);
      $this->db->where('allot.status',1);
   
     $res= $this->db->get()->row();
    
     $val= json_encode($res);
     echo $val;
   }


}

/* End of file Revenue.php */
/* Location: ./application/controllers/Revenue.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-10 05:43:32 */
