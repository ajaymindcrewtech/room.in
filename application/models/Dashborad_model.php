<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Dashborad_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    //   count all student for total registeration
    public function count_all_employee() {
        $this->db->select('count(*)');
        $query = $this->db->get('employee');
        $cnt = $query->row_array();
        return $cnt['count(*)'];
    }

     public function count_all_customer() {
        $this->db->select('count(*)');
        $query = $this->db->get('customer');
        $cnt = $query->row_array();
        return $cnt['count(*)'];
    }
    //   count all student for total registeration



    //   count fees collection for student

    public function fees_collection() {
        $date= date("d/m/Y");
        $this->db->select('paid_amount');
        $this->db->where('created_at',$date);
        $query = $this->db->get('fees_collect');
        $cnt = $query->row_array();
        return $cnt;
        //return $cnt['count(*)'];
    }
    //end fees collection for student

    // count all enquiry
    public function count_all_enquiry() {
        $date= date("d/m/Y");
        $this->db->select('count(*)');
        $this->db->where('created_at',$date);
        $query = $this->db->get('demo');
        $cnt = $query->row_array();
        return $cnt['count(*)'];
    }
    //end count all enquiry


    // count all employee
    // public function count_all_employee() {
    //     $this->db->select('count(*)');
    //     $query = $this->db->get('employee');
    //     $cnt = $query->row_array();
    //     return $cnt['count(*)'];
    // }
    //end count all emplyee

    public function last_week() {
        
    $query = $this->db->query("SELECT COALESCE(SUM(a.order_price), 0) AS x, a.order_date AS num FROM dsoi_order AS a WHERE (a.`order_date` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)) GROUP BY DAY(a.order_date)");
    return $query->result_array();
    }

}
?>
