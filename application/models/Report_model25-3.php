<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_model extends CI_Model
{

    // public $table = 'allotment';
    // public $id = 'id';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    
    public function get_report($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND emp_id=' . $value['emp'];
        }

        if ($value['room'] != '') {
            $condition .= ' AND room_type=' . $value['room'];
        }

        if ($value['mode']!='') {
            $condition .= ' AND payment_mode=' . $value['mode'];
        }

          if ($value['bul']!='') {
            $condition .= ' AND building_id=' . $value['bul'];
        }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
        
        $condition .= " AND date='" . $value['from']."'";
        }else{
            $condition .= " AND date >= '" . $value['from'] . "' AND date <= '" . $value['to'] . "'";
        }
        }       
       $this->db->where($condition, NULL, FALSE);
       // $this->db->group_by('emp_id');
        //$res = $this->db->get('revenue')->result();
       // echo $this->db->last_query();
      $res = $this->db->get('revenue')->result();
       $res2= $this->get_report2($value);
       $res3= $this->get_report3($value);
       $data=array(
        'res'=>$res,
        'res2'=>$res2,
        'res3'=>$res3
       );
       return $data;
       
      } 

         public function get_report2($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND emp_id=' . $value['emp'];
        }

        if ($value['room'] != '') {
            $condition .= ' AND room_type=' . $value['room'];
        }

        if ($value['mode']!='') {
            $condition .= ' AND payment_mode=' . $value['mode'];
        }

          if ($value['bul']!='') {
            $condition .= ' AND building_id=' . $value['bul'];
        }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
        
        $condition .= " AND date='" . $value['from']."'";
        }else{
            $condition .= " AND date >= '" . $value['from'] . "' AND date <= '" . $value['to'] . "'";
        }
        }       
       $this->db->where($condition, NULL, FALSE);
         $this->db->group_by('emp_id');
        //$res = $this->db->get('revenue')->result();
       // echo $this->db->last_query();
       return  $this->db->get('revenue')->result();
  } 

        public function get_report3($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND emp_id=' . $value['emp'];
        }

        if ($value['room'] != '') {
            $condition .= ' AND room_type=' . $value['room'];
        }

        if ($value['mode']!='') {
            $condition .= ' AND payment_mode=' . $value['mode'];
        }

          if ($value['bul']!='') {
            $condition .= ' AND building_id=' . $value['bul'];
        }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
        
        $condition .= " AND date='" . $value['from']."'";
        }else{
            $condition .= " AND date >= '" . $value['from'] . "' AND date <= '" . $value['to'] . "'";
        }
        }       
       $this->db->where($condition, NULL, FALSE);
         $this->db->group_by('customer_id');
        //$res = $this->db->get('revenue')->result();
       // echo $this->db->last_query();
        return  $this->db->get('revenue')->result();
  } 
    

        public function exp_get_report($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND paying_employee=' . $value['emp'];
        }

        if ($value['room'] != '') {
            $condition .= ' AND room_type=' . $value['room'];
        }

        if ($value['mode']!='') {
            $condition .= ' AND payment_mode=' . $value['mode'];
        }

          if ($value['bul']!='') {
            $condition .= ' AND building_id=' . $value['bul'];
        }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
        
        $condition .= " AND date='" . $value['from']."'";
        }else{
            $condition .= " AND date >= '" . $value['from'] . "' AND date <= '" . $value['to'] . "'";
        }
        }       
       $this->db->where($condition, NULL, FALSE);
        
        $res = $this->db->get('expense')->result();
        $res2=$this->exp_get_report2($value);
        $res3=$this->exp_get_report3($value);
        $data=array(
          'res'=>$res,
          'res2'=>$res2,
          'res3'=>$res3,
        );
        return $data;
  } 

   public function exp_get_report2($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND paying_employee=' . $value['emp'];
        }

        if ($value['room'] != '') {
            $condition .= ' AND room_type=' . $value['room'];
        }

        if ($value['mode']!='') {
            $condition .= ' AND payment_mode=' . $value['mode'];
        }

          if ($value['bul']!='') {
            $condition .= ' AND building_id=' . $value['bul'];
        }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
        
        $condition .= " AND date='" . $value['from']."'";
        }else{
            $condition .= " AND date >= '" . $value['from'] . "' AND date <= '" . $value['to'] . "'";
        }
        }       
         $this->db->where($condition, NULL, FALSE);
         
         $this->db->group_by('subcategory');
       
       return  $this->db->get('expense')->result();
  } 

   public function exp_get_report3($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND paying_employee=' . $value['emp'];
        }

        if ($value['room'] != '') {
            $condition .= ' AND room_type=' . $value['room'];
        }

        if ($value['mode']!='') {
            $condition .= ' AND payment_mode=' . $value['mode'];
        }

          if ($value['bul']!='') {
            $condition .= ' AND building_id=' . $value['bul'];
        }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
        
        $condition .= " AND date='" . $value['from']."'";
        }else{
            $condition .= " AND date >= '" . $value['from'] . "' AND date <= '" . $value['to'] . "'";
        }
        }       
         $this->db->where($condition, NULL, FALSE);
         $this->db->group_by('paying_employee');  

     return   $this->db->get('expense')->result();
        // echo $this->db->last_query();
  } 


   public function emp_to_emp_get_report($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND other_emp_id=' . $value['emp'];
        }

        if ($value['room'] != '') {
            $condition .= ' AND room_type=' . $value['room'];
        }

        if ($value['mode']!='') {
            $condition .= ' AND mode=' . $value['mode'];
        }

          if ($value['bul']!='') {
            $condition .= ' AND building_id=' . $value['bul'];
        }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
                        
        $condition .= " AND (STR_TO_DATE(createdat,'%Y-%m-%d'))='" . $value['from']."'";
        }else{
            $condition .= " AND (STR_TO_DATE(createdat,'%Y-%m-%d')) >= '" . $value['from'] . "' AND (STR_TO_DATE(createdat,'%Y-%m-%d')) <= '" . $value['to'] . "'";
        }
        }       
         $this->db->where($condition, NULL, FALSE);
         $this->db->group_by('other_emp_id');   
         $res=$this->db->get('emp_to_emp')->result();
         $res2=$this->emp_to_emp_get_report2($value);
       $data=array(
        'res'=>$res,
        'res2'=>$res2,
      );
       return $data;
  } 

      public function emp_to_emp_get_report2($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND employee_id=' . $value['emp'];
        }

        if ($value['room'] != '') {
            $condition .= ' AND room_type=' . $value['room'];
        }

        if ($value['mode']!='') {
            $condition .= ' AND mode=' . $value['mode'];
        }

          if ($value['bul']!='') {
            $condition .= ' AND building_id=' . $value['bul'];
        }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
        
        $condition .= " AND (STR_TO_DATE(createdat,'%Y-%m-%d'))='" . $value['from']."'";
        }else{
            $condition .= " AND (STR_TO_DATE(createdat,'%Y-%m-%d')) >= '" . $value['from'] . "' AND (STR_TO_DATE(createdat,'%Y-%m-%d')) <= '" . $value['to'] . "'";
        }
        }       
         $this->db->where($condition, NULL, FALSE);
         $this->db->group_by('employee_id');   
       return  $this->db->get('emp_to_emp')->result();
  } 



    

    public function final_report_from_register($value)
    {  
        $condition = '0=0 ';
        if ($value['emp'] != '') {
            $condition .= ' AND employee_id=' . $value['emp'];
        }

        // if ($value['room'] != '') {
        //     $condition .= ' AND room_type=' . $value['room'];
        // }

        if ($value['mode']!='') {
            $condition .= ' AND mode=' . $value['mode'];
        }

        //   if ($value['bul']!='') {
        //     $condition .= ' AND building_id=' . $value['bul'];
        // }

         if ($value['cus']!='') {
            $condition .= ' AND customer_id=' . $value['cus'];
        }

         if ($value['from'] != '' && $value['to'] != '') {
        if($value['from']==$value['to'] ){
                        
        $condition .= " AND (STR_TO_DATE(createdat,'%Y-%m-%d'))='" . $value['from']."'";
        }else{
            $condition .= " AND (STR_TO_DATE(createdat,'%Y-%m-%d')) >= '" . $value['from'] . "' AND (STR_TO_DATE(createdat,'%Y-%m-%d')) <= '" . $value['to'] . "'";
        }
        }       
         $this->db->where($condition, NULL, FALSE);
         $this->db->group_by('employee_id');   
         $res=$this->db->get('income_register')->result();
       
       $data=array(
       'res'=>$res,        
      );

       return $data;
  } 

    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
  $this->db->or_like('customer_id', $q);
  $this->db->or_like('employee_id', $q);
  $this->db->or_like('building_id', $q);
  $this->db->or_like('room_id', $q);
  $this->db->or_like('rent', $q);
  $this->db->or_like('from_date', $q);
  $this->db->or_like('to_date', $q);
  $this->db->or_like('status', $q);
  $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
  $this->db->or_like('customer_id', $q);
  $this->db->or_like('employee_id', $q);
  $this->db->or_like('building_id', $q);
  $this->db->or_like('room_id', $q);
  $this->db->or_like('rent', $q);
  $this->db->or_like('from_date', $q);
  $this->db->or_like('to_date', $q);
  $this->db->or_like('status', $q);
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


    // function get_by_search($search = NULL) {

    //     $condition = '0=0 ';

    //     if ($search['event'] != '' && $search['type'] == '') {
    //         $condition .= 'AND tran_eventid=' . $search['event'];
    //     }

    //     if ($search['type'] != '' && $search['event'] == '') {
    //         $condition .= ' AND tran_type=' . $search['type'];

    //     }
    //      if ($search['catid'] != '') {
    //         $condition .= ' AND tran_catid=' . $search['catid'];

    //     }

    //     if ($search['from'] != '' && $search['to'] != '') {
    //     if($search['from']==$search['to'] ){
        
    //     $condition .= " AND tran_date='" . $search['from']."'";
    //     }else{

    //         $condition .= " AND tran_date >= '" . $search['from'] . "' AND tran_date <= '" . $search['to'] . "'";
    //     }
    //     }
        

    //     if ($search['event'] != '' && $search['type'] != '') {

    //         $condition .= ' AND tran_eventid=' . $search['event'] . ' AND tran_type=' . $search['type'];

    //     }



    //     $this->db->where($condition, NULL, FALSE);
    //      $this->db->where("tran_status",1);

    //     $this->db->order_by($this->id, $this->order);

    //     return $this->db->get($this->table)->result();

    //   // echo $this->db->last_query();

    //   //die;

    // }

    //     public function gee_res_by_mode($id,$mode)
    // {
    //    // $this->db->select('SUM(amount) as income', FALSE);
    //     $this->db->select('amount as income');
    //    $this->db->from('revenue');
    //    $this->db->where('id',$id);
    //    $this->db->where('payment_mode',$mode);
     
    //    return $this->db->get()->row();
    // }
     public function gee_res_by_mode($id,$form,$to,$mode,$type,$bul,$room,$cus){ 
       
        $condition = '0=0 ';
        if ($id != '') {
            $condition .= ' AND emp_id=' . $id;
        }

        if ($room != '') {
            $condition .= ' AND room_type=' . $room;
        }

        if ($mode!='') {
            $condition .= ' AND payment_mode=' . $mode;
        }

          if ($bul!='') {
            $condition .= ' AND building_id=' . $bul;
        }

         if ($cus!='') {
            $condition .= ' AND customer_id=' . $cus;
        }

        //  if ($from != '' && $to != '') {
        // if($from == $to ){
        
        // $condition .= " AND date='" . $from."'";
        // }else{
        //     $condition .= " AND date >= '" . $from . "' AND date <= '" . $to . "'";
        // }
        // }          
    

       $this->db->select('SUM(amount) AS income', FALSE);
       $this->db->from('revenue');
        $this->db->where($condition, NULL, FALSE);
       $this->db->where('date>=',date('Y-m-d',strtotime($form)));
       $this->db->where('date<=',date('Y-m-d',strtotime($to)));
       // $this->db->where('emp_id',$id);
       $this->db->where('type',$type);
       // $this->db->where('payment_mode',$mode);
       return $this->db->get()->row();
  }   

       public function gee_res_by_mode2($id,$form,$to,$mode,$type,$bul,$room,$emp){ 
       
        $condition = '0=0 ';
        if ($emp != '') {
            $condition .= ' AND emp_id=' . $emp;
        }

        if ($room != '') {
            $condition .= ' AND room_type=' . $room;
        }

        if ($mode!='') {
            $condition .= ' AND payment_mode=' . $mode;
        }

          if ($bul!='') {
            $condition .= ' AND building_id=' . $bul;
        }

         if ($id!='') {
            $condition .= ' AND customer_id=' . $id;
        }

       $this->db->select('SUM(amount) AS income', FALSE);
       $this->db->from('revenue');
        $this->db->where($condition, NULL, FALSE);
       $this->db->where('date>=',date('Y-m-d',strtotime($form)));
       $this->db->where('date<=',date('Y-m-d',strtotime($to)));
       // $this->db->where('customer_id',$id);
       $this->db->where('type',$type);
       // $this->db->where('payment_mode',$mode);
       return $this->db->get()->row();
  } 

 // Expense reprot 

    public function gee_res_by_subcate($id,$form,$to,$type){ 
       
       $this->db->select('SUM(amount_paid) AS income', FALSE);
       $this->db->from('expense');
       $this->db->where('date>=',date('Y-m-d',strtotime($form)));
       $this->db->where('date<=',date('Y-m-d',strtotime($to)));
       $this->db->where('subcategory',$id);
       $this->db->where('type',$type);
       // $this->db->where('payment_mode',$mode);
      // echo $this->db->last_query();
       return $this->db->get()->row();
  }
     
   public function gee_res_by_emp_id_mode($id,$from,$to,$mode,$type,$bul,$room,$cus){ 

        $condition = '0=0 ';
        if ($id != '') {
            $condition .= ' AND paying_employee=' . $id;
        }

        if ($room != '') {
            $condition .= ' AND room_type=' . $room;
        }

        if ($mode!='') {
            $condition .= ' AND payment_mode=' . $mode;
        }

          if ($bul!='') {
            $condition .= ' AND building_id=' . $bul;
        }

         if ($cus!='') {
            $condition .= ' AND customer_id=' . $cus;
        }

        //  if ($from != '' && $to != '') {
        // if($from == $to ){
        
        // $condition .= " AND date='" . $from."'";
        // }else{
        //     $condition .= " AND date >= '" . $from . "' AND date <= '" . $to . "'";
        // }
        // }       
       
       $this->db->select('SUM(amount_paid) AS income', FALSE);
       $this->db->from('expense');
        $this->db->where($condition, NULL, FALSE);
       // $this->db->where('date>=',date('Y-m-d',strtotime($from)));
       // $this->db->where('date<=',date('Y-m-d',strtotime($to)));
       // $this->db->where('paying_employee',$id);
       $this->db->where('type',$type);
       // $this->db->where('payment_mode',$mode);
       // $this->db->where('building_id',7);
       // $this->db->where('payment_mode',$mode);
       return $this->db->get()->row();
  }

  //emp tp emp
  
     public function gee_res_emp_to($id,$form,$to,$mode){ 
       
       $this->db->select('SUM(expense) AS income', FALSE);
       $this->db->from('emp_to_emp');
       $this->db->where('STR_TO_DATE(createdat,"%Y-%m-%d")>=',date('Y-m-d',strtotime($form)));
       $this->db->where('STR_TO_DATE(createdat,"%Y-%m-%d")<=',date('Y-m-d',strtotime($to)));
       $this->db->where('other_emp_id',$id);
       // $this->db->where('type',$type);
       $this->db->where('other_mode',$mode);
       // $this->db->where('payment_mode',$mode);
       return $this->db->get()->row();
  }  

    public function gee_res_emp_to2($id,$form,$to,$mode){ 
       
       $this->db->select('SUM(expense) AS income', FALSE);
       $this->db->from('emp_to_emp');
       $this->db->where('STR_TO_DATE(createdat,"%Y-%m-%d")>=',date('Y-m-d',strtotime($form)));
       $this->db->where('STR_TO_DATE(createdat,"%Y-%m-%d")<=',date('Y-m-d',strtotime($to)));
       $this->db->where('employee_id',$id);
       // $this->db->where('type',$type);
       $this->db->where('mode',$mode);
       // $this->db->where('payment_mode',$mode);
       return $this->db->get()->row();
  } 
  
  public function final_report($id,$form,$to,$mode){ 
       
       $this->db->select('SUM(income) AS income,SUM(expense) AS expense', FALSE);
       $this->db->from('income_register');
       $this->db->where('STR_TO_DATE(createdat,"%Y-%m-%d")>=',date('Y-m-d',strtotime($form)));
       $this->db->where('STR_TO_DATE(createdat,"%Y-%m-%d")<=',date('Y-m-d',strtotime($to)));
       $this->db->where('employee_id',$id);
       // $this->db->where('type',$type);
       $this->db->where('mode',$mode);
       // $this->db->where('payment_mode',$mode);
       return $this->db->get()->row();
       // echo $this->db->last_query();
  }  


     






}

/* End of file Allotment_model.php */
/* Location: ./application/models/Allotment_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-07 09:39:38 */