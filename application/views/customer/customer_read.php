<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer Read          
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
	    <tr><td><b>Pri Mobile</b></td><td><?php echo $pri_mobile; ?></td></tr>
	    <tr><td><b>Whatsup No</b></td><td><?php echo $whatsup_no; ?></td></tr>
	    <tr><td><b>Sec Mobile</b></td><td><?php echo $sec_mobile; ?></td></tr>
	    <tr><td><b>Dob</b></td><td><?php echo date('d-m-Y',strtotime($dob)); ?></td></tr>
	    <tr><td><b>Address</b></td><td><?php echo $address; ?></td></tr>
	    <tr><td><b>Aadharcard No</b></td><td><?php echo $aadharcard_no; ?></td></tr>
	    <tr><td><b>Image</b></td><td><?php echo $image;?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo ($status==1)?'Active':'Inactive'; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>