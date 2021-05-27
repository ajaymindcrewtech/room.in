<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Complain Read          
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
                  
                  if($com_status==1){
            		$st="Open";
            	}
            	elseif($com_status==2){
            		$st="Close";
            	}
            	elseif($com_status==2){
            		$st="Close";
            	}
            	elseif($com_status==3){
            		$st="Wip";
            	}
            	elseif($com_status==4){
            		$st="Vender Required";
            	}
            	elseif($com_status==5){
            		$st="Vender Allocated";
            	}
            	elseif($com_status==6){
            		$st="Oh hold";
            	}
            	else{
            		$st="Cust Damage";
            	}

               ?>

        <table class="table">
	    <tr><td><b>Date</b></td><td><?php echo $date; ?></td></tr>
	    <tr><td><b>Building Id</b></td><td><?php $res=$this->Building_model->get_by_id($building_id);if($res){echo $res->name;} ?></td></tr>
	    <tr><td><b>Room Id</b></td><td><?php $res=$this->Buil_details_model->get_by_id($room_id);if($res){echo $res->name;} ?></td></tr>
	    <tr><td><b>Com Category</b></td><td><?php $res=$this->Com_category_model->get_by_id($com_category);if($res){echo $res->name;} ?></td></tr>
	    <tr><td><b>Com Subcategory</b></td><td><?php $res=$this->Com_sub_category_model->get_by_id($com_subcategory);if($res){echo $res->name;} ?></td></tr>
	    <tr><td><b>Com Status</b></td><td><?php echo $st; ?></td></tr>
	    <tr><td><b>Com Details</b></td><td><?php echo $com_details; ?></td></tr>
	    <tr><td><b>Asset Id</b></td><td><?php echo $asset_id; ?></td></tr>
	    <tr><td><b>Model</b></td><td><?php echo $model; ?></td></tr>
	    <tr><td><b>Bill</b></td><td><?php echo $bill; ?></td></tr>
	    <tr><td><b>Warranty</b></td><td><?php echo $warranty; ?></td></tr>
	    <tr><td><b>Image</b></td><td><img src="<?php echo base_url($image); ?>" style="height: 60px;"></td></tr>
	    <tr><td><b>Closure Remark</b></td><td><?php echo $closure_remark; ?></td></tr>
	    <tr><td><b>Closure Remark By</b></td><td><?php echo $closure_remark_by; ?></td></tr>
	    <tr><td><b>Agreed Amount</b></td><td><?php echo $agreed_amount; ?></td></tr>
	    <tr><td><b>Tat</b></td><td><?php echo $tat; ?></td></tr>
	    <tr><td><b>Icr</b></td><td><?php echo $icr; ?></td></tr>
	    <tr><td><b>Closed By</b></td><td><?php echo ($closed_by==1)?'Staff':'Vender'; ?></td></tr>
	    <tr><td><b>Assign Vender</b></td><td><?php echo $assign_vender; ?></td></tr>
	    <tr><td><b>Category</b></td><td><?php $res=$this->Expense_category_model->get_by_id($category);if($res){echo $res->name;} ?></td></tr>
	    <tr><td><b>Vendor Bill</b></td><td><?php echo $vendor_name; ?></td></tr>
	    <tr><td><b>Shop Name</b></td><td><?php echo $shop_name; ?></td></tr>
	    <tr><td><b>Amount</b></td><td><?php echo $amount; ?></td></tr>
	    <tr><td><b>Part Details</b></td><td><?php echo $part_details; ?></td></tr>
	    <tr><td><b>Material Cost</b></td><td><?php echo $material_cost; ?></td></tr>
	    <tr><td><b>Labour Cost</b></td><td><?php echo $labour_cost; ?></td></tr>
	    <tr><td><b>Createdat</b></td><td><?php echo $createdat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('complain') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>