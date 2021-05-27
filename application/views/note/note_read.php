<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Note Read          
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
	    <tr><td><b>Description</b></td><td><?php echo $description; ?></td></tr>
	    <tr><td><b>Image</b></td><td><?php echo $image; ?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo $status; ?></td></tr>
	    <tr><td><b>Createdat</b></td><td><?php echo $createdat; ?></td></tr>
	    <tr><td><b>Note</b></td><td><?php echo $note; ?></td></tr>
	    <tr><td><b>Date</b></td><td><?php echo $date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('note') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>