<?php

class Dsoiapi_model extends CI_Model {
    
  
//*********************************** Dsoi Api Start***********************************************
    
    public function get_by_member_id($id) {
         $this->db->select('*');
        $this->db->from('dsoi_member');
        $this->db->where('member_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_by_member_rfid($id) {
         $this->db->select('*');
        $this->db->from('dsoi_member');
        $this->db->where('member_rfid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getpendingorder_member() {
        $this->db->select('a.*');
        $this->db->from('dsoi_order as a');
        $this->db->where("a.order_staus",'1');
        $this->db->group_by('a.order_memberid');
        $this->db->order_by('a.order_id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_by_member_no($member_no) {
        $this->db->select('member_rfid');
        $this->db->from('dsoi_member');
        $this->db->where('member_no', $member_no);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row()->member_rfid;
        }else{
            return 0;
        }
    }


    public function getmember_id($member_rfid) {
        $this->db->select('member_id');
        $this->db->from('dsoi_member');
        $this->db->where('member_rfid', $member_rfid);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row()->member_id;
        }else{
            return 0;
        }
    }

    public function getpickuporder($member_id,$order_id) {
        $this->db->select('a.*,b.member_fname,b.member_lname');
        $this->db->from('dsoi_order as a');
        $this->db->join('dsoi_member as b','b.member_id=a.order_memberid');
        $this->db->where("a.order_memberid", $member_id);
        $this->db->where("a.order_id", $order_id);
        $this->db->where("a.order_staus",'1');
        $query = $this->db->get();
        //return $this->db->last_query();
        return $query->row_array();
    }

     public function getpickupallorder($member_id) {
        $this->db->select('a.*,b.member_fname,b.member_lname,b.member_relation,c.*');
        $this->db->from('dsoi_order as a');
        $this->db->join('dsoi_member as b','b.member_id=a.order_memberid');
		$this->db->join('dsoi_transaction as c','c.tran_orderid=a.order_id');
        $this->db->where("a.order_memberid", $member_id);
        $this->db->where("a.order_staus",'1');
		$this->db->where("c.tran_desc",'pickup order');
		$this->db->order_by('a.order_id','DESC');
        $query = $this->db->get();
        //return $this->db->last_query();
        return $query->result_array();
    }

     public function getorderdetails($order_id) {
        $this->db->select('a.*');
        $this->db->from('dsoi_order_details as a');
        $this->db->where("a.dorder_code", $order_id);
        $query = $this->db->get();
        //return $this->db->last_query();
        return $query->result_array();
    }

    public function update_order($data){
        $this->db->where('order_memberid',$data['order_memberid']);
        $this->db->where('order_id',$data['order_id']);
        $this->db->update('dsoi_order',$data);
    }




    
    public function insert_attendance($data){
        if ($this->db->insert('dsoi_eventattendance',$data)) {
            
             return $this->db->insert_id();
        }
      
    }
    function get_by_rfid_trans($rfid)

    {      
    $this->db->select("*") ;
	$this->db->where('tran_rfid', $rfid); 
	$this->db->where('tran_orderid  !=', 0); 	    
     return $this->db->get('dsoi_transaction')->result();

		

    }
    
    
     public function get_by_rfid_transaction($rfid,$cat_id)

    {      
    $this->db->select("*") ;
    $this->db->where('tran_rfid', $rfid); 
    $this->db->where('tran_orderid  !=', 0);  
    $this->db->where('tran_catid ', $cat_id);  
    $this->db->order_by('tran_id' ,'DESC') ;
    $this->db->limit(5);  
    return $this->db->get('dsoi_transaction')->result();

    }

     public function login_front($user, $pass) {
        $this->db->where('member_no', $user);
        $this->db->where('member_pass', $pass);
        $this->db->where('member_type', 0);
        $query = $this->db->get('dsoi_member');
        return $query->row();
    }

    public function getsubmember($id) {
        
        $this->db->where('member_type',$id);
        $this->db->where('member_cardtype',0);
        $query = $this->db->get('dsoi_member');
        return $query->result();
    }

    public function update_member($data='',$id)
    {
       $this->db->where('member_id',$id);
       $this->db->update('dsoi_member',$data);
       return 1;
    }

    public function mem_details_by_qrcode($value='')
    {
       $this->db->where('member_qrcode', $value);
        $query = $this->db->get('dsoi_member');
        return $query->row();
    }

    public function get_member_by_id($member_id='')
    {
       $this->db->where('member_id', $member_id);
        $query = $this->db->get('dsoi_member');
        return $query->row();
    }

    public function update_password($data,$member_id)
    {
       $this->db->where('member_id',$member_id);
       $this->db->update('dsoi_member',$data);
       return 1;
    }

    
    public function login($user, $pass) {
        $this->db->where('member_mobile', $user);
        $this->db->where('member_pass', $pass);
        $query = $this->db->get('dsoi_member');
        return $query->row_array();
    }
	
	public function login_2($user, $pass) {
        $this->db->where('member_mobile', $user);
        $this->db->where('member_no', $pass);
        $query = $this->db->get('dsoi_member');
        return $query->row_array();
    }

    public function get_mem_details($id) {      //  
         
        $this->db->where('member_id',$id);
        $query = $this->db->get('dsoi_member');
        return $query->row();

    }
	 public function get_mem_details_mob($id) {
        $this->db->where('member_mobile', $id);
        $query = $this->db->get('dsoi_member');
        return $query->row();
    }
    
    function get_prd_event($date, $cid) {
        $this->db->select('ep_prdid,ep_prd_name,sales_price,ep_stock,ep_subcatid');
        $this->db->where('event_date', $date);
        $this->db->where('ep_catid', $cid);
        return $this->db->get('dsoi_event_product')->result_array();
    }
    /*
    function get_prd_event_1($event_id, $cid) {
        $this->db->select('ep_prdid,ep_prd_name,sales_price,ep_stock,ep_subcatid');
        $this->db->where('ep_eventid', $event_id);
        $this->db->where('ep_catid', $cid);
        return $this->db->get('dsoi_event_product')->result_array();
    }*/


     function get_prd_event_1($event_id, $cid) {
       
        if ($event_id == 1 || $event_id == 2 ) {
            if ($cid == 2) {
                   $this->db->select('prd_id as ep_prdid,prd_title as ep_prd_name,prd_pagprice as sales_price,prd_stock_pag as ep_stock, prd_subcat as ep_subcatid');
                   $this->db->where('prd_cat', $cid);
                   $this->db->where('prd_id not in (262,263,264,265,266,267,268,269)');
            }else{
                  $this->db->select('prd_id as ep_prdid,prd_title as ep_prd_name,prd_salesprice as sales_price,prd_stck_qty as ep_stock, prd_subcat as ep_subcatid');
                     $this->db->where('prd_cat', $cid);
            }
      
         return $this->db->get('dsoi_product')->result_array();
        }
        else
          {
                $this->db->select('ep_prdid,ep_prd_name,sales_price,ep_stock,ep_subcatid');
                $this->db->where('ep_eventid', $event_id);
                $this->db->where('ep_catid', $cid);
                return $this->db->get('dsoi_event_product')->result_array();
            }
    }
    
    
   function get_all_product($id)
    {
        $this->db->select('prd_id,prd_title,prd_salesprice,prd_stck_qty');
        $this->db->where('prd_cat', $id);
        $this->db->limit(5, 0);
        return $this->db->get('dsoi_product')->result_array();
    }
     function get_all_products($id)
    {
        $this->db->select('prd_id,prd_title,prd_salesprice,prd_stck_qty');
        $this->db->where('prd_cat', $id);
        return $this->db->get('dsoi_product')->result_array();
    }
    function get_liqour_product($id)
    {
        $this->db->select('prd_id,prd_title,prd_pagprice,prd_stock_pag,prd_subcat');
        $this->db->where('prd_cat', $id);
        return $this->db->get('dsoi_product')->result_array();
    }
    
    public function get_mem_code($code) {
        $this->db->from('dsoi_member');
        $this->db->where('member_code', $code);
        $this->db->where('member_type!=', 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_main_code($code) {
        $this->db->from('dsoi_member');
        $this->db->where('member_code', $code);
        $this->db->where('member_type', 0);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get_prd_by_id($id)
    {
        $this->db->where('prd_id', $id);
        return $this->db->get('dsoi_product')->row();
    }
    
    function get_prd_event_id($id)
    {
        $this->db->where('ep_prdid', $id);
        return $this->db->get('dsoi_event_product')->row();
    }
    function get_attendence($id,$eid)
    {
        $this->db->where('member_rfid', $id);
        $this->db->where('member_datetime', $eid);
        return $this->db->get('dsoi_eventattendance')->row();
    }
    
    function get_prd_by($eid,$prd_id)
    {
        $this->db->where('ep_eventid', $eid);
        $this->db->where('ep_prdid', $prd_id);
        return $this->db->get('dsoi_event_product')->row();
    }
     public function deduct_stock($data) {
        $id = $data['ep_id'];
        $prd_qty = $data['prd_qty'];
        $query = $this->db->query("update dsoi_event_product set ep_stock = ep_stock - $prd_qty where `ep_id` = $id");
    }
	
	public function deduct_stock_event($data) {
        $id = $data['ep_prd'];
        $prd_qty = $data['prd_qty'];
        $event_id = $data['event_id'];
		
        $query = $this->db->query("update dsoi_event_product set ep_stock = ep_stock - $prd_qty where `ep_prdid` = $id AND `ep_eventid` = $event_id ");
    }

    public function add_bal($data) {
        $id = $data['member_id'];
        $bal = $data['member_balance'];
        $query = $this->db->query("update dsoi_member set member_balance = member_balance + $bal where `member_id` = $id");
    } 
     public function add_bal_monthly($data) {
        $id = $data['member_id'];
        $bal = $data['member_balance_monthly'];
        $query = $this->db->query("update dsoi_member set member_balance_monthly = member_balance_monthly + $bal where `member_id` = $id");
    } 
    public function deduct_bal($data) {
        $id = $data['member_id'];
        $bal = $data['member_balance'];
        $query = $this->db->query("update dsoi_member set member_balance = member_balance - $bal where `member_id` = $id");
    }
    
     public function deduct_stock1($data) {
        $id = $data['prd_id'];
        $prd_qty = $data['prd_qty'];
        $query = $this->db->query("update dsoi_product set prd_stock_pag = prd_stock_pag - $prd_qty where `prd_id` = $id");
    }
    
    public function deduct_stock12($data) {
        $id1 = 80;
        $id2 = 121;
        $prd_qty = $data['prd_qty'];
        $query1 = $this->db->query("update dsoi_product set prd_stock_pag = prd_stock_pag - $prd_qty where `prd_id` = $id1");
        $query2 = $this->db->query("update dsoi_product set prd_stock_pag = prd_stock_pag - $prd_qty where `prd_id` = $id2");
    }
	
    public function deduct_stock2($data) {
        $id = $data['prd_id'];
        $prd_qty = $data['prd_qty'];
        $query = $this->db->query("update dsoi_product set prd_stck_qty = prd_stck_qty - $prd_qty where `prd_id` = $id");
    }
	
    public function get_mem_code_all($code) {
        $this->db->from('dsoi_member');
        $this->db->where('member_code', $code);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_attendance_by_date($id,$date)
    {

       $query = $this->db->query("SELECT * FROM `dsoi_eventattendance` WHERE `member_rfid` = $id AND `member_datetime` LIKE '%$date%' ");
       return  $query->row();

    }
    
    
    public function posLogin($data) {
        $condition = "posu_usernmae =" . "'" . $data['posu_usernmae'] . "' AND " . "posu_pass =" . "'" . $data['posu_pass'] . "' And posu_accessid=2";
        $this->db->select('*');
        $this->db->from('dsoi_posuser');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
/*echo $this->db->last_query();
		exit();*/
        if ($query->num_rows() == 1) {
          return $query->row();
        } else {
            return false;
        }
    }


     public function posprintLogin($data) {
        $condition = "posu_usernmae =" . "'" . $data['posu_usernmae'] . "' AND " . "posu_pass =" . "'" . $data['posu_pass'] . "' And posu_accessid=3";
        $this->db->select('*');
        $this->db->from('dsoi_posuser');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
/*echo $this->db->last_query();
        exit();*/
        if ($query->num_rows() == 1) {
          return $query->row();
        } else {
            return false;
        }
    }
//******************************Dsoi Api End****************************************************    



    public function getcountry() {
        $this->db->select('id,country_name');
        $this->db->from('cvm_country');
        $this->db->where('status', "yes");
        $this->db->order_by("country_name", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getayear() {
        $this->db->select('year_session');
        $this->db->from('vb_academicyear');
        $this->db->where('status', "1");
        $this->db->where('active', "1");
        $query = $this->db->get();
        return $query->row()->year_session;
    }

    public function getacdemicyearid($acyear){
        $this->db->select('id');
        $this->db->from('vb_academicyear');
         $this->db->where('year_session', $acyear);
        $query = $this->db->get();
        return $query->row();
    }

     public function getstate() {
        $this->db->select('id,state_name');
        $this->db->from('cvm_state');
        $this->db->where('status', "yes");
        $this->db->order_by("state_name", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcity($state_id) {
        $this->db->select('id,city_name');
        $this->db->from('cvm_city')
                 ->where('status', "yes")
                 ->where('state_id', $state_id);
        $this->db->order_by("city_name", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getarea($city_id) {
        $this->db->select('id,area_name');
        $this->db->from('cvm_area')
                 ->where('status', "yes")
                 ->where('city_id', $city_id);
        $this->db->order_by("area_name", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getschool() {
        $this->db->select('*');
        $this->db->from('sschool_school');
        $this->db->where('school_status', 1);
        $this->db->order_by("school_title", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function checkschoolduplicate($school_id){
        $this->db->where('sp_schoolid',$school_id);
        $query = $this->db->get('vb_sprincipal');
        return $query->num_rows();
    }

    public function checkuserduplicate($sp_username){
        $this->db->where('sp_username',$sp_username);
        $query = $this->db->get('vb_sprincipal');
        return $query->num_rows();
    }

     public function insertschool($data) {
        if (isset($data['sp_id'])) {
            $this->db->where('sp_id', $data['sp_id']);
            $this->db->update('vb_sprincipal', $data); // update the record
        } else {
            $this->db->insert('vb_sprincipal', $data); // insert new record
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
    }


     public function addschoolstudentlist($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('vb_studentlist', $data); // update the record
            return $data['id'];
        } else {
            $this->db->insert('vb_studentlist', $data); // insert new record
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
    }


    public function schoollistduplicate($school_id,$year_id){
           $this->db->select('id,student_schoolid');
           $this->db->where('student_schoolid',$school_id);
           $this->db->where('student_ayear',$year_id);
           $this->db->from('vb_studentlist');
           $qr = $this->db->get();
           return $qr->row_array();
    }
    
    function get_by_date($rfid,$from,$to)

    {
        $this->db->where('tran_rfid', $rfid); 
	$this->db->where('tran_orderid  !=', 0); 
        $this->db->where('tran_datetime >=', $from);
        $this->db->where('tran_datetime <=', $to);
        return $this->db->get('dsoi_transaction')->result();

    }
    
    function get_recharge_total($event_id,$cat_id) {
        $sql1 = "SELECT * FROM `dsoi_category` WHERE `cat_type` = $cat_id";
        $query1 = $this->db->query($sql1)->result_array();
        $count=0;
        
        foreach ($query1 as $value) {
            $sub_cat_id = $value['cat_id'];
            $sub_title = $value['cat_title'];
            //$sql = "SELECT sum(order_price) As total FROM `dsoi_order` WHERE `order_eventid` = $event_id AND `order_catid` = $cat_id AND `order_subid` = $sub_cat_id";
            $sql = "SELECT sum(dorder_total_price)As total FROM `dsoi_order_details` WHERE `dorder_event_id` = $event_id AND `dorder_cat_id` = $cat_id AND `dorder_sub_cat_id` = $sub_cat_id";
            $total = $this->db->query($sql)->row_array();
            $count++;
            $tambola_fund=$this->db->get_where('tambola_fund',array('tf_event_id'=>$event_id,'tf_cat_id'=>$cat_id,'tf_sub_id'=>$sub_cat_id))->row_array();
            if(empty($tambola_fund)){ 
                $data2['title']= $sub_title;
                $data2['amount']= $total['total'];
                $data2['status']= '0';
               // $data['Round'][] = $data2; 
                
            }
        else {
                $data2['title'] = $sub_title;
                $data2['amount'] = $tambola_fund['recharge_amount'];
                $data2['status'] = $tambola_fund['status'];
                //$data['Round'][] = $data2;
            }
            
            $data['Round'][] = $data2;
        }
        
        return $data;
//        $sql = "SELECT sum(order_price) As total FROM `dsoi_order` WHERE `order_eventid` = $event_id AND `order_catid` = $cat_id";
//        $total = $this->db->query($sql)->row_array()['total'];
        
    }
    
    public function deduct_amount($data) {
        
        $id = $data['tf_event_id'];
        $cat_id = $data['tf_cat_id'];
        $sub_id = $data['tf_sub_id'];
        $win_amt = $data['recharge_amount'];
        $query = $this->db->query("update tambola_fund set deduct_amount = deduct_amount - $win_amt where `tf_event_id` = $id AND `tf_cat_id` = $cat_id AND `tf_sub_id` = $sub_id");
    }
    
    public function get_sub_cat_id($data) {
        $cat_id = $data['cat_id'];
        $cat_title = $data['cat_title'];
        $query = $this->db->query("SELECT * FROM `dsoi_category` WHERE `cat_type` = $cat_id AND `cat_title` LIKE '$cat_title'");
        $sub_cat = $this->db->query($query)->row_array()['cat_id'];
        die; //return $sub_cat;
    }
    
   public function stock_empty($event_id,$cat_id,$sub_cat_id) {
        $query = $this->db->query("UPDATE `dsoi_event_product` SET `ep_stock`= 0 WHERE `ep_catid` = $cat_id AND `ep_subcatid` = $sub_cat_id AND `ep_eventid` = $event_id");
    }
    
    
 public function all_table()
    {
        //$this->db->order_by('tbl_id','ASC');
        return $this->db->get('dsoi_table')->result_array();
    }
	
	public function getorderdetails_1($order_date){
            $this->db->select('sum(a.dorder_qty) as qty,b.prd_title as item');
            $this->db->from('dsoi_order_details as a');
            $this->db->join('dsoi_product as b','a.dorder_prdid = b.prd_id');
            $this->db->where('a.dorder_date',$order_date);
           // $this->db->where('a.property_id',$property_id);
            $this->db->order_by('b.prd_title');
            $this->db->group_by('a.dorder_prdid');
            $q = $this->db->get();
            //return $this->db->last_query();
            return $q->result_array();
    }
    
  public  function sendSMS($to, $message) {
      $content = "username=nerbudda&password=password&sender=NERCLB&to=".$to."&message=".$message."&reqid=1&format={json|text}&route_id=113";
      $url = 'http://login.heightsconsultancy.com/API/WebSMS/Http/v1.0a/index.php?'.$content;
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        /* get response */
        $output = curl_exec($ch);
        /* Print error if any */
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        return $output;
    }

}

?>