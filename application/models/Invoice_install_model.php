<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice_install_model extends CI_Model
{

    public $table = 'invoice_install';
    public $id = 'invoice_instaill_id';
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('invoice_instaill_id', $q);
	$this->db->or_like('invoice_id', $q);
	$this->db->or_like('amount', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('invoice_instaill_id', $q);
	$this->db->or_like('invoice_id', $q);
	$this->db->or_like('amount', $q);
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

}

/* End of file Invoice_install_model.php */
/* Location: ./application/models/Invoice_install_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-11 16:58:06 */
