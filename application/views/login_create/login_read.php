<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            login_create Read          
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
	    <tr><td><b>Name</b></td><td><?php echo $name; ?></td></tr>
	    <tr><td><b>Email</b></td><td><?php echo $email; ?></td></tr>
	    <tr><td><b>Password</b></td><td><?php echo $password; ?></td></tr>
	    <!-- <tr><td><b>Designation</b></td><td><?php echo $designation; ?></td></tr> -->
	    <tr><td><b>Type</b></td><td><?php echo $type; ?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo ($status==1)?'Active':'Inactive'; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('login_create') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>