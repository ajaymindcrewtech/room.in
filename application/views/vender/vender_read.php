<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Vendor Read          

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

	    <tr><td><b>Expense Category</b></td><td><?php $res=$this->Expense_category_model->get_by_id($exep_category);if($res){echo $res->name;} ?></td></tr>

        <tr><td><b>Vendor Name</b></td><td><?php echo $vendor_name; ?></td></tr>

	    <tr><td><b>Vendor Type</b></td><td><?php $res=$this->Vender_type_model->get_by_id($vendor_type);if($res){echo $res->name;} ?></td></tr>

	    <tr><td><b>Vdor Business</b></td><td><?php echo $vdor_business; ?></td></tr>

	    <tr><td><b>Building Id</b></td><td><?php $res=$this->Building_model->get_by_id($building_id);echo $res->name;?></td></tr>

	    <tr><td><b>Date Of Onboarding</b></td><td><?php echo $date_of_onboarding; ?></td></tr>

	    <tr><td><b>Date Of Leaving</b></td><td><?php echo $date_of_leaving; ?></td></tr>

	    <tr><td><b>Refrence Name</b></td><td><?php echo $refrence_name; ?></td></tr>

	    <tr><td><b>Mobile</b></td><td><?php echo $mobile; ?></td></tr>

	    <tr><td><b>Mobile2</b></td><td><?php echo $mobile2; ?></td></tr>

	    <tr><td><b>Landline</b></td><td><?php echo $landline; ?></td></tr>

	    <tr><td><b>Shop Address</b></td><td><?php echo $shop_address; ?></td></tr>

	    <tr><td><b>Gst</b></td><td><?php echo $gst; ?></td></tr>

	    <tr><td><b>Stauts</b></td><td><?php echo ($stauts)?'Active':'Inactive'; ?></td></tr>

	    <tr><td><b>Createdat</b></td><td><?php echo $createdat; ?></td></tr>

	    <tr><td></td><td><a href="<?php echo site_url('vender') ?>" class="btn btn-default">Cancel</a></td></tr>

	</table>

         <!-- ******************/master footer ****************** -->

                    </div>

                </div>

            </div>

    </section>

    </div>