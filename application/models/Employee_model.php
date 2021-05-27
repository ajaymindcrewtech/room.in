<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_model extends CI_Model
{

    public $table = 'employee';
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

     function get_by_id_emp_login($id)
    {
        $this->db->where($this->id, $id);
        $res= $this->db->get($this->table)->row();
        if ($res > '0') {
            return $res;
        }else{
        $this->db->where('log_id', $id);
        return $this->db->get('login')->row(); 
        }
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('address', $q);
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
       $this->db->delete('allotment', array('employee_id' => $id)); 
       $this->db->delete('revenue', array('emp_id' => $id));
       $this->db->delete('income_register', array('employee_id' => $id));
       $this->db->delete('refund', array('emp_id' => $id));
       $this->db->delete('expense', array('paying_employee' => $id));
       $this->db->delete('login', array('log_id' => $id));
       $this->db->delete('employee', array('id' => $id));
           
     }

    public function truncate_table($value='')
    {
       $this->db->truncate($this->table);
       $query = $this->db->query("ALTER TABLE employee AUTO_INCREMENT = 101");
    }

}

/* End of file Employee_model.php */
/* Location: ./application/models/Employee_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-04 05:54:49 */
