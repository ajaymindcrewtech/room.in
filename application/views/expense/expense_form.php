<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Expense <?php echo $button ?>          

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

            <div class="alert alert-danger ">

                <span >Basic Details</span>

            </div>

            <div class="row">

            <div class="col-xs-6">    

            

	    <div class="form-group">

            <label for="date">Date <?php echo form_error('date') ?></label>

            <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Date" value="<?php if($date){echo date('d-m-Y',strtotime($date));}else{echo date('d-m-Y');} ?>" />

        </div>

	   

	    <div class="form-group">

            <label for="int">Expense Category <?php echo form_error('category') ?></label>

            <!-- <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="<?php echo $category; ?>" /> -->

            <select class="form-control" name="category" id="category">

                <option value="">--Select--</option>

                <?php foreach ($exep_categotry as $key => $value) {?>

                   <option value="<?php echo $value->id ?>" <?php if($category==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>

              <?php  } ?>

            </select>

        </div>

	    <div class="form-group">

            <label for="int">Subcategory <?php echo form_error('subcategory') ?></label>

            <!-- <input type="text" class="form-control" name="subcategory" id="subcategory" placeholder="Subcategory" value="<?php echo $subcategory; ?>" /> -->

              <select class="form-control" name="subcategory" id="subcategory">

                <?php if($subcategory){ ?>

                <option value="">--Select--</option>

                <?php foreach ($exep_subcategotry as $key => $value) {?>

                   <option value="<?php echo $value->id ?>" <?php if($subcategory==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>

              <?php } } ?>

            </select>

        </div>

	   

    

     

        <div class="form-group">

            <label for="int">Building <?php echo form_error('building_id') ?></label>

            <!-- <input type="text" class="form-control" name="building_id" id="building_id" placeholder="Building Id" value="<?php echo $building_id; ?>" /> -->

            <select class="form-control" name="building_id" id="building_id">

                <option value="">--Select--</option>

                <?php foreach ($building as $key => $value) {?>

                   <option value="<?php echo $value->id ?>" <?php if($building_id==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>

              <?php  } ?>

            </select>

        </div>

	    <div class="form-group">

            <label for="int">Room <?php echo form_error('room_id') ?></label>

            <input type="text" class="form-control" name="room_id" id="room_id" placeholder="Room Id" value="<?php echo $room_id; ?>" />

         

        </div>

         </div>

     <div class="col-xs-6">

        <div class="form-group">

            <label for="bigint">Room Type <?php echo form_error('room_type') ?></label>

           <!--  <input type="text" class="form-control" name="room_type" id="room_type" placeholder="Room Type" value="<?php echo $room_type; ?>" /> -->

           <select class="form-control" name="room_type" id="room_type">

              <?php foreach ($rom_type  as $key => $value) {?>

                 <option value="<?php echo $value->id ?>"<?php if($room_type==$value->id){echo 'selected';} ?>><?php echo $value->name; ?></option>

              <?php } ?>



           </select>

      </div>

	      

	    

        <div class="form-group">

            <label for="bigint">Amount <?php echo form_error('amount_paid') ?></label>

            <input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Amount Paid" value="<?php echo $amount_paid; ?>" />

        </div>

        <div class="form-group">

            <label for="int">Payment Mode <?php echo form_error('payment_mode') ?></label>

            <!-- <input type="text" class="form-control" name="payment_mode" id="payment_mode" placeholder="Payment Mode" value="<?php echo $payment_mode; ?>" /> -->

             <select class="form-control" name="payment_mode" id="payment_mode">

                <option value="">--Select--</option>

                <?php foreach ($pay_mode as $key => $value) {?>

                   <option value="<?php echo $value->id ?>" <?php if($payment_mode==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>

              <?php  } ?>

            </select>

        </div>

        <div class="form-group">

            <label for="Item_detail">Ref No <?php echo form_error('ref_no') ?></label>

            <input type="text" class="form-control"  name="ref_no" id="ref_no" placeholder="Ref No" value="<?php echo $ref_no;?>">

        </div>

	    <div class="form-group">

            <label for="int">Type<?php echo form_error('type') ?></label>

           
           <select class="form-control" name="type" id="type">
               <option value="1"<?php if($type==1){echo 'selected';} ?>>Emp To Vender</option>
               <option value="2"<?php if($type==2){echo 'selected';} ?>>Vender To Emp</option>
            </select>

        </div>


     <!-- <div class="col-xs-12"> -->

    </div>
        <div class="col-xs-12">
         <div class="form-group">

            <label for="Item_detail">Item Details <?php echo form_error('Item_detail') ?></label>

            <textarea type="text" class="form-control" rows="2"  name="Item_detail" id="Item_detail" placeholder="Item Detail" value=""><?php echo $Item_detail;?></textarea>

        </div>
    </div>

    <div class="col-xs-12">

        <div class="form-group">

            <label for="comment">Comment <?php echo form_error('comment') ?></label>

            <textarea class="form-control" rows="3" name="comment" id="comment" placeholder="Comment"><?php echo $comment; ?></textarea>

        </div> 

    </div>

</div>

    <!-- </div> -->

    <div class="alert alert-danger">

        <h4>Vender Details</h4>

    </div>

     <div class="form-group" id="stand">

            <label for="location">Standard Vender <?php echo form_error('standard') ?></label>

            <select class="form-control" name="standard" id="standard">

               

           </select>

    </div>

    <div class="row">

    <!-- <div class="col-xs-12"> -->

    <div class="col-xs-6">

        

	    <div class="form-group">

            <label for="varchar">Vendor Bill <?php echo form_error('vendor_bill') ?></label>

            <input type="text" class="form-control" name="vendor_bill" id="vendor_bill" placeholder="Vendor Bill" value="<?php echo $vendor_bill; ?>" />

        </div>

    

    

	    <div class="form-group">

            <label for="varchar">Shop Name <?php echo form_error('shop_name') ?></label>

            <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="Shop Name" value="<?php echo $shop_name; ?>" />

        </div>

         <div class="form-group">
            <label for="int">Sic Bill <?php echo form_error('sic_bill') ?></label>
            <input type="text" class="form-control" name="sic_bill" id="sic_bill" placeholder="Sic Bill" value="<?php echo $sic_bill; ?>" />
        </div>

    </div>

    <div class="col-xs-6">

	    <div class="form-group">

            <label for="int">Vendor Type <?php echo form_error('vendor_type') ?></label>

            <input type="text" class="form-control" name="vendor_type" id="vendor_type" placeholder="Vendor Type" value="<?php echo $vendor_type; ?>" />

        </div>

  

   

        <div class="form-group">

            <label for="varchar">Mobile <?php echo form_error('mobile') ?></label>

            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />

        </div>


        <div class="form-group">

            <label for="location">Location <?php echo form_error('location') ?></label>

            <textarea class="form-control" rows="2" name="location" id="location" placeholder="Location"><?php echo $location; ?></textarea>

        </div>

    </div>

</div>

	    

        <div class="alert alert-danger"><span>Item Details</span></div>

	    <div class="row">

        <div class="col-xs-6">

	    <div class="form-group">

            <label for="int">Asset<?php echo form_error('asset_id') ?></label>

            <input type="text" class="form-control" name="asset_id" id="asset_id" placeholder="Asset Id" value="<?php echo $asset_id; ?>" />

        </div>

   

    

	    <div class="form-group">

            <label for="varchar">Model<?php echo form_error('model') ?></label>

            <input type="text" class="form-control" name="model" id="model" placeholder="Model" value="<?php echo $model; ?>" />

        </div>

    </div>

    <div class="col-xs-6">

        <div class="form-group">

            <label for="int">Stayinclass Id <?php echo form_error('stayinclass_asset_id') ?></label>

            <input type="text" class="form-control" name="stayinclass_asset_id" id="stayinclass_asset_id" placeholder="Stayinclass Asset Id" value="<?php echo $stayinclass_asset_id; ?>" />

        </div>

	    

    

       

	    <div class="form-group">

            <label for="varchar">Warranty <?php echo form_error('warranty') ?></label>

            <input type="text" class="form-control" name="warranty" id="warranty" placeholder="Warranty" value="<?php echo $warranty; ?>" />

        </div>

    </div>

    <div class="form-group">

            <label for="varchar">Manufacturing Company <?php echo form_error('manufacturing_company') ?></label>

            <input type="text" class="form-control" name="manufacturing_company" id="manufacturing_company" placeholder="Manufacturing Company" value="<?php echo $manufacturing_company; ?>" />

        </div>

	    

	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 

	    <a href="<?php echo site_url('expense') ?>" class="btn btn-default">Cancel</a>

	</form>

     <!-- ******************/master footer ****************** -->

                    </div>

                </div>

            </div>

    </section>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">

</script> 

      <script type="text/javascript">

     $( document ).ready(function() {

          $("#stand").hide();

       $("#category").change(function(){

        // var selectedCountry = $(this).children("option:selected").val();

        var id=$(this).val();

        // alert( id);



        $.ajax({

    type: "POST",

    url: "<?php echo base_url('allotment/get_expensecategory')?>",

    data:{id:id},

    // contentType: "application/json; charset=utf-8",

    dataType: "json",

    success: function(result){

        // alert(result);

        console.log(result);

     $('#subcategory').html(result.sub);

        if(result.vender){

             $("#stand").show();

         $('#standard').html(result.vender);

        }

    }

});

    });





        $("#standard").change(function(){

        // var selectedCountry = $(this).children("option:selected").val();

        var id=$(this).val();

             

        $.ajax({

    type: "POST",

    url: "<?php echo base_url('allotment/get_vender_detials')?>",

    data:{id:id},

    // contentType: "application/json; charset=utf-8",

    dataType: "json",

    success: function(result){

        // alert(result.id);

        console.log(result);



        if(result){

         $('#shop_name').val(result.vdor_business);

         $('#vendor_type').val(result.name);

         $('#mobile').val(result.mobile);

         $('#location').val(result.shop_address);

        }

    }

});

    });



      

});

    </script>