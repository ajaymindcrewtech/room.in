<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vendor <?php echo $button ?>          
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
        <form action="<?php echo $action; ?>" method="post">
             <div class="row">
            <div class="col-xs-6">
         <div class="form-group">
            <label for="int">Expense Category <?php echo form_error('exep_category') ?></label>
              <select class="form-control" name="exep_category" id="exep_category">
               <option value="">--Select--</option>
               <?php foreach ($category as $key => $value) {?>
                  <option value="<?php echo $value->id ?>"<?php if($exep_category==$value->id){echo 'selected';} ?>><?php echo $value->name; ?></option>
             <?php  } ?>
           </select>
        </div> 
           
          <!--  <div class="form-group">
            <label for="int">Expense Sub Category <?php echo form_error('exep_subcategory') ?></label>
              <select class="form-control" name="exep_subcategory" id="exep_subcategory">
               <option value="">--Select--</option>
                 <?php if($exep_subcategory){ ?>
               <?php foreach ($exep_subcategory as $key => $value) {?>
                  <option value="<?php echo $value->id ?>"><?php echo $value->name; ?></option>
             <?php  }} ?>
           </select>
        </div>  -->
         <div class="form-group">
            <label for="int">Vendor Type <?php echo form_error('vendor_type') ?></label>
          
            <select class="form-control" name="vendor_type" id="vendor_type">
                <option value="">--Select--</option>
                <?php foreach ($vender_type as $key => $value) {?>
                    <option value="<?php echo $value->id ?>"<?php if($vendor_type==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>
               <?php } ?>
               
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Vendor Name <?php echo form_error('vendor_name') ?></label>
            <input type="text" class="form-control" name="vendor_name" id="vendor_name" placeholder="Vendor Name" value="<?php echo $vendor_name; ?>" />
        </div>
	    
	    <div class="form-group">
            <label for="varchar">Vender Business <?php echo form_error('vdor_business') ?></label>
            <input type="text" class="form-control" name="vdor_business" id="vdor_business" placeholder="Vdor Business" value="<?php echo $vdor_business; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Building <?php echo form_error('building_id') ?></label>
           <!--  <input type="text" class="form-control" name="building_id" id="building_id" placeholder="Building Id" value="<?php echo $building_id; ?>" /> -->
           <select class="form-control" name="building_id" id="building_id">
               <option value="">--Select--</option>
               <?php foreach ($building_id as $key => $value) {?>
                  <option value="<?php echo $value->id ?>"><?php echo $value->name; ?></option>
             <?php  } ?>
           </select>
        </div>
	    <div class="form-group">
            <label for="date">Date Of Onboarding <?php echo form_error('date_of_onboarding') ?></label>
            <input type="text" class="form-control datepicker" name="date_of_onboarding" id="date_of_onboarding" placeholder="Date Of Onboarding" value="<?php if($date_of_onboarding){echo $date_of_onboarding;}else{echo date('d-m-Y');} ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date Of Leaving <?php echo form_error('date_of_leaving') ?></label>
            <input type="text" class="form-control datepicker" name="date_of_leaving" id="date_of_leaving" placeholder="Date Of Leaving" value="<?php if($date_of_leaving){echo $date_of_leaving;}else{echo date('d-m-Y');} ?>" />
        </div>
            <div class="form-group">
            <label for="varchar">Refrence Name <?php echo form_error('refrence_name') ?></label>
            <input type="text" class="form-control" name="refrence_name" id="refrence_name" placeholder="Refrence Name" value="<?php echo $refrence_name; ?>" />
        </div>
    </div>

            <div class="col-xs-6">
	  
	    <div class="form-group">
            <label for="varchar">Mobile <?php echo form_error('mobile') ?></label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mobile2 <?php echo form_error('mobile2') ?></label>
            <input type="text" class="form-control" name="mobile2" id="mobile2" placeholder="Mobile2" value="<?php echo $mobile2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Landline <?php echo form_error('landline') ?></label>
            <input type="text" class="form-control" name="landline" id="landline" placeholder="Landline" value="<?php echo $landline; ?>" />
        </div>
	    <div class="form-group">
            <label for="shop_address">Shop Address <?php echo form_error('shop_address') ?></label>
            <textarea class="form-control" rows="3" name="shop_address" id="shop_address" placeholder="Shop Address"><?php echo $shop_address; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Gst <?php echo form_error('gst') ?></label>
            <input type="text" class="form-control" name="gst" id="gst" placeholder="Gst" value="<?php echo $gst; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stauts <?php echo form_error('stauts') ?></label>
           <!--  <input type="text" class="form-control" name="stauts" id="stauts" placeholder="Stauts" value="<?php echo $stauts; ?>" /> -->
           <select class="form-control" name="stauts" id="stauts">
               <option value="1"<?php if($stauts==1){echo 'selected';} ?>>Active</option>
               <option value="2"<?php if($stauts==2){echo 'selected';} ?>>Inactive</option>
           </select>
        </div>
    </div>
</div>
	    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('vender') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>
    <script type="text/javascript"></script>