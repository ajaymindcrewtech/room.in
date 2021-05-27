<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee Read          
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
                        <?php
                      
                       if($type==4){
                    $des='Super Admin';
                 }
                elseif($type==2){
                   $des='Employee';

                  }
                  else{
                    $des='Admin';
                  }
 
                        ?>
        <table class="table">
	    <tr><td><b>Name</b></td><td><?php echo $name; ?></td></tr>
	    <tr><td><b>Phone</b></td><td><?php echo $phone; ?></td></tr>
	    <tr><td><b>Email</b></td><td><?php echo $email; ?></td></tr>
	    <tr><td><b>Address</b></td><td><?php echo $address; ?></td></tr>
        <tr><td><b>Address</b></td><td><?php echo $des; ?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>