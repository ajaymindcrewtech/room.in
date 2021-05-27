<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Note_model extends CI_Model
{

    public $table = 'note';
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

    function get_row(){
         $this->db->where('status',1);
          $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->row();
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
	$this->db->or_like('description', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('createdat', $q);
	$this->db->or_like('note', $q);
	$this->db->or_like('date', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('createdat', $q);
	$this->db->or_like('note', $q);
	$this->db->or_like('date', $q);
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

/* End of file Note_model.php */
/* Location: ./application/models/Note_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-04-09 13:55:12 */
