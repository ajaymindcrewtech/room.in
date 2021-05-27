<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Income_register Read          
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
        <table class="table">
	    <tr><td><b>Customer Id</b></td><td><?php echo $customer_id; ?></td></tr>
	    <tr><td><b>Employee Id</b></td><td><?php echo $employee_id; ?></td></tr>
	    <tr><td><b>Income</b></td><td><?php echo $income; ?></td></tr>
	    <tr><td><b>Expense</b></td><td><?php echo $expense; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('income_register') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>