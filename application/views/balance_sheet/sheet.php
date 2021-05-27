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
                    <th width="20px">No</th>
            		    <th>Name</th>
            		    <th>Cash</th>
            		    <th>phone Pay</th>
            		    <th>Paytm</th>
            		    <th>Bank</th>
                    <th>Balance</th>
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
            $phone=0;

            $type=$this->session->userdata('type');
            $emp_id=$this->session->userdata('reg_id');

            if($type==2){

               $cashbal=$this->Income_register_model->gee_res($emp_id,1);
                $phone_bal=$this->Income_register_model->gee_res($emp_id,2);
                $pyatm_bal=$this->Income_register_model->gee_res($emp_id,3);
                $bank=$this->Income_register_model->gee_res($emp_id,5);
               ?>

               <tr>
                 <td><?php echo $emp_id.'-('.$emp_id.')' ?></td>
                  <td><?php $res=$this->Employee_model->get_by_id($emp_id);echo $res->name.'-('.$res->id.')' ?></td>
                <td><?php if($cashbal){echo $cash=$cashbal->income - $cashbal->expense ;} else {echo '--';}?></td>
                <td><?php if($phone_bal){echo $phone=$phone_bal->income - $phone_bal->expense; } else {echo '--';} ?></td>
                <td><?php if($pyatm_bal){echo $paytm=$pyatm_bal->income- $pyatm_bal->expense;} else {echo '--';} ?></td>
                <td><?php if($bank){echo $bank=$bank->income- $bank->expense;} else {echo '--';} ?></td>
                <td><span class="btn btn-sm btn-success btn-flat"><?php  echo $cash+$phone+$paytm+$bank;?></span></td>
              </tr>


           <?php }else{

               
           $total=0;
                $cash=0;
                $phone=0;
                $paytm=0;
                $bank=0;
            foreach ($emp as $value)
            { 
               
                if($type==1 && $value->type==4 ){
                   
              $cashbal=0;
                $phone_bal=0;
                $pyatm_bal=0;
                
               $total=0;
                $cash=0;
                $phone=0;
                $paytm=0;
                $bank=0;
                  
                }
                else 
                {
              $cashbal=$this->Income_register_model->gee_res($value->id,1);
                $phone_bal=$this->Income_register_model->gee_res($value->id,2);
               $pyatm_bal=$this->Income_register_model->gee_res($value->id,3);
               $bank=$this->Income_register_model->gee_res($value->id,5);


                if($cashbal){ $cash=$cashbal->income - $cashbal->expense ;} ;
                if($phone_bal){$phone=$phone_bal->income - $phone_bal->expense; } ;
                if($pyatm_bal){ $paytm=$pyatm_bal->income- $pyatm_bal->expense;} ;
                 if($bank){ $bank=$bank->income- $bank->expense;} ;
                   $total= $cash+$phone+$paytm+$bank;
                }
				

           // echo  $this->db->last_query(); die;
             ?>
               <tr>
                 <td><?php echo ++$start ?></td>
                <td><?php echo $value->name.'-('.$value->id.')' ?></td>
                 
               
    		   
                <td><?php if($cashbal){echo $cash;} else {echo '--';}?></td>
        	    <td><?php if($phone_bal){echo $phone; } else {echo '--';} ?></td>
                <td><?php if($pyatm_bal){echo $paytm;} else {echo '--';} ?></td>
                <td><?php if($bank){echo $bank;} else {echo '--';} ?></td>
                <td><span class="btn btn-sm btn-success btn-flat"><?php if($total){echo $total;}else{echo '--';} ;?></span></td>
    		   	        </tr>
                <?php 
            }}
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