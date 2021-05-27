<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_create_model extends CI_Model
{

    public $table = 'login';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_join($id)
    {
        $this->db->where('log_id', $id);
        $row= $this->db->get($this->table)->row();
         // print_r($row);die;
            if($row->type == 3){
            $this->db->where('id',$row->log_id);
           $res= $this->db->get('customer')->row();
         }
         elseif($row->type ==2){
           $this->db->where('id',$row->log_id);
           $res= $this->db->get('employee')->row();
           // print_r($res);die;
            // echo 'emp';die;
         }
         else{
            $res=$row;
         }
          
          // print_r($res);die;
         return $res;
    }


    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('designation', $q);
	$this->db->or_like('type', $q);
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
	$this->db->or_like('password', $q);
	$this->db->or_like('designation', $q);
	$this->db->or_like('type', $q);
	$this->db->or_like('status', $q);
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
    function update_password($id, $data)
    {
        $this->db->where('log_id', $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-04 07:34:06 */
