
<style type="text/css">
    .alert {
     padding: 15px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer <?php echo $button ?>          
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
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" autocomplete="off" >
        
            <!--  <div class="alert alert-danger " >
               
                <label style="margin-left: 356px;">
                     <input name="customer_type" checked="" style="size:15px " type="radio" id="tri" onclick="hide_box()" value="c" <?php if($customer_type=='c') {echo "checked";}?> />
                     <span>Customer</span>
              </label>
                <label style="margin-left: 56px;">
                <input name="customer_type" type="radio" id="tri" onclick="hide_box()" value="g" <?php if($customer_type=='g') {echo "checked";}?> />
                <span>Guest</span>
               </label>
               
              </div> -->
         <div class="row">
         <div class="col-lg-6 col-xs-6"> 

	    <div class="form-group">
            <label for="varchar">Name* <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Damo@gamil.com" value="<?php echo $email; ?>" />

        </div>

	  
         
          <div class="form-group">
            <label for="int">Aadharcard No* <?php echo form_error('aadharcard_no') ?></label>
            <input type="number" class="form-control" name="aadharcard_no" id="aadharcard_no" placeholder="Aadharcard No" value="<?php echo $aadharcard_no; ?>" />
        </div>

       
             <div class="form-group">  
                                <div style="padding-bottom:15px;">

                                    <div class="slim img-responsive" style="width:200px; height:200px;margin:0 auto;" data-label="Drop your image here" data-size="200,200" data-ratio="200:200" >

                                        <style type="text/css">
                                            .slim .slim-file-hopper {
                                                background:url("<?php echo base_url().$image?>")!important;
                                            }
                                        </style>
                                        <input type="file"/>
                                    </div>
                                    <input type="hidden" name="image" value="<?php echo $image ?>"> 
                                  
                                </div>
             </div>

            
        	   
         </div>

         <div class="col-lg-6 col-xs-6">
         
         <div class="form-group">
            <label for="bigint">Mobile Number*<?php echo form_error('pri_mobile') ?></label>
            <input type="number" class="form-control" name="pri_mobile" id="pri_mobile" placeholder="Enter Your  Number" value="<?php echo $pri_mobile; ?>" />
        </div>

        <div class="form-group">
            <label for="bigint">Alternate number <?php echo form_error('sec_mobile') ?></label>
            <input type="number" class="form-control" name="sec_mobile" id="sec_mobile" placeholder="Alternate Mobile" value="<?php echo $sec_mobile; ?>" />
        </div> 

        <div class="form-group">
            <label for="bigint">What'sup No* <?php echo form_error('whatsup_no') ?></label>
            <input type="number" class="form-control" name="whatsup_no" id="whatsup_no" placeholder="Whatsup No" value="<?php echo $whatsup_no; ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">Date Of Birth* <?php echo form_error('dob') ?></label>
            <input type="text" class="form-control datepicker" name="dob" id="dob" placeholder="Date Of Birth" value="<?php echo $dob; ?>" />
        </div>

	    <div class="form-group">
            <label for="address">Address <?php echo form_error('address') ?></label>
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
        </div>
          <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
           <!--  <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
           <select class="form-control" name="status" id="status">
               <option value="1"<?php if($status==1){echo 'selected';} ?>>Active</option>
               <option value="2"<?php if($status==2){echo 'selected';} ?>>Inactive</option>
           </select>
        </div>

	   
    </div>
</div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>