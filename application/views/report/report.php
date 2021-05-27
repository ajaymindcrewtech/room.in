<style type="text/css">
    .colur{
       background-color: #9c908c; 
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Revnue Reoprt List          
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
         <div class="col-xs-12">
        
         </div>

            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- ******************/master header end ****************** -->
        <div class="row" style="margin-bottom: 10px">
             <!-- <div class="alert alert-success"> -->
              <form name="fillter" method="post" id="fillter" action="<?php echo base_url('report/report_form') ?>">
                     
                  
                    <div class="col-md-3">
                       <label >From Date</label>
                        <input type="text" id="fro" name="fro" class="form-control datepicker" value="<?php if($from){echo $from;}else{ echo date('d-m-Y');}?>"/>
                    </div>

                     <div class="col-md-3">
                        <label >To Date</label>
                        <input type="text" id="to" name="to" class="form-control datepicker" value="<?php if($to){echo $to;}else{ echo date('d-m-Y');}?>">
                     </div>

                     <div class="col-md-3">
                          <label class="">Employee</label>
                         <select class="form-control select2" name="emp" id="">
                           <option value="">Select</option>
                         <?php foreach ($employee as $key => $value) {?>
                             <option value="<?php echo $value->id ?>"<?php if($emp==$value->id){echo 'selected';} ?>><?php echo $value->name.'('.$value->id.')' ?></option>
                         <?php } ?>
                          </select>
                     </div>

                     <div class="col-md-3">
                          <label class="">Payment Mode</label>
                         <select class="form-control select2" name="mode" id="">
                           <option value="">Select</option>
                         <?php foreach ($mode as $key => $value) {?>
                             <option value="<?php echo $value->id ?>" <?php if($value->id==$pay_mode) ?>><?php echo $value->name ?></option>
                         <?php } ?>
                          </select>
                    </div>


                    <div class="col-md-3">
                        <label >Building</label>
                        <select class="form-control select2" name="bul" id="">
                            <option value="">Select</option>
                            <?php foreach ($building as $key => $value) {?>
                               <option value="<?php echo $value->id ?>"<?php if($value->id==$bul){echo 'selected';} ?>><?php echo $value->name ?></option>
                           <?php } ?>
                         
                         </select>
                    </div>  

                    <div class="col-md-3">
                       <label >Room Type</label>
                       <select class="form-control select2" name="type" id="type">
                          <option value="">Select</option>
                          <?php foreach ($type as $key => $value) {?>
                             <option value="<?php echo $value->id ?>"<?php if($value->id==$room){echo 'selected';} ?>><?php echo $value->name ?></option>
                         <?php } ?>
                       
                        </select>
                    </div>

             
                 
                    <div class="col-md-3">
                        <label class="">Customer</label>
                        <select class="form-control select2" name="cus" id="cus">
                         <option value="">Select</option>
                        <?php foreach ($customer as $key => $value) {?>
                             <option value="<?php echo $value->id ?>"<?php if($value->id==$cus){echo 'selected';} ?>><?php echo $value->name ?></option>
                         <?php } ?>
                        </select>
                    </div>

                    <br><br><br>
                    <div class="col-xs-3" >
                       <button type="submit" class="btn btn-primary form-control" name="bt" value="submit" style="margin-top: 23px;">Submit</button> 
                    </div>
            </form>
        <!-- </div> -->
          
        </div>
       
        <br>
  <!-- First Table -->

        <div class="alert colur" id="table1">
        <table class="table table-bordered table-striped example" id="">
            <thead>
                <tr>
                   <!--  <th width="80px">No</th> -->
		     <th>Net Inflow</th>
                    <th>Amount</th>
                   <th>Net Revenue</th>
                </tr>
            </thead>
      	    <tbody id="">
                <?php
                    $net=0;
                    $re=0;
                    $net_rev=0;
                    // echo '<pre>';
                     // print_r($result);
                       if($result){
                 foreach ($result['res'] as $key => $value) {
                      if($value->delete_status==1){
                        if($value->type==1){
                           $net=$net+$value->amount;
                        }else{
                           $re=$re+$value->amount;
                       }
                       }
                   }

               
                  ?>
                      <tr>
                            <td><?php echo $net ;?></td>
                            <td><?php echo $re; ?></td>
                            <td><?php echo $net-$re; ?></td>
                     </tr>
      		  <?php } ?>
             </tbody>
             </table>      
    </div>

<!-- Second Table -->

     <div class="alert colur" id="table2">
      <?php $total=0; ?>
                 	  <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped example" id="">
            <thead>
              <?php



               ?>
                <tr>
                   <!--  <th width="80px">No</th> -->

         <th>Employee</th>
                    <th>Cash</th>
                    <th>Cash Ref</th>
                   <th>Phone Pay</th>
                   <th>Phone Pay Ref</th>
                   <th>Paytm</th>
                   <th>Paytm Ref</th>
                   <th>Bank</th>
                   <th>Bank Ref</th>
                   <th>Total</th>
                </tr>
            </thead>
            <?php 
                      $cash_total=0;
                      $cash_r_total=0;
                      $phon_total=0;
                      $phon_r_total=0;
                      $pyatm_total=0;
                      $pyatm_r_total=0;
                      $bank_total=0;
                      $bank_r_total=0; 
                  ?>
         <tbody id="">
          <?php
              $net=0;
              $re=0;
              $net_rev=0;
              $total;
              // echo '<pre>';
              //  print_r($result['res2']);
                 if($result){
                    $cashbal=0;
                   
                    $cashbal_ex=0;
                    $paytm=0;
                    $phone_bal=0;
                    $phone_bal_ex=0;
                    $pyatm_bal=0;
                    $pyatm_bal_ex=0;
                    $bank=0;
                    $bank_ex=0;
                    $phone=0;
                     

                   
           foreach ($result['res2'] as $key => $value) {
                  if($value->delete_status==1){
                   $cashbal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,1,1,$bul,$room,$cus);
                   $ref_cashbal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,1,2,$bul,$room,$cus);
                  // echo $this->db->last_query();
                   $phone_bal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,2,1,$bul,$room,$cus);
                   $ref_phone_bal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,2,2,$bul,$room,$cus);
                   $pyatm_bal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,3,1,$bul,$room,$cus);
                   $ref_pyatm_bal=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,3,2,$bul,$room,$cus);
                   $bank=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,5,1,$bul,$room,$cus);  
                  $ref_bank=$this->Report_model->gee_res_by_mode($value->emp_id,$from,$to,5,2,$bul,$room,$cus); 

                   $cash_total+=$cashbal->income;
                   $cash_r_total+=$ref_cashbal->income;
                   $phon_total+=$phone_bal->income;
                   $phon_r_total+=$ref_phone_bal->income;
                   $pyatm_total+=$pyatm_bal->income;
                   $pyatm_r_total+=$ref_pyatm_bal->income;
                   $bank_total+=$bank->income;
                   $bank_r_total+=$ref_bank->income;

                  $total+=$cashbal->income-$ref_cashbal->income+$phone_bal->income-$ref_phone_bal->income+$pyatm_bal->income-$ref_pyatm_bal->income+$bank->income-$ref_bank->income;            
            ?>


                <tr>
                 <td><?php $res=$this->Employee_model->get_by_id($value->emp_id);if($res){ echo $res->name.'-('.$res->id.')';} ?></td> 
                <td ><?php if($cashbal){echo $cab=$cashbal->income ;} else {echo '--';}?></td>
                <td><?php if($ref_cashbal){echo $ref_cab=$ref_cashbal->income ;} else {echo '--';}?></td>
                <td><?php if($phone_bal){echo $pb=$phone_bal->income ;} else {echo '--';} ?></td>
                <td><?php if($ref_phone_bal){echo $ref_pb=$ref_phone_bal->income ;} else {echo '--';} ?></td>
                <td><?php if($pyatm_bal){echo $pt=$pyatm_bal->income;} else {echo '--';} ?></td>
                <td><?php if($ref_pyatm_bal){echo $ref_pt=$ref_pyatm_bal->income;} else {echo '--';} ?></td>
                <td><?php if($bank){echo $ban= $bank->income;} else {echo '--';} ?></td>
                <td><?php if($ref_bank){echo  $ref_ban=$ref_bank->income;} else {echo '--';} ?></td>
                <td><span class="btn btn-sm btn-success btn-flat"><?php  echo $cab-$ref_cab+$pb-$ref_pb+$pt-$ref_pt+$ban-$ref_ban;?></span></td>
               </tr>
      <?php } } }?>
                 
       </tbody>
       <tr class="alert-danger"><td>Total</td><td><?php echo $cash_total ?><td><?php echo $cash_r_total ?><td><?php echo $phon_total ?></td><td><?php echo $phon_r_total ?></td><td><?php echo $pyatm_total ?></td><td><?php echo $pyatm_r_total ?><td><?php echo $bank_total ?></td><td><?php echo $bank_r_total ?></td><td><?php echo $total ?></td></tr>
        </table>
    </div>
         <!-- <span  class="btn btn-sm btn-danger btn-flat" style="float: right;margin-right: 30px;"><?php echo $total; ?></span> -->
      </div>   


