<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Invoice List          
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
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('invoice/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('invoice/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Customer Id</th>
		    <th>Month</th>
		    <th>Amount</th>
		    <th>Total Amount</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($invoice_data as $invoice)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $invoice->customer_id ?></td>
		    <td><?php echo $invoice->month ?></td>
		    <td><?php echo $invoice->amount ?></td>
		    <td><?php echo $invoice->total_amount ?></td>
		    <td><?php echo $invoice->status ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('invoice_install/create/'.$invoice->invoice_id),'<i class="fa fa-eye"></i>'); 
            echo ' | ';
            echo anchor(site_url('invoice/read/'.$invoice->invoice_id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('invoice/update/'.$invoice->invoice_id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('invoice/delete/'.$invoice->invoice_id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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