<style type="text/css">
    .colur{
       background-color: #9c908c; 
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Final Reoprt List          
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
              <form name="fillter" method="post" id="fillter" action="<?php echo base_url('report/profit_report') ?>">
                     
                  

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
           
        </div><br><br><br>
  <!-- First Table -->
        <div class="alert colur" id="table1">
           <?php $total=0; ?>
        <!-- <table class="table table-bordered table-striped example" id=""> -->
          <table class="table table-bordered table-striped example" id="">
            <thead>
                <tr>
                   <!--  <th width="80px">No</th> -->
    		            <th>Employee</th>
                    <th>Cash</th>
                  <!--   <th>Cash Ref</th> -->
                 <!--   <th>transaction_id </th> -->
                   <th>Phone Pay Ref</th>
                   <th>Paytm</th>
                   <!-- <th>Paytm Ref</th> -->
                   <th>Bank</th>
                   <!-- <th>Bank Ref</th> -->
                   <th>Total</th>
                </tr>
            </thead>
             <?php 
                      $cash_total=0;
                     
                      $phon_total=0;
                    
                      $pyatm_total=0;
                     
                      $bank_total=0;
                    
                  ?>
      	    <tbody id="">
                <?php
                    // $net=0;
                    // $re=0;
                    // $net_rev=0;
                    // echo '<pre>';
                    //  print_r($result);
                       if($result){
                 foreach ($result as $key => $value) {

                  
                    $cashbal=$this->Report_model->final_report($value->employee_id,$from,$to,1);                 
                    $phone_bal=$this->Report_model->final_report($value->employee_id,$from,$to,2);
                    $pyatm_bal=$this->Report_model->final_report($value->employee_id,$from,$to,3);
                    $bank=$this->Report_model->final_report($value->employee_id,$from,$to,5); 
                     
                        $cash_total+=$cashbal->income - $cashbal->expense;
                 
                     $phon_total+=$phone_bal->income - $phone_bal->expense;
                  
                     $pyatm_total+=$pyatm_bal->income - $pyatm_bal->expense;
                 
                      $bank_total+=$bank->income - $bank->expense; 


                      $total=$cash_total+$phon_total+$pyatm_total+$bank_total;   
                      ?>
                      <tr>  
                     <td><?php $res=$this->Employee_model->get_by_id($value->employee_id);if($res){ echo $res->name.'-('.$res->id.')';} ?></td> 
                     <td ><?php if($cashbal){echo $cab=$cashbal->income - $cashbal->expense;} else {echo '--';}?></td>
                     
              
                     <td><?php if($phone_bal){echo $pb=$phone_bal->income - $phone_bal->expense ;} else {echo '--';} ?></td>
               
                     <td><?php if($pyatm_bal){echo $pt=$pyatm_bal->income - $pyatm_bal->expense;} else {echo '--';} ?></td>

                     
               
                     <td><?php if($bank){echo $ban= $bank->income - $bank->expense;} else {echo '--';} ?></td>
                      <td><span class="btn btn-sm btn-success btn-flat"><?php  echo $cab+$pb+$pt+$ban;?></span></td>
                     </tr>
      		  <?php } } ?>
             </tbody>
               <tr class="alert-danger"><td>Total</td><td><?php echo $cash_total ?></td><td><?php echo $phon_total ?></td><td><?php echo $pyatm_total ?></td><td><?php echo $bank_total ?></td><td><?php echo $total ?></td></tr>
             </table>  
               <!-- <span  class="btn btn-sm btn-danger btn-flat" style="float: right;margin-right: 30px;"><?php echo $total; ?></span>      -->
    </div>

<!-- Second Table -->

     

<!-- Third Table -->
                
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
                  // $("#mytable").dataTable();
                  // $("#mytable2").dataTable();
                  // $("#mytable3").dataTable();

                //    $('#table1').show();
                //     $('#table2').show();
                //     $('#table3').hide();

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