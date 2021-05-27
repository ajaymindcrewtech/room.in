<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Complain Sub Category <?php echo $button ?>          
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
            <label for="int">Complain Category  <?php echo form_error('com_category_id') ?></label>
           <!--  <input type="text" class="form-control" name="exp_category_id" id="exp_category_id" placeholder="Exp Category Id" value="<?php echo $exp_category_id; ?>" /> -->
           <select class="form-control" name="com_cat_id" id="com_cat_id">
              <option value="">--Select--</option>
                 <?php foreach ($com_category_id as $key => $value) {?>
                      <option value="<?php echo $value->id ?>"<?php if($com_cat_id==$value->id){echo 'Selected';} ?>><?php echo $value->name ?></option>
                <?php } ?>
           </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
           <!--  <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
           <select class="form-control" name="status" id="status">
               <option value="1"<?php if($status==1){echo 'selected';} ?>>Active</option>
               <option value="2"<?php if($status==2){echo 'selected';} ?>>Inative</option>
           </select>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('com_sub_category') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>