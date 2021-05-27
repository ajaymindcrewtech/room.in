<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commission{
                        
                            /**
                             * To calculate commission for given level seeker's. 
                             * 
                             * 
                             * 
                             * 
                             * 
                             * 
                             * 
                             * 
                             * 
                             **/
      /* Variable Declaration */
    public $giverRc;
    public $selfRc;
    public $Rc;
    public $Price;
    
    public $level;
    public $paycodel;
  
    
    
                             
    public function __construct()
    {
            
            $this->CI = & get_instance();
            
                                    
     }
    
     public function commission_distribution($giverrc,$selfrc,$referral,$price,$paycode,$level=0) {
         $this->Rc='';
         $this->giverRc=$giverrc;
         $this->selfRc=$selfrc;
         $this->Rc=$referral;
         $this->Price=$price;
         $this->level=$level;
         $this->paycode=$paycode;
        // $setting_row=$this->CI->Settings_model->get_single_rec(9);
         $price= (float)($this->Price);
         $comm_rows=$this->CI->Commission_model->get_commission();
         
          $comm_rows[$level]['com_percent'];
        // print_r($comm_rows);
       
           $amount=($price*$comm_rows[$level]['com_percent'])/100;
          
          $datum=array(
              'c_selfRc'=>$this->Rc,
              'c_giverRc'=>$this->giverRc,
              'c_amount'=>$amount,
              'c_paycode'=>$this->paycode,
              'c_percent'=>$comm_rows[$level]['com_percent']
              
          );
          $this->CI->Commission_model->add_commission($datum);
          $seeker_row= $this->CI->Commission_model->getseeker($this->Rc);
          //print_r($seeker_row);
          if($seeker_row['rc']!=''){
         
          $this->level= $this->level+1;
          if( $this->level<=9)
         $this->commission_distribution( $this->giverRc,$this->Rc,$seeker_row['rc'] , $this->Price, $this->paycode, $this->level);
          }
          
     }
     
    
    
}