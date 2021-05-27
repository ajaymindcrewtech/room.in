<?php

defined('BASEPATH') OR exit('NO Direct Access Allowed');

class Login_model extends CI_Model {

    public function validate() {
        $email = $this->security->xss_clean($this->input->post('emailid'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $sql = "select * from admin where first_name = '" . $email . "' and mobile_no = '" .$password . "'";
      //  die;
		$query = $this->db->query($sql);
        $row = $query->row();
        if ($row > '0') {
            if($row->first_name){
                $nm=$row->first_name;
                // echo $nm;die;
            }else{
               $nm=$row->name;
               // echo $nm;die;
            }
            $data = array(
                'reg_id' => $row->id,
                'email' => $row->email,
                'name' => $nm,
                 'validated' => true
            );
            $this->session->set_userdata($data);
            return $row;
        } else {
            return 0;
        }
    }


     public function empvalidate() {
        $email = $this->security->xss_clean($this->input->post('emailid'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $sql = "select * from employee where name = '" . $email . "' and phone = '" .$password . "'";
      //  die;
        $query = $this->db->query($sql);
        $row = $query->row();
        if ($row > '0') {
            $data = array(
                'reg_id' => $row->id,
                'phone' => $row->phone,
                'name' => $row->name,
                 'validated' => true
            );
            $this->session->set_userdata($data);
            return $row;
        } else {
            return 0;
        }
    }


     public function cusvalidate() {
        $email = $this->security->xss_clean($this->input->post('emailid'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $sql = "select * from customer where name = '" . $email . "' and pri_mobile = '" .$password . "'";
      //  die;
        $query = $this->db->query($sql);
        $row = $query->row();
        if ($row > '0') {
            $data = array(
                'reg_id' => $row->id,
                'phone' => $row->pri_mobile,
                'name' => $row->name,
                 'validated' => true
            );
            $this->session->set_userdata($data);
            return $row;
        } else {
            return 0;
        }
    }
    //  public function vendor_validate() {
    //     $email = $this->security->xss_clean($this->input->post('emailid'));
    //     $password = $this->security->xss_clean($this->input->post('password'));
    //     $sql = "select * from dsoi_vendor where username = '" . $email . "' and password = '" . $password . "'";
    //     $query = $this->db->query($sql);
    //     $row = $query->row();
    //     if ($row > '0') {
    //         $data = array(
    //             'vendor_id' => $row->vendor_id,
    //             'username' => $row->username,
    //              'validated' => true
    //         );
    //         $this->session->set_userdata($data);
    //         return $row;
    //     } else {
    //         return 0;
    //     }
    // }

    // public function read_member_information($id) {

    //     $condition = "emailid =" . "'" . $id . "'";
    //     $this->db->select('*');
    //     $this->db->from('members');
    //     $this->db->where($condition);
    //     $this->db->limit(1);
    //     $query = $this->db->get();

    //     if ($query->num_rows() == 1) {
    //         return $query->result();
    //     } else {
    //         return false;
    //     }
    // }

}

?>