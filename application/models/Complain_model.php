<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Complain_model extends CI_Model
{

    public $table = 'complain';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
    	$login_type= $this->session->userdata('type');
           $log_id=$this->session->userdata('reg_id');
        if($login_type==3){
        $this->db->select('comp.*,cust.name');
        $this->db->from('complain as comp');
        $this->db->join('customer as cust','cust.id=comp.log_id');  
        $this->db->where('comp.log_id',$log_id); 
        $this->db->where('comp.log_type',$login_type ); 
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }
    //  elseif($login_type==2){
    //     $this->db->select('comp.*,emp.name');
    //     $this->db->from('complain as comp');
    //     $this->db->join('employee as emp','emp.id=comp.log_id');  
    //     $this->db->where('comp.log_id',$log_id); 
    //     $this->db->where('comp.log_type',$login_type ); 
    //     $this->db->order_by($this->id, $this->order);
    //     return $this->db->get()->result();
    // }
    elseif($login_type==5){
        // $this->db->select('comp.*,cust.name');
        // $this->db->from('complain');
        // $this->db->join('customer as cust','cust.id=comp.log_id')  
        $this->db->where('standard',$log_id); 
        // $this->db->where('log_type',$login_type ); 
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('room_id', $q);
	$this->db->or_like('com_category', $q);
	$this->db->or_like('com_subcategory', $q);
	$this->db->or_like('com_status', $q);
	$this->db->or_like('com_details', $q);
	$this->db->or_like('asset_id', $q);
	$this->db->or_like('Model', $q);
	$this->db->or_like('bill', $q);
	$this->db->or_like('warranty', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('closure_remark', $q);
	$this->db->or_like('closure_remark_by', $q);
	$this->db->or_like('agreed_amount', $q);
	$this->db->or_like('tat', $q);
	$this->db->or_like('icr', $q);
	$this->db->or_like('closed_by', $q);
	$this->db->or_like('assign_vender', $q);
	$this->db->or_like('category', $q);
	$this->db->or_like('vendor_bill', $q);
	$this->db->or_like('shop_name', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('part_details', $q);
	$this->db->or_like('material_cost', $q);
	$this->db->or_like('labour_cost', $q);
	$this->db->or_like('createdat', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('room_id', $q);
	$this->db->or_like('com_category', $q);
	$this->db->or_like('com_subcategory', $q);
	$this->db->or_like('com_status', $q);
	$this->db->or_like('com_details', $q);
	$this->db->or_like('asset_id', $q);
	$this->db->or_like('Model', $q);
	$this->db->or_like('bill', $q);
	$this->db->or_like('warranty', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('closure_remark', $q);
	$this->db->or_like('closure_remark_by', $q);
	$this->db->or_like('agreed_amount', $q);
	$this->db->or_like('tat', $q);
	$this->db->or_like('icr', $q);
	$this->db->or_like('closed_by', $q);
	$this->db->or_like('assign_vender', $q);
	$this->db->or_like('category', $q);
	$this->db->or_like('vendor_bill', $q);
	$this->db->or_like('shop_name', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('part_details', $q);
	$this->db->or_like('material_cost', $q);
	$this->db->or_like('labour_cost', $q);
	$this->db->or_like('createdat', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

     public function get_report($value)
    {  
        $condition = '0=0 ';
        if ($value['building_id'] != '') {
            $condition .= ' AND building_id=' . $value['building_id'];
        }

        if ($value['com_status'] != '') {
            $condition .= ' AND com_status=' . $value['com_status'];
        }

        // if ($value['mode']!='') {
        //     $condition .= ' AND payment_mode=' . $value['mode'];
        // }

         
              
       $this->db->where($condition, NULL, FALSE);
       // $this->db->group_by('emp_id');
        //$res = $this->db->get('revenue')->result();
       // echo $this->db->last_query();
    return   $res = $this->db->get($this->table)->result();
       // $res2= $this->get_report2($value);
       // $res3= $this->get_report3($value);
       // $data=array(
       //  'res'=>$res,
       //  'res2'=>$res2,
       //  'res3'=>$res3
       // );
       // return $data;
       
      } 

}

/* End of file Complain_model.php */
/* Location: ./application/models/Complain_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-04-07 08:46:19 */
