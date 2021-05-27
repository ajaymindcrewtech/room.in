<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Expense Read          

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

	    <tr><td><b>Date</b></td><td><?php echo $date; ?></td></tr>

	    <tr><td><b>Transaction Id</b></td><td><?php echo $transaction_id; ?></td></tr>

	    <tr><td><b>Category</b></td><td><?php $res=$this->Expense_category_model->get_by_id($category);if($res){echo $res->name;} ?></td></tr>

	    <tr><td><b>Subcategory</b></td><td><?php $res=$this->Expense_subcategory_model->get_by_id($subcategory);if($res){echo $res->name;}  ?></td></tr>

	    <tr><td><b>Item Detail</b></td><td><?php echo $Item_detail; ?></td></tr>

	    <tr><td><b>Paying Employee</b></td><td><?php $res=$this->Employee_model->get_by_id($paying_employee);if($res){echo $res->name.'-('.$res->id.')';}  ?></td></tr>

	    <tr><td><b>Amount Paid</b></td><td><?php echo $amount_paid; ?></td></tr>

	    <tr><td><b>Ref No</b></td><td><?php echo $ref_no; ?></td></tr>

	    <tr><td><b>Payment Mode</b></td><td><?php $res=$this->Payment_mode_model->get_by_id($payment_mode);if($res){echo $res->name;} ?></td></tr>

	    <tr><td><b>Building Id</b></td><td><?php $res=$this->Building_model->get_by_id($building_id);if($res){echo $res->name;} ?></td></tr>

	    <tr><td><b>Room Id</b></td><td><?php echo $room_id; ?></td></tr>

	    <tr><td><b>Room Type</b></td><td><?php $res=$this->Room_type_model->get_by_id($room_type);if($res){echo $res->name;} ?></td></tr>

	    <tr><td><b>Sic Bill</b></td><td><?php echo $sic_bill; ?></td></tr>

	    <tr><td><b>Comment</b></td><td><?php echo $comment; ?></td></tr>

	    <tr><td><b>Vendor Bill</b></td><td><?php echo $vendor_bill; ?></td></tr>

	    <tr><td><b>Shop Name</b></td><td><?php echo $shop_name; ?></td></tr>

	    <tr><td><b>Vendor Type</b></td><td><?php echo $vendor_type; ?></td></tr>

	    <tr><td><b>Location</b></td><td><?php echo $location; ?></td></tr>

	    <tr><td><b>Mobile</b></td><td><?php echo $mobile; ?></td></tr>

	    <tr><td><b>Asset Id</b></td><td><?php echo $asset_id; ?></td></tr>

	    <tr><td><b>Model</b></td><td><?php echo $model; ?></td></tr>

	    <tr><td><b>Manufacturing Company</b></td><td><?php echo $manufacturing_company; ?></td></tr>

	    <tr><td><b>Warranty</b></td><td><?php echo $warranty; ?></td></tr>

	    <tr><td><b>Stayinclass Asset Id</b></td><td><?php echo $stayinclass_asset_id; ?></td></tr>

	    <tr><td></td><td><a href="<?php echo site_url('expense') ?>" class="btn btn-default">Cancel</a></td></tr>

	</table>

         <!-- ******************/master footer ****************** -->

                    </div>

                </div>

            </div>

    </section>

    </div>