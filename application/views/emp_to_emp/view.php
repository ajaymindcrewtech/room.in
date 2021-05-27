<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cash Hand Over Form           
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
        
	       
          <div class="form-group">
            <label for="int">Cash Transfer Amount<?php echo form_error('expense') ?></label>
            <input type="text" class="form-control" name="expense" id="expense" placeholder="Expense" value="<?php echo $expense; ?>" />
        </div>

        <div class="form-group">
            <label for="int">Payment Mode from <?php echo form_error('mode') ?></label>
          <!--   <input type="text" class="form-control" name="expense" id="expense" placeholder="Expense" value="<?php echo $expense; ?>" /> -->
          <select class="form-control" name="mode" id="mode">
            <?php foreach ($payment_mode as $key => $value) {?>

                <option value="<?php echo $value->id ?>"<?php if($mode==$value->id){ echo 'selected';} ?>><?php echo $value->name ?></option>
        
           <?php } ?>
              
          </select>
        </div>
	      
         
         <div class="form-group" id="" style="">
            <label for="int">To Emloyee <?php echo form_error('other_emp_id') ?></label>
           <select class="form-control" name="other_emp_id" id="other_emp_id">
            <?php foreach ($employee as $key => $value) {?>

                <option value="<?php echo $value->id ?>"<?php if($other_emp_id==$value->id){ echo 'selected';} ?>><?php echo $value->name.'-('.$value->id.')' ?></option>
        
           <?php } ?>
              
          </select>
        </div>

         <div class="form-group">
            <label for="int">Payment Mode To <?php echo form_error('other_mode') ?></label>
           <select class="form-control" name="other_mode" id="mode">
            <?php foreach ($payment_mode as $key => $value) {?>

                <option value="<?php echo $value->id ?>"<?php if($other_mode==$value->id){ echo 'selected';} ?>><?php echo $value->name ?></option>
        
           <?php } ?>
              
          </select>
        </div>

	    <div class="form-group">
            <label for="timestamp">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" id="date" name="date" id="date" placeholder="enter date" value="<?php if($date){ echo date('d-m-Y',strtotime($date));}else{echo date('d-m-Y');}  ?>" />
        </div>

        <div class="form-group">
            <label for="int"> Commnent <?php echo form_error('comnent') ?></label>
            <textarea type="text" class="form-control" name="comment" id="comment" placeholder=""> <?php echo $comment; ?> </textarea>
        </div>
	    <input type="hidden" name="register_id" value="<?php echo $register_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('emp_to_emp') ?>" class="btn btn-default">Cancel</a>
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
       var res= $('#key_value').val();
            // alert(res);
            if(res=='emp_to_emp'){
                $('#em').show();

            }else {
                $('#em').hide(); 
            }

             $('#date').datepicker({
      // autoclose: true
       format: 'dd-mm-yyyy'
    })

        })
    </script>