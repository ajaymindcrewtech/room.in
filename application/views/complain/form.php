<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Complain <?php echo $button ?>          

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

            <label for="int">Complain Category <?php echo form_error('category') ?></label>

            <!-- <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="<?php echo $category; ?>" /> -->

            <select class="form-control" name="com_category" id="com_category">

                <option value="">--Select--</option>

                <?php foreach ($exep_categotry as $key => $value) {?>

                   <option value="<?php echo $value->id ?>" <?php if($com_category==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>

              <?php  } ?>

            </select>

        </div>

        <div class="form-group">

            <label for="int">Complain Subcategory <?php echo form_error('com_subcategory') ?></label>

            <!-- <input type="text" class="form-control" name="subcategory" id="subcategory" placeholder="Subcategory" value="<?php echo $subcategory; ?>" /> -->

              <select class="form-control" name="com_subcategory" id="com_subcategory">

                <?php if($subcategory){ ?>

                <option value="">--Select--</option>

                <?php foreach ($exep_subcategotry as $key => $value) {?>

                   <option value="<?php echo $value->id ?>" <?php if($com_subcategory==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>

              <?php } } ?>

            </select>

        </div>

        <div class="form-group">

            <label for="int">Status<?php echo form_error('com_status') ?></label>

           
           <select class="form-control" name="com_status" id="com_status">
               <option value="1"<?php if($type==1){echo 'selected';} ?>>Open</option>
               <option value="2"<?php if($type==2){echo 'selected';} ?>>Closed</option>
               <option value="3"<?php if($type==3){echo 'selected';} ?>>Wip</option>
               <option value="4"<?php if($type==4){echo 'selected';} ?>>Vender Required</option>
               <option value="5"<?php if($type==5){echo 'selected';} ?>>Vender Allocated</option>
               <option value="6"<?php if($type==6){echo 'selected';} ?>>Oh hold</option>
               <option value="7"<?php if($type==7){echo 'selected';} ?>>Cust Damage</option>
            </select>

        </div>

       
     <!-- <div class="col-xs-12"> -->

    </div>
        

    <div class="col-xs-12">

        <div class="form-group">

            <label for="comment">Compalint Details <?php echo form_error('com_details') ?></label>

            <textarea class="form-control" rows="3" name="com_details" id="com_details" placeholder="Compalint Details"><?php echo $com_details; ?></textarea>

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

            <label for="bigint">Bill <?php echo form_error('bill') ?></label>

            <input type="text" class="form-control" name="bill" id="bill" placeholder="bill details" value="<?php echo $bill; ?>" />
           
      </div>

        

    

       

        <div class="form-group">

            <label for="varchar">Warranty <?php echo form_error('warranty') ?></label>

            <input type="text" class="form-control" name="warranty" id="warranty" placeholder="Warranty" value="<?php echo $warranty; ?>" />

        </div>

    </div>
  <div class="col-xs-12">
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
    <!-- </div> -->
    
<div class="alert alert-danger">

        <h4>Remark</h4>

    </div>
    <div class="row">
        <div class="col-xs-6">

             <div class="form-group">

         <label for="bigint">Closure Remark <?php echo form_error('closure_remark') ?></label>

            <input type="text" class="form-control" name="closure_remark" id="closure_remark" placeholder="closure remark " value="<?php echo $closure_remark; ?>" />
           
      </div>
            
         <div class="form-group">

         <label for="bigint">Closure Remark By <?php echo form_error('closure_remark_by') ?></label>

            <input type="text" class="form-control" name="closure_remark_by" id="closure_remark_by" placeholder="closure remark by" value="<?php echo $room_type; ?>" />
           
      </div>

      <div class="form-group">

         <label for="bigint">Emp Update Total Amount Agreed <?php echo form_error('agreed_amount') ?></label>

            <input type="text" class="form-control" name="agreed_amount" id="agreed_amount" placeholder="Amount Agreed Emp" value="<?php echo $agreed_amount; ?>" />
           
      </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">

            <label for="Item_detail">Days Taken To closure <?php echo form_error('tat') ?></label>

            <input type="text" class="form-control"  name="tat" id="tat" placeholder="Tat" value="<?php echo $tat;?>">

        </div>

         <div class="form-group">

            <label for="Item_detail">Internal closure remark <?php echo form_error('icr') ?></label>

            <input type="text" class="form-control"  name="icr" id="icr" placeholder="icr" value="<?php echo $icr;?>">

        
        </div>
        <!-- <div class="col-xs-12"> -->
            <div class="form-group">

            <label for="int">Closed By <?php echo form_error('closed_by') ?></label>

             <select class="form-control" name="closed_by" id="closed_by">

                <option value="">--Select--</option>

              <!--  <option value="1"<?php if($closed_by==1){echo 'selected';} ?>>Staff</option>
               <option value="2"<?php if($closed_by==2){echo 'selected';} ?>>Vender</option>
 -->
            </select>
        </div>
        </div>
        <div class="col-xs-12">
        <div class="form-group">

            <label for="int">Assign To vender <?php echo form_error('payment_mode') ?></label>

            <!-- <input type="text" class="form-control" name="payment_mode" id="payment_mode" placeholder="Payment Mode" value="<?php echo $payment_mode; ?>" /> -->

             <select class="form-control" name="assign_vender" id="assign_vender">

                <option value="">--Select--</option>

               <option value="1"<?php  ?><?php  ?>>Yes</option>
               <option value="2"<?php  ?>>No</option>

            </select>
        </div>
    </div>
        <!-- </div> -->
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

            <label for="varchar">Vender Name <?php echo form_error('vendor_bill') ?></label>

            <input type="text" class="form-control" name="vendor_bill" id="vendor_bill" placeholder="Vendor Bill" value="<?php echo $vendor_bill; ?>" />

        </div>

    

    

        <div class="form-group">

            <label for="varchar">Vender Comment <?php echo form_error('shop_name') ?></label>

            <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="Shop Name" value="<?php echo $shop_name; ?>" />

        </div>

         <div class="form-group">
            <label for="int">Amount<?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Sic Bill" value="<?php echo $amount; ?>" />
        </div>

    </div>

    <div class="col-xs-6">

        <div class="form-group">

            <label for="int">Parts Details <?php echo form_error('part_details') ?></label>

            <textarea class="form-control" name="part_details" id="part_details" placeholder="part details "></textarea> 

        </div>

  

   

        <div class="form-group">

            <label for="varchar">Material Cost <?php echo form_error('material_cost') ?></label>

            <input type="text" class="form-control" name="material_cost" id="material_cost" placeholder="material cost" value="<?php echo $material_cost; ?>" />

        </div>


        <div class="form-group">

            <label for="location">Labour Cost <?php echo form_error('labour_cost') ?></label>

            <input type="post" class="form-control"  name="labour_cost" id="labour_cost" placeholder="labour cost"><?php echo $labour_cost; ?>

        </div>

    </div>

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