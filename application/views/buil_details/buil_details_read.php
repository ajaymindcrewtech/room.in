<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Buil_details Read          
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
	    <tr><td><b>Bullding Id</b></td><td><?php $res=$this->Building_model->get_by_id($Bullding_id);if($res){echo $res->name;} ?></td></tr>
	    <tr><td><b>Name</b></td><td><?php echo $name; ?></td></tr>
	    <tr><td><b>Rent</b></td><td><?php echo $rent; ?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo ($status)?'Active':'Inactive'; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('buil_details') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>