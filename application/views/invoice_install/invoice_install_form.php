<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Invoice_install <?php echo $button ?>          
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
            <label for="int">Invoice Id <?php echo form_error('invoice_id') ?></label>
            <input type="text" class="form-control" name="invoice_id" id="invoice_id" placeholder="Invoice Id" value="<?php echo $invoice_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Amount <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
        </div>
	    <input type="hidden" name="invoice_instaill_id" value="<?php echo $invoice_instaill_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('invoice_install') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>