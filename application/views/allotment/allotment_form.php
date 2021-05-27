<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Allotment <?php echo $button ?>          
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
	    <div class="form-group">
            <label for="int">Customer<?php echo form_error('customer_id') ?></label>
           <!--  <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id" value="<?php echo $customer_id; ?>" /> -->
           <select class="form-control" name="customer_id" id="customer_id">
               <option value="">Select</option>
               <?php foreach ($customer as $key => $value) {
                     if($value->booking_status==1 ){
                ?>
                <option value="<?php echo $value->id ?>"<?php if($customer_id==$value->id){echo 'selected';} ?>><?php echo $value->name.'-('.$value->id.')' ?></option>
                  
              <?php }} ?>
           </select>
        </div>
	   
	    <div class="form-group">
            <label for="int">Building<?php echo form_error('building_id') ?></label>
          <!--   <input type="text" class="form-control" name="building_id" id="building_id" placeholder="Building Id" value="<?php echo $building_id; ?>" /> -->
           <select class="form-control" name="building_id" id="building_id">
               <option value="">Select</option>
               <?php foreach ($building as $key => $value) {
                       if($value->status==1){
                ?>
                <option value="<?php echo $value->id ?>"<?php if($building_id==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>
                  
              <?php }} ?>
           </select>
        </div>
	    <div class="form-group">
            <label for="int">Bed<?php echo form_error('room_id') ?></label>
            <!-- <input type="text" class="form-control" name="room_id" id="room_id" placeholder="Room Id" value="<?php echo $room_id; ?>" /> -->
            <select class="form-control" name="room_id" id="room_id">
               <?php if($room_id){
                 foreach ($details as $key => $value){?>
                     <option value="<?php echo $value->id ?>"<?php if($room_id==$value->id){echo 'selcted';} ?>><?php echo $value->name ?></option>    
                  <?php }}?>
            </select>
           
        </div>
           
           <div class="form-group">
            <label for="varchar"> Bed Rent <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Bed Rent" value="<?php echo $amount; ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">Booking Rent <?php echo form_error('rent') ?></label>
            <input type="text" class="form-control" name="rent" id="rent" placeholder="Rent" value="<?php echo $rent; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Booking Date <?php echo form_error('from_date') ?></label>
            <input type="text" class="form-control datepicker" name="from_date" id="from_date" placeholder="From Date" value="<?php echo $from_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Rent Start Date <?php echo form_error('to_date') ?></label>
            <input type="text" class="form-control datepicker" name="to_date" id="to_date" placeholder="To Date" value="<?php echo $to_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
           <!--  <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
           <select class="form-control" name="status" id="status">
               <option value="1"<?php if($status==1){echo 'selected';} ?>>Active</option>
               <option value="2"<?php if($status==2){echo 'selected';} ?>>Inctive</option>
           </select>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('allotment') ?>" class="btn btn-default">Cancel</a>
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
      $("#building_id").change(function(){
        // var selectedCountry = $(this).children("option:selected").val();
        var id=$(this).val();
        // alert( id);
       var re="";
         $('#rent').val(re);
        var  bl="";
          $('#room_id').html(bl);
        $.ajax({
    type: "POST",
    url: "<?php echo base_url('allotment/get_room')?>",
    data:{id:id},
    // contentType: "application/json; charset=utf-8",
    // dataType: "json",
    success: function(result){
        // alert(result);
        console.log(result);

        if(result){
         $('#room_id').html(result);
        }
    }
});
    });


       $("#room_id").change(function(){
        // var selectedCountry = $(this).children("option:selected").val();
        var id=$(this).val();
        // alert( id);

        $.ajax({
    type: "POST",
    url: "<?php echo base_url('allotment/get_room_price')?>",
    data:{id:id},
    // contentType: "application/json; charset=utf-8",
    // dataType: "json",
    success: function(result){
        // alert(result);
        console.log(result);

        if(result){
         $('#amount').val(result);
        }
    }
});
    });

      
});
    </script>