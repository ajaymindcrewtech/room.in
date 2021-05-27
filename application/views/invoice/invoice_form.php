<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Invoice <?php echo $button ?>          
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
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Customer Id <?php echo form_error('customer_id') ?></label>
            <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id" value="<?php echo $customer_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Month <?php echo form_error('month') ?></label>
            <input type="text" class="form-control" name="month" id="month" placeholder="Month" value="<?php echo $month; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Amount <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Amount <?php echo form_error('total_amount') ?></label>
            <input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="Total Amount" value="<?php echo $total_amount; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="invoice_id" value="<?php echo $invoice_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('invoice') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>