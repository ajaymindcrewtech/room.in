<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Revenue Read          
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
	    <tr><td><b>Employee Id</b></td><td><?php $res=$this->Employee_model->get_by_id($emp_id);if($res){echo $res->name.'-('.$res->id.')';} ?></td></tr>
        <tr><td><b>Employee Id</b></td><td><?php $res=$this->Employee_model->get_by_id($emp_id);if($res){echo $res->name.'-('.$res->id.')';} ?></td></tr>
        <tr><td><b>Building Id</b></td><td><?php $res=$this->Building_model->get_by_id($building_id);if($res){echo $res->name.'('.$res->id.')';} ?></td></tr>
	    <tr><td><b>Customer Id</b></td><td><?php $res=$this->Customer_model->get_by_id($customer_id);if($res){echo $res->name.'-('.$res->id.')';} ?></td></tr>
	  
	    <tr><td><b>Ref No</b></td><td><?php echo $ref_no; ?></td></tr>
        <tr><td><b>Amount</b></td><td><?php echo $amount; ?></td></tr>
	    <tr><td><b>Payment Mode</b></td><td><?php $res=$this->Payment_mode_model->get_by_id($payment_mode);if($res){echo $res->name;}  ?></td></tr>
	    <tr><td><b>Date</b></td><td><?php echo $date; ?></td></tr>
	    <tr><td><b>Comment</b></td><td><?php echo $comment; ?></td></tr>
	    <!-- <tr><td><b>Status</b></td><td><?php echo $status; ?></td></tr> -->
	    <tr><td></td><td><a href="<?php echo site_url('revenue') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>