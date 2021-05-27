<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vender_model extends CI_Model
{

    public $table = 'vender';
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
        return $this->db->get($this->table)->result_array();
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
	$this->db->or_like('vendor_name', $q);
	$this->db->or_like('vendor_type', $q);
	$this->db->or_like('vdor_business', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('date_of_onboarding', $q);
	$this->db->or_like('date_of_leaving', $q);
	$this->db->or_like('refrence_name', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('mobile2', $q);
	$this->db->or_like('landline', $q);
	$this->db->or_like('shop_address', $q);
	$this->db->or_like('gst', $q);
	$this->db->or_like('stauts', $q);
	$this->db->or_like('createdat', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('vendor_name', $q);
	$this->db->or_like('vendor_type', $q);
	$this->db->or_like('vdor_business', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('date_of_onboarding', $q);
	$this->db->or_like('date_of_leaving', $q);
	$this->db->or_like('refrence_name', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('mobile2', $q);
	$this->db->or_like('landline', $q);
	$this->db->or_like('shop_address', $q);
	$this->db->or_like('gst', $q);
	$this->db->or_like('stauts', $q);
	$this->db->or_like('createdat', $q);
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
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

     public function truncate_table($value='')
    {
       $this->db->truncate($this->table);
       $query = $this->db->query("ALTER TABLE vender AUTO_INCREMENT = 101");
    }

}

/* End of file Vender_model.php */
/* Location: ./application/models/Vender_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-15 09:12:53 */
