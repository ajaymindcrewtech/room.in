<?php

defined('BASEPATH') OR exit('NO Direct Access Allowed');

class Login_model extends CI_Model {

    public function validate() {
        $number = $this->security->xss_clean($this->input->post('number'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $sql = "select * from login where number = '" . $number . "' and password = '" .md5($password). "'";
        // $sql = "select * from login where number = '" . $number . "' and password = '" .$password. "'";
      //  die;
		$query = $this->db->query($sql);
       
        $row = $query->row();
           
       // print_r($row);die;
       //   echo $row->type;die;

        if ($row > '0') {
            
             if($row->type == 3){
            $this->db->select('name,id');
            $this->db->where('id',$row->log_id);
           $res= $this->db->get('customer')->row();
         }
          elseif($row->type == 5){
            $this->db->select('vendor_name as name,id');
            $this->db->where('id',$row->log_id);
           $res= $this->db->get('vender')->row();
          // echo '<pre>';
          // print_r($res);
         }
         else{
           $this->db->where('id',$row->log_id);
           $res= $this->db->get('employee')->row();
           // print_r($res);die;
            // echo 'emp';die;
         }
        
            // print_r($res);die;
         
            $data = array(
                'reg_id' => $res->id,
                // 'email' => $res->email,
                'name' => $res->name,
                'type' => $row->type,
                 'validated' => true
            );
            // print_r($data);die;
            $this->session->set_userdata($data);
            return $row->type;
        } else {
            return 0;
        }
    }

     public function admin_validate() {
        $number = $this->security->xss_clean($this->input->post('number'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $sql = "select * from admin where mobile_no = '" . $number . "' and password = '" .md5($password). "'";
        // $sql = "select * from login where number = '" . $number . "' and password = '" .$password. "'";
      //  die;
        $query = $this->db->query($sql);
          
        $res = $query->row();
          if ($res > '0') {

                $data = array(
                'reg_id' => $res->id,
                'email' => $res->emailid,
                'name' => $res->first_name,
                'type' =>6,   //for admin table
                 'validated' => true
            );

               $this->session->set_userdata($data);
            return $res;
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