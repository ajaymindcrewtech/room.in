<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public $table = 'customer';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        // $this->db->where('status',1);
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
	$this->db->or_like('name', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('pri_mobile', $q);
	$this->db->or_like('whatsup_no', $q);
	$this->db->or_like('sec_mobile', $q);
	$this->db->or_like('dob', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('aadharcard_no', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('pri_mobile', $q);
	$this->db->or_like('whatsup_no', $q);
	$this->db->or_like('sec_mobile', $q);
	$this->db->or_like('dob', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('aadharcard_no', $q);
	$this->db->or_like('image', $q);
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

    // delete data
    function delete($id)
    {  
        //  $this->db->where('customer.id=allotment.customer_id');
        // $this->db->where('customer.id=revenue.customer_id');
        // $this->db->where('customer.id=refund.customer_id');
        // $this->db->where('customer.id=income_register.customer_id');
        // $this->db->where('customer.id',$id);
        //  $this->db->delete(array('customer','allotment','revenue','refund','income_register'));
       
       $this->db->delete('allotment', array('customer_id' => $id)); 
       $this->db->delete('revenue', array('customer_id' => $id));
       $this->db->delete('income_register', array('customer_id' => $id));
       $this->db->delete('refund', array('customer_id' => $id));
       $this->db->delete('login', array('log_id' => $id));
       $this->db->delete('customer', array('id' => $id));
           
       }

     public function truncate_table($value='')
    {
       $this->db->truncate($this->table);
       $query = $this->db->query("ALTER TABLE customer AUTO_INCREMENT = 1001");
    }

}

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-06 06:46:17 */

