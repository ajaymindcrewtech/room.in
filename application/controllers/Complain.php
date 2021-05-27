<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Complain extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Complain_model');
        $this->load->library('form_validation');
    }

    public function index()
    {  

    	// echo $this->input->post('com_status');
    	if($this->input->post('com_status') || $this->input->post('building_id')!=""){

    		// echo 'ajay';die;
    	 $fillter=array(
         'com_status'=>$this->input->post('com_status'),
         'building_id'=>$this->input->post('building_id')
        );
    	$data['complain_data']= $this->Complain_model->get_report($fillter);
    	// echo '<pre>';
    	 // print_r($data);die;
        
    	}else{
        $complain = $this->Complain_model->get_all();

        $data = array(
            'complain_data' => $complain
        );
     }
         $data['com_status'] = set_value('com_status');
         $data['building_id'] = set_value('building_id');
         $data['building']=$this->Building_model->get_all();
          $data['content'] = 'complain/complain_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Complain_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'log_id' => $row->log_id,
		'date' => $row->date,
		'building_id' => $row->building_id,
		'room_id' => $row->room_id,
		'com_category' => $row->com_category,
		'com_subcategory' => $row->com_subcategory,
		'com_status' => $row->com_status,
		'com_details' => $row->com_details,
		'asset_id' => $row->asset_id,
		'model' => $row->model,
		'bill' => $row->bill,
		'warranty' => $row->warranty,
		're_amount' => $row->re_amount,
		'image' => $row->image,
		'closure_remark' => $row->closure_remark,
		'closure_remark_by' => $row->closure_remark_by,
		'agreed_amount' => $row->agreed_amount,
		'tat' => $row->tat,
		'icr' => $row->icr,
		'closed_by' => $row->closed_by,
		'assign_vender' => $row->assign_vender,
		'pri_status' => $row->pri_status,
		'category' => $row->category,
		'vendor_name' => $row->vendor_name,
		'shop_name' => $row->shop_name,
		'mobile' => $row->mobile,
		'location' => $row->location,
		'amount' => $row->amount,
		'part_details' => $row->part_details,
		'material_cost' => $row->material_cost,
		'labour_cost' => $row->labour_cost,
		'createdat' => $row->createdat,
	    );
             $data['content'] = 'complain/complain_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('complain'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('complain/create_action'),
	    'id' => set_value('id'),
	    'log_id' => set_value('log_id'),
	    'date' => set_value('date'),
	    'building_id' => set_value('building_id'),
	    'room_id' => set_value('room_id'),
	    'com_category' => set_value('com_category'),
	    'com_subcategory' => set_value('com_subcategory'),
	    'com_status' => set_value('com_status'),
	    'com_details' => set_value('com_details'),
	    'asset_id' => set_value('asset_id'),
	    'model' => set_value('model'),
	    'bill' => set_value('bill'),
	    'warranty' => set_value('warranty'),
	    're_amount' => set_value('re_amount'),
	    'image' => set_value('image'),
	    'closure_remark' => set_value('closure_remark'),
	    'closure_remark_by' => set_value('closure_remark_by'),
	    'agreed_amount' => set_value('agreed_amount'),
	    'tat' => set_value('tat'),
	    'icr' => set_value('icr'),
	    'closed_by' => set_value('closed_by'),
	    'assign_vender' => set_value('assign_vender'),
	    'pri_status' => set_value('pri_status'),
	    'category' => set_value('category'),
	    'standard' => set_value('standard'),
	    'vendor_name' => set_value('vendor_name'),
	    'shop_name' => set_value('shop_name'),
	    'mobile' => set_value('mobile'),
	    'location' => set_value('location'),
	    'amount' => set_value('amount'),
	    'part_details' => set_value('part_details'),
	    'material_cost' => set_value('material_cost'),
	    'labour_cost' => set_value('labour_cost'),
	    'createdat' => set_value('createdat'),
	);  
        $data['building']=$this->Building_model->get_all();
        $data['bul_details']=$this->Buil_details_model->get_all();
        $data['com_cat']=$this->Com_category_model->get_all();
        $data['com_sub_cat']=$this->Com_sub_category_model->get_all();
        $data['exep_categotry']=$this->Expense_category_model->get_all();
        $data['vender_all']=$this->Vender_model->get_all();
        $data['content'] = 'complain/complain_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	$log_id=$this->session->userdata('reg_id');
        	$log_ty=$this->session->userdata('type');
            $data = array(
        'log_id'=>$log_id,   
        'log_type'=>$log_ty,	
		'date' => $this->input->post('date',TRUE),
		'building_id' => $this->input->post('building_id',TRUE),
		'room_id' => $this->input->post('room_id',TRUE),
		'com_category' => $this->input->post('com_category',TRUE),
		'com_subcategory' => $this->input->post('com_subcategory',TRUE),
		'com_status' => $this->input->post('com_status',TRUE),
		'com_details' => $this->input->post('com_details',TRUE),
		'asset_id' => $this->input->post('asset_id',TRUE),
		'model' => $this->input->post('model',TRUE),
		'bill' => $this->input->post('bill',TRUE),
		'warranty' => $this->input->post('warranty',TRUE),
		're_amount' => $this->input->post('re_amount',TRUE),
		// 'image' => $this->input->post('image',TRUE),
		'closure_remark' => $this->input->post('closure_remark',TRUE),
		'closure_remark_by' => $this->input->post('closure_remark_by',TRUE),
		'agreed_amount' => $this->input->post('agreed_amount',TRUE),
		'tat' => $this->input->post('tat',TRUE),
		'icr' => $this->input->post('icr',TRUE),
		'closed_by' => $this->input->post('closed_by',TRUE),
		'assign_vender' => $this->input->post('assign_vender',TRUE),
		'pri_status' => $this->input->post('pri_status',TRUE),
		'category' => $this->input->post('category',TRUE),
		'vendor_name' => $this->input->post('vendor_name',TRUE),
		'standard' => $this->input->post('standard',TRUE),
		'mobile' => $this->input->post('shop_name',TRUE),
		'shop_name' => $this->input->post('mobile',TRUE),
		'location' => $this->input->post('location',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'part_details' => $this->input->post('part_details',TRUE),
		'material_cost' => $this->input->post('material_cost',TRUE),
		'labour_cost' => $this->input->post('labour_cost',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
	    );
             $this->load->view('complain/slim', $data);
            $images = Slim::getImages();
            if ($images != false) {
                foreach ($images as $image) {
                    $file = Slim::saveFile_admin($image['output']['data'], $image['input']['name'], FCPATH . "uploads");
                    $data['image'] = 'uploads/' . $file['name'];
                }
            } else {
                $data['image'] = $this->input->post('image', TRUE);
            }

            $this->Complain_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('complain'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Complain_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('complain/update_action'),
		'id' => set_value('id', $row->id),
		'date' => set_value('date', $row->date),
		'building_id' => set_value('building_id', $row->building_id),
		'room_id' => set_value('room_id', $row->room_id),
		'com_category' => set_value('com_category', $row->com_category),
		'com_subcategory' => set_value('com_subcategory', $row->com_subcategory),
		'com_status' => set_value('com_status', $row->com_status),
		'com_details' => set_value('com_details', $row->com_details),
		'asset_id' => set_value('asset_id', $row->asset_id),
		'model' => set_value('model', $row->model),
		'bill' => set_value('bill', $row->bill),
		'warranty' => set_value('warranty', $row->warranty),
		're_amount' => set_value('re_amount', $row->re_amount),
		'image' => set_value('image', $row->image),
		'closure_remark' => set_value('closure_remark', $row->closure_remark),
		'closure_remark_by' => set_value('closure_remark_by', $row->closure_remark_by),
		'agreed_amount' => set_value('agreed_amount', $row->agreed_amount),
		'tat' => set_value('tat', $row->tat),
		'icr' => set_value('icr', $row->icr),
		'closed_by' => set_value('closed_by', $row->closed_by),
		'assign_vender' => set_value('assign_vender', $row->assign_vender),
		'pri_status' => set_value('pri_status', $row->pri_status),
		'category' => set_value('category', $row->category),
		'standard' => set_value('standard', $row->standard),
		'vendor_name' => set_value('vendor_name', $row->vendor_name),
		'shop_name' => set_value('shop_name', $row->shop_name),
		'mobile' => set_value('mobile', $row->mobile),
		'location' => set_value('location', $row->location),
		'amount' => set_value('amount', $row->amount),
		'part_details' => set_value('part_details', $row->part_details),
		'material_cost' => set_value('material_cost', $row->material_cost),
		'labour_cost' => set_value('labour_cost', $row->labour_cost),
		'createdat' => set_value('createdat', $row->createdat),
	    );   
            $data['building']=$this->Building_model->get_all();
        $data['bul_details']=$this->Buil_details_model->get_all();
        $data['com_cat']=$this->Com_category_model->get_all();
        $data['com_sub_cat']=$this->Com_sub_category_model->get_all();
        $data['exep_categotry']=$this->Expense_category_model->get_all();
         $data['vender_all']=$this->Vender_model->get_all();
         // echo '<pre>';
         // print_r($data['vender_all']);die;

            $data['content'] = 'complain/complain_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('complain'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
        	// $log_id=$this->session->userdata('reg_id');
        	// $log_ty=$this->session->userdata('type');
            $data = array(
        // 'log_id'=>$log_id,   
        // 'log_type'=>$log_ty,	
		'date' => $this->input->post('date',TRUE),
		'building_id' => $this->input->post('building_id',TRUE),
		'room_id' => $this->input->post('room_id',TRUE),
		'com_category' => $this->input->post('com_category',TRUE),
		'com_subcategory' => $this->input->post('com_subcategory',TRUE),
		'com_status' => $this->input->post('com_status',TRUE),
		'com_details' => $this->input->post('com_details',TRUE),
		'asset_id' => $this->input->post('asset_id',TRUE),
		'model' => $this->input->post('model',TRUE),
		'bill' => $this->input->post('bill',TRUE),
		'warranty' => $this->input->post('warranty',TRUE),
		're_amount' => $this->input->post('re_amount',TRUE),
		'image' => $this->input->post('image',TRUE),
		'closure_remark' => $this->input->post('closure_remark',TRUE),
		'closure_remark_by' => $this->input->post('closure_remark_by',TRUE),
		'agreed_amount' => $this->input->post('agreed_amount',TRUE),
		'tat' => $this->input->post('tat',TRUE),
		'icr' => $this->input->post('icr',TRUE),
		'closed_by' => $this->input->post('closed_by',TRUE),
		'assign_vender' => $this->input->post('assign_vender',TRUE),
		'pri_status' => $this->input->post('pri_status',TRUE),
		'category' => $this->input->post('category',TRUE),
		'standard' => $this->input->post('standard',TRUE),
		'vendor_name' => $this->input->post('vendor_name',TRUE),
		'shop_name' => $this->input->post('shop_name',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'location' => $this->input->post('location',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'part_details' => $this->input->post('part_details',TRUE),
		'material_cost' => $this->input->post('material_cost',TRUE),
		'labour_cost' => $this->input->post('labour_cost',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
	    );

            $this->Complain_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('complain'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Complain_model->get_by_id($id);

        if ($row) {
            $this->Complain_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('complain'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('complain'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('building_id', 'building id', 'trim|required');
	$this->form_validation->set_rules('room_id', 'room id', 'trim|required');
	$this->form_validation->set_rules('com_category', 'com category', 'trim|required');
	$this->form_validation->set_rules('com_subcategory', 'com subcategory', 'trim|required');
	$this->form_validation->set_rules('com_status', 'com status', 'trim|required');
	$this->form_validation->set_rules('com_details', 'com details', 'trim|required');
	// $this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');
	// $this->form_validation->set_rules('model', 'model', 'trim|required');
	// $this->form_validation->set_rules('bill', 'bill', 'trim|required');
	// $this->form_validation->set_rules('warranty', 'warranty', 'trim|required');
	// $this->form_validation->set_rules('image', 'image', 'trim|required');
	// $this->form_validation->set_rules('closure_remark', 'closure remark', 'trim|required');
	// $this->form_validation->set_rules('closure_remark_by', 'closure remark by', 'trim|required');
	// $this->form_validation->set_rules('agreed_amount', 'agreed amount', 'trim|required');
	// $this->form_validation->set_rules('tat', 'tat', 'trim|required');
	// $this->form_validation->set_rules('icr', 'icr', 'trim|required');
	// $this->form_validation->set_rules('closed_by', 'closed by', 'trim|required');
	// $this->form_validation->set_rules('assign_vender', 'assign vender', 'trim|required');
	// $this->form_validation->set_rules('category', 'category', 'trim|required');
	// $this->form_validation->set_rules('vendor_name', 'vendor bill', 'trim|required');
	// $this->form_validation->set_rules('shop_name', 'shop name', 'trim|required');
	// $this->form_validation->set_rules('amount', 'amount', 'trim|required');
	// $this->form_validation->set_rules('part_details', 'part details', 'trim|required');
	// $this->form_validation->set_rules('material_cost', 'material cost', 'trim|required');
	// $this->form_validation->set_rules('labour_cost', 'labour cost', 'trim|required');
	// $this->form_validation->set_rules('createdat', 'createdat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "complain.xls";
        $judul = "complain";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Building Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Room Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Com Category");
	xlsWriteLabel($tablehead, $kolomhead++, "Com Subcategory");
	xlsWriteLabel($tablehead, $kolomhead++, "Com Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Com Details");
	xlsWriteLabel($tablehead, $kolomhead++, "Asset Id");
	xlsWriteLabel($tablehead, $kolomhead++, "model");
	xlsWriteLabel($tablehead, $kolomhead++, "Bill");
	xlsWriteLabel($tablehead, $kolomhead++, "Warranty");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Closure Remark");
	xlsWriteLabel($tablehead, $kolomhead++, "Closure Remark By");
	xlsWriteLabel($tablehead, $kolomhead++, "Agreed Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Tat");
	xlsWriteLabel($tablehead, $kolomhead++, "Icr");
	xlsWriteLabel($tablehead, $kolomhead++, "Closed By");
	xlsWriteLabel($tablehead, $kolomhead++, "Assign Vender");
	xlsWriteLabel($tablehead, $kolomhead++, "Category");
	xlsWriteLabel($tablehead, $kolomhead++, "Vendor Bill");
	xlsWriteLabel($tablehead, $kolomhead++, "Shop Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Part Details");
	xlsWriteLabel($tablehead, $kolomhead++, "Material Cost");
	xlsWriteLabel($tablehead, $kolomhead++, "Labour Cost");
	xlsWriteLabel($tablehead, $kolomhead++, "Createdat");

	foreach ($this->Complain_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);
	    xlsWriteNumber($tablebody, $kolombody++, $data->building_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->room_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->com_category);
	    xlsWriteNumber($tablebody, $kolombody++, $data->com_subcategory);
	    xlsWriteNumber($tablebody, $kolombody++, $data->com_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->com_details);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asset_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->model);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bill);
	    xlsWriteLabel($tablebody, $kolombody++, $data->warranty);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->closure_remark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->closure_remark_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agreed_amount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->icr);
	    xlsWriteNumber($tablebody, $kolombody++, $data->closed_by);
	    xlsWriteNumber($tablebody, $kolombody++, $data->assign_vender);
	    xlsWriteNumber($tablebody, $kolombody++, $data->category);
	    xlsWriteLabel($tablebody, $kolombody++, $data->vendor_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->shop_name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);
	    xlsWriteLabel($tablebody, $kolombody++, $data->part_details);
	    xlsWriteNumber($tablebody, $kolombody++, $data->material_cost);
	    xlsWriteNumber($tablebody, $kolombody++, $data->labour_cost);
	    xlsWriteLabel($tablebody, $kolombody++, $data->createdat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }


     public function get_room($value='')
    {  
        $str="";
        $str2="";
       $id=$this->input->post('id'); 
       $this->db->where('Bullding_id',$id);
       $this->db->where('status',1);
       $res=$this->db->get('buil_details')->result();
      // echo $this->db->last_query();
         $str='<option>--Select--</option>';
      foreach ($res as $key => $value) {
        $str=$str.'<option value="'.$value->id.'">"'.$value->name.'"</option>';
   } 

    $data=array(
      'room'=>$str,
      // 'vender'=>$str2,
     );
   $result=json_encode($data);
   echo $result;
  }
    //for comlain sub category
     public function get_com_subcatgory($value='')
    {  
        $str="";
        $str2="";
       $id=$this->input->post('id'); 
       $this->db->where('com_cat_id',$id);
       $this->db->where('status',1);
       $res=$this->db->get('com_sub_category')->result();
      // echo $this->db->last_query();
         $str='<option>--Select--</option>';
      foreach ($res as $key => $value) {
        $str=$str.'<option value="'.$value->id.'">"'.$value->name.'"</option>';
   } 

    $data=array(
      'sub'=>$str,
      // 'vender'=>$str2,
     );
   $result=json_encode($data);
   echo $result;
  }

     public function get_vender($value='')
    {  
        $str="";
       $id=$this->input->post('id'); 
       $this->db->where('exep_category',$id);
       $this->db->where('stauts',1);
       $vender=$this->db->get('vender')->result();
      // echo $this->db->last_query();
     $str='<option>--Select--</option>';
        foreach ($vender as $key => $value) {
       $str=$str.'<option value="'.$value->id.'">"'.$value->vendor_name.'"</option>';
   } 
     $data=array(
      // 'sub'=>$str,
      'vender'=>$str,
     );
   $result=json_encode($data);
   echo $result;
  }

  public function get_vender_detials(){
     $id= $this->input->post('id');
    // $this->db->select('v.*,vt.name');
    $this->db->from('vender as v');
    // $this->db->join('vender_type as vt','vt.id=v.vendor_type');
    $this->db->where('v.id',$id);
   $res=$this->db->get()->row();

   $res= json_encode($res);
    echo $res;
  }



}

/* End of file Complain.php */
/* Location: ./application/controllers/Complain.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-04-07 08:46:19 */
