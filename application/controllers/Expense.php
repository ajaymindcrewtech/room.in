<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Expense extends CI_Controller

{

    function __construct()

    {

        parent::__construct();

        $this->load->model('Expense_model');

        $this->load->library('form_validation');

    }



    public function index()

    {

        $expense = $this->Expense_model->get_all();



        $data = array(

            'expense_data' => $expense

        );



          $data['content'] = 'expense/expense_list';

        $this->load->view('common/master', $data);    

            

    }



    public function read($id) 

    {

        $row = $this->Expense_model->get_by_id($id);

        if ($row) {

            $data = array(

		'id' => $row->id,

		'date' => $row->date,

		'transaction_id' => $row->transaction_id,

		'category' => $row->category,

		'subcategory' => $row->subcategory,

		'Item_detail' => $row->Item_detail,

		'paying_employee' => $row->paying_employee,

		'amount_paid' => $row->amount_paid,

		'ref_no' => $row->ref_no,

		'payment_mode' => $row->payment_mode,

		'building_id' => $row->building_id,

		'room_id' => $row->room_id,

		'room_type' => $row->room_type,

		'sic_bill' => $row->sic_bill,

		'comment' => $row->comment,

		'vendor_bill' => $row->vendor_bill,

		'shop_name' => $row->shop_name,

		'vendor_type' => $row->vendor_type,

		'location' => $row->location,

		'mobile' => $row->mobile,

		'asset_id' => $row->asset_id,

		'model' => $row->model,

		'manufacturing_company' => $row->manufacturing_company,

		'warranty' => $row->warranty,

		'stayinclass_asset_id' => $row->stayinclass_asset_id,
		'type' => $row->type,

	    );

             $data['content'] = 'expense/expense_read';

        $this->load->view('common/master', $data);       

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('expense'));

        }

    }



    public function create() 

    {

   



        $data = array(

            'button' => 'Create',

            'action' => site_url('expense/create_action'),

	    'id' => set_value('id'),

	    'date' => set_value('date'),

	    'transaction_id' => set_value('transaction_id'),

	    'category' => set_value('category'),

	    'subcategory' => set_value('subcategory'),

	    'Item_detail' => set_value('Item_detail'),

	    'paying_employee' => set_value('paying_employee'),

	    'amount_paid' => set_value('amount_paid'),

	    'payment_mode' => set_value('payment_mode'),

	    'building_id' => set_value('building_id'),

	    'room_id' => set_value('room_id'),

	    'room_type' => set_value('room_type'),

	    'sic_bill' => set_value('sic_bill'),

	    'comment' => set_value('comment'),

	    'vendor_bill' => set_value('vendor_bill'),

	    'shop_name' => set_value('shop_name'),

	    'vendor_type' => set_value('vendor_type'),

	    'location' => set_value('location'),

	    'mobile' => set_value('mobile'),

	    'asset_id' => set_value('asset_id'),

	    'model' => set_value('model'),

	    'manufacturing_company' => set_value('manufacturing_company'),

	    'warranty' => set_value('warranty'),

	    'stayinclass_asset_id' => set_value('stayinclass_asset_id'),
	    'type' => set_value('type'),
	    'ref_no' => set_value('ref_no'),

	);  

	 $data['exep_categotry']=$this->Expense_category_model->get_all();

	 $data['exep_subcategotry']=$this->Expense_subcategory_model->get_all();

	 $data['building']=$this->Building_model->get_all();

	 $data['bed']=$this->Buil_details_model->get_all();

	  $data['pay_mode']=$this->Payment_mode_model->get_all();

	  $data['rom_type']=$this->Room_type_model->get_all();

        $data['content'] = 'expense/expense_form';

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

            $data = array(

		'date' => date('Y-m-d',strtotime($this->input->post('date',TRUE))),

		'transaction_id' => $this->input->post('transaction_id',TRUE),

		'category' => $this->input->post('category',TRUE),

		'subcategory' => $this->input->post('subcategory',TRUE),

		'Item_detail' => $this->input->post('Item_detail',TRUE),

		'paying_employee' =>$emp_id,

		'amount_paid' => $this->input->post('amount_paid',TRUE),

		'payment_mode' => $this->input->post('payment_mode',TRUE),

		'ref_no' => $this->input->post('ref_no',TRUE),

		'building_id' => $this->input->post('building_id',TRUE),

		'room_id' => $this->input->post('room_id',TRUE),

		'room_type' => $this->input->post('room_type',TRUE),

		'sic_bill' => $this->input->post('sic_bill',TRUE),

		'comment' => $this->input->post('comment',TRUE),

		'vendor_bill' => $this->input->post('vendor_bill',TRUE),

		'shop_name' => $this->input->post('shop_name',TRUE),

		'vendor_type' => $this->input->post('vendor_type',TRUE),

		'location' => $this->input->post('location',TRUE),

		'mobile' => $this->input->post('mobile',TRUE),

		'asset_id' => $this->input->post('asset_id',TRUE),

		'model' => $this->input->post('model',TRUE),

		'manufacturing_company' => $this->input->post('manufacturing_company',TRUE),

		'warranty' => $this->input->post('warranty',TRUE),

		'stayinclass_asset_id' => $this->input->post('stayinclass_asset_id',TRUE),
		'type' => $this->input->post('type',TRUE),
          'date_diff'=>$days,
	    );

           

            $id= $this->Expense_model->insert($data);

           if($id){


            $dataupdate = array('transaction_id' => $id );

           $this->Expense_model->update($id,$dataupdate);
                    

              $this->income_register($id,$data);



           	$this->session->set_flashdata('message', $msg);

            redirect(site_url('expense'));

           }

          	 

        }

    }

      public function income_register($id1,$data1)
           
           {
              if($data1['type']==2){
                    $inc=$data1['amount_paid'];
		            $exp=0;
		        }else{ 
		              $inc=0;
		            $exp=$data1['amount_paid'];
		        }

         $data = array(
                'transaction_id'=>$id1,
               'employee_id' =>$data1['paying_employee'],

          	    'income' => $inc,
          	   'expense' => $exp,

               'mode' => $data1['payment_mode'],

               'comment' => $this->input->post('comment',TRUE),
                'source'=>'Exp'

          ); 



           $this->Income_register_model->insert($data);

      }



	   public function success(){

	          

	    	$data['content'] = 'expense/succes';

	        $this->load->view('common/master', $data);  

	    }

	    

    public function update($id) 

    {

        $row = $this->Expense_model->get_by_id($id);



        if ($row) {

            $data = array(

                'button' => 'Update',

                'action' => site_url('expense/update_action'),

		'id' => set_value('id', $row->id),

		'date' => set_value('date', $row->date),

		'transaction_id' => set_value('transaction_id', $row->transaction_id),

		'category' => set_value('category', $row->category),

		'subcategory' => set_value('subcategory', $row->subcategory),

		'Item_detail' => set_value('Item_detail', $row->Item_detail),

		'paying_employee' => set_value('paying_employee', $row->paying_employee),

		'amount_paid' => set_value('amount_paid', $row->amount_paid),

		'payment_mode' => set_value('payment_mode', $row->payment_mode),

		'ref_no' => set_value('ref_no', $row->ref_no),

		'building_id' => set_value('building_id', $row->building_id),

		'room_id' => set_value('room_id', $row->room_id),

		'room_type' => set_value('room_type', $row->room_type),

		'sic_bill' => set_value('sic_bill', $row->sic_bill),

		'comment' => set_value('comment', $row->comment),

		'vendor_bill' => set_value('vendor_bill', $row->vendor_bill),

		'shop_name' => set_value('shop_name', $row->shop_name),

		'vendor_type' => set_value('vendor_type', $row->vendor_type),

		'location' => set_value('location', $row->location),

		'mobile' => set_value('mobile', $row->mobile),

		'asset_id' => set_value('asset_id', $row->asset_id),

		'model' => set_value('model', $row->model),

		'manufacturing_company' => set_value('manufacturing_company', $row->manufacturing_company),

		'warranty' => set_value('warranty', $row->warranty),

		'stayinclass_asset_id' => set_value('stayinclass_asset_id', $row->stayinclass_asset_id),

	    );  $data['exep_categotry']=$this->Expense_category_model->get_all();

	        $data['exep_subcategotry']=$this->Expense_subcategory_model->get_all();

	        $data['building']=$this->Building_model->get_all();

	        $data['bed']=$this->Buil_details_model->get_all();

	         $data['rom_type']=$this->Room_type_model->get_all();

	        $data['pay_mode']=$this->Payment_mode_model->get_all();

            $data['content'] = 'expense/expense_form';

            $this->load->view('common/master', $data);       

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('expense'));

        }

    }

    

    public function update_action() 

    {

        $this->_rules();



        if ($this->form_validation->run() == FALSE) {

            $this->update($this->input->post('id', TRUE));

        } else {

            $data = array(

		'date' => date('Y-m-d',strtotime($this->input->post('date',TRUE))),

		'transaction_id' => $this->input->post('transaction_id',TRUE),

		'category' => $this->input->post('category',TRUE),

		'subcategory' => $this->input->post('subcategory',TRUE),

		'Item_detail' => $this->input->post('Item_detail',TRUE),

		'paying_employee' => $this->input->post('paying_employee',TRUE),

		'amount_paid' => $this->input->post('amount_paid',TRUE),

		'payment_mode' => $this->input->post('payment_mode',TRUE),
		
		'ref_no' => $this->input->post('ref_no',TRUE),

		'building_id' => $this->input->post('building_id',TRUE),

		'room_id' => $this->input->post('room_id',TRUE),

		'room_type' => $this->input->post('room_type',TRUE),

		'sic_bill' => $this->input->post('sic_bill',TRUE),

		'comment' => $this->input->post('comment',TRUE),

		'vendor_bill' => $this->input->post('vendor_bill',TRUE),

		'shop_name' => $this->input->post('shop_name',TRUE),

		'vendor_type' => $this->input->post('vendor_type',TRUE),

		'location' => $this->input->post('location',TRUE),

		'mobile' => $this->input->post('mobile',TRUE),

		'asset_id' => $this->input->post('asset_id',TRUE),

		'model' => $this->input->post('model',TRUE),

		'manufacturing_company' => $this->input->post('manufacturing_company',TRUE),

		'warranty' => $this->input->post('warranty',TRUE),

		'stayinclass_asset_id' => $this->input->post('stayinclass_asset_id',TRUE),

	    );



            $this->Expense_model->update($this->input->post('id', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Record Success');

            redirect(site_url('expense'));

        }

    }

    

    public function delete() 

    {    
    	$id=$this->input->post('expense_id');
    	$reason=$this->input->post('reason');

        $row = $this->Expense_model->get_by_id($id);

        if ($row) {

        	 $data=array(
             'delete_status'=>2,
             'reason'=>$reason,
            );

            $this->Expense_model->update($id,$data);
             $this->Income_register_model->delete_expense_record($id);
            $this->session->set_flashdata('message', 'Delete Record Success');

            redirect(site_url('expense'));

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('expense'));

        }

    }



    public function _rules() 

    {

	$this->form_validation->set_rules('date', 'date', 'trim|required');

	// $this->form_validation->set_rules('transaction_id', 'transaction id', 'trim|required');

	$this->form_validation->set_rules('category', 'category', 'trim|required');

	$this->form_validation->set_rules('subcategory', 'subcategory', 'trim|required');

	$this->form_validation->set_rules('Item_detail', 'item detail', 'trim|required');

	// $this->form_validation->set_rules('paying_employee', 'paying employee', 'trim|required');

	$this->form_validation->set_rules('amount_paid', 'amount paid', 'trim|required');

	$this->form_validation->set_rules('payment_mode', 'payment mode', 'trim|required');

	$this->form_validation->set_rules('building_id', 'building id', 'trim|required');

	$this->form_validation->set_rules('room_id', 'room id', 'trim|required');

	$this->form_validation->set_rules('room_type', 'room type', 'trim|required');

	// $this->form_validation->set_rules('sic_bill', 'sic bill', 'trim|required');

	// $this->form_validation->set_rules('comment', 'comment', 'trim|required');

	// $this->form_validation->set_rules('vendor_bill', 'vendor bill', 'trim|required');

	// $this->form_validation->set_rules('shop_name', 'shop name', 'trim|required');

	// $this->form_validation->set_rules('vendor_type', 'vendor type', 'trim|required');

	// $this->form_validation->set_rules('location', 'location', 'trim|required');

	// $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');

	// $this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');

	// $this->form_validation->set_rules('model', 'model', 'trim|required');

	// $this->form_validation->set_rules('manufacturing_company', 'manufacturing company', 'trim|required');

	// $this->form_validation->set_rules('warranty', 'warranty', 'trim|required');

	// $this->form_validation->set_rules('stayinclass_asset_id', 'stayinclass asset id', 'trim|required');



	$this->form_validation->set_rules('id', 'id', 'trim');

	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }



    public function excel()

    {
    	 $data=array(
         'from'=>$this->input->post('from'),
         'to'=>$this->input->post('to')
        );
       $result= $this->Expense_model->filter($data);
       // echo '<pre>';
       //   print_r($result);die;
        $this->load->helper('exportexcel');

        $namaFile = "expense.xls";

        $judul = "expense";

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
	xlsWriteLabel($tablehead, $kolomhead++, "Transaction Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Category");
	xlsWriteLabel($tablehead, $kolomhead++, "Subcategory");
	xlsWriteLabel($tablehead, $kolomhead++, "Item Detail");
	xlsWriteLabel($tablehead, $kolomhead++, "Paying Employee");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount Paid");
	xlsWriteLabel($tablehead, $kolomhead++, "Payment Mode");
	xlsWriteLabel($tablehead, $kolomhead++, "ref_no");
	xlsWriteLabel($tablehead, $kolomhead++, "Building Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Room Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Room Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Sic Bill");
	xlsWriteLabel($tablehead, $kolomhead++, "Comment");
	xlsWriteLabel($tablehead, $kolomhead++, "Vendor Bill");
	xlsWriteLabel($tablehead, $kolomhead++, "Shop Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Vendor Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Location");
	xlsWriteLabel($tablehead, $kolomhead++, "Mobile");
	xlsWriteLabel($tablehead, $kolomhead++, "Asset Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Model");
	xlsWriteLabel($tablehead, $kolomhead++, "Manufacturing Company");
	xlsWriteLabel($tablehead, $kolomhead++, "Warranty");
	xlsWriteLabel($tablehead, $kolomhead++, "Stayinclass Asset Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Reason");
	xlsWriteLabel($tablehead, $kolomhead++, "createdat");
	xlsWriteLabel($tablehead, $kolomhead++, "date_diff");



	foreach ($result as $data) {

            $kolombody = 0;



            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric

            xlsWriteNumber($tablebody, $kolombody++, $nourut);

	    xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    xlsWriteNumber($tablebody, $kolombody++, $data->transaction_id);

	    xlsWriteLabel($tablebody, $kolombody++, $data->cat);

	    xlsWriteLabel($tablebody, $kolombody++, $data->sub);

	    xlsWriteLabel($tablebody, $kolombody++, $data->Item_detail);

	    xlsWriteLabel($tablebody, $kolombody++, $data->emp);

	    xlsWriteNumber($tablebody, $kolombody++, $data->amount_paid);

	    xlsWriteLabel($tablebody, $kolombody++, $data->pm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ref_no);

	    xlsWriteLabel($tablebody, $kolombody++, $data->bul);

	    xlsWriteLabel($tablebody, $kolombody++, $data->bd);

	    xlsWriteLabel($tablebody, $kolombody++, $data->rt);

	    xlsWriteLabel($tablebody, $kolombody++, $data->sic_bill);

	    xlsWriteLabel($tablebody, $kolombody++, $data->comment);

	    xlsWriteLabel($tablebody, $kolombody++, $data->vendor_bill);

	    xlsWriteLabel($tablebody, $kolombody++, $data->shop_name);

	    xlsWriteLabel($tablebody, $kolombody++, $data->vendor_type);

	    xlsWriteLabel($tablebody, $kolombody++, $data->location);

	    xlsWriteNumber($tablebody, $kolombody++, $data->mobile);

	    xlsWriteLabel($tablebody, $kolombody++, $data->asset_id);

	    xlsWriteLabel($tablebody, $kolombody++, $data->model);

	    xlsWriteLabel($tablebody, $kolombody++, $data->manufacturing_company);

	    xlsWriteLabel($tablebody, $kolombody++, $data->warranty);

	    xlsWriteLabel($tablebody, $kolombody++, $data->stayinclass_asset_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->reason);
	    xlsWriteLabel($tablebody, $kolombody++, $data->createdat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date_diff);



	    $tablebody++;

            $nourut++;

        }



        xlsEOF();

        exit();

    }



}



/* End of file Expense.php */

/* Location: ./application/controllers/Expense.php */

/* Please DO NOT modify this information : */

/* Generated on Codeigniter2020-02-16 12:00:47 */

