<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Building_model extends CI_Model
{

    public $table = 'building';
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
	$this->db->or_like('address', $q);
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

        $this->db->delete('allotment', array('building_id' => $id)); 
       $this->db->delete('revenue', array('building_id' => $id));
      
       $this->db->delete('buil_details', array('Bullding_id' => $id));
       $this->db->delete('expense', array('building_id' => $id));
       $this->db->delete('refund', array('building_id' => $id));
       $this->db->delete('vender', array('building_id' => $id));
       $this->db->delete('building', array('id' => $id));
       
    }

}

/* End of file Building_model.php */
/* Location: ./application/models/Building_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-06 05:27:19 */
