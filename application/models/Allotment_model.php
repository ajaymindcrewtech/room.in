<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allotment_model extends CI_Model
{

    public $table = 'allotment';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {   $login_type= $this->session->userdata('type');
           $log_id=$this->session->userdata('reg_id');  
         if($login_type==3){
            $this->db->where('customer_id',$log_id);
            $this->db->where('status',1);
             $this->db->order_by($this->id, $this->order);
           return $this->db->get($this->table)->result();
         }
          elseif($login_type==2){
            $this->db->where('employee_id',$log_id);
            $this->db->where('status',1);
             $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
         }else{
        $this->db->where('status',1);   
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
      }
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
	$this->db->or_like('customer_id', $q);
	$this->db->or_like('employee_id', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('room_id', $q);
	$this->db->or_like('rent', $q);
	$this->db->or_like('from_date', $q);
	$this->db->or_like('to_date', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('customer_id', $q);
	$this->db->or_like('employee_id', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('room_id', $q);
	$this->db->or_like('rent', $q);
	$this->db->or_like('from_date', $q);
	$this->db->or_like('to_date', $q);
	$this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    } 

    function update_room_booking_status($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('buil_details', $data);
    }

     function update_Customer_booking_status($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('customer', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function filter($value){
       $this->db->select('allot.*,emp.name as emp,cust.name as cust,bul.name as bul,bd.name as bd'); 
       $this->db->from('allotment as allot');
       $this->db->join('employee as emp','emp.id = allot.employee_id');   
       $this->db->join('customer as cust','cust.id = allot.customer_id');  
       $this->db->join('building as bul','bul.id = allot.building_id');  
       $this->db->join('buil_details as bd','bd.id = allot.room_id');   
       // $this->db->join('room_type as rt','rt.id = re.room_type');   
       // $this->db->join('payment_mode as pm','pm.id = re.payment_mode');  
       $this->db->where('allot.from_date>=',date('Y-m-d',strtotime($value['from'])));
       $this->db->where('allot.from_date<=',date('Y-m-d',strtotime($value['to']))); 
       // $this->db->where('delete_status',1);      
       return $this->db->get()->result(); 

    }

}

/* End of file Allotment_model.php */
/* Location: ./application/models/Allotment_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-07 09:39:38 */
