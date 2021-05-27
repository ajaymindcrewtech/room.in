<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Building Read          
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
	    <tr><td><b>Address</b></td><td><?php echo $address; ?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo ($status==1)?'Acitve':'Inactive';?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('building') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>