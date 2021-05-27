<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee <?php  ?>          
            <small></small>
        </h1>
    </section>

<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/images') ?>/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $res->name  ?></h3>

              <p class="text-muted text-center">Employee</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
         
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Payment</a></li>
              <li><a href="#timeline" data-toggle="tab">expense</a></li>
              <li><a href="#settings" data-toggle="tab">Balance</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              
             
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
               
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
              <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Balance List          
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
            <!-- <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div> -->
            <div class="col-md-4 text-right">
                <?php //echo anchor(site_url('income_register/create/emp_to_emp'), 'Emp To Emp ', 'class="btn btn-success"'); ?>
                <?php //echo anchor(site_url('income_register/create/expense'), 'Expense', 'class="btn btn-danger"'); ?>
    <?php //echo anchor(site_url('income_register/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
        <th>Customer </th>
        <th>Employee </th>
            <th>SareEmployee </th>
        <th>Income</th>
        <th>Expense</th>
            <th>Comment</th>
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
        <td><?php $cus=$this->Customer_model->get_by_id($income_register->customer_id); if($cus){echo $cus->name;} ?></td>
        <td><?php $emp=$this->Employee_model->get_by_id($income_register->employee_id);if($emp){echo $emp->name;} ?></td>
            <td><?php $emp=$this->Employee_model->get_by_id($income_register->other_emp_id);if($emp){echo $emp->name;} ?></td>
        <td><?php echo $income_register->income ?></td>
        <td><?php echo $income_register->expense ?></td>
            <td><?php echo $income_register->comment ?></td>
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
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  </div>