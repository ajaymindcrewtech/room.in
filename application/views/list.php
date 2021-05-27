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
		   
		    <th>From Employee </th>
             <th>Mode</th>
              <th>Expense</th>
             <th>To Employee </th>
             <th>OthMode</th>
		    <th>Income</th>
		       
            <th>Comment</th>
            <th>Payment Status</th>
            <!-- <th>Total</th> -->
		    <!-- <th>Action</th> -->
                </tr>
            </thead>
	    <tbody>
            <?php
          
            $start = 0;
            foreach ($income_register_data as $income_register)
                {           
                ?>
                <tr>
        		    <td><?php echo ++$start ?></td>
        		 
        		    <td><?php $emp=$this->Employee_model->get_by_id($income_register->employee_id);if($emp){echo $emp->name.'-('.$emp->id.')';} ?></td>
                    <td><?php $res=$this->Payment_mode_model->get_by_id($income_register->mode);if($res){echo $res->name;?></td>
                    <td><?php echo $income_register->expense; ?></td>
                    <td><?php $emp=$this->Employee_model->get_by_id($income_register->other_emp_id);if($emp){echo $emp->name.'-('.$emp->id.')';} ?></td>
                    <td><?php $res=$this->Payment_mode_model->get_by_id($income_register->other_mode);if($res){echo $res->name;?></td>
        		    <td><?php echo $income_register->income ?></td>
        		  
                    <td><?php echo $income_register->comment ?></td>
                      <?php if($income_register->payment_status){ ?>
                    <td><span class="btn btn-sm btn-danger btn-flat"><?php  echo ($income_register->payment_status==1)?'Send':'Accepted'?></span></td>
                  <?php } ?>
                <td style="text-align:center" width="200px">
        			<?php 
        			echo anchor(site_url('income_register/delete/'.$income_register->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
        			?>
		       </td>
	        </tr>
                <?php
              }
            ?>
            </tbody>
           <!--  <tr><td>Total cash</td><td><?php echo $cash ?></td><td>Expense</td><td><?php echo $expense ?></td><td>Total</td><td><?php $total=$cash-$expense; echo $total; ?></td></tr> -->
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