<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Revenue <?php echo $button ?>          
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
        <form action="<?php echo $action; ?>" method="post" autocomplete="off">
            
            <div class="row">
                <div class="col-lg-6 col-xs-6"> 
	    <div class="form-group">
            <label for="int">Building Id <?php echo form_error('building_id') ?></label>
            <!-- <input type="text" class="form-control" name="building_id" id="building_id" placeholder="Building Id" value="<?php echo $building_id; ?>" /> -->
            <select class="form-control" name="building_id" id="building_id">
                <option value="">--Select--</option>
                <?php 
                foreach ($building as $key => $value) {
                     if($value->status==1){
                  ?>
                <option value="<?php echo $value->id ?>"<?php if($building_id==$value->id){echo 'selected';}?>><?php echo $value->name ?></option>
               <?php }} ?>
            </select>
        </div>

         <div class="form-group">
            <label for="int">Customer Id <?php echo form_error('customer_id') ?></label>
              <select class="form-control" name="customer_id" id="customer_id">
                <!-- <option value="">--Select--</option> -->
                 <?php  if($customer_id){
                 foreach ($cus as $key => $value){?>
                     <option value="<?php echo $value->customer_id ?>"<?php if($customer_id==$value->id){echo 'selected';} ?>><?php $res=$this->Customer_model->get_by_id($value->customer_id);if($res){echo $res->name.'-('.$res->id.')' ;}?></option>    
                  <?php }}?>
            </select>
        </div>

         
          <div class="form-group">
            <label for="int">Room Id <?php echo form_error('room_id') ?></label>
            <!-- <input type="text" class="form-control" name="room_id" id="room_id" placeholder="Room Id" value="<?php echo $room_id; ?>" /> -->
            <select class="form-control" name="room_id" id="room_id">
               <?php  if($room_id){
                 foreach ($details as $key => $value){?>
                     <option value="<?php echo $value->id ?>"<?php if($room_id==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>    
                  <?php }}?>
            </select>
           
        </div>

       
       <!--  <div class="form-group">
            <label for="varchar">Rent <?php echo form_error('rent') ?></label>
            <input type="text" class="form-control" name="rent" id="rent" placeholder="Rent" value="" />
        </div> -->

	  
	    <div class="form-group">
            <label for="int"> Bed Rent <?php echo form_error('rent') ?></label>
            <input type="text" class="form-control" name="rent" id="rent" placeholder="rent" value="<?php echo $rent; ?>" />
        </div>

         <div class="form-group">
            <label for="int"> Room Type <?php echo form_error('room_type') ?></label>
            <!-- <input type="text" class="form-control" name="room_type" id="room_type" placeholder="rent" value="<?php echo $room_type; ?>" /> -->
            <select class="form-control" name="room_type" id="room_type">
              <?php foreach ($room_typ as $key => $value) {?>
                 <option value="<?php echo $value->id ?>"<?php if($room_type==$value->id){echo 'selected';} ?>><?php echo $value->name; ?></option>
              <?php } ?>
           
            </select>
        </div>
          
          <div class="form-group">
            <label for="int">Type <?php echo form_error('type') ?></label>
             <select class="form-control" name="type" id="type">
               <option value="1"<?php if($type==1){echo 'selected';} ?>>Customer To emp</option>
               <option value="2"<?php if($type==2){echo 'selected';} ?>>Emp To customer</option>
             </select>
        </div>

    </div>


     <div class="col-lg-6 col-xs-6">
      <div class="form-group">
            <label for="int">Amount <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
        </div>

	    <div class="form-group">
            <label for="int">Payment Mode <?php echo form_error('payment_mode') ?></label>
            <!-- <input type="text" class="form-control" name="payment_mode" id="payment_mode" placeholder="Payment Mode" value="<?php echo $payment_mode; ?>" /> -->
            <select class="form-control" name="payment_mode" id="payment_mode">
                <?php foreach ($payment_m as $key => $value) {?>
                                 
                 <option value="<?php echo $value->id ?>"<?php if($payment_mode==$value->id){echo 'selected';}?>><?php echo $value->name ?></option>
               <?php } ?>
            </select>
        </div>
          
        <div class="form-group">

            <label for="Item_detail">Ref No <?php echo form_error('ref_no') ?></label>

            <input type="text" class="form-control"  name="ref_no" id="ref_no" placeholder="Ref No" value="<?php echo $ref_no;?>">

        </div>  

	    <div class="form-group">
            <label for="timestamp">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" id="date" name="date" id="date" placeholder="enter date" value="<?php if($date){ echo date('d-m-Y',strtotime($date));}else{echo date('d-m-Y');}  ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Comment <?php echo form_error('comment') ?></label>
            <textarea  class="form-control" rows="5" name="comment" id="comment" placeholde namr="Comment" value="" ><?php echo $comment ?></textarea>
        </div>
	    
    </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('revenue') ?>" class="btn btn-default">Cancel</a>
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
         $('#date').datepicker({
      // autoclose: true
       format: 'dd-mm-yyyy'
    })
      $("#building_id").change(function(){
        // var selectedCountry = $(this).children("option:selected").val();
        var id=$(this).val();
      //  alert( id);
       var re="";
         $('#rent').val(re);
        var  bl="";
          $('#customer_id').html(bl);
        $.ajax({
    type: "POST",
    url: "<?php echo base_url('revenue/get_building_cus')?>",
    data:{id:id},
    // contentType: "application/json; charset=utf-8",
    // dataType: "json",
    success: function(result){
        // alert(result);
        console.log(result);

        if(result){
            // alert(result);
            // $(result).insertAfter("#customer_id option:first");
            // $("#customer_id option:first").after(result);
         $('#customer_id ').html(result);
        }
    }
});
    });


       $("#customer_id").change(function(){
        // var selectedCountry = $(this).children("option:selected").val();
        var id=$(this).val();
        // alert( id);
        var re="";
        $('#room_id').val("");

        $.ajax({
    type: "POST",
    url: "<?php echo base_url('revenue/get_alloted_rooms')?>",
    data:{id:id},
    // contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function(result){
        // alert(result.name);
        console.log(result.name);
         
        if(result.name){
         $('#rent').val(result.rent);
         var html='<option value="'+result.id+'">'+result.name+'</option>'
         $('#room_id').html(html);
        }
    }
});
    });

      
});
    </script>