<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Buil_details <?php echo $button ?>          
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
            <label for="int">Bullding Id <?php echo form_error('Bullding_id') ?></label>
           <!--  <input type="text" class="form-control" name="Bullding_id" id="Bullding_id" placeholder="Bullding Id" value="<?php echo $Bullding_id; ?>" /> -->
           <select class="form-control" name="Bullding_id" id="Bullding_id">
               <option value="">Select</option>
               <?php foreach ($bullding as $key => $value) {
                         if($value->status==1){
                ?>
                <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
              <?php }} ?>
               
           </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Rent <?php echo form_error('rent') ?></label>
            <input type="text" class="form-control" name="rent" id="rent" placeholder="Rent" value="<?php echo $rent; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
           <!--  <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
           <select class="form-control" name="status" id="status">
               <option value="1"<?php if($status==1){echo 'selected';} ?>>Active</option>
               <option value="1"<?php if($status==2){echo 'selected';} ?>>Inactive</option>
           </select>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('buil_details') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>