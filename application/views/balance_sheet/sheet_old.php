<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Balance Sheet          
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- ******************/master header end ****************** -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
              
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
          <!--   <div class="col-md-4 text-right">
                <?php echo anchor(site_url('building/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('building/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div> -->
        </div>
         <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            		    <th>Name</th>
            		    <th>Cash</th>
            		    <th>phone Pay</th>
            		    <th>Paytm</th>
                    <th>Balance</span></th>
                </tr>
            </thead>
	    <tbody>
            <?php
             $cash=0;
            $expense=0;
            $total=0;
            $phone_pay=0;
            $phone_pay_expense=0;
            $phone_pay_total=0;
            $paytm=0;
            $paytm_expense=0;
            $paytm_total=0;
            $cashbal=0;
            $phone_bal=0;
            $pyatm_bal=0;
            $balnce=0;
            $start = 0;
          
            foreach ($emp as $value)
            {
              
             ?>
               <tr>
                 <td><?php echo ++$start ?></td>
                <td><?php echo $value->name.'-('.$value->id.')' ?></td>
                  <?php  
                  $res=$this->Income_register_model->get_balnce_by_id($value->id);
                 
                  foreach ($res as $key => $income_register)
                   {
                    echo '<pre>';
                     print_r($income_register);
                    $balnce=0;
                   if($income_register->mode==1){
                 $cash+=$income_register->income;
                 $expense+=$income_register->expense;
                 $cashbal= $cash-$expense;
                echo $cashbal;
             }  
             elseif($income_register->mode==2){
                 $phone_pay+=$income_register->income;
                 $phone_pay_expense+=$income_register->expense;
                  $phone_bal= $phone_pay-$phone_pay_expense;
             }  
             elseif($income_register->mode==3){
                 $paytm+=$income_register->income;
                 $paytm_expense+=$income_register->expense;
                $pyatm_bal= $paytm-$paytm_expense;
             }
               $balnce=$cashbal+$phone_bal+$pyatm_bal;

                // print_r($balnce);
                ?> 
               
    		   
                <td><?php if($cashbal){echo $cashbal;}  ?></td>
        	    <td><?php if($phone_bal){echo $phone_bal; }  ?></td>
                <td><?php if($pyatm_bal){echo $pyatm_bal;}  ?></td>
                <td><span class="btn btn-sm btn-success btn-flat"><?php  if($balnce){echo $balnce;} ?></span></td>
    		   <?php }  ?>
	        </tr>
                <?php 
            }
            ?>
            </tbody>
        </table>
    </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>