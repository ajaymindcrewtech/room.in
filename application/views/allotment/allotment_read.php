<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Allotment Read          
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
	    <tr><td><b>Customer Id</b></td><td><?php $res=$this->Customer_model->get_by_id($customer_id);if($res){ echo $res->name.'-('.$res->id.')';} ?></td></tr>
	    <tr><td><b>Employee Id</b></td><td><?php $res= $this->Employee_model->get_by_id($employee_id);if($res){echo $res->name.'-('.$res->id.')';} ?></td></tr>
	    <tr><td><b>Building Id</b></td><td><?php $res=$this->Building_model->get_by_id($building_id);echo $res->name  ?></td></tr>
	    <tr><td><b>Room Id</b></td><td><?php $res=$this->Buil_details_model->get_by_id($room_id); echo $res->name ?></td></tr>
	    <tr><td><b>Rent</b></td><td><?php echo $rent; ?></td></tr>
	    <tr><td><b>From Date</b></td><td><?php echo $from_date; ?></td></tr>
	    <tr><td><b>To Date</b></td><td><?php echo $to_date; ?></td></tr>
	    <tr><td><b>Status</b></td><td><?php echo ($status)?'Active':'Inactive'; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('allotment') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>