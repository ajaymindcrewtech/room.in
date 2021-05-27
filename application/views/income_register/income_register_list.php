<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Income register List          
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
                <?php echo anchor(site_url('income_register/create/emp_to_emp'), 'Emp To Emp ', 'class="btn btn-success"'); ?>
                <?php echo anchor(site_url('income_register/create/expense'), 'Expense', 'class="btn btn-danger"'); ?>
		<?php echo anchor(site_url('income_register/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div> -->
        </div>
         <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Customer </th>
		    <th>From Employee </th>
            <th>To Employee </th>
		    <th>Income</th>
		    <th>Expense</th>
            <th>Comment</th>
            <th>Source</th>
            <th>Createdat</th>
            <th>Payment Status</th>
            <!-- <th>Total</th> -->
		    <!-- <th>Action</th> -->
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
            $start = 0;
            foreach ($income_register_data as $income_register)
            {      if($income_register->mode==1){
                 $cash+=$income_register->income;
                 $expense+=$income_register->expense;
             }  
             elseif($income_register->mode==2){
                 $phone_pay+=$income_register->income;
                 $phone_pay_expense+=$income_register->expense;
             }  
             elseif($income_register->mode==3){
                 $paytm+=$income_register->income;
                 $paytm_expense+=$income_register->expense;
             }
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php $cus=$this->Customer_model->get_by_id($income_register->customer_id); if($cus){echo $cus->name.'-('.$cus->id.')';} ?></td>
		    <td><?php $emp=$this->Employee_model->get_by_id_emp_login($income_register->employee_id);if($emp){echo $emp->name.'-('.$emp->id.')';} ?></td>
            <td><?php $emp=$this->Employee_model->get_by_id_emp_login($income_register->other_emp_id);if($emp){echo $emp->name.'-('.$emp->id.')';} ?></td>
		    <td><?php echo $income_register->income ?></td>
		    <td><?php echo $income_register->expense ?></td>
            <td><?php echo $income_register->comment ?></td>
            <td><?php echo $income_register->source ?></td>
            <td><?php echo date('d-m-Y',strtotime($income_register->createdat))?></td>
              <?php if($income_register->payment_status){ ?>
            <td><span class="btn btn-sm btn-danger btn-flat"><?php  echo ($income_register->payment_status==1)?'Send':'Accepted' ?></span></td>
        <?php } ?>
             <td style="text-align:center" width="200px">
			<?php 
			// echo anchor(site_url('income_register/read/'.$income_register->register_id),'<i class="fa fa-eye"></i>'); 
			// echo ' | '; 
			// echo anchor(site_url('income_register/update/'.$income_register->register_id),'<i class="fa fa-pencil-square-o"></i>'); 
			// echo ' | '; 
			// echo anchor(site_url('income_register/delete/'.$income_register->register_id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
           <!--  <tr><td>Total cash</td><td><?php echo $cash ?></td><td>Expense</td><td><?php echo $expense ?></td><td>Total</td><td><?php $total=$cash-$expense; echo $total; ?></td></tr> -->
        </table>

         <table class="table table-bordered table-striped" id="mytable">
            
        <tbody>
          
            </tbody>
            <tr><td>Total cash</td><td><?php echo $cash ?></td><td>Expense</td><td><?php echo $expense ?></td><td>Total</td><td><?php $total=$cash-$expense; echo $total; ?></td></tr>

            <tr><td>Total Phone Pay</td><td><?php echo $phone_pay ?></td><td>Phone pay Expense</td><td><?php echo $phone_pay_expense ?></td><td>Total</td><td><?php $total=$phone_pay-$phone_pay_expense; echo $total; ?></td></tr>

            <tr><td>Total paytm</td><td><?php echo $paytm ?></td><td>Paytm Expense</td><td><?php echo $paytm_expense ?></td><td>Total</td><td><?php $total=$paytm-$paytm_expense; echo $total; ?></td></tr>

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