<!-- Third Table -->
           <div class="alert colur" id="table3">
            <?php $total=0; ?>
           	  <div style="overflow-x:auto;">
             <table class="table table-bordered table-striped example" id="">
            <thead>
                <tr>
                   <!--  <th width="80px">No</th> -->
                  <th>Customer</th>
                   <th>ex_Cash </th>
                   <th>in_Cash </th>
                   <th>Ex_Phone Pay</th>
                   <th>In_Phone Pay </th>
                   <th>Ex_Paytm</th>
                   <th>In_Paytm </th>
                   <th>Ex_Bank</th>
                   <th>In_Bank </th>
                   <th>Total</th>
                </tr>

                 
            </thead>
                  <?php 
                      $cash_total=0;
                      $cash_r_total=0;
                      $phon_total=0;
                      $phon_r_total=0;
                      $pyatm_total=0;
                      $pyatm_r_total=0;
                      $bank_total=0;
                      $bank_r_total=0; 
                  ?>
       <tbody id="">
          <?php
              $net=0;
              $re=0;
              $net_rev=0;
              // echo '<pre>';
              //  print_r($result['res2']);
                 if($result){
                    $cashbal=0;
                   
                    $cashbal_ex=0;
                    $paytm=0;
                    $phone_bal=0;
                    $phone_bal_ex=0;
                    $pyatm_bal=0;
                    $pyatm_bal_ex=0;
                    $bank=0;
                    $bank_ex=0;
                    $phone=0;
               
                  
           foreach ($result['res3'] as $key => $value) {
            if($value->delete_status==1){
               
                   $cashbal=$this->Report_model->gee_res_by_mode2($value->customer_id,$from,$to,1,1,$bul,$room,$emp);
                   $ref_cashbal=$this->Report_model->gee_res_by_mode2($value->customer_id,$from,$to,1,2,$bul,$room,$emp);
                  // echo $this->db->last_query();
                   $phone_bal=$this->Report_model->gee_res_by_mode2($value->customer_id,$from,$to,2,1,$bul,$room,$emp);
                   $ref_phone_bal=$this->Report_model->gee_res_by_mode2($value->customer_id,$from,$to,2,2,$bul,$room,$emp);
                   $pyatm_bal=$this->Report_model->gee_res_by_mode2($value->customer_id,$from,$to,3,1,$bul,$room,$emp);
                   $ref_pyatm_bal=$this->Report_model->gee_res_by_mode2($value->customer_id,$from,$to,3,2,$bul,$room,$emp);
                   $bank=$this->Report_model->gee_res_by_mode2($value->customer_id,$from,$to,5,1,$bul,$room,$emp);  
                   $ref_bank=$this->Report_model->gee_res_by_mode2($value->customer_id,$from,$to,5,2,$bul,$room,$emp);  

                   $cash_total+=$cashbal->income;
                   $cash_r_total+=$ref_cashbal->income;
                   $phon_total+=$phone_bal->income;
                   $phon_r_total+=$ref_phone_bal->income;
                   $pyatm_total+=$pyatm_bal->income;
                   $pyatm_r_total+=$ref_pyatm_bal->income;
                   $bank_total+=$bank->income;
                   $bank_r_total+=$ref_bank->income;
                    
                    $total=$cash_total-$cash_r_total+$phon_total-$phon_r_total+$pyatm_total-$pyatm_r_total+$bank_total-$bank_r_total;

                   // $total+=$cashbal->income+$phone_bal->income+$pyatm_bal->income+$bank->income;            
            ?>


                <tr>
                 <td><?php $res=$this->Customer_model->get_by_id($value->customer_id);if($res){ echo $res->name.'-('.$res->id.')';} ?></td> 
                <td ><?php if($cashbal){echo $cab=$cashbal->income ;} else {echo '--';}?></td>
                <td><?php if($ref_cashbal){echo $ref_cab=$ref_cashbal->income ;} else {echo '--';}?></td>
                <td><?php if($phone_bal){echo $pb=$phone_bal->income ;} else {echo '--';} ?></td>
                <td><?php if($ref_phone_bal){echo $ref_pb=$ref_phone_bal->income ;} else {echo '--';} ?></td>
                <td><?php if($pyatm_bal){echo $pt=$pyatm_bal->income;} else {echo '--';} ?></td>
                <td><?php if($ref_pyatm_bal){echo $ref_pt=$ref_pyatm_bal->income;} else {echo '--';} ?></td>
                <td><?php if($bank){echo $ban= $bank->income;} else {echo '--';} ?></td>
                <td><?php if($ref_bank){echo  $ref_ban=$ref_bank->income;} else {echo '--';} ?></td>
                <td><span class="btn btn-sm btn-success btn-flat"><?php  echo $cab+$pb+$pt+$ban;?></span></td>
               </tr>
      <?php } } }?>
       </tbody>
         <tr class="alert-danger"><td>Total</td><td><?php echo $cash_total ?><td><?php echo $cash_r_total ?><td><?php echo $phon_total ?></td><td><?php echo $phon_r_total ?></td><td><?php echo $pyatm_total ?></td><td><?php echo $pyatm_r_total ?><td><?php echo $bank_total ?></td><td><?php echo $bank_r_total ?></td><td><?php echo $total ?></td></tr>
        </table>
         <!-- <span  class="btn btn-sm btn-danger btn-flat" style="float: right;margin-right: 30px;"><?php echo $total; ?></span> -->
    </div>
      
    <!-- ******************/master footer ****************** -->
                    </div>            
                </div>
            </div>
    </section>
    </div>

      <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                  $('.select2').select2();
                  $("#mytable").dataTable();
                  $("#mytable2").dataTable();
                  $("#mytable3").dataTable();

                   // $('#table1').show();
                   //  $('#table2').show();
                   //  $('#table3').hide();

                // $('#ddown').change(function(){
                // var id=($(this).val());
                //   if(id==1){
                //     $('#table1').show();
                //     $('#table2').hide();
                //     $('#table3').hide();
                //     $("#fillter").attr('action', '<?php echo base_url('report/report_form') ?>');
                //   }
                //   else if(id==2){
                //     $('#table1').hide();
                //     $('#table2').show();
                //     $('#table3').hide();
                //     $("#fillter").attr('action', '<?php echo base_url('report/report_form2') ?>');
                //   }
                //   else {
                //     $('#table1').hide();
                //     $('#table2').hide();
                //     $('#table3').show();
                //     $("#fillter").attr('action', '<?php echo base_url('report/report_form3') ?>');
                //   }
                // });
            });
        </script>