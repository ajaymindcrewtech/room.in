<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payment List          
            <small></small>
             <a href="<?php echo base_url('login/logout') ?>" class=" btn btn-info  btn-xs pull-right">Logout</a>
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
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('payment/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('payment/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th width="80px">No</th>
		    <th>Customer </th>
		    <th>Employee</th>
		    <th>Payment</th>
		    <th>Date</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($payment_data as $payment)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php $res= $this->Customer_model->get_by_id($payment->customer_id);if($res){echo $res->name;}  ?></td>
		    <td><?php $res= $this->Employee_model->get_by_id($payment->emp_id);if($res){echo $res->name;} ?></td>
		    <td><?php echo $payment->payment ?></td>
		    <td><?php echo date('d-m-Y',strtotime($payment->date))  ?></td>
		    <td><?php echo ($payment->status)?'Active':'Inactive'; ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('payment/read/'.$payment->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('payment/update/'.$payment->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('payment/delete/'.$payment->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
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