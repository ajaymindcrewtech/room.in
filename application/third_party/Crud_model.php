<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {  
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	//CREATE COMPANY
	function create_company() {
	
        $company_code            = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['company_code']    = $company_code;
        $data['cname']    		 = $this->input->post('cname');
		$data['ccode']    		 = $this->input->post('ccode');
		$data['loginInstructions']    		 = $this->input->post('loginInstructions');
		$data['date']    		 = strtotime(date("Y-m-d H:i:s"));
		$data['status']			 = $this->input->post('status');
		if($_FILES['logo']['name'] != '')
		$data['logo']			 = $company_code . '.jpg';
		else
		$data['logo']			 ='';
        $this->db->insert('company',$data);
		if($_FILES['logo']['name'] != '')
		 move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/company_image/' . $company_code . '.jpg');
        return $company_code;
		 
    }
	//EDIT COMPANY legal_edit
	function edit_company($company_code = '') {
        $company_id = $this->db->get_where('company', array('company_code' => $company_code))->row()->company_id;
       
        $data['cname']    		 = $this->input->post('cname');
		$data['ccode']    		 = $this->input->post('ccode');
		$data['loginInstructions']    		 = $this->input->post('loginInstructions');
		$data['status']			 = $this->input->post('status');
		if($_FILES['logo']['name'] != '')
		$data['logo']			 = $company_code . '.jpg';
        $this->db->where('company_id', $company_id);
        $this->db->update('company', $data);
		if($_FILES['logo']['name'] != '')
		 move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/company_image/' . $company_code . '.jpg');
         return true;
    }
	function legal_edit_company($company_code = '') {
        $company_id = $this->db->get_where('company', array('company_code' => $company_code))->row()->company_id;
        $data['signatory_name']    		 = $this->input->post('signatory_name');
		$data['signatory_father']    		 = $this->input->post('signatory_father');
		$data['signatory_designation']    		 = $this->input->post('signatory_designation');
		$data['address']    	 = $this->input->post('address');
		$data['state']    	 	 = $this->input->post('state');
		$data['city']    		 = $this->input->post('city');
		$data['zipcode']    	 = $this->input->post('zipcode');
		$data['email']    		 = $this->input->post('email');
		$data['pan_no']    		 = $this->input->post('pan_no');
		$data['gst_no']    		 = $this->input->post('gst_no');
		$data['ggist_no']    		 = $this->input->post('ggist_no');
		$data['bank_name']    		 = $this->input->post('bank_name');
		$data['bank_account_no']    		 = $this->input->post('bank_account_no');
		$data['bank_ifsc']    		 = $this->input->post('bank_ifsc');
		$data['bank_branch']    		 = $this->input->post('bank_branch');
		$data['bank_corporateID']    		 = $this->input->post('bank_corporateID');
        $this->db->where('company_id', $company_id);
        $this->db->update('company', $data);
         return true;
    }
	function info_edit_company($company_code = '') {
        $company_id = $this->db->get_where('company', array('company_code' => $company_code))->row()->company_id;
        $data['company_type']    		 = $this->input->post('company_type');
		$data['company_regDate']    		 = strtotime($this->input->post('company_regDate'));
		$data['company_identino']    		 = $this->input->post('company_identino');
        $this->db->where('company_id', $company_id);
        $this->db->update('company', $data);
         return true;
    }
	function it_edit_company($company_code = '') {
        $company_id = $this->db->get_where('company', array('company_code' => $company_code))->row()->company_id;
        $data['tan_no']    		 = $this->input->post('tan_no');
		$data['tan_circleno']    		 = $this->input->post('tan_circleno');
		$data['citlocation']    		 = $this->input->post('citlocation');
        $this->db->where('company_id', $company_id);
        $this->db->update('company', $data);
         return true;
    }
	function pf_edit_company($company_code = '') {
        $company_id = $this->db->get_where('company', array('company_code' => $company_code))->row()->company_id;
        $data['pf_no']    		 = $this->input->post('pf_no');
		$data['pf_regDate']    		 = strtotime($this->input->post('pf_regDate'));
        $this->db->where('company_id', $company_id);
        $this->db->update('company', $data);
         return true;
    }
	function esi_edit_company($company_code = '') {
        $company_id = $this->db->get_where('company', array('company_code' => $company_code))->row()->company_id;
        $data['esi_no']    		 = $this->input->post('esi_no');
		$data['esi_regDate']    		 = strtotime($this->input->post('esi_regDate'));
        $this->db->where('company_id', $company_id);
        $this->db->update('company', $data);
         return true;
    }
	function pt_edit_company($company_code = '') {
        $company_id = $this->db->get_where('company', array('company_code' => $company_code))->row()->company_id;
        $data['pt_certificate_no']    = $this->input->post('pt_certificate_no');
		$data['pt_regDate']    = strtotime($this->input->post('pt_regDate'));
        $this->db->where('company_id', $company_id);
        $this->db->update('company', $data);
         return true;
    }
	// DELETE COMPANY
	function delete_company($company_code = '') {
        $company_id = $this->db->get_where('company',array('company_code'=>$company_code))->row()->company_id;
       
        $this->db->where('company_id',$company_id);
        $this->db->delete('company');
    }


	//CREATE CLIENT
	function create_client() {
	
        $client_code            = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['client_code']    = $client_code;
        $data['client_name']    = $this->input->post('client_name');
		$data['client_ccode']    = $this->input->post('client_ccode');
		$data['client_address']    = $this->input->post('client_address');
		$data['client_zipcode']    = $this->input->post('client_zipcode');
		$data['client_contactperson']    = $this->input->post('client_contactperson');
		$data['client_contactpersonemail']    = $this->input->post('client_contactpersonemail');
		$data['client_contactpersonphone']    = $this->input->post('client_contactpersonphone');
		//$data['client_nolim']    = $this->input->post('client_nolim');
		$data['client_lslab1']    = $this->input->post('client_lslab1');
		$data['client_lslab2']    = $this->input->post('client_lslab2');
		$data['client_lslab3']    = $this->input->post('client_lslab3');
		$data['client_lslab4']    = $this->input->post('client_lslab4');
		$data['client_laj']    = $this->input->post('client_laj');
		$data['client_lcf']    = $this->input->post('client_lcf');
		$data['client_llapse']    = $this->input->post('client_llapse');
		$data['client_mc']    = $this->input->post('client_mc');
		$data['client_weekend']= $this->input->post('client_weekend');
		$data['client_company']= $this->input->post('client_company');
		$data['client_status']= 1;
        $this->db->insert('client',$data);
        return true;
		 
    }
	//EDIT CLIENT
	function edit_client($client_code = '') {
        $client_id = $this->db->get_where('client', array('client_code' => $client_code))->row()->client_id;
       
        $data['client_name']    = $this->input->post('client_name');
		$data['client_ccode']    = $this->input->post('client_ccode');
		$data['client_address']    = $this->input->post('client_address');
		$data['client_zipcode']    = $this->input->post('client_zipcode');
		$data['client_contactperson']    = $this->input->post('client_contactperson');
		$data['client_contactpersonemail']    = $this->input->post('client_contactpersonemail');
		$data['client_contactpersonphone']    = $this->input->post('client_contactpersonphone');
		//$data['client_nolim']    = $this->input->post('client_nolim');
		$data['client_lslab1']    = $this->input->post('client_lslab1');
		$data['client_lslab2']    = $this->input->post('client_lslab2');
		$data['client_lslab3']    = $this->input->post('client_lslab3');
		$data['client_lslab4']    = $this->input->post('client_lslab4');
		$data['client_laj']    = $this->input->post('client_laj');
		$data['client_lcf']    = $this->input->post('client_lcf');
		$data['client_llapse']    = $this->input->post('client_llapse');
		$data['client_mc']    = $this->input->post('client_mc');
		$data['client_weekend']= $this->input->post('client_weekend');
		$data['client_company']= $this->input->post('client_company');
        $this->db->where('client_id', $client_id);
        $this->db->update('client', $data);
		
         return true;
    }
	// DELETE CLIENT
	function delete_client($client_code = '') {
        $client_id = $this->db->get_where('client',array('client_code'=>$client_code))->row()->client_id;
       
        $this->db->where('client_id',$client_id);
        $this->db->delete('client');
    }
//TEMPLATE
function create_template() {
	
        
        $data['tem_name']    = $this->input->post('tem_name');
		$data['tem_desc']    = $this->input->post('tem_desc');
		
		$data['tem_status']=  $this->input->post('tem_status');
        $this->db->insert('template',$data);
        return true;
		 
    }
	
	
	function edit_template($tem_id = '') {
        //$pt_id = $this->db->get_where('pt', array('pt_code' => $pt_code))->row()->pt_id;
       
         $data['tem_name']    = $this->input->post('tem_name');
		$data['tem_desc']    = $this->input->post('tem_desc');
		
		$data['tem_status']=  $this->input->post('tem_status');
		
        $this->db->where('tem_id', $tem_id);
        $this->db->update('template', $data);
		
         return true;
    }
	
	
	function delete_template($tem_id = '') {
       
       
        $this->db->where('tem_id',$tem_id);
        $this->db->delete('template');
    }

		
			//CREATE PT
function create_pt() {
	
        
        $data['pt_state']    = $this->input->post('pt_state');
		$data['pt_city']    = $this->input->post('pt_city');
		$data['pt_from']    = $this->input->post('pt_from');
		$data['pt_to']    = $this->input->post('pt_to');
		$data['pt_value']    = $this->input->post('pt_value');
		$data['pt_status']= 1;
        $this->db->insert('pt',$data);
        return true;
		 
    }
	//EDIT PT
	function edit_pt($pt_id = '') {
        //$pt_id = $this->db->get_where('pt', array('pt_code' => $pt_code))->row()->pt_id;
       
        $data['pt_state']    = $this->input->post('pt_state');
		$data['pt_city']    = $this->input->post('pt_city');
		$data['pt_from']    = $this->input->post('pt_from');
		$data['pt_to']    = $this->input->post('pt_to');
		$data['pt_value']    = $this->input->post('pt_value');
		
        $this->db->where('pt_id', $pt_id);
        $this->db->update('pt', $data);
		
         return true;
    }
	// DELETE PT
	function delete_pt($pt_id = '') {
        //$pt_id = $this->db->get_where('pt',array('pt_code'=>$pt_code))->row()->pt_id;
       
        $this->db->where('pt_id',$pt_id);
        $this->db->delete('pt');
    }

	
			//CREATE LWF
function create_lwf() {
	
        
        $data['lwf_state']    = $this->input->post('lwf_state');
		$data['lwf_city']    = $this->input->post('lwf_city');
		$data['lwf_period']    = $this->input->post('lwf_period');
		$data['lwf_emp_value']    = $this->input->post('lwf_emp_value');
		$data['lwf_client_value']    = $this->input->post('lwf_client_value');
		$data['lwf_submission']    = $this->input->post('lwf_submission');
		$data['lwf_status']= 1;
        $this->db->insert('lwf',$data);
        return true;
		 
    }
	//EDIT LWF
	function edit_lwf($lwf_id = '') {
        //$lwf_id = $this->db->get_where('lwf', array('lwf_code' => $lwf_code))->row()->lwf_id;
       
        $data['lwf_state']    = $this->input->post('lwf_state');
		$data['lwf_city']    = $this->input->post('lwf_city');
		$data['lwf_period']    = $this->input->post('lwf_period');
		$data['lwf_emp_value']    = $this->input->post('lwf_emp_value');
		$data['lwf_client_value']    = $this->input->post('lwf_client_value');
		$data['lwf_submission']    = $this->input->post('lwf_submission');
		
        $this->db->where('lwf_id', $lwf_id);
        $this->db->update('lwf', $data);
		
         return true;
    }
	// DELETE LWF
	function delete_lwf($lwf_id = '') {
        //$lwf_id = $this->db->get_where('lwf',array('lwf_code'=>$lwf_code))->row()->lwf_id;
       
        $this->db->where('lwf_id',$lwf_id);
        $this->db->delete('lwf');
    }

	

    //CREATE DEPARTMENT
    function create_department() {
        $department_code            = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['department_code']    = $department_code;
        $data['name']               = $this->input->post('name');
        $this->db->insert('department',$data);
        $department_id              = $this->db->insert_id();
        $designation                = $this->input->post('designation');
        
        foreach ($designation as $designation):
            if($designation != ""):
            $data2['department_id'] = $department_id;
            $data2['name']          = $designation;
            $this->db->insert('designation',$data2);
        endif;
        endforeach;
    }
    
    //EDIT DEPARTMENT//
    function edit_department($department_code = '') {
        $department_id = $this->db->get_where('department', array('department_code' => $department_code))->row()->department_id;
        
        $data['name'] = $this->input->post('name');
        
        $this->db->where('department_id', $department_id);
        $this->db->update('department', $data);
        
        // UPDATE EXISTING DESIGNATIONS
        $designations = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
        foreach ($designations as $row):
           $data2['name'] = $this->input->post('designation_' . $row['designation_id']);
           $this->db->where('designation_id',  $row['designation_id']);
           $this->db->update('designation', $data2);
        endforeach;
        
        // CREATE NEW DESIGNATIONS
        $designations = $this->input->post('designation');
        
        foreach($designations as $designation)
            if($designation != ""):
                $data3['department_id'] = $department_id;
                $data3['name']          = $designation;
                $this->db->insert('designation', $data3);
            endif;
    }
    
    //DELETE DEPARTMENT
    function delete_department($department_code = '') {
        $department_id = $this->db->get_where('department',array('department_code'=>$department_code))->row()->department_id;
        $this->db->where('department_id',$department_id);
        $this->db->delete('designation');
        $this->db->where('department_id',$department_id);
        $this->db->delete('department');
    }
	
	    //CREATE HOLIDAY
    function create_holiday() {
        $holiday_code            = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['holiday_code']    = $holiday_code;
        $data['date']            = strtotime($this->input->post('date'));
		$data['occassion']       = $this->input->post('occassion');
        $this->db->insert('holiday',$data);
        return true;
    }
    
    //EDIT HOLIDAY//
    function edit_holiday($holiday_code = '') {
        $holiday_id = $this->db->get_where('holiday', array('holiday_code' => $holiday_code))->row()->holiday_id;
        
        $data['date']            = strtotime($this->input->post('date'));
		$data['occassion']       = $this->input->post('occassion');
        
        $this->db->where('holiday_id', $holiday_id);
        $this->db->update('holiday', $data);
        
        
    }
    
    //DELETE HOLIDAY
    function delete_holiday($holiday_code = '') {
        $holiday_id = $this->db->get_where('holiday',array('holiday_code'=>$holiday_code))->row()->holiday_id;
       
        $this->db->where('holiday_id',$holiday_id);
        $this->db->delete('holiday');
    }
    //CREATE EMPLOYEE//
  

    function create_employee() {
               $document_id = '';
                //bank
                $data['name']                   = $this->input->post('bank_name');
                $data['branch']                 = $this->input->post('branch');
                $data['account_holder_name']    = $this->input->post('account_holder_name');
                $data['account_number']         = $this->input->post('account_number');
                $data['ifsc_code']         		= $this->input->post('ifsc_code');
				
                $this->db->insert('bank',$data);
                $bank_id = $this->db->insert_id();

                //document
                if($_FILES['resume']['name'] != ''||$_FILES['offer_letter']['name'] != ''||$_FILES['joining_letter']['name'] != ''||$_FILES['contract_agreement']['name'] != ''||$_FILES['others']['name'] != ''){
                    if($_FILES['resume']['name'] != '')
                        $data3['resume']            = $this->input->post('user_code') . '_' . $_FILES['resume']['name'];
                    if($_FILES['offer_letter']['name'] != '')
                        $data3['offer_letter']            = $this->input->post('user_code') . '_' . $_FILES['offer_letter']['name'];
                    if($_FILES['joining_letter']['name'] != '')
                        $data3['joining_letter']            = $this->input->post('user_code') . '_' . $_FILES['joining_letter']['name'];
                    if($_FILES['contract_agreement']['name'] != '')
                        $data3['contract_agreement']            = $this->input->post('user_code') . '_' . $_FILES['contract_agreement']['name'];
                    if($_FILES['others']['name'] != '')
                        $data3['others']            = $this->input->post('user_code') . '_' . $_FILES['others']['name'];
                    
                    $this->db->insert('document',$data3);
                    $document_id = $this->db->insert_id();
                    
                    if($_FILES['resume']['name'] != '')
                        move_uploaded_file($_FILES['resume']['tmp_name'], 'uploads/document/resume/' . $data3['resume']);
                    if($_FILES['offer_letter']['name'] != '')
                        move_uploaded_file($_FILES['offer_letter']['tmp_name'], 'uploads/document/offer_letter/' . $data3['offer_letter']);
                    if($_FILES['joining_letter']['name'] != '')
                        move_uploaded_file($_FILES['joining_letter']['tmp_name'], 'uploads/document/joining_letter/' . $data3['joining_letter']);
                    if($_FILES['contract_agreement']['name'] != '')
                        move_uploaded_file($_FILES['contract_agreement']['tmp_name'], 'uploads/document/contract_agreement/' . $data3['contract_agreement']);
                    if($_FILES['others']['name'] != '')
                        move_uploaded_file($_FILES['others']['tmp_name'], 'uploads/document/others/' . $data3['others']);
                }
                
                //user
                $data2['name']                  = $this->input->post('name');
                $data2['father_name']           = $this->input->post('father_name');
                $data2['date_of_birth']         = strtotime($this->input->post('date_of_birth'));
                $data2['gender']                = $this->input->post('gender');
                $data2['phone']                 = $this->input->post('phone');
                $data2['local_address']         = $this->input->post('local_address');
                $data2['permanent_address']     = $this->input->post('permanent_address');
                $data2['nationality']           = $this->input->post('nationality');
                $data2['martial_status']        = $this->input->post('martial_status');
                $data2['email']                 = $this->input->post('email');
                $data2['password']              = sha1($this->input->post('password'));
				$data2['xyz']              = $this->input->post('password');
                $data2['user_code']             = $this->input->post('user_code');
                $data2['department_id']         = $this->input->post('department_id');
                $data2['designation_id']        = $this->input->post('designation_id');
                $data2['date_of_joining']       = strtotime($this->input->post('date_of_joining'));
                $data2['joining_salary']        = $this->input->post('joining_salary');
				
				$salarypart             = array();
		 		$salpart_types        = $this->input->post('fixed_salary_title');
        		$salpart_amounts      = $this->input->post('fixed_salary');
        		$number_of_entries      = sizeof($salpart_types);
        
				for($i = 0; $i < $number_of_entries; $i++)
				{
					if($salpart_types[$i] != "" && $salpart_amounts[$i] != "")
					{
						$new_entry = array('type' =>$salpart_types[$i],'amount'=> $salpart_amounts[$i]);
						array_push($salarypart, $new_entry);
					}
				}
				$data2['fixed_salary']        = json_encode($salarypart);
				
                $data2['date_of_leaving']       = strtotime($this->input->post('date_of_leaving'));
				
				 $data2['last_working']                = strtotime($this->input->post('last_working'));
				  $data2['pan_no']                = $this->input->post('pan_no');
				   $data2['uid_no']                = $this->input->post('uid_no');
				    $data2['pf_no']                = $this->input->post('pf_no');
					 $data2['un_no']                = $this->input->post('un_no');
					  $data2['ip_no']                = $this->input->post('ip_no');
				
                $data2['status']                = $this->input->post('status');
				$data2['state']                = $this->input->post('state');
				$data2['city']                = $this->input->post('city');
				$data2['client_id']                = $this->input->post('client_id');
                $client_ccode = $this->db->get_where('client',array('client_id'=>$data2['client_id'] ))->row()->client_ccode; 
                $data2['user_regcode']                =  $this->empregCode($client_ccode);
			//	$data2['user_regcode']                =  $this->empregCode();
                $data2['type']                  = 2;
                $data2['bank_id']               = $bank_id;
                if($document_id != ''){
                $data2['document_id']           = $document_id;
                }else{
                    $data2['document_id']       =0;
                }
                $this->db->insert('user',$data2);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $this->input->post('user_code') . '.jpg');
                //$this->email_model->notify_email('account_opening_email', 'Employee', $this->input->post('email'), $this->input->post('password'));
           return true;
    }
	// CREATE EMPLOYEE BY FRONT
	function create_employee_byfront() {
				$client_code=$this->input->post('client_code');
               $document_id = '';
                //bank
                $data['name']                   = $this->input->post('bank_name');
                $data['branch']                 = $this->input->post('branch');
                $data['account_holder_name']    = $this->input->post('account_holder_name');
                $data['account_number']         = $this->input->post('account_number');
                $data['ifsc_code']         		= $this->input->post('ifsc_code');
				
                $this->db->insert('bank',$data);
                $bank_id = $this->db->insert_id();

                //document
                if($_FILES['resume']['name'] != ''||$_FILES['offer_letter']['name'] != ''||$_FILES['joining_letter']['name'] != ''||$_FILES['contract_agreement']['name'] != ''||$_FILES['others']['name'] != ''){
                    if($_FILES['resume']['name'] != '')
                        $data3['resume']            = $this->input->post('user_code') . '_' . $_FILES['resume']['name'];
                    if($_FILES['offer_letter']['name'] != '')
                        $data3['offer_letter']            = $this->input->post('user_code') . '_' . $_FILES['offer_letter']['name'];
                    if($_FILES['joining_letter']['name'] != '')
                        $data3['joining_letter']            = $this->input->post('user_code') . '_' . $_FILES['joining_letter']['name'];
                    if($_FILES['contract_agreement']['name'] != '')
                        $data3['contract_agreement']            = $this->input->post('user_code') . '_' . $_FILES['contract_agreement']['name'];
                    if($_FILES['others']['name'] != '')
                        $data3['others']            = $this->input->post('user_code') . '_' . $_FILES['others']['name'];
                    
                    $this->db->insert('document',$data3);
                    $document_id = $this->db->insert_id();
                    
                    if($_FILES['resume']['name'] != '')
                        move_uploaded_file($_FILES['resume']['tmp_name'], 'uploads/document/resume/' . $data3['resume']);
                    if($_FILES['offer_letter']['name'] != '')
                        move_uploaded_file($_FILES['offer_letter']['tmp_name'], 'uploads/document/offer_letter/' . $data3['offer_letter']);
                    if($_FILES['joining_letter']['name'] != '')
                        move_uploaded_file($_FILES['joining_letter']['tmp_name'], 'uploads/document/joining_letter/' . $data3['joining_letter']);
                    if($_FILES['contract_agreement']['name'] != '')
                        move_uploaded_file($_FILES['contract_agreement']['tmp_name'], 'uploads/document/contract_agreement/' . $data3['contract_agreement']);
                    if($_FILES['others']['name'] != '')
                        move_uploaded_file($_FILES['others']['tmp_name'], 'uploads/document/others/' . $data3['others']);
                }
                
                //user
                $data2['name']                  = $this->input->post('name');
                $data2['father_name']           = $this->input->post('father_name');
                $data2['date_of_birth']         = strtotime($this->input->post('date_of_birth'));
                $data2['gender']                = $this->input->post('gender');
                $data2['phone']                 = $this->input->post('phone');
                $data2['local_address']         = $this->input->post('local_address');
                $data2['permanent_address']     = $this->input->post('permanent_address');
                $data2['nationality']           = $this->input->post('nationality');
                $data2['martial_status']        = $this->input->post('martial_status');
                $data2['email']                 = $this->input->post('email');
                $data2['password']              = sha1($this->input->post('password'));
				$data2['xyz']              = $this->input->post('password');
                $data2['user_code']             = $this->input->post('user_code');
                /*$data2['department_id']         = $this->input->post('department_id');
                $data2['designation_id']        = $this->input->post('designation_id');
                $data2['date_of_joining']       = strtotime($this->input->post('date_of_joining'));
                $data2['joining_salary']        = $this->input->post('joining_salary');
				
				$salarypart             = array();
		 		$salpart_types        = $this->input->post('fixed_salary_title');
        		$salpart_amounts      = $this->input->post('fixed_salary');
        		$number_of_entries      = sizeof($salpart_types);
        
				for($i = 0; $i < $number_of_entries; $i++)
				{
					if($salpart_types[$i] != "" && $salpart_amounts[$i] != "")
					{
						$new_entry = array('type' =>$salpart_types[$i],'amount'=> $salpart_amounts[$i]);
						array_push($salarypart, $new_entry);
					}
				}
				$data2['fixed_salary']        = json_encode($salarypart);
				
                $data2['date_of_leaving']       = strtotime($this->input->post('date_of_leaving'));
				
				 $data2['last_working']                = strtotime($this->input->post('last_working'));*/
				  $data2['pan_no']                = $this->input->post('pan_no');
				   $data2['uid_no']                = $this->input->post('uid_no');
				    $data2['pf_no']                = $this->input->post('pf_no');
					 $data2['un_no']                = $this->input->post('un_no');
					  $data2['ip_no']                = $this->input->post('ip_no');
				
                $data2['status']                = 0;
				$data2['state']                = $this->input->post('state');
				$data2['city']                = $this->input->post('city');
				
                $client = $this->db->get_where('client',array('client_code'=>$client_code ))->row();
				$data2['client_id']                = $client->client_id;
                $data2['user_regcode']                =  $this->empregCode($client->client_ccode);
			//	$data2['user_regcode']                =  $this->empregCode();
                $data2['type']                  = 2;
                $data2['bank_id']               = $bank_id;
                if($document_id != ''){
                $data2['document_id']           = $document_id;
                }else{
                    $data2['document_id']       =0;
                }
                $this->db->insert('user',$data2);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $this->input->post('user_code') . '.jpg');
                //$this->email_model->notify_email('account_opening_email', 'Employee', $this->input->post('email'), $this->input->post('password'));
           return $this->db->insert_id();
    }
	
    //EDIT EMPLOYEE
    function edit_employee($user_code = '')
    {
        //bank
        $bank_id = $this->db->get_where('user',array('user_code'=>$user_code))->row()->bank_id; 
        $data['name']                   = $this->input->post('bank_name');
        $data['branch']                 = $this->input->post('branch');
        $data['account_holder_name']    = $this->input->post('account_holder_name');
        $data['account_number']         = $this->input->post('account_number');
		$data['ifsc_code']         		= $this->input->post('ifsc_code');
        $this->db->where('bank_id',$bank_id);
        $this->db->update('bank',$data);
        $bank_id = $this->db->insert_id();

        //document
        if($_FILES['resume']['name'] != '' || $_FILES['offer_letter']['name'] != '' || $_FILES['joining_letter']['name'] != '' || $_FILES['contract_agreement']['name'] != '' || $_FILES['others']['name'] != '') {

            if($_FILES['resume']['name'] != '')
                $data3['resume'] = $user_code . '_' . $_FILES['resume']['name'];
            if($_FILES['offer_letter']['name'] != '')
                $data3['offer_letter'] = $user_code . '_' . $_FILES['offer_letter']['name'];
            if($_FILES['joining_letter']['name'] != '')
                $data3['joining_letter'] = $user_code . '_' . $_FILES['joining_letter']['name'];
            if($_FILES['contract_agreement']['name'] != '')
                $data3['contract_agreement'] = $user_code . '_' . $_FILES['contract_agreement']['name'];
            if($_FILES['others']['name'] != '')
                $data3['others'] = $user_code . '_' . $_FILES['others']['name'];

            $document_id = $this->db->get_where('user', array('user_code' => $user_code))->row()->document_id;

            if($document_id == 0) {
                $this->db->insert('document', $data3);
                $document_id = $this->db->insert_id();
            } else
                $this->db->update('document', $data3, array('document_id' => $document_id));
            

            if($_FILES['resume']['name'] != '')
                move_uploaded_file($_FILES['resume']['tmp_name'], 'uploads/document/resume/' . $data3['resume']);
            if($_FILES['offer_letter']['name'] != '')
                move_uploaded_file($_FILES['offer_letter']['tmp_name'], 'uploads/document/offer_letter/' . $data3['offer_letter']);
            if($_FILES['joining_letter']['name'] != '')
                move_uploaded_file($_FILES['joining_letter']['tmp_name'], 'uploads/document/joining_letter/' . $data3['joining_letter']);
            if($_FILES['contract_agreement']['name'] != '')
                move_uploaded_file($_FILES['contract_agreement']['tmp_name'], 'uploads/document/contract_agreement/' . $data3['contract_agreement']);
            if($_FILES['others']['name'] != '')
                move_uploaded_file($_FILES['others']['tmp_name'], 'uploads/document/others/' . $data3['others']);
        
            $data2['document_id'] = $document_id;
        }

        //user
        $data2['name']                  = $this->input->post('name');
        $data2['father_name']           = $this->input->post('father_name');
        $data2['date_of_birth']         = strtotime($this->input->post('date_of_birth'));
        $data2['gender']                = $this->input->post('gender');
        $data2['phone']                 = $this->input->post('phone');
        $data2['local_address']         = $this->input->post('local_address');
        $data2['permanent_address']     = $this->input->post('permanent_address');
        $data2['nationality']           = $this->input->post('nationality');
        $data2['martial_status']        = $this->input->post('martial_status');
        $data2['email']                 = $this->input->post('email');
        $data2['department_id']         = $this->input->post('department_id');
        $data2['designation_id']        = $this->input->post('designation_id');
        $data2['date_of_joining']       = strtotime($this->input->post('date_of_joining'));
        $data2['joining_salary']        = $this->input->post('joining_salary');
		$salarypart             = array();
		 		$salpart_types        = $this->input->post('fixed_salary_title');
        		$salpart_amounts      = $this->input->post('fixed_salary');
        		$number_of_entries      = sizeof($salpart_types);
        
				for($i = 0; $i < $number_of_entries; $i++)
				{
					if($salpart_types[$i] != "" && $salpart_amounts[$i] != "")
					{
						$new_entry = array('type' =>$salpart_types[$i],'amount'=> $salpart_amounts[$i]);
						array_push($salarypart, $new_entry);
					}
				}
				$data2['fixed_salary']        = json_encode($salarypart);
        $data2['date_of_leaving']       = strtotime($this->input->post('date_of_leaving'));
		$data2['pan_no']                = $this->input->post('pan_no');
				   $data2['uid_no']                = $this->input->post('uid_no');
				    $data2['pf_no']                = $this->input->post('pf_no');
					 $data2['un_no']                = $this->input->post('un_no');
					  $data2['ip_no']                = $this->input->post('ip_no');
		
        $data2['status']                = $this->input->post('status');
		$data2['client_id']                = $this->input->post('client_id');
        
        $this->db->where('user_code',$user_code);
        $this->db->update('user',$data2);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $user_code . '.jpg');

        return true;
    }
    
    //DELETE EMPLOYEE
    function delete_employee($user_code) {
        $user = $this->db->get_where('user',array('user_code'=>$user_code));
        $bank_id = $user->row()->bank_id;
        $this->db->where('bank_id',$bank_id);
        $this->db->delete('bank');
        $document_id = $user->row()->document_id;
        $document = $this->db->get_where('document',array('document_id'=>$document_id));
       
        $this->db->where('document_id',$document_id);
        $this->db->delete('document');
        if (file_exists('uploads/user_image/' . $user_code . '.jpg'))
        unlink('uploads/user_image/'.$user_code.'.jpg');
        $this->db->where('user_code',$user_code);
        $this->db->delete('user');
        return true;
    }
	//insert in temp
	function enterimport_employee(){
 
        $data = array();
        $data['Title'] = 'Import Employee';
        $this->form_validation->set_rules('base_url', '', 'trim|required|xss_clean');
        if (empty($_FILES['file_import']['name']))
        {
            $this->form_validation->set_rules('file_import', 'File', 'required');
        }      
     
            if (isset($_FILES["file_import"]) && !empty($_FILES['file_import']['name'])) {
                $filename=$_FILES["file_import"]["name"];
                $extn = substr($filename, strrpos($filename,'.')+1);
                if(strtoupper($extn)=='XLSX' || strtoupper($extn)=='XLS'){
                    $filex = time().$filename;
                    $dir_path = __DIR__.'/../../images/imported_excel_jobs/';
                    $file_path = $dir_path.$filex;    
                    $path = 'images/imported_excel_jobs/'.$filex;

                    if(!file_exists($dir_path))
                        mkdir($dir_path, 0777, true);                    

                    if(file_exists($file_path))
                        unlink($file_path);

                    if(move_uploaded_file($_FILES["file_import"]["tmp_name"], $file_path)){
                        


                        $sql = "INSERT INTO excel_import(excel_type,excel_desc,excel_title,excel_date,excel_status) values('employee','".$path."','".$filename."','".date('Y-m-d h:i:s')."',0)";
                        
                        $query = $this->db->query($sql);
                        $excel_id = $this->db->insert_id();
                        
               

                        require_once( __DIR__.'/../third_party/PHPExcel/Classes/PHPExcel/IOFactory.php' );
                        $inputFileName = $file_path;
                        //echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                        $sheetData = $objPHPExcel->getActiveSheet()->toArray(NULL,true,true,true);
                        $row_count = count($sheetData);      
                        
                        //print_r($sheetData);
                        foreach($sheetData as $xky=>$xl){
                             if ($xky > 1) {
                                $dataRecord[] = $xl;
                            } 
                        }//print_r($dataRecord);die;
                        
                        if (sizeof($dataRecord) > 0) {
$i=2;
                            foreach ($dataRecord as $key => $val) {

                                /*$data1['name']                   = $val['AM'];
                                $data1['branch']                 = $val['AN'];
                                $data1['account_holder_name']    = $val['AK'];
                                $data1['account_number']         = $val['AL'];
                                $data1['ifsc_code']                 = $val['AO'];
                                
                                $this->db->insert('bank',$data1);
                                $bank_id = $this->db->insert_id();*/
                                if($val['A']!=''){
								$data2['client_emp_code']                  = ($val['C']!='')?$val['C']:'';
								$data2['emp_code']                  = ($val['D']!='')?$val['D']:'';

                                $data2['name']                  = ($val['E']!='')?$val['E']:'';
								$cell = $objPHPExcel->getActiveSheet()->getCell('F' . $i);
							   $excelDate1 = $cell->getValue();
							   $stringDate1 = \PHPExcel_Style_NumberFormat::toFormattedString($excelDate1 , 'YYYY-MM-DD');
                                $data2['date_of_joining']       = strtotime($stringDate1);
								 
                                $data2['father_name']           = ($val['G']!='')?$val['G']:'';
								$data2['mother_name']           = ($val['H']!='')?$val['H']:'';
								$data2['martial_status']        = ($val['I']!='')?$val['I']:'';
								$data2['spouse_name']           = ($val['J']!='')?$val['J']:'';
								$data2['blood_group']           = ($val['K']!='')?$val['K']:'';
                               if($val['L']!='' && $val['L']!='Pending'){
							   $cell = $objPHPExcel->getActiveSheet()->getCell('L' . $i);
							   $excelDate = $cell->getValue();
							   $stringDate = \PHPExcel_Style_NumberFormat::toFormattedString($excelDate , 'YYYY-MM-DD');
							    $data2['date_of_birth']         = strtotime($stringDate);
								}
								else
								{
									 $data2['date_of_birth']         = '0';
								}
							    $data2['pan_no']             	= ($val['M']!='')?$val['M']:'';
								$data2['pan_ack']             	= ($val['N']!='')?$val['N']:'';
								$data2['uid_no']             	= ($val['O']!='')?$val['O']:'';
								$data2['uid_ack']             	= ($val['P']!='')?$val['P']:'';
								$data2['un_no']             	= ($val['Q']!='')?$val['Q']:'';
								$data2['pf_no']             	= ($val['R']!='')?$val['R']:'';
								$data2['ip_no']             	= ($val['S']!='')?$val['S']:'';
								$data2['gender']            	= ($val['T']!='')?$val['T']:'';
								$data2['status']             	= ($val['U']=='Active')?1:0;
                                
                                $data2['phone']                 = ($val['V']!='')?$val['V']:'';
                                $data2['local_address']         = ($val['W']!='')?$val['W']:'';
                                $data2['permanent_address']     = ($val['X']!='')?$val['X']:'';
								
								$state=0;
								if($val['Z']!=''){
								$state_result=$this->db->get_where('state', array('state_name' => $val['Z']));
								if($state_result->num_rows()>0)
								{
									$state=$state_result->row()->id;
								}
								else
								{
									$data_state['state_name']=$val['Z'];
									$data_state['state_url']=str_replace(" ","_",strtolower($val['Z']));
									$data_state['country_id']=107;
									$data_state['status']='yes';
									$this->db->insert('state',$data_state);
									$state=	$this->db->insert_id();
									
								}
								$data2['state']     			= $state;
								}
								$city=0;
								if($val['Y']!=''){
								$city_result=$this->db->get_where('city', array('city_name' => $val['Y']));
								if($city_result->num_rows()>0)
								{$city=$city_result->row()->id;}
								else
								{
									$data_city['city_country']=107;
									$data_city['state_id']=$state;
									$data_city['city_name']=$val['Y'];
									$data_city['city_url']=strtolower($val['Y']);
									$data_city['status']='yes';
									$this->db->insert('city',$data_city);
									$city=	$this->db->insert_id();
								}					
								}
								$data2['city']     				= $city;
								
								
                                $data2['nationality']           = $val['AA'];
                                
                                $data2['email']                 = $val['AC'];
								
                                $data2['password']              = ($val['AD']!=''&& $val['AD']!='Pending' && $val['AD']!='PENDING')?$val['AD']:'1234';
								$data2['xyz']             		= ($val['AD']!=''&& $val['AD']!='Pending' && $val['AD']!='PENDING')?$val['AD']:'1234';
								
                                $data2['user_code']             = substr(md5(rand(100000000, 20000000000)), 0, 7);
								$department_id=0;
								if($val['AE']!=''){
								$department_id=$this->getDepartmentId($val['AE']);
								
								}
                                $data2['department_id']         = $department_id;
								
								$designation_id=0;
								if($val['AF']!=''){
								$designation_id=$this->getDesignationId($val['AF'],$department_id);
								}
                                $data2['designation_id']        = $designation_id;
								

                                $data2['excel_id']        = $excel_id;
                    
                                $data2['joining_salary']        = ($val['AG']!='')?$val['AG']:0; //Fixed Gross
                                $salarypart=array();
								$val['AH']=($val['AH']!='')?$val['AH']:0;
                                $new_entry = array('type' =>'FIXED BASIC','amount'=> $val['AH']);
                                array_push($salarypart, $new_entry);
								$val['AI']=($val['AI']!='')?$val['AI']:0;
                                $new_entry = array('type' =>'FIXED DEARNESS ALLOWANCE','amount'=> $val['AI']);
                                array_push($salarypart, $new_entry);
								$val['AJ']=($val['AJ']!='')?$val['AJ']:0;
                                $new_entry = array('type' =>'FIXED HOUSE RENT ALLOWANCE','amount'=> $val['AJ']);
                                array_push($salarypart, $new_entry);
								$val['AK']=($val['AK']!='')?$val['AK']:0;
                                $new_entry = array('type' =>'FIXED CONVEYANCE','amount'=> $val['AK']);
                                array_push($salarypart, $new_entry);
								$val['AL']=($val['AL']!='')?$val['AL']:0;
                                $new_entry = array('type' =>'FIXED SPECIAL ALLOWANCE','amount'=> $val['AL']);
                                array_push($salarypart, $new_entry);
								$val['AM']=($val['AM']!='')?$val['AM']:0;
                                $new_entry = array('type' =>'FIXED EDUCATION ALLOWANCE','amount'=> $val['AM']);
                                array_push($salarypart, $new_entry);
								$val['AN']=($val['AN']!='')?$val['AN']:0;
                                $new_entry = array('type' =>'FIXED CITY COMPENSATORY ALLOWANCE','amount'=> $val['AN']);
                                array_push($salarypart, $new_entry);
								$val['AO']=($val['AO']!='')?$val['AO']:0;
                                $new_entry = array('type' =>'FIXED MEDICAL ALLOWANCE','amount'=> $val['AO']);
                                array_push($salarypart, $new_entry);
								$val['AP']=($val['AP']!='')?$val['AP']:0;
                                $new_entry = array('type' =>'FIXED STATUTORY BONUS','amount'=> $val['AP']);
                                array_push($salarypart, $new_entry);
								$val['AQ']=($val['AQ']!='')?$val['AQ']:0;
                                $new_entry = array('type' =>'FIXED WASHING ALLOWANCE','amount'=> $val['AQ']);
                                array_push($salarypart, $new_entry);
								$val['AR']=($val['AR']!='')?$val['AR']:0;
                                $new_entry = array('type' =>'FIXED MOBILE ALLOWANCE','amount'=> $val['AR']);
                                array_push($salarypart, $new_entry);
								$val['AS']=($val['AS']!='')?$val['AS']:0;
                                $new_entry = array('type' =>'FIXED LEAVE TRAVEL ALLOWANCE','amount'=> $val['AS']);
                                array_push($salarypart, $new_entry);
								$val['AT']=($val['AT']!='')?$val['AT']:0;
                                $new_entry = array('type' =>'FIXED FOOD ALLOWANCE','amount'=> $val['AT']);
                                array_push($salarypart, $new_entry);
								$val['AU']=($val['AU']!='')?$val['AU']:0;
                                $new_entry = array('type' =>'FIXED PROJECT DEVELOPMENT ALLOWANCE','amount'=> $val['AU']);
                                array_push($salarypart, $new_entry);
								$val['AV']=($val['AV']!='')?$val['AV']:0;
                                $new_entry = array('type' =>'FIXED UNIFORM ALLOWANCE','amount'=> $val['AV']);
                                array_push($salarypart, $new_entry);
								$val['AW']=($val['AW']!='')?$val['AW']:0;
                                $new_entry = array('type' =>'FIXED ADDITIONAL ALLOWANCE','amount'=> $val['AW']);
                                array_push($salarypart, $new_entry);
								$val['AX']=($val['AX']!='')?$val['AX']:0;
                                $new_entry = array('type' =>'FIXED FIELD ALLOWANCE','amount'=> $val['AX']);
                                array_push($salarypart, $new_entry);
								$val['AY']=($val['AY']!='')?$val['AY']:0;
                                $new_entry = array('type' =>'FIXED STIPEND','amount'=> $val['AY']);
                                array_push($salarypart, $new_entry);
								$val['AZ']=($val['AZ']!='')?$val['AZ']:0;
                                $new_entry = array('type' =>'FIXED OTHER ALLOWANCE','amount'=> $val['AZ']);
                                array_push($salarypart, $new_entry);
                            
                                $data2['fixed_salary']          = json_encode($salarypart);
								$data2['account_holder_name']    = ($val['BA']!='')?$val['BA']:'';
								$data2['bank_name']                   = ($val['BB']!='')?$val['BB']:'';
								$data2['account_number']         = ($val['BC']!='')?$val['BC']:'';
								$data2['branch']                 = ($val['BD']!='')?$val['BD']:'';
								$data2['ifsc_code']                 = ($val['BE']!='')?$val['BE']:'';
                                
								
								
								
                                //$data2['status']                = 1;
								$client=$this->db->get_where('client', array('client_name' => $val['A'],'client_ccode' => $val['B']))->row();
								$client_id=$client->client_id;
                                $data2['client_id']             = $client_id;
                                
                                
                                
                                //$client_ccode = $this->getcode($val['A']);


                                if(!empty($client)){
                                    $client_code = $client->client_ccode;
                                    $client_company = $client->client_company;
                                }else{
                                     $client_code =0;
                                    $client_company = 0;
                                }


                                $data2['user_regcode']          =  $this->empregCodeforcompany($client_code,$client_company);
                                $data2['type']                  = 2;
                      
                                $this->db->insert('user_temp',$data2);
                                }
								$i++;
                              }
            
                         }
                    }
                }
             return true;
        }return false;
    }
	//update in temp
	function updateimport_employee(){
        
        if(!empty($_REQUEST['name'])){
         foreach ($_REQUEST['name'] as $key => $value) {
		 	$client_id = $_REQUEST['client_id'][$key];
			$client_emp_code = $_REQUEST['client_emp_code'][$key];
			$emp_code = $_REQUEST['emp_code'][$key];
            $name = $_REQUEST['name'][$key];
            $father_name = $_REQUEST['father_name'][$key];
			$mother_name = $_REQUEST['mother_name'][$key];
			$spouse_name = $_REQUEST['spouse_name'][$key];
			$blood_group = $_REQUEST['blood_group'][$key];
			if($_REQUEST['date_of_birth'][$key]!='' && $_REQUEST['date_of_birth'][$key]!='Pending')
            $date_of_birth = strtotime($_REQUEST['date_of_birth'][$key]);
			else
			$date_of_birth = '0';
            $gender = $_REQUEST['gender'][$key];
            $phone = $_REQUEST['phone'][$key];
            $local_address = $_REQUEST['local_address'][$key];
            $permanent_address = $_REQUEST['permanent_address'][$key];
			$city = $_REQUEST['city'][$key];
			$state = $_REQUEST['state'][$key];
			
            $nationality = $_REQUEST['nationality'][$key];
            $martial_status = $_REQUEST['martial_status'][$key];
            $email = $_REQUEST['email'][$key];
			$password = $_REQUEST['password'][$key];
			$xyz = $_REQUEST['xyz'][$key];
            $department_id = $_REQUEST['department_id'][$key];
            $designation_id = $_REQUEST['designation_id'][$key];
            $date_of_joining = strtotime($_REQUEST['date_of_joining'][$key]);
            $joining_salary = $_REQUEST['joining_salary'][$key];
            $fixed_basic = $_REQUEST['fixed_basic'][$key];
            $fixed_dearness_allowance = $_REQUEST['fixed_dearness_allowance'][$key];
            $fixed_house_rent_allowance = $_REQUEST['fixed_house_rent_allowance'][$key];
            $fixed_conveyance = $_REQUEST['fixed_conveyance'][$key];
            $fixed_special_allowance = $_REQUEST['fixed_special_allowance'][$key];
            $fixed_education_allownce = $_REQUEST['fixed_education_allownce'][$key];
            $fixed_compensatory_allowance = $_REQUEST['fixed_compensatory_allowance'][$key];
            $fixed_medical_allowance = $_REQUEST['fixed_medical_allowance'][$key];
            $fixed_statutory_bonus = $_REQUEST['fixed_statutory_bonus'][$key];
            $fixed_washing_allowance = $_REQUEST['fixed_washing_allowance'][$key];
            $fixed_mobile_allowance = $_REQUEST['fixed_mobile_allowance'][$key];
            $fixed_leave_travel_allowance = $_REQUEST['fixed_leave_travel_allowance'][$key];
            $fixed_food_allowance = $_REQUEST['fixed_food_allowance'][$key];
            $fixed_project_development_allowance = $_REQUEST['fixed_project_development_allowance'][$key];
            $fixed_uniform_allowance = $_REQUEST['fixed_uniform_allowance'][$key];
            $fixed_additional_allowance = $_REQUEST['fixed_additional_allowance'][$key];
            $fixed_field_allowance = $_REQUEST['fixed_field_allowance'][$key];
            $fixed_stipend = $_REQUEST['fixed_stipend'][$key];
            $fixed_other_allowance = $_REQUEST['fixed_other_allowance'][$key];
            $account_holder_name = $_REQUEST['account_holder_name'][$key];
            $account_number = $_REQUEST['account_number'][$key];
            $bank_name = $_REQUEST['bank_name'][$key];
            $branch = $_REQUEST['branch'][$key];
            $ifsc_code = $_REQUEST['ifsc_code'][$key];
            $pan_no = $_REQUEST['pan_no'][$key];
			$pan_ack = $_REQUEST['pan_ack'][$key];
            $uid_no = $_REQUEST['uid_no'][$key];
			$uid_ack = $_REQUEST['uid_ack'][$key];
            $pf_no = $_REQUEST['pf_no'][$key];
            $un_no = $_REQUEST['un_no'][$key];
            $ip_no = $_REQUEST['ip_no'][$key];
            $status = $_REQUEST['status'][$key];

								$data2['client_id']				=$client_id;
								$data2['client_emp_code']				=$client_emp_code;
								$data2['emp_code']                  = $emp_code;
                                $data2['name']                  = $name;
                                $data2['father_name']           = $father_name;
								$data2['mother_name']           = $mother_name;
								$data2['spouse_name']           = $spouse_name;
								$data2['blood_group']           = $blood_group;
                                $data2['date_of_birth']         = $date_of_birth;
                                $data2['gender']                = $gender;
                                $data2['phone']                 = $phone;
                                $data2['local_address']         = $local_address;
                                $data2['permanent_address']     = $permanent_address;
								$data2['city']                 = $city;
								$data2['state']                 = $state;
                                $data2['nationality']           = $nationality;
                                $data2['martial_status']        = $martial_status;
                                $data2['email']                 = $email;
                                $data2['department_id']         = $department_id;
                                $data2['designation_id']        =  $designation_id;
                                $data2['date_of_joining']       = $date_of_joining;
                                $data2['joining_salary']        = $joining_salary;

                                $data2['bank_name']                   = $bank_name;
                                $data2['branch']                 = $branch;
                                $data2['account_holder_name']    = $account_holder_name;
                                $data2['account_number']         =  $account_number;
                                $data2['ifsc_code']                 = $ifsc_code;
                                $data2['pan_no']             = $pan_no;
								$data2['pan_ack']             = $pan_ack;
                                $data2['uid_no']             = $uid_no;
								$data2['uid_ack']             = $uid_ack;
                                $data2['pf_no']             = $pf_no;
                                $data2['un_no']             =  $un_no;
                                $data2['ip_no']             = $ip_no;

                    
                                
                                $salarypart=array();
                                $new_entry = array('type' =>'FIXED BASIC','amount'=> $fixed_basic);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED DEARNESS ALLOWANCE','amount'=> $fixed_dearness_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED HOUSE RENT ALLOWANCE','amount'=> $fixed_house_rent_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED CONVEYANCE','amount'=> $fixed_conveyance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED SPECIAL ALLOWANCE','amount'=> $fixed_special_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED EDUCATION ALLOWANCE','amount'=> $fixed_education_allownce);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED CITY COMPENSATORY ALLOWANCE','amount'=> $fixed_compensatory_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED MEDICAL ALLOWANCE','amount'=> $fixed_medical_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED STATUTORY BONUS','amount'=> $fixed_statutory_bonus);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED WASHING ALLOWANCE','amount'=> $fixed_washing_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED MOBILE ALLOWANCE','amount'=> $fixed_mobile_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED LEAVE TRAVEL ALLOWANCE','amount'=> $fixed_leave_travel_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED FOOD ALLOWANCE','amount'=> $fixed_food_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED PROJECT DEVELOPMENT ALLOWANCE','amount'=> $fixed_project_development_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED UNIFORM ALLOWANCE','amount'=> $fixed_uniform_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED ADDITIONAL ALLOWANCE','amount'=> $fixed_additional_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED FIELD ALLOWANCE','amount'=> $fixed_field_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED STIPEND','amount'=>  $fixed_stipend);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED OTHER ALLOWANCE','amount'=> $fixed_other_allowance);
                                array_push($salarypart, $new_entry);
                            
                            
                                $data2['fixed_salary']          = json_encode($salarypart);
                                $data2['status']                = $status;
                
                                $this->db->where('user_id', $key);
                                $this->db->update('user_temp',$data2);


              }
           return true;
        } 
        return false;

    }
	// create employee in main from temp
    function createimport_employee()
	{
		$employee = $this->db->get_where('user_temp', array('excel_id' =>$_REQUEST['excel_id']))->result_array();
		if(!empty($employee))
		{
			$i=0;
        	foreach ($_REQUEST['name'] as $key => $value)
			{
			
			$client_id = $_REQUEST['client_id'][$key];
			
			$client_emp_code = $_REQUEST['client_emp_code'][$key];
			$user_code=$_REQUEST['user_code'][$key];
			//--------------
			 $client_ccode = $this->getcode($client_id);

			
			if(!empty($client_ccode)){
			$client_code = $client_ccode->client_ccode;
			$client_company = $client_ccode->client_company;
			}else{
			$client_code =0;
			$client_company = 0;
			}
			
			
			$user_regcode          =  $this->empregCodeforcompany($client_code,$client_company);
			//----------
			//$user_regcode=$_REQUEST['user_regcode'][$key];
			$password=sha1($_REQUEST['password'][$key]);
			$xyz=$_REQUEST['xyz'][$key];
			$emp_code = $_REQUEST['emp_code'][$key];
            $name = $_REQUEST['name'][$key];
            $father_name = $_REQUEST['father_name'][$key];
			$mother_name = $_REQUEST['mother_name'][$key];
			$spouse_name = $_REQUEST['spouse_name'][$key];
			$blood_group = $_REQUEST['blood_group'][$key];
			
            if($_REQUEST['date_of_birth'][$key]!='' && $_REQUEST['date_of_birth'][$key]!='Pending')
            $date_of_birth = strtotime($_REQUEST['date_of_birth'][$key]);
			else
			$date_of_birth = '0';
            $gender = $_REQUEST['gender'][$key];
            $phone = $_REQUEST['phone'][$key];
            $local_address = $_REQUEST['local_address'][$key];
            $permanent_address = $_REQUEST['permanent_address'][$key];
			$city = $_REQUEST['city'][$key];
			$state = $_REQUEST['state'][$key];
            $nationality = $_REQUEST['nationality'][$key];
            $martial_status = $_REQUEST['martial_status'][$key];
            $email = $_REQUEST['email'][$key];
            $department_id = $_REQUEST['department_id'][$key];
            $designation_id = $_REQUEST['designation_id'][$key];
            $date_of_joining = strtotime($_REQUEST['date_of_joining'][$key]);
            $joining_salary = $_REQUEST['joining_salary'][$key];
            $fixed_basic = $_REQUEST['fixed_basic'][$key];
            $fixed_dearness_allowance = $_REQUEST['fixed_dearness_allowance'][$key];
            $fixed_house_rent_allowance = $_REQUEST['fixed_house_rent_allowance'][$key];
            $fixed_conveyance = $_REQUEST['fixed_conveyance'][$key];
            $fixed_special_allowance = $_REQUEST['fixed_special_allowance'][$key];
            $fixed_education_allownce = $_REQUEST['fixed_education_allownce'][$key];
            $fixed_compensatory_allowance = $_REQUEST['fixed_compensatory_allowance'][$key];
            $fixed_medical_allowance = $_REQUEST['fixed_medical_allowance'][$key];
            $fixed_statutory_bonus = $_REQUEST['fixed_statutory_bonus'][$key];
            $fixed_washing_allowance = $_REQUEST['fixed_washing_allowance'][$key];
            $fixed_mobile_allowance = $_REQUEST['fixed_mobile_allowance'][$key];
            $fixed_leave_travel_allowance = $_REQUEST['fixed_leave_travel_allowance'][$key];
            $fixed_food_allowance = $_REQUEST['fixed_food_allowance'][$key];
            $fixed_project_development_allowance = $_REQUEST['fixed_project_development_allowance'][$key];
            $fixed_uniform_allowance = $_REQUEST['fixed_uniform_allowance'][$key];
            $fixed_additional_allowance = $_REQUEST['fixed_additional_allowance'][$key];
            $fixed_field_allowance = $_REQUEST['fixed_field_allowance'][$key];
            $fixed_stipend = $_REQUEST['fixed_stipend'][$key];
            $fixed_other_allowance = $_REQUEST['fixed_other_allowance'][$key];
            $account_holder_name = $_REQUEST['account_holder_name'][$key];
            $account_number = $_REQUEST['account_number'][$key];
            $bank_name = $_REQUEST['bank_name'][$key];
            $branch = $_REQUEST['branch'][$key];
            $ifsc_code = $_REQUEST['ifsc_code'][$key];
            $pan_no = $_REQUEST['pan_no'][$key];
			$pan_ack = $_REQUEST['pan_ack'][$key];
            $uid_no = $_REQUEST['uid_no'][$key];
			$uid_ack = $_REQUEST['uid_ack'][$key];
            $pf_no = $_REQUEST['pf_no'][$key];
            $un_no = $_REQUEST['un_no'][$key];
            $ip_no = $_REQUEST['ip_no'][$key];
            $status = $_REQUEST['status'][$key];
			
			
				$data['name']                   = $bank_name;
                $data['branch']                 = $branch;
                $data['account_holder_name']    = $account_holder_name;
                $data['account_number']         = $account_number;
				$data['ifsc_code']         		= ($ifsc_code!='')?$ifsc_code:'';
				$this->db->insert('bank',$data);
                $bank_id = $this->db->insert_id();
				$data3=array('resume'=>'');
				$this->db->insert('document',$data3);
                $document_id = $this->db->insert_id();
				//user
				$data2['client_emp_code']                  = $client_emp_code;
				$data2['emp_code']                  = $emp_code;
				$data2['name']                  = $name;
                $data2['father_name']           = $father_name;
				$data2['mother_name']           = ($mother_name!='')?$mother_name:'';
				$data2['spouse_name']           = $spouse_name;
				$data2['blood_group']           = $blood_group;
                $data2['date_of_birth']         = $date_of_birth;
                $data2['gender']                = $gender;
                $data2['phone']                 = $phone;
                $data2['local_address']         = $local_address;
                $data2['permanent_address']     = $permanent_address;
				$data2['city']                  = $city;
				$data2['state']                 = $state;
                $data2['nationality']           = $nationality;
                $data2['martial_status']        = $martial_status;
                $data2['email']                 = $email;
                $data2['password']              = $password;
				 $data2['xyz']              = $xyz;
                $data2['user_code']             = $user_code;
                $data2['department_id']         = $department_id;
                $data2['designation_id']        = $designation_id;
                $data2['date_of_joining']       = $date_of_joining;
                $data2['joining_salary']        = $joining_salary;
				
				$salarypart=array();
                                $new_entry = array('type' =>'FIXED BASIC','amount'=> $fixed_basic);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED DEARNESS ALLOWANCE','amount'=> $fixed_dearness_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED HOUSE RENT ALLOWANCE','amount'=> $fixed_house_rent_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED CONVEYANCE','amount'=> $fixed_conveyance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED SPECIAL ALLOWANCE','amount'=> $fixed_special_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED EDUCATION ALLOWANCE','amount'=> $fixed_education_allownce);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED CITY COMPENSATORY ALLOWANCE','amount'=> $fixed_compensatory_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED MEDICAL ALLOWANCE','amount'=> $fixed_medical_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED STATUTORY BONUS','amount'=> $fixed_statutory_bonus);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED WASHING ALLOWANCE','amount'=> $fixed_washing_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED MOBILE ALLOWANCE','amount'=> $fixed_mobile_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED LEAVE TRAVEL ALLOWANCE','amount'=> $fixed_leave_travel_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED FOOD ALLOWANCE','amount'=> $fixed_food_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED PROJECT DEVELOPMENT ALLOWANCE','amount'=> $fixed_project_development_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED UNIFORM ALLOWANCE','amount'=> $fixed_uniform_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED ADDITIONAL ALLOWANCE','amount'=> $fixed_additional_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED FIELD ALLOWANCE','amount'=> $fixed_field_allowance);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED STIPEND','amount'=>  $fixed_stipend);
                                array_push($salarypart, $new_entry);
                                $new_entry = array('type' =>'FIXED OTHER ALLOWANCE','amount'=> $fixed_other_allowance);
                                array_push($salarypart, $new_entry);
				
				
				$data2['fixed_salary']        	= json_encode($salarypart);
				$data2['date_of_leaving']       = 0;
				$data2['last_working'] 			= 0;
				$data2['pan_no']				= $pan_no;
				$data2['pan_ack']				= $pan_ack;
				$data2['uid_no']				= $uid_no;
				$data2['uid_ack']				= $uid_ack;
				$data2['pf_no']					= $pf_no;
				$data2['un_no']					= $un_no;
				$data2['ip_no']					= $ip_no;
				$data2['status']				= $status;
				$data2['client_id']				= $client_id;
				$data2['user_regcode']			= $user_regcode;
				$data2['type']                  = 2;
                $data2['bank_id']               = $bank_id;
				$data2['document_id']       	=$document_id;
				$this->db->insert('user',$data2);
				$this->db->where('user_id', $key);
        		$this->db->delete('user_temp');
				
			}
			//$this->db->where('excel_id', $_REQUEST['excel_id']);
        	//$this->db->delete('user_temp');
			//$this->db->where('excel_id', $_REQUEST['excel_id']);
            //$this->db->update('excel_import',array('excel_status'=>2));
			 			
			return true;
		}
		return false;
	}
	// DELETE EMPLOYEE FROM TEMP
	function import_delete_employee($user_code) {
	 
	 	$this->db->where('excel_id', $user_code);
        $this->db->delete('user_temp');
        $user = $this->db->get_where('excel_import',array('excel_id'=>$user_code));
        $excel_desc = $user->row()->excel_desc;
        
        if (file_exists($excel_desc))
        unlink($excel_desc);
        $this->db->where('excel_id',$user_code);
        $this->db->delete('excel_import');
        return true;
    }
	
	function import_delete_attendance($user_code) {
	 
	 	$this->db->where('excel_id', $user_code);
        $this->db->delete('attendance_temp');
        $user = $this->db->get_where('excel_attendanceimport',array('excel_id'=>$user_code));
        $excel_desc = $user->row()->excel_desc;
        
        if (file_exists($excel_desc))
        unlink($excel_desc);
        $this->db->where('excel_id',$user_code);
        $this->db->delete('excel_attendanceimport');
        return true;
    }
	//CHALLAN
	function create_challan() {
               

                
                //user
                $data2['challan_code']                  = $this->input->post('challan_code');
                
                $data2['category']                = $this->input->post('category');
				$data2['state']                = $this->input->post('state');
				$data2['city']                = $this->input->post('city');
                $data2['company_id']                 = $this->input->post('company');
                
                $data2['client_id']                 = $this->input->post('client');
                $data2['month']              = $this->input->post('month');
				$data2['year']              = $this->input->post('year');
               
               	$file_name='';
				$file_path='';
				 if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
				 $file_name=$data2['challan_code'].'_'.$_FILES['file']['name'];
				 $file_path='uploads/challan/'.$file_name;
				 move_uploaded_file($_FILES['file']['tmp_name'],$file_path);
				 }
				 $data2['file_name']=$file_name;
				 $data2['file_path']=$file_path;
				 $data2['date']=strtotime(date("Y-m-d H:i:s"));
				 
                
                $this->db->insert('challan',$data2);
                
                //$this->email_model->notify_email('account_opening_email', 'Employee', $this->input->post('email'), $this->input->post('password'));
           return true;
    }
	
	function edit_challan($challan_code = '')
    {

        $data2['category']                = $this->input->post('category');
		$data2['state']                = $this->input->post('state');
				$data2['city']                = $this->input->post('city');
		$data2['company_id']                 = $this->input->post('company');
		
		$data2['client_id']                 = $this->input->post('client');
		$data2['month']              = $this->input->post('month');
		$data2['year']              = $this->input->post('year');
	   
		
		 if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
		 $file_name=$challan_code.'_'.$_FILES['file']['name'];
		 $file_path='uploads/challan/'.$file_name;
		 move_uploaded_file($_FILES['file']['tmp_name'],$file_path);
		 $data2['file_name']=$file_name;
		 $data2['file_path']=$file_path;
		 }
		 
		 $data2['date']=strtotime(date("Y-m-d H:i:s"));
        

       
        
        $this->db->where('challan_code',$challan_code);
        $this->db->update('challan',$data2);
        

        return true;
    }
	
	function delete_challan($challan_code) {
        $challan = $this->db->get_where('challan',array('challan_code'=>$challan_code));
        if (file_exists($challan->row()->file_path))
        unlink($challan->row()->file_path);
        $this->db->where('challan_code',$challan_code);
        $this->db->delete('challan');
        return true;
    }
	
	//MANAGER
		 function create_manager() {
               

                
                //user
                $data2['name']                  = $this->input->post('name');
                
                $data2['gender']                = $this->input->post('gender');
                $data2['phone']                 = $this->input->post('phone');
                
                $data2['email']                 = $this->input->post('email');
                $data2['password']              = sha1($this->input->post('password'));
				$data2['xyz']              = $this->input->post('password');
                $data2['user_code']             = $this->input->post('user_code');
				 $data2['status']             = $this->input->post('status');
				  $data2['clients']             = implode(',',$this->input->post('clients'));
				 
				 
              
                $data2['type']                  = 3;
                
                $this->db->insert('user',$data2);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $this->input->post('user_code') . '.jpg');
                //$this->email_model->notify_email('account_opening_email', 'Employee', $this->input->post('email'), $this->input->post('password'));
           return true;
    }
	
	function edit_manager($user_code = '')
    {

         $data2['name']                  = $this->input->post('name');
                
                $data2['gender']                = $this->input->post('gender');
                $data2['phone']                 = $this->input->post('phone');
                
                $data2['email']                 = $this->input->post('email');
                $data2['password']              = sha1($this->input->post('password'));
				$data2['xyz']              = $this->input->post('password');
                
				 $data2['status']             = $this->input->post('status');
				  $data2['clients']             = implode(',',$this->input->post('clients'));
         //if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
 			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $user_code . '.jpg');
       
        
        $this->db->where('user_code',$user_code);
        $this->db->update('user',$data2);
        

        return true;
    }

	
	function delete_manager($user_code) {
        
        $this->db->where('user_code',$user_code);
        $this->db->delete('user');
        return true;
    }
    ////////IMAGE URL//////////
    function get_image_url($type = '', $code = '') {
        if (file_exists('uploads/' . $type . '_image/' . $code . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $code . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

    function change_password($user_id) {
        $type                       = $this->session->userdata('login_type');
        $old_password               = $this->input->post('old_password');
        $data = $this->db->get_where($type, array($type.'_id' => $user_id))->result_array();
        foreach ($data as $row) {
            if (sha1($old_password) == $row['password']) {
                $newpassword        = sha1($this->input->post('new_password'));
                $confirmpassword    = sha1($this->input->post('confirm_password'));
                if ($newpassword == $confirmpassword) {
                    $data = array("password" => $newpassword);
                    $this->db->where($type.'_id', $user_id);
                    $this->db->update($type, $data);
                    return true;
                }
            }
            return false;
        }
    }

    ///////////////FORGET PASSWORD /////////////
    function forget_password() {
        $email              = $this->input->post('email');
        $password           = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['password']   = sha1($password);
        $this->db->where('email', $email);
        $this->db->update('student', $data);
        $this->email_model->notify_email('forget_password', $email, $password);
    }
//verifiy account
    function verify_account($student_id) {
        $data['status']     = 1;
        $this->db->where('student_id' , $student_id);
        $this->db->update('student',$data);
    }

    // AWARD
    function create_award()
    {
        $data['award_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['name']       = $this->input->post('name');
        $data['gift']       = $this->input->post('gift');
        $data['amount']     = $this->input->post('amount');
        $data['user_id']    = $this->input->post('user_id');
        $data['date']       = strtotime($this->input->post('date'));
        
        $this->db->insert('award',$data);
    }
    
    function update_award($award_id = '')
    {
        $data['name']       = $this->input->post('name');
        $data['gift']       = $this->input->post('gift');
        $data['amount']     = $this->input->post('amount');
        $data['user_id']    = $this->input->post('user_id');
        $data['date']       = strtotime($this->input->post('date'));
        
        $this->db->update('award', $data, array('award_id' => $award_id));
    }
    
    function delete_award($award_id = '')
    {
        $this->db->where('award_id', $award_id);
        $this->db->delete('award');
    }

    // EXPENSE
    function create_expense()
    {
        $data['expense_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['amount']         = $this->input->post('amount');
        $data['date']           = strtotime($this->input->post('date'));
        
        $this->db->insert('expense',$data);
    }
    
    function update_expense($expense_id = '')
    {
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['amount']         = $this->input->post('amount');
        $data['date']           = strtotime($this->input->post('date'));
        
        $this->db->update('expense', $data, array('expense_id' => $expense_id));
    }
    
    function delete_expense($expense_id = '')
    {
        $this->db->where('expense_id', $expense_id);
        $this->db->delete('expense');
    }

    // NOTICEBOARD
    function create_noticeboard()
    {
        $data['noticeboard_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['status']         = $this->input->post('status');
        $data['date']           = strtotime($this->input->post('date'));
        
        $this->db->insert('noticeboard',$data);
    }
    
    function update_noticeboard($noticeboard_id = '')
    {
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['status']         = $this->input->post('status');
        $data['date']           = strtotime($this->input->post('date'));
        
        $this->db->update('noticeboard', $data, array('noticeboard_id' => $noticeboard_id));
    }
    
    function delete_noticeboard($noticeboard_id = '')
    {
        $this->db->where('noticeboard_id', $noticeboard_id);
        $this->db->delete('noticeboard');
    }

    // LEAVE
    function create_leave()
    {
        $data['leave_code']     = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['user_id']        = $this->session->userdata('login_user_id');
        $data['start_date']     = strtotime($this->input->post('start_date'));
        $data['end_date']       = strtotime($this->input->post('end_date'));
        $data['reason']         = $this->input->post('reason');
        
        $this->db->insert('leave',$data);
    }
    
    function update_leave($leave_id = '')
    {
        $data['start_date']     = strtotime($this->input->post('start_date'));
        $data['end_date']       = strtotime($this->input->post('end_date'));
        $data['reason']         = $this->input->post('reason');
        
        $this->db->update('leave', $data, array('leave_id' => $leave_id));
    }
    
    function delete_leave($leave_id = '')
    {
        $this->db->where('leave_id', $leave_id);
        $this->db->delete('leave');
    }

    // PRIVATE MESSAGING
    function send_new_private_message()
    {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));

        $reciever = $this->input->post('reciever');
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender'] = $sender;
            $data_message_thread['reciever'] = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code)
    {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());
    }

    function mark_thread_messages_read($message_thread_code)
    {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code)
    {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    // VACANCY
    function create_vacancy()
    {
        $data['name']                   = $this->input->post('name');
        $data['number_of_vacancies']    = $this->input->post('number_of_vacancies');
        $data['last_date']              = strtotime($this->input->post('last_date'));
        
        $this->db->insert('vacancy',$data);
    }
    
    function update_vacancy($vacancy_id = '')
    {
        $data['name']                   = $this->input->post('name');
        $data['number_of_vacancies']    = $this->input->post('number_of_vacancies');
        $data['last_date']              = strtotime($this->input->post('last_date'));
        
        $this->db->update('vacancy', $data, array('vacancy_id' => $vacancy_id));
    }
    
    function delete_vacancy($vacancy_id = '')
    {
        $this->db->where('vacancy_id', $vacancy_id);
        $this->db->delete('vacancy');
    }

    // APPLICATION
    function create_application()
    {
        $data['applicant_name'] = $this->input->post('applicant_name');
        $data['vacancy_id']     = $this->input->post('vacancy_id');
        $data['apply_date']     = strtotime($this->input->post('apply_date'));
        $data['status']         = $this->input->post('status');
        
        $this->db->insert('application', $data);
    }
    
    function update_application($application_id = '')
    {
        $old_vacancy_id = $this->db->get_where('application', array('application_id' => $application_id))->row()->vacancy_id;

        $data['applicant_name'] = $this->input->post('applicant_name');
        $data['vacancy_id']     = $this->input->post('vacancy_id');
        $data['apply_date']     = strtotime($this->input->post('apply_date'));
        $data['status']         = $this->input->post('status');
        
        $this->db->update('application', $data, array('application_id' => $application_id));
    }
    
    function delete_application($application_id = '')
    {
        $this->db->where('application_id', $application_id);
        $this->db->delete('application');
    }
	
	public function empregCode_old() {
        $rcode = '';
		$this->load->helper('string');
        $rcode = 'SGOC-'.random_string('numeric', 4);
        $this->db->where('user_regcode', $rcode);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0)
            $this->empregCode();
        else
            return $rcode;
    }
	
	public function empregCode($client_ccode) {
        $rcode = '';
        $query ="select * from user order by user_id DESC limit 1";
        $res = $this->db->query($query);
		
		$client_company=$this->db->get_where('client',array('client_ccode'=>$client_ccode ))->row()->client_company; 
		$ccode=$this->db->get_where('company',array('company_id'=>$client_company ))->row()->ccode; 

     if($res->num_rows() > 0) 
    {
        //return $res->result("array");
        $lastcode= $res->row()->user_regcode;
        if($lastcode!='')
        {
        //$increment=substr($lastcode,5,strlen($lastcode))+1;
       $increment= substr($lastcode, -4)+1;
        $rcode = $ccode.'-'.$client_ccode.'-'.$increment;
        }
        else
        $rcode = $ccode.'-'.$client_ccode.'-'.'1000';
    }
    else
    $rcode = $ccode.'-'.$client_ccode.'-'.'1000';
    
       // echo $rcode;
        //die;
            return $rcode;
    }



	public function enterimport_attendance(){
		
 
        $data = array();
        $data['Title'] = 'Import Attendance';
        if (empty($_FILES['file_import']['name']))
        {
            $this->form_validation->set_rules('file_import', 'File', 'required');
        }      
     
            if (isset($_FILES["file_import"]) && !empty($_FILES['file_import']['name'])) {
                $filename=$_FILES["file_import"]["name"];
                $extn = substr($filename, strrpos($filename,'.')+1);
                if(strtoupper($extn)=='CSV' || strtoupper($extn)=='csv'){
                    $filex = time().$filename;
                    $dir_path = __DIR__.'/../../images/imported_csv_attendance/';
                    $file_path = $dir_path.$filex;    
                    $path = 'images/imported_csv_attendance/'.$filex;

                    if(!file_exists($dir_path))
                        mkdir($dir_path, 0777, true);                    

                    if(file_exists($file_path))
                        unlink($file_path);

                    if(move_uploaded_file($_FILES["file_import"]["tmp_name"], $file_path))
					{
					
					$company_id=$this->input->post('company_id');
					$client_id=$this->input->post('client');
					$year=$this->input->post('year');
					$month=$this->input->post('month');
					
						
	                    require_once( __DIR__.'/../third_party/PHPExcel/Classes/PHPExcel/IOFactory.php' );
                        $inputFileName = $file_path;
                        //echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                        $sheetData = $objPHPExcel->getActiveSheet()->toArray(NULL,true,true,true);
                        $row_count = count($sheetData);      
                        
                        //print_r($sheetData);
						
                        foreach($sheetData as $xky=>$xl){
                             if ($xky > 1) {
                                $dataRecord[] = $xl;
                            } else
							$dataheading=$xl;
                        }//print_r($dataheading);die;
						foreach($dataheading as $keyh => $valh)
						{
							if($keyh=='A' || $keyh=='B' || $keyh=='C' || $keyh=='D' || $keyh=='E'|| $keyh=='F')
							continue;
							$headingdate[]=$valh;
						}
								
					$client=$this->db->get_where('client', array('client_id' => $client_id))->row();
					$client_name=$client->client_name;
					$cycle=$client->client_mc;
					$weekend=$client->client_weekend;
					$date_s=$cycle.'-'.$month.'-'.$year;
					if($cycle>1)
					$date_s= date('d-m-Y',strtotime( '-1 month', strtotime($date_s )));
					//echo $date_s;
					//echo '<br/>';
					$date_e= date('d-m-Y',strtotime( '+1 month', strtotime($date_s )));
					$date_e= date('d-m-Y',strtotime( '-1 day', strtotime($date_e )));
					$date1 = new DateTime($date_s);
					$date2 = new DateTime($date_e);
					$daycount = $date2->diff($date1)->format("%a")+1;
					$heading_datecount=count($headingdate);
					if($heading_datecount!=$daycount)
					return false;
					for($i=0;$i<$daycount;$i++)
					{  
						$final_date=strtotime( '+'.$i.' day', strtotime($date_s )); 
						$heading_date=strtotime($headingdate[$i]);  
						if($final_date!=$heading_date)
						return false;
					}
						
					$sql = "INSERT INTO excel_attendanceimport(excel_type,excel_desc,excel_title,excel_date,excel_status,excel_company,excel_client,excel_month,excel_year) values('attendance','".$path."','".$filename."','".date('Y-m-d h:i:s')."',0,'".$company_id."','".$client_id."','".$month."','".$year."')";
                        
                        $query = $this->db->query($sql);
                        $excel_id = $this->db->insert_id();
						
                        if (sizeof($dataRecord) > 0) {
$i=2;
                            foreach ($dataRecord as $key => $val) {

                                if($val['A']!=''){
								$user_row=$this->db->get_where('user', array('type' => 2,'user_regcode'=>$val['D']))->row();
								$user=$user_row->user_id;
								$client=$user_row->client_id;
                                
                                
								/*$cell = $objPHPExcel->getActiveSheet()->getCell('P' . $i);
							   	$excelDate1 = $cell->getValue();
							   	$stringDate1 = \PHPExcel_Style_NumberFormat::toFormattedString($excelDate1 , 'YYYY-MM-DD');					
								$data2['date_of_joining']       = strtotime($stringDate1);*/
								foreach($val as $key1 => $val1){
								if($key1=='A' || $key1=='B' || $key1=='C' || $key1=='D' || $key1=='E' || $key1=='F')
								continue;
								$data2['attendance_code']   =  substr(md5(rand(100000000, 20000000000)), 0, 7);
                                $data2['client_id']         =$client;
                				$data2['user_id']           = $user;
								$data2['excel_id']			=$excel_id;
                				$data2['date']              = strtotime($dataheading[$key1]);//$final_date;
								if($val1=='A')
								$data2['status']            = 2;
								elseif($val1=='L')
								$data2['status']            = 3;
								elseif($val1=='W')
								$data2['status']            = 4;
								elseif($val1=='H')
								$data2['status']            = 5;
								elseif($val1=='NJ')
								$data2['status']            = 6;
								elseif($val1=='HD')
								$data2['status']            = 7;
								else
                                $data2['status']            = 1;
                    
                                $this->db->insert('attendance_temp',$data2);
								}
                                }
								$i++;
                              }
            
                         }
                    }
                }
             return true;
        }return false;
    }
	
	public function createimport_attendance()
	{
		$attendance = $this->db->get_where('attendance_temp', array('excel_id' =>$_REQUEST['excel_id']))->result_array();
		if(!empty($attendance))
		{
			$i=0;
        	foreach ($_REQUEST['user_id'] as $key => $value)
			{
			
			$client_id = $_REQUEST['client_id'][$key];
			$user_id=$_REQUEST['user_id'][$key];
			$status=$_REQUEST['status'][$key];
			$date=$_REQUEST['date'][$key];
			$attendance_code=substr(md5(rand(100000000, 20000000000)), 0, 7);
				//user
				
			$data2['attendance_code']		= $attendance_code;		
			$data2['client_id']				= $client_id;
			$data2['user_id']				= $user_id;
			$data2['date']                  = $date;
			$data2['status']                = $status;
			$this->db->insert('attendance',$data2);
			$this->db->where('attendance_id', $key);
        	$this->db->delete('attendance_temp');
			}
			
			//$this->db->where('excel_id', $_REQUEST['excel_id']);
            //$this->db->update('excel_attendanceimport',array('excel_status'=>2));
			
			// generate payroll
			$import = $this->db->get_where('excel_attendanceimport', array('excel_id' => $_REQUEST['excel_id']))->row();
			$client_id=$import->excel_client;
			$month=$import->excel_month;
			$year=$import->excel_year;
			//$employees = $this->db->get_where('user',array('type' => 2,'client_id' => $client_id))->result();
			$client=$this->db->get_where('client', array('client_id' => $client_id))->row();
			$cycle=$client->client_mc;
			//$leave_limit=$client->client_nolim;
			$leave_limit=0;
			$leave_afterjoin=$client->client_laj;
			$leave_slab1=$client->client_lslab1;
			$leave_slab2=$client->client_lslab2;
			$leave_slab3=$client->client_lslab3;
			$leave_slab4=$client->client_lslab4;
			$date_s=$cycle.'-'.$month.'-'.$year;
			if($cycle>1)
			$date_s= date('d-m-Y',strtotime( '-1 month', strtotime($date_s )));
			
			$date_e= date('d-m-Y',strtotime( '+1 month', strtotime($date_s )));
			$date_e= date('d-m-Y',strtotime( '-1 day', strtotime($date_e )));
			$sdate=strtotime($date_s);
			$edate=strtotime($date_e);
			$input = array_unique($_REQUEST['user_id']);
			foreach ($input as $key => $value)
			{
				
				$row = $this->db->get_where('user',array('type' => 2,'user_id' => $value))->row();
					
			if( $row->date_of_joining>strtotime($date_e) || $row->date_of_leaving>strtotime($date_e))
				continue;
			$joining_salary=$row->joining_salary;
			$fixed_arr=json_decode($row->fixed_salary);
			//attendace count of employee
			$this->db->select('count(*) as count,count(CASE WHEN status=1 THEN 1 END) as present,count(CASE WHEN status=2 THEN 1 END) as absent,count(CASE WHEN status=3 THEN 1 END) as leave1,count(CASE WHEN status=4 THEN 1 END) as weekend,count(CASE WHEN status=5 THEN 1 END) as holiday,count(CASE WHEN status=6 THEN 1 END) as nojoin,count(CASE WHEN status=7 THEN 1 END) as halfday');
			$this->db->from('attendance');
			$this->db->where('user_id='.$row->user_id);
			$this->db->where('date BETWEEN "'. $sdate. '" and "'. $edate.'"');
			$result = $this->db->get()->row_array();
			$month_day= $result['count'];
			$present= $result['present'];
			$absent= $result['absent'];
			$leave= $result['leave1'];
			$weekend= $result['weekend'];
			$holiday= $result['holiday'];
			$nojoin= $result['nojoin'];
			$halfday=$result['halfday']/2;
			$Working_Days=$month_day-($weekend+$holiday);
			$Paid_Holidays=$weekend+$holiday;
			//----------------------------------
			if($present>19) 
			{$leave_limit=$leave_slab4; }
			elseif($present>9 && $present<20) 
			{$leave_limit=$leave_slab3; }
			elseif($present>5 && $present<10) 
			{$leave_limit=$leave_slab2; }
			else
			$leave_limit=$leave_slab1;
			//---------------------------
			/*if($row->date_of_joining>$sdate)
			{
				if($present<$leave_afterjoin) 
				{$leave_limit=0; }
				
			}*/
			
			$leave_balance=0;
			$lmonth=date('n',$edate);
			$lyear=date('Y',$edate);
			$leave_obj = $this->db->get_where('user_leave', array('leave_month' => $lmonth-1,'leave_year' => $lyear,'leave_user_id' => $row->user_id));
			if($leave_obj->num_rows()>0)
			$leave_balance=$leave_obj->row()->leave_balance;
			$leave_limit=$leave_limit+$leave_balance;
			
			
			/*$TOTAL_ABSENT=$leave+$absent+$halfday;
			$lwp= ($leave_limit-($TOTAL_ABSENT))<0?($leave_limit-($TOTAL_ABSENT)):0;
			$lwp-=$nojoin;
			$balnce_leave=($leave_limit-($leave+$absent))>0?($leave_limit-($leave+$absent)):0;
			$paid_leave=($TOTAL_ABSENT>0)?(($TOTAL_ABSENT>$leave_limit)?$leave_limit:$TOTAL_ABSENT):0;*/
			
			
			$TOTAL_LEAVE=0;
			$TOTAL_LEAVE=$leave+$halfday;
			$not_LEAVE=($TOTAL_LEAVE-$leave_limit)>0?($TOTAL_LEAVE-$leave_limit):0;
			$TOTAL_ABSENT=$absent+$not_LEAVE;
			$lwp= ($TOTAL_ABSENT>0)?$TOTAL_ABSENT:0;
			$lwp+=$nojoin;
			$balnce_leave=($leave_limit-($TOTAL_LEAVE))>0?($leave_limit-($TOTAL_LEAVE)):0;
			$paid_leave=($TOTAL_LEAVE>0)?(($TOTAL_LEAVE>$leave_limit)?$TOTAL_LEAVE-$leave_limit:$TOTAL_LEAVE):0;

			
			
			
			
			if($client->client_lcf==1){
			$leave_data=array();
			$query = $this->db->get_where('user_leave', array('leave_month' => $lmonth,'leave_year' => $lyear,'leave_user_id' => $row->user_id));
			if($query->num_rows() >0)
			{
			$this->db->where('leave_id',  $query->row()->leave_id);
            $this->db->update('user_leave', array('leave_balance'=>$balnce_leave));
			}
			else{
			$leave_data['leave_user_id']=$row->user_id;
			$leave_data['leave_month']=$lmonth;
			$leave_data['leave_year']=$lyear;
			$leave_data['leave_balance']=$balnce_leave;
			$this->db->insert('user_leave', $leave_data);
			}
			}
			//$this->db->query("update user set balance_leave=".$balnce_leave." where user_id=".$row->user_id);
			/*if($lwp>0)
				$Total_Paid_Days=($month_day-$nojoin);
			else*/
				$Total_Paid_Days=($month_day-$lwp);
			//$paid_leave=$leave_limit;
			$attendance=array();				
			//echo $row->user_id;<br />
			$new_entry = array('type' => 'Month Days', 'amount' => $month_day);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Weekly-Off', 'amount' => $weekend);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Holiday-Off', 'amount' => $holiday);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Paid Holidays', 'amount' => $Paid_Holidays);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Working Days', 'amount' => $Working_Days);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'LWP', 'amount' => $lwp);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Present Days', 'amount' => $present);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Total Paid Days', 'amount' => $Total_Paid_Days);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Days-Off', 'amount' => 0);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Unpaid Holidays', 'amount' => 0);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Max Payable Days', 'amount' => $month_day);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Net Paid Days', 'amount' => $Total_Paid_Days);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Paid Leaves', 'amount' => $paid_leave);
			array_push($attendance, $new_entry);
			//echo json_encode($attendance);die;
			$data['attendance']     = json_encode($attendance);
			
			//allowances count of employee
			$allowances= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',2);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			foreach ($salary_breakup as $row_allowa)
			{
				$new_entry = array('type' => $row_allowa->salbrk_title, 'amount' => 0);
				array_push($allowances, $new_entry);
			}
			$data['allowances']= json_encode($allowances);
			
			//arears count of employee
			$arrears= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',6);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			foreach ($salary_breakup as $row_arrear)
			{
				$new_entry = array('type' => $row_arrear->salbrk_title, 'amount' => 0);
				array_push($arrears, $new_entry);
			}
			$data['arrears']= json_encode($arrears);
			//fixed salary part and calculate earned salary
			$salarypart= array();
			$fixced_val=array();
			$earngross=0;
			$earnbasic=0;
			foreach ($fixed_arr as $row_fixed)
			{		
					
					$new_entry = array('type' => $row_fixed->type, 'amount' => $row_fixed->amount);
					array_push($salarypart, $new_entry);
					//earn calculation
							$deduct=0;
							$singleday=$row_fixed->amount/$month_day;
							if($lwp>0)
							$deduct=$singleday*$lwp;
							$total=$row_fixed->amount-abs($deduct);
							if($row_fixed->type=='FIXED BASIC')
							$earnbasic=round($total);
							$fixced_val[]=round($total);
							$earngross+=round($total);
			}
			$data['salarypart']= json_encode($salarypart);
			//earned salary 
			$salary_earned= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',5);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			$part_total=0;
			$i=0;
			foreach ($salary_breakup as $row_earned)
			{
				$new_entry = array('type' => $row_earned->salbrk_title, 'amount' => $fixced_val[$i]);
                array_push($salary_earned, $new_entry);
				$i++;
			}
			$data['salary_earned']= json_encode($salary_earned);
			//deductions count of employee
			$deductions= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',3);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			$deductions_total=0;
			$pt=0;
			$lwf=0;
			$elwf=0;
			// LWF CALCULATION
			if($row->city=='81' || $row->city=='168' || $row->city=='228'){
			$obj_lwf=$this->db->get_where('lwf',array('lwf_status' => 1,'lwf_city' => 228));
			if($obj_lwf->num_rows()>0)
				{
					$row_lwf=$obj_lwf->row();
					if($month==4 || $month==10)
					{
					$lwf=$row_lwf->lwf_emp_value;
					$elwf=$row_lwf->lwf_client_value;
					}
				}
			}
			else{
			$obj_lwf = $this->db->get_where('lwf',array('lwf_status' => 1,'lwf_state' => $row->state));
			if($obj_lwf->num_rows()>0)
				{
				$row_lwf=$obj_lwf->row();
					if($row_lwf->lwf_period=='Monthly'||($row_lwf->lwf_period=='Half yearly' && $month==6)|| $month==12)
					{
					$lwf=$row_lwf->lwf_emp_value;
					$elwf=$row_lwf->lwf_client_value;
					}
				}
			}
			// PT CALCULATION
			if($row->state==27)
			{
				$obj_pt=$this->db->get_where('pt',array('pt_status' => 1,'pt_state' => $row->state,'pt_city' => $row->city,'pt_from<='=>$earngross,'pt_to>='=>$earngross));
				if($obj_pt->num_rows()>0)
				{
					$pt=$obj_pt->row()->pt_value;
				}
			}
			else
			{
				$obj_pt=$this->db->get_where('pt',array('pt_status' => 1,'pt_state' => $row->state,'pt_city' => 0,'pt_from<='=>$earngross,'pt_to>='=>$earngross));
				if($obj_pt->num_rows()>0)
				{
					$pt=$obj_pt->row()->pt_value;
				}
			}
			foreach ($salary_breakup as $row_deduction)
			{
				if($row_deduction->salbrk_title=='EMPLOYEE ESI' && $joining_salary<21000){
				$deductions_salary=($earngross*$row_deduction->salbrk_value)/100;
				}elseif($row_deduction->salbrk_title=='EMPLOYEE ESI' && $joining_salary>=21000){
				$deductions_salary=0;
				}
				elseif($row_deduction->salbrk_title=='PROVIDENT FUND'){
				$deductions_salary=($earnbasic*$row_deduction->salbrk_value)/100;
				}
				elseif($row_deduction->salbrk_title=='LABOUR WELFARE FUND' ){
				
				$deductions_salary=$lwf;
				
				}
				elseif($row_deduction->salbrk_title=='PROFESSIONAL TAX'){
				$deductions_salary=$pt;
				}
				else
				$deductions_salary=$row_deduction->salbrk_value;
				$deductions_total+=round($deductions_salary);
				
				$new_entry = array('type' => $row_deduction->salbrk_title, 'amount' => round($deductions_salary));
                array_push($deductions, $new_entry);
			}
			$data['deductions']= json_encode($deductions);
			// eployer salary count
			$eployer_salaryparts= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',4);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			$employer_total=0;
			
			$employer_insurance=$this->db->get_where('settings' , array('type'=>'employer_insurance'))->row()->description;
			foreach ($salary_breakup as $row_employer)
			{	
				if($row_employer->salbrk_title=='EMPLOYER ESI' && $joining_salary<21000){
				$employer_salary=round(($earngross*$row_employer->salbrk_value)/100);
				}
				elseif($row_employer->salbrk_title=='EMPLOYER ESI' && $joining_salary>=21000){
				$employer_salary=0;
				}
				elseif($row_employer->salbrk_title=='EMPLOYER PROVIDENT FUND'){
				$employer_salary=round(($earnbasic*$row_employer->salbrk_value)/100);
				}
				elseif($row_employer->salbrk_title=='EMPLOYER LABOUR WELFARE FUND'){
				
				$employer_salary=$elwf;
				
				}
				elseif($row_employer->salbrk_title=='INSURANCE'){
				$employer_salary=round($employer_insurance);
				}
				else
				$employer_salary=round($row_employer->salbrk_value);
				$employer_total+=round($employer_salary);
				$new_entry = array('type' => $row_employer->salbrk_title, 'amount' => $employer_salary);
                array_push($eployer_salaryparts, $new_entry);
			}
			$data['eployer_salarypart']= json_encode($eployer_salaryparts);
			
			$data['employer_salary']=$employer_total;
			$data['payout']=$earngross-$deductions_total;
			$data['grosssal']=$earngross;
			$data['total_deduction']=$deductions_total;
			$data['total_allowance']=0;
			$data['total_arrear']=0;
			$data['ctc']=round($earngross+$employer_total);
			$data['payroll_code']   = substr(md5(rand(100000000, 20000000000)), 0, 7);
			$data['user_id']= $row->user_id;
			if($cycle>1)
			{
				$month_c=date('n',$edate);
				$year_c=date('Y',$edate);
				$month_c = ltrim($month_c, '0');
				$data['date']= $month_c . ',' . $year_c;
			}
			else
			{
				$month = ltrim($month, '0');
				$data['date']= $month . ',' . $year;
			}
			$data['from_date']=$sdate;
			$data['to_date']=$edate;
			$data['status']= 1;
			$payroll = $this->db->get_where('payroll', array('date' => $data['date'],'user_id' => $row->user_id));
			if($payroll->num_rows() >0)
			{
			$this->db->where('payroll_id',  $query->row()->payroll_id);
            $this->db->update('payroll',$data);
			}
			else
			$this->db->insert('payroll', $data);
			
					
				
			}
			// end payroll
					
		return true;
		}
		return false;
	}
	public function createimport_payroll($param1='')
	{
		if($param1!=''){
		$import = $this->db->get_where('excel_attendanceimport', array('excel_id' => $param1))->row();
		$client_id=$import->excel_client;
		$month=$import->excel_month;
		$year=$import->excel_year;
		$employees = $this->db->get_where('user',array('type' => 2,'client_id' => $client_id))->result();
		$client=$this->db->get_where('client', array('client_id' => $client_id))->row();
		$cycle=$client->client_mc;
		//$leave_limit=$client->client_nolim;
		$leave_limit=0;
		$leave_afterjoin=$client->client_laj;
		$leave_slab1=$client->client_lslab1;
		$leave_slab2=$client->client_lslab2;
		$leave_slab3=$client->client_lslab3;
		$leave_slab4=$client->client_lslab4;
		$date_s=$cycle.'-'.$month.'-'.$year;
		if($cycle>1)
		$date_s= date('d-m-Y',strtotime( '-1 month', strtotime($date_s )));
		
		$date_e= date('d-m-Y',strtotime( '+1 month', strtotime($date_s )));
		$date_e= date('d-m-Y',strtotime( '-1 day', strtotime($date_e )));
		$sdate=strtotime($date_s);
		$edate=strtotime($date_e);
		foreach($employees as $row)
		{	
			if( $row->date_of_joining>strtotime($date_e) || $row->date_of_leaving>strtotime($date_e))
				continue;
			$joining_salary=$row->joining_salary;
			$fixed_arr=json_decode($row->fixed_salary);
			//attendace count of employee
			$this->db->select('count(*) as count,count(CASE WHEN status=1 THEN 1 END) as present,count(CASE WHEN status=2 THEN 1 END) as absent,count(CASE WHEN status=3 THEN 1 END) as leave1,count(CASE WHEN status=4 THEN 1 END) as weekend,count(CASE WHEN status=5 THEN 1 END) as holiday,count(CASE WHEN status=6 THEN 1 END) as nojoin,count(CASE WHEN status=7 THEN 1 END) as halfday');
			$this->db->from('attendance');
			$this->db->where('user_id='.$row->user_id);
			$this->db->where('date BETWEEN "'. $sdate. '" and "'. $edate.'"');
			$result = $this->db->get()->row_array();
			$month_day= $result['count'];
			$present= $result['present'];
			$absent= $result['absent'];
			$leave= $result['leave1'];
			$weekend= $result['weekend'];
			$holiday= $result['holiday'];
			$nojoin= $result['nojoin'];
			$halfday=$result['halfday']/2;
			$Working_Days=$month_day-($weekend+$holiday);
			$Paid_Holidays=$weekend+$holiday;
			//----------------------------------
			if($present>19) 
			{$leave_limit=$leave_slab4; }
			elseif($present>9 && $present<20) 
			{$leave_limit=$leave_slab3; }
			elseif($present>5 && $present<10) 
			{$leave_limit=$leave_slab2; }
			else
			$leave_limit=$leave_slab1;
			//---------------------------
			/*if($row->date_of_joining>$sdate)
			{
				if($present<$leave_afterjoin) 
				{$leave_limit=0; }
				
			}*/
			
			$leave_balance=0;
			$lmonth=date('n',$edate);
			$lyear=date('Y',$edate);
			$leave_obj = $this->db->get_where('user_leave', array('leave_month' => $lmonth-1,'leave_year' => $lyear,'leave_user_id' => $row->user_id));
			if($leave_obj->num_rows()>0)
			$leave_balance=$leave_obj->row()->leave_balance;
			$leave_limit=$leave_limit+$leave_balance;
			$TOTAL_ABSENT=$leave+$absent+$halfday;
			$lwp= ($leave_limit-($TOTAL_ABSENT))<0?($leave_limit-($TOTAL_ABSENT)):0;
			$lwp-=$nojoin;
			$balnce_leave=($leave_limit-($leave+$absent))>0?($leave_limit-($leave+$absent)):0;
			$paid_leave=($TOTAL_ABSENT>0)?(($TOTAL_ABSENT>$leave_limit)?$leave_limit:$TOTAL_ABSENT):0;
			if($client->client_lcf==1){
			$leave_data=array();
			$query = $this->db->get_where('user_leave', array('leave_month' => $lmonth,'leave_year' => $lyear,'leave_user_id' => $row->user_id));
			if($query->num_rows() >0)
			{
			$this->db->where('leave_id',  $query->row()->leave_id);
            $this->db->update('user_leave', array('leave_balance'=>$balnce_leave));
			}
			else{
			$leave_data['leave_user_id']=$row->user_id;
			$leave_data['leave_month']=$lmonth;
			$leave_data['leave_year']=$lyear;
			$leave_data['leave_balance']=$balnce_leave;
			$this->db->insert('user_leave', $leave_data);
			}
			}
			//$this->db->query("update user set balance_leave=".$balnce_leave." where user_id=".$row->user_id);
			if($lwp>0)
				$Total_Paid_Days=($month_day-$nojoin);
			else
				$Total_Paid_Days=($month_day+$lwp);
			//$paid_leave=$leave_limit;
			$attendance=array();				
			//echo $row->user_id;<br />
			$new_entry = array('type' => 'Month Days', 'amount' => $month_day);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Weekly-Off', 'amount' => $weekend);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Holiday-Off', 'amount' => $holiday);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Paid Holidays', 'amount' => $Paid_Holidays);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Working Days', 'amount' => $Working_Days);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'LWP', 'amount' => $lwp);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Present Days', 'amount' => $present);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Total Paid Days', 'amount' => $Total_Paid_Days);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Days-Off', 'amount' => 0);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Unpaid Holidays', 'amount' => 0);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Max Payable Days', 'amount' => $month_day);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Net Paid Days', 'amount' => $Total_Paid_Days);
			array_push($attendance, $new_entry);
			$new_entry = array('type' => 'Paid Leaves', 'amount' => $paid_leave);
			array_push($attendance, $new_entry);
			//echo json_encode($attendance);die;
			$data['attendance']     = json_encode($attendance);
			
			//allowances count of employee
			$allowances= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',2);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			foreach ($salary_breakup as $row_allowa)
			{
				$new_entry = array('type' => $row_allowa->salbrk_title, 'amount' => 0);
				array_push($allowances, $new_entry);
			}
			$data['allowances']= json_encode($allowances);
			
			//arears count of employee
			$arrears= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',6);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			foreach ($salary_breakup as $row_arrear)
			{
				$new_entry = array('type' => $row_arrear->salbrk_title, 'amount' => 0);
				array_push($arrears, $new_entry);
			}
			$data['arrears']= json_encode($arrears);
			//fixed salary part and calculate earned salary
			$salarypart= array();
			$fixced_val=array();
			$earngross=0;
			$earnbasic=0;
			foreach ($fixed_arr as $row_fixed)
			{		
					
					$new_entry = array('type' => $row_fixed->type, 'amount' => $row_fixed->amount);
					array_push($salarypart, $new_entry);
					//earn calculation
							$deduct=0;
							$singleday=$row_fixed->amount/$month_day;
							if($lwp<0)
							$deduct=$singleday*$lwp;
							$total=$row_fixed->amount-abs($deduct);
							if($row_fixed->type=='FIXED BASIC')
							$earnbasic=round($total);
							$fixced_val[]=round($total);
							$earngross+=round($total);
			}
			$data['salarypart']= json_encode($salarypart);
			//earned salary 
			$salary_earned= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',5);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			$part_total=0;
			$i=0;
			foreach ($salary_breakup as $row_earned)
			{
				$new_entry = array('type' => $row_earned->salbrk_title, 'amount' => $fixced_val[$i]);
                array_push($salary_earned, $new_entry);
				$i++;
			}
			$data['salary_earned']= json_encode($salary_earned);
			//deductions count of employee
			$deductions= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',3);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			$deductions_total=0;
			foreach ($salary_breakup as $row_deduction)
			{
				if($row_deduction->salbrk_title=='EMPLOYEE ESI' && $joining_salary<21000){
				$deductions_salary=($earngross*$row_deduction->salbrk_value)/100;
				}elseif($row_deduction->salbrk_title=='EMPLOYEE ESI' && $joining_salary>=21000){
				$deductions_salary=0;
				}
				elseif($row_deduction->salbrk_title=='PROVIDENT FUND'){
				$deductions_salary=($earnbasic*$row_deduction->salbrk_value)/100;
				}else
				$deductions_salary=$row_deduction->salbrk_value;
				$deductions_total+=round($deductions_salary);
				
				$new_entry = array('type' => $row_deduction->salbrk_title, 'amount' => round($deductions_salary));
                array_push($deductions, $new_entry);
			}
			$data['deductions']= json_encode($deductions);
			// eployer salary count
			$eployer_salaryparts= array();
			$this->db->order_by('salbrk_id', 'asc');
			$this->db->where('salbrk_type',4);
			$salary_breakup = $this->db->get('salary_breakup')->result();
			$employer_total=0;
			foreach ($salary_breakup as $row_employer)
			{	
				if($row_employer->salbrk_title=='EMPLOYER ESI' && $joining_salary<21000){
				$employer_salary=round(($earngross*$row_employer->salbrk_value)/100);
				}
				elseif($row_employer->salbrk_title=='EMPLOYER ESI' && $joining_salary>=21000){
				$employer_salary=0;
				}
				elseif($row_employer->salbrk_title=='EMPLOYER PROVIDENT FUND'){
				$employer_salary=round(($earnbasic*$row_employer->salbrk_value)/100);
				}
				else
				$employer_salary=round($row_employer->salbrk_value);
				$employer_total+=round($employer_salary);
				$new_entry = array('type' => $row_employer->salbrk_title, 'amount' => $employer_salary);
                array_push($eployer_salaryparts, $new_entry);
			}
			$data['eployer_salarypart']= json_encode($eployer_salaryparts);
			
			$data['employer_salary']=$employer_total;
			$data['payout']=$earngross-$deductions_total;
			$data['grosssal']=$earngross;
			$data['total_deduction']=$deductions_total;
			$data['total_allowance']=0;
			$data['total_arrear']=0;
			$data['ctc']=round($earngross+$employer_total);
			$data['payroll_code']   = substr(md5(rand(100000000, 20000000000)), 0, 7);
			$data['user_id']= $row->user_id;
			if($cycle>1)
			{
				$month_c=date('n',$edate);
				$year_c=date('Y',$edate);
				$month_c = ltrim($month_c, '0');
				$data['date']= $month_c . ',' . $year_c;
			}
			else
			{
				$month = ltrim($month, '0');
				$data['date']= $month . ',' . $year;
			}
			$data['from_date']=$sdate;
			$data['to_date']=$edate;
			$data['status']= 1;
			$payroll = $this->db->get_where('payroll', array('date' => $data['date'],'user_id' => $row->user_id));
			if($payroll->num_rows() >0)
			{
			$this->db->where('payroll_id',  $query->row()->payroll_id);
            $this->db->update('payroll',$data);
			}
			else
			$this->db->insert('payroll', $data);
			
					}	
		
		
		$this->db->where('excel_id', $param1);
        $this->db->update('excel_attendanceimport',array('excel_status'=>3));
		return true;
		}
		return false;
	}
	//ateek/////////
	
	// leave import
	public function enterimport_leave(){
		
 
        $data = array();
        $data['Title'] = 'Import Leave';
        if (empty($_FILES['file_import']['name']))
        {
            $this->form_validation->set_rules('file_import', 'File', 'required');
        }      
     
            if (isset($_FILES["file_import"]) && !empty($_FILES['file_import']['name'])) {
                $filename=$_FILES["file_import"]["name"];
                $extn = substr($filename, strrpos($filename,'.')+1);
                if(strtoupper($extn)=='CSV' || strtoupper($extn)=='csv'){
                    $filex = time().$filename;
                    $dir_path = __DIR__.'/../../images/imported_csv_leave/';
                    $file_path = $dir_path.$filex;    
                    $path = 'images/imported_csv_leave/'.$filex;

                    if(!file_exists($dir_path))
                        mkdir($dir_path, 0777, true);                    

                    if(file_exists($file_path))
                        unlink($file_path);

                    if(move_uploaded_file($_FILES["file_import"]["tmp_name"], $file_path))
					{
					
					$company_id=$this->input->post('company_id');
					$client_id=$this->input->post('client');
					$year=$this->input->post('year');
					$month=$this->input->post('month');
					
						
	                    require_once( __DIR__.'/../third_party/PHPExcel/Classes/PHPExcel/IOFactory.php' );
                        $inputFileName = $file_path;
                        //echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                        $sheetData = $objPHPExcel->getActiveSheet()->toArray(NULL,true,true,true);
                        $row_count = count($sheetData);      
                        
                        //print_r($sheetData);
						
                        foreach($sheetData as $xky=>$xl){
                             if ($xky > 1) {
                                $dataRecord[] = $xl;
                            } else
							$dataheading=$xl;
                        }//print_r($dataheading);die;
						
								
					$client=$this->db->get_where('client', array('client_id' => $client_id))->row();
					$client_name=$client->client_name;
					foreach ($dataRecord as $key => $val) {
					if($val['G']!=$month || $val['H']!=$year)
					{return false;}
					
					}
					
						
					$sql = "INSERT INTO excel_leaveimport(excel_type,excel_desc,excel_title,excel_date,excel_status,excel_company,excel_client,excel_month,excel_year) values('attendance','".$path."','".$filename."','".date('Y-m-d h:i:s')."',0,'".$company_id."','".$client_id."','".$month."','".$year."')";
                        
                        $query = $this->db->query($sql);
                        $excel_id = $this->db->insert_id();
						
                        if (sizeof($dataRecord) > 0) {
$i=2;
                            foreach ($dataRecord as $key => $val) {

                                if($val['A']!=''){
								$user_row=$this->db->get_where('user', array('type' => 2,'user_regcode'=>$val['D']))->row();
								$user=$user_row->user_id;
								$client=$user_row->client_id;
								
                				$data2['leave_user_id']           = $user;
								$data2['excel_id']			=$excel_id;
								$data2['leave_month']			=$val['G'];
								$data2['leave_year']			=$val['H'];
								$data2['leave_balance']			=$val['I'];
								
                                
                                
								$this->db->insert('user_leave_temp',$data2);
								
                                }
								$i++;
                              }
            
                         }
                    }
                }
             return true;
        }return false;
    }
	
		public function createimport_leave()
		{
		$attendance = $this->db->get_where('user_leave_temp', array('excel_id' =>$_REQUEST['excel_id']))->result_array();
		if(!empty($attendance))
		{
		 //echo count($_REQUEST['leave_user_id']);die;
			$i=0;
        	foreach ($_REQUEST['leave_user_id'] as $key => $value)
			{
			
			
			$leave_user_id=$_REQUEST['leave_user_id'][$key];
			$month=$_REQUEST['leave_month'][$key];
			$year=$_REQUEST['leave_year'][$key];
			$leave_balance=$_REQUEST['leave_balance'][$key];
			
			
				//user
				
			$data2['leave_user_id']		= $leave_user_id;		
			$data2['leave_month']		= $month;
			$data2['leave_year']		= $year;
			$data2['leave_balance']     = ($leave_balance!='')?$leave_balance:0;
			$leave_obj = $this->db->get_where('user_leave', array('leave_month' => $month,'leave_year' => $year,'leave_user_id' => $leave_user_id));
			if($leave_obj->num_rows()>0)
			{
				$leave_id=$leave_obj->row()->leave_id;
				$this->db->where('leave_id', $leave_id);
            	$this->db->update('user_leave',$data2);
			}
			else{
			$this->db->insert('user_leave',$data2);
			}
			//echo $this->db->last_query().'</br>';
			$this->db->where('leave_id', $key);
        	$this->db->delete('user_leave_temp');
			}
			//die;
			
			
					
		return true;
		}
		return false;
	}
	
	function import_delete_leave($user_code) {
	 
	 	$this->db->where('excel_id', $user_code);
        $this->db->delete('user_leave_temp');
        $user = $this->db->get_where('excel_leaveimport',array('excel_id'=>$user_code));
        $excel_desc = $user->row()->excel_desc;
        
        if (file_exists($excel_desc))
        unlink($excel_desc);
        $this->db->where('excel_id',$user_code);
        $this->db->delete('excel_leaveimport');
        return true;
    }
	
	public function getDesignationId($name='',$department)
	{
		$query = $this->db->get_where('designation', array('name' => strtolower($name),'department_id'=>$department));
		if($query->num_rows() > 0)
		{
			return $query->row()->designation_id;
		}
		else
		{
			$data['name']=strtolower($name);
			$data['department_id']=$department;
			$this->db->insert('designation', $data);
			return $this->db->insert_id();
		}
	}
	public function getDepartmentId($name='')
	{
		$query = $this->db->get_where('department', array('name' => strtolower($name)));
		if($query->num_rows() > 0)
		{
			return $query->row()->department_id;
		}
		else
		{
			$data['name']=strtolower($name);
			$data['department_code']=substr(md5(rand(100000000, 20000000000)), 0, 15);
			$this->db->insert('department', $data);
			return $this->db->insert_id();
		}
	}
    public function getcode($client_id){
        
        $sql = "select * from client where client_id=".$client_id;
        $query = $this->db->query($sql);
        $result = $query->row();
        if($result==''){
            return array();
        }else{
            return $result;
        }
    }

    public function empregCodeforcompany($client_ccode,$client_company) {

        $rcode = '';
        $query ="select * from user order by user_id DESC limit 1";
        $res = $this->db->query($query);
    
        $ccode=$this->db->get_where('company',array('company_id'=>$client_company ))->row()->ccode; 
       

     if($res->num_rows() > 0) {
        //return $res->result("array");
        $lastcode= $res->row()->user_regcode;
        
        if($lastcode!='')
        {
        //$increment=substr($lastcode,5,strlen($lastcode))+1;
         $increment= substr($lastcode, -4)+1;
          $rcode = $ccode.'-'.$client_ccode.'-'.$increment;
        }
        else
        $rcode = $ccode.'-'.$client_ccode.'-'.'1001';
    }
    else
    $rcode = $ccode.'-'.$client_ccode.'-'.'1001';
    
       // echo $rcode;
        //die;
            return $rcode;
    }
	//karna hai
	public function enterimport_employee_edit(){
		
 
        $data = array();
        $data['Title'] = 'Import Employee';
        if (empty($_FILES['file_import']['name']))
        {
            $this->form_validation->set_rules('file_import', 'File', 'required');
        }      
     
            if (isset($_FILES["file_import"]) && !empty($_FILES['file_import']['name'])) {
                $filename=$_FILES["file_import"]["name"];
                $extn = substr($filename, strrpos($filename,'.')+1);
                if(strtoupper($extn)=='CSV' || strtoupper($extn)=='csv'){
                    $filex = time().$filename;
                    $dir_path = __DIR__.'/../../images/imported_csv_employee_edit/';
                    $file_path = $dir_path.$filex;    
                    $path = 'images/imported_csv_employee_edit/'.$filex;

                    if(!file_exists($dir_path))
                        mkdir($dir_path, 0777, true);                    

                    if(file_exists($file_path))
                        unlink($file_path);

                    if(move_uploaded_file($_FILES["file_import"]["tmp_name"], $file_path))
					{
					
					$company_id=$this->input->post('company_id');
					$client_id=$this->input->post('client');
					
					
						
	                    require_once( __DIR__.'/../third_party/PHPExcel/Classes/PHPExcel/IOFactory.php' );
                        $inputFileName = $file_path;
                        //echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                        $sheetData = $objPHPExcel->getActiveSheet()->toArray(NULL,true,true,true);
                        $row_count = count($sheetData);      
                        
                        //print_r($sheetData);
						
                        foreach($sheetData as $xky=>$xl){
                             if ($xky > 1) {
                                $dataRecord[] = $xl;
                            } else
							$dataheading=$xl;
                        }//print_r($dataheading);die;
						
								
					
						
					$sql = "INSERT INTO excel_emp_edit_import(excel_type,excel_desc,excel_title,excel_date,excel_status,excel_company,excel_client) values('attendance','".$path."','".$filename."','".date('Y-m-d h:i:s')."',0,'".$company_id."','".$client_id."')";
                        
                        $query = $this->db->query($sql);
                        $excel_id = $this->db->insert_id();
						
                        if (sizeof($dataRecord) > 0) {
$i=2;
                            foreach ($dataRecord as $key => $val) {

                                if($val['A']!=''){
								$user_row=$this->db->get_where('user', array('type' => 2,'user_regcode'=>$val['D']))->row();
								$user_id=$user_row->user_id;
								$data2['company_id']=$company_id;
								$data2['client_id']=$client_id;
								$data2['user_id']=$user_id;
								$data2['user_regcode']=$user_row->user_regcode;
								$data2['name'] = ($val['E']!='')?$val['E']:'';
								$data2['father_name'] = ($val['F']!='')?$val['F']:'';
								$data2['mother_name'] = ($val['G']!='')?$val['G']:'';
								$data2['pan_no'] = ($val['H']!='')?$val['H']:'';
								$cell = $objPHPExcel->getActiveSheet()->getCell('I' . $i);
							   $uid_no = $cell->getValue();
							   $uid_no = \PHPExcel_Style_NumberFormat::toFormattedString($uid_no , '');
								$data2['uid_no'] = ($uid_no!='')?$uid_no:'';
								$data2['uid_ack'] = ($val['J']!='')?$val['J']:'';
								$data2['pf_no'] = ($val['K']!='')?$val['K']:'';
								$data2['un_no'] = ($val['L']!='')?$val['L']:'';
								$data2['ip_no'] = ($val['M']!='')?$val['M']:'';
								$data2['date_of_birth'] = ($val['N']!='')?strtotime($val['N']):'';
								$data2['local_address'] = ($val['O']!='')?$val['O']:'';
								$data2['permanent_address'] = ($val['P']!='')?$val['P']:'';
								
								
								
								
								
                                $data2['excel_id'] = $excel_id;
								$data2['status'] =1;
								$this->db->insert('user_edit_temp',$data2);
                                }
								$i++;
                              }
            
                         }
                    }
                }
             return true;
        }return false;
    }
	
	function import_delete_employee_edit($user_code) {
	 
	 	$this->db->where('excel_id', $user_code);
        $this->db->delete('user_edit_temp');
        $user = $this->db->get_where('excel_emp_edit_import',array('excel_id'=>$user_code));
        $excel_desc = $user->row()->excel_desc;
        
        if (file_exists($excel_desc))
        unlink($excel_desc);
        $this->db->where('excel_id',$user_code);
        $this->db->delete('excel_emp_edit_import');
        return true;
    }
	
	function updateimport_employee_edit(){
	
	 if(!empty($_REQUEST['name'])){
         foreach ($_REQUEST['name'] as $key => $value) {
		 	
            $name = $_REQUEST['name'][$key];
            $father_name = $_REQUEST['father_name'][$key];
			$mother_name = $_REQUEST['mother_name'][$key];
			
			if($_REQUEST['date_of_birth'][$key]!='' && $_REQUEST['date_of_birth'][$key]!='Pending')
            $date_of_birth = strtotime($_REQUEST['date_of_birth'][$key]);
			else
			$date_of_birth = '0';
            
            $local_address = $_REQUEST['local_address'][$key];
            $permanent_address = $_REQUEST['permanent_address'][$key];
			
            $pan_no = $_REQUEST['pan_no'][$key];
			
            $uid_no = $_REQUEST['uid_no'][$key];
			$uid_ack = $_REQUEST['uid_ack'][$key];
            $pf_no = $_REQUEST['pf_no'][$key];
            $un_no = $_REQUEST['un_no'][$key];
            $ip_no = $_REQUEST['ip_no'][$key];
           
								
                                $data2['name']                  = $name;
                                $data2['father_name']           = $father_name;
								$data2['mother_name']           = $mother_name;
								
                                $data2['date_of_birth']         = $date_of_birth;
                                
                                $data2['local_address']         = $local_address;
                                $data2['permanent_address']     = $permanent_address;
								

                               
                                $data2['pan_no']             = $pan_no;
								
                                $data2['uid_no']             = $uid_no;
								$data2['uid_ack']             = $uid_ack;
                                $data2['pf_no']             = $pf_no;
                                $data2['un_no']             =  $un_no;
                                $data2['ip_no']             = $ip_no;

                    
                                
                                
                
                                $this->db->where('id', $key);
                                $this->db->update('user_edit_temp',$data2);


              }
           return true;
        } 
        return false;
	
	
	}
	
	 function createimport_employee_edit()
	{
		$employee = $this->db->get_where('user_edit_temp', array('excel_id' =>$_REQUEST['excel_id']))->result_array();
		if(!empty($employee))
		{
			$i=0;
        	foreach ($_REQUEST['name'] as $key => $value)
			{
			
			
			$user_id=$_REQUEST['user_id'][$key];
			
            $name = $_REQUEST['name'][$key];
            $father_name = $_REQUEST['father_name'][$key];
			$mother_name = $_REQUEST['mother_name'][$key];
			
			
            if($_REQUEST['date_of_birth'][$key]!='' && $_REQUEST['date_of_birth'][$key]!='Pending')
            $date_of_birth = strtotime($_REQUEST['date_of_birth'][$key]);
			else
			$date_of_birth = '0';
            
            $local_address = $_REQUEST['local_address'][$key];
            $permanent_address = $_REQUEST['permanent_address'][$key];
			
            $pan_no = $_REQUEST['pan_no'][$key];
			
            $uid_no = $_REQUEST['uid_no'][$key];
			$uid_ack = $_REQUEST['uid_ack'][$key];
            $pf_no = $_REQUEST['pf_no'][$key];
            $un_no = $_REQUEST['un_no'][$key];
            $ip_no = $_REQUEST['ip_no'][$key];
           
			
			
				$data2['name']                  = $name;
                $data2['father_name']           = $father_name;
				$data2['mother_name']           = ($mother_name!='')?$mother_name:'';
				 $data2['date_of_birth']         = $date_of_birth;
				
                $data2['local_address']         = $local_address;
                $data2['permanent_address']     = $permanent_address;
				
				
				$data2['pan_no']				= $pan_no;
				
				$data2['uid_no']				= $uid_no;
				$data2['uid_ack']				= $uid_ack;
				$data2['pf_no']					= $pf_no;
				$data2['un_no']					= $un_no;
				$data2['ip_no']					= $ip_no;
				
				
				$this->db->where('user_id', $user_id);
                $this->db->update('user',$data2);
				
				$this->db->where('id', $key);
        		$this->db->delete('user_edit_temp');
				
			}
			//$this->db->where('excel_id', $_REQUEST['excel_id']);
        	//$this->db->delete('user_temp');
			//$this->db->where('excel_id', $_REQUEST['excel_id']);
            //$this->db->update('excel_import',array('excel_status'=>2));
			 			
			return true;
		}
		return false;
	}
	//enterimport_tds
public function enterimport_tds(){
		
 
        $data = array();
        $data['Title'] = 'Import Tds';
        if (empty($_FILES['file_import']['name']))
        {
            $this->form_validation->set_rules('file_import', 'File', 'required');
        }      
     
            if (isset($_FILES["file_import"]) && !empty($_FILES['file_import']['name'])) {
                $filename=$_FILES["file_import"]["name"];
                $extn = substr($filename, strrpos($filename,'.')+1);
                if(strtoupper($extn)=='CSV' || strtoupper($extn)=='csv'){
                    $filex = time().$filename;
                    $dir_path = __DIR__.'/../../images/imported_csv_tds/';
                    $file_path = $dir_path.$filex;    
                    $path = 'images/imported_csv_tds/'.$filex;

                    if(!file_exists($dir_path))
                        mkdir($dir_path, 0777, true);                    

                    if(file_exists($file_path))
                        unlink($file_path);

                    if(move_uploaded_file($_FILES["file_import"]["tmp_name"], $file_path))
					{
					
					//$company_id=$this->input->post('company_id');
					//$client_id=$this->input->post('client');
					//$year=$this->input->post('year');
					//$month=$this->input->post('month');
					
						
	                    require_once( __DIR__.'/../third_party/PHPExcel/Classes/PHPExcel/IOFactory.php' );
                        $inputFileName = $file_path;
                        //echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                        $sheetData = $objPHPExcel->getActiveSheet()->toArray(NULL,true,true,true);
                        $row_count = count($sheetData);      
                        
                        //print_r($sheetData);
						
                        foreach($sheetData as $xky=>$xl){
                             if ($xky > 1) {
                                $dataRecord[] = $xl;
                            } else
							$dataheading=$xl;
                        }//print_r($dataheading);die;
						
								
					/*$client=$this->db->get_where('client', array('client_id' => $client_id))->row();
					$client_name=$client->client_name;
					foreach ($dataRecord as $key => $val) {
					if($val['G']!=$month || $val['H']!=$year)
					{return false;}
					
					}*/
					if (sizeof($dataRecord) > 0) {
$i=2;
                            foreach ($dataRecord as $key => $val) {
							if($val['A']!=''){
								$user_row=$this->db->get_where('user', array('type' => 2,'user_regcode'=>$val['C']))->row();
								$user=$user_row->user_id;
								$date=explode(',',$val['E']);
								$mons = date("n",strtotime($date[0]));
								$year			=$date[1];
								$data['date']= $mons . ',' . $year;
								$payroll = $this->db->get_where('payroll', array('date' => $data['date'],'user_id' => $user));
								if($payroll->num_rows() >0)
								{
								$this->session->set_flashdata('flash_message', get_phrase('Payroll Allready generated for this month.'));
								redirect(base_url() . 'index.php?admin/tds_import', 'refresh');
								
								}
					
					}
						}
					}	
					 $sql = "INSERT INTO excel_tdsimport(excel_type,excel_desc,excel_title,excel_date,excel_status,excel_company,excel_client,excel_month,excel_year) values('tds','".$path."','".$filename."','".date('Y-m-d h:i:s')."',0,0,0,0,0)";
                        //die;
                        $query = $this->db->query($sql);
                        $excel_id = $this->db->insert_id();
						
                        if (sizeof($dataRecord) > 0) {
$i=2;
                            foreach ($dataRecord as $key => $val) {

                                if($val['A']!=''){
								$user_row=$this->db->get_where('user', array('type' => 2,'user_regcode'=>$val['C']))->row();
								$user=$user_row->user_id;
								
								
                				$data2['tds_user_id']           = $user;
								$data2['tds_excel_id']			=$excel_id;
								$date=explode(',',$val['E']);
								$mons = $month_number = date("n",strtotime($date[0]));
								$data2['tds_month']			=$mons;
								$data2['tds_year']			=$date[1];
								$data2['tds_amount']			=$val['F'];
								$data2['tds_comments']			=($val['G']!='')?$val['G']:'';
								
                                
                                
								$this->db->insert('tds_temp',$data2);
								
                                }
								$i++;
                              }
            
                         }
                    }
                }
             return true;
        }return false;
    }
	//createimport_tds
	
	public function createimport_tds()
		{
		$attendance = $this->db->get_where('tds_temp', array('tds_excel_id' =>$_REQUEST['excel_id']))->result_array();
		if(!empty($attendance))
		{
		 //echo count($_REQUEST['leave_user_id']);die;
			$i=0;
        	foreach ($_REQUEST['tds_user_id'] as $key => $value)
			{
			
			
			$tds_user_id=$_REQUEST['tds_user_id'][$key];
			$month=$_REQUEST['tds_month'][$key];
			$year=$_REQUEST['tds_year'][$key];
			$tds_amount=$_REQUEST['tds_amount'][$key];
			$tds_comments=$_REQUEST['tds_comments'][$key];
			
			
				//user
				
			$data2['tds_user_id']		= $tds_user_id;		
			$data2['tds_month']		= $month;
			$data2['tds_year']		= $year;
			$data2['tds_amount']     = ($tds_amount!='')?$tds_amount:0;
			$data2['tds_comments']     = ($tds_comments!='')?$tds_comments:'';
			$data2['tds_date']     = strtotime(date("Y-m-d H:i:s"));
			$leave_obj = $this->db->get_where('tds', array('tds_month' => $month,'tds_year' => $year,'tds_user_id' => $tds_user_id));
			if($leave_obj->num_rows()>0)
			{
				$tds_id=$leave_obj->row()->tds_id;
				$this->db->where('tds_id', $tds_id);
            	$this->db->update('tds',$data2);
			}
			else{
			$this->db->insert('tds',$data2);
			}
			//echo $this->db->last_query().'</br>';
			$this->db->where('tds_id', $key);
        	$this->db->delete('tds_temp');
			}
			//die;
			
			
					
		return true;
		}
		return false;
	}
	
	function import_delete_tds($user_code) {
	 
	 	$this->db->where('tds_excel_id', $user_code);
        $this->db->delete('tds_temp');
        $user = $this->db->get_where('excel_tdsimport',array('excel_id'=>$user_code));
        $excel_desc = $user->row()->excel_desc;
        
        if (file_exists($excel_desc))
        unlink($excel_desc);
        $this->db->where('excel_id',$user_code);
        $this->db->delete('excel_tdsimport');
        return true;
    }
	
	//enter import bonus
	function enterimport_bonus(){
		
 
        $data = array();
        $data['Title'] = 'Import Tds';
        if (empty($_FILES['file_import']['name']))
        {
            $this->form_validation->set_rules('file_import', 'File', 'required');
        }      
     
            if (isset($_FILES["file_import"]) && !empty($_FILES['file_import']['name'])) {
                $filename=$_FILES["file_import"]["name"];
                $extn = substr($filename, strrpos($filename,'.')+1);
                if(strtoupper($extn)=='CSV' || strtoupper($extn)=='csv'){
                    $filex = time().$filename;
                    $dir_path = __DIR__.'/../../images/imported_csv_bonus/';
                    $file_path = $dir_path.$filex;    
                    $path = 'images/imported_csv_bonus/'.$filex;

                    if(!file_exists($dir_path))
                        mkdir($dir_path, 0777, true);                    

                    if(file_exists($file_path))
                        unlink($file_path);

                    if(move_uploaded_file($_FILES["file_import"]["tmp_name"], $file_path))
					{
					
					//$company_id=$this->input->post('company_id');
					//$client_id=$this->input->post('client');
					//$year=$this->input->post('year');
					//$month=$this->input->post('month');
					
						
	                    require_once( __DIR__.'/../third_party/PHPExcel/Classes/PHPExcel/IOFactory.php' );
                        $inputFileName = $file_path;
                        //echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                        $sheetData = $objPHPExcel->getActiveSheet()->toArray(NULL,true,true,true);
                        $row_count = count($sheetData);      
                        
                        //print_r($sheetData);
						
                        foreach($sheetData as $xky=>$xl){
                             if ($xky > 1) {
                                $dataRecord[] = $xl;
                            } else
							$dataheading=$xl;
                        }//print_r($dataheading);die;
						
								
					/*$client=$this->db->get_where('client', array('client_id' => $client_id))->row();
					$client_name=$client->client_name;
					foreach ($dataRecord as $key => $val) {
					if($val['G']!=$month || $val['H']!=$year)
					{return false;}
					
					}*/
					if (sizeof($dataRecord) > 0) {
$i=2;
                            foreach ($dataRecord as $key => $val) {
							if($val['A']!=''){
								$user_row=$this->db->get_where('user', array('type' => 2,'user_regcode'=>$val['C']))->row();
								$user=$user_row->user_id;
								//$date=explode(',',$val['E']);
								$mons = date("n",strtotime($val['F']));
								$year			=$val['G'];
								$data['date']= $mons . ',' . $year;
								$payroll = $this->db->get_where('payroll', array('date' => $data['date'],'user_id' => $user));
								if($payroll->num_rows() >0)
								{
								$this->session->set_flashdata('flash_message', get_phrase('Payroll Allready generated for this month.'));
								redirect(base_url() . 'index.php?admin/bonus_import', 'refresh');
								
								}
					
					}
						}
					}	
					 $sql = "INSERT INTO excel_bonusimport(excel_type,excel_desc,excel_title,excel_date,excel_status,excel_company,excel_client,excel_month,excel_year) values('tds','".$path."','".$filename."','".date('Y-m-d h:i:s')."',0,0,0,0,0)";
                        //die;
                        $query = $this->db->query($sql);
                        $excel_id = $this->db->insert_id();
						
                        if (sizeof($dataRecord) > 0) {
$i=2;
                            foreach ($dataRecord as $key => $val) {

                                if($val['A']!=''){
								$user_row=$this->db->get_where('user', array('type' => 2,'user_regcode'=>$val['C']))->row();
								$user=$user_row->user_id;
								
								
                				$data2['bonus_user_id']           = $user;
								$data2['bonus_excel_id']			=$excel_id;
								//$date=explode(',',$val['E']);
								$mons = $month_number = date("n",strtotime($val['F']));
								$data2['bonus_month']			=$mons;
								$data2['bonus_year']			=$val['G'];
								$data2['bonus_amount']			=$val['H'];
								$data2['bonus_date']			=strtotime(date("Y-m-d H:i:s"));
								
                                
                                
								$this->db->insert('bonus_temp',$data2);
								
                                }
								$i++;
                              }
            
                         }
                    }
                }
             return true;
        }return false;
    }
	
    function createimport_bonus()
		{
		$attendance = $this->db->get_where('bonus_temp', array('bonus_excel_id' =>$_REQUEST['excel_id']))->result_array();
		if(!empty($attendance))
		{
		 //echo count($_REQUEST['leave_user_id']);die;
			$i=0;
        	foreach ($_REQUEST['bonus_user_id'] as $key => $value)
			{
			
			
			$tds_user_id=$_REQUEST['bonus_user_id'][$key];
			$month=$_REQUEST['bonus_month'][$key];
			$year=$_REQUEST['bonus_year'][$key];
			$tds_amount=$_REQUEST['bonus_amount'][$key];
			
			
			
				//user
				
			$data2['bonus_user_id']		= $tds_user_id;		
			$data2['bonus_month']		= $month;
			$data2['bonus_year']		= $year;
			$data2['bonus_amount']     = ($tds_amount!='')?$tds_amount:0;
			
			$data2['bonus_date']     = strtotime(date("Y-m-d H:i:s"));
			$leave_obj = $this->db->get_where('bonus', array('bonus_month' => $month,'bonus_year' => $year,'bonus_user_id' => $tds_user_id));
			if($leave_obj->num_rows()>0)
			{
				$tds_id=$leave_obj->row()->tds_id;
				$this->db->where('bonus_id', $tds_id);
            	$this->db->update('bonus',$data2);
			}
			else{
			$this->db->insert('bonus',$data2);
			}
			//echo $this->db->last_query().'</br>';
			$this->db->where('bonus_id', $key);
        	$this->db->delete('bonus_temp');
			}
			//die;
			
			
					
		return true;
		}
		return false;
	}
	function import_delete_bonus($user_code) {
	 
	 	$this->db->where('bonus_excel_id', $user_code);
        $this->db->delete('bonus_temp');
        $user = $this->db->get_where('excel_bonusimport',array('excel_id'=>$user_code));
        $excel_desc = $user->row()->excel_desc;
        
        if (file_exists($excel_desc))
        unlink($excel_desc);
        $this->db->where('excel_id',$user_code);
        $this->db->delete('excel_bonusimport');
        return true;
    }
	
}