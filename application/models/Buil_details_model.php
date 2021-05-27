<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buil_details_model extends CI_Model
{

    public $table = 'buil_details';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        // $this->db->where('booking_status',1);
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
	$this->db->or_like('Bullding_id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('rent', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('Bullding_id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('rent', $q);
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

    // delete data
    function delete($id)
    {
          $this->db->delete('allotment', array('room_id' => $id)); 
          $this->db->delete('revenue', array('room_id' => $id));
          $this->db->delete('expense', array('room_id' => $id));
          $this->db->delete('refund', array('room_id' => $id));
          $this->db->delete('buil_details', array('id' => $id));
        
    }

}

/* End of file Buil_details_model.php */
/* Location: ./application/models/Buil_details_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-06 05:49:12 */
