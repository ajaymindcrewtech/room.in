<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payment <?php echo $button ?>          
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
            <label for="int">Customer <?php echo form_error('customer_id') ?></label>
           <!--  <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id" value="<?php echo $customer_id; ?>" /> -->
            <select class="form-control" name="customer_id" id="customer_id">
               <option value="">Select</option>
               <?php foreach ($customer as $key => $value) {?>
                 <option value="<?php echo $value->id ?>"<?php if($customer_id==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>
              <?php } ?>
           </select>
        </div>
	    <div class="form-group">
            <label for="int">Employee <?php echo form_error('emp_id') ?></label>
           <!--  <input type="text" class="form-control" name="emp_id" id="emp_id" placeholder="Emp Id" value="<?php echo $emp_id; ?>" /> -->
           <select class="form-control" name="emp_id" id="emp_id">
               <option value="">Select</option>
               <?php foreach ($emp as $key => $value) {?>
                 <option value="<?php echo $value->id ?>"<?php if($emp_id==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>
              <?php } ?>
           </select>
        </div>
	    <div class="form-group">
            <label for="int">Payment <?php echo form_error('payment') ?></label>
            <input type="text" class="form-control" name="payment" id="payment" placeholder="Payment" value="<?php echo $payment; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Date" value="<?php echo date('d-m-Y',strtotime($date)); ?>" autocomplete="off"/>
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
	    <a href="<?php echo site_url('payment') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>
   