<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Login <?php echo $button ?>          
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
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
         
          <div class="form-group">
            <label for="varchar">Number <?php echo form_error('number') ?></label>
            <input type="text" class="form-control" name="number" id="number" placeholder="Number" value="<?php echo $number; ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	   <!--  <div class="form-group">
            <label for="int">Designation <?php echo form_error('designation') ?></label>
            <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" value="<?php echo $designation; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="varchar">Type <?php echo form_error('type') ?></label>
         
          <select class="form-control" name="type" id="type">
              <option value="3"<?php if($type==3){echo 'selected';} ?>>User</option>
              <option value="2"<?php if($type==2){echo 'selected';} ?>>Employee</option>
              <option value="1"<?php if($type==1){echo 'selected';} ?>>Admin</option>
              <option value="4"<?php if($type==4){echo 'selected';} ?>>Super Admin</option>
          </select>

        </div>
	     <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
              <select class="form-control" name="status" id="status">
              <option value="1"<?php if($status==1){echo 'selected';} ?>>Active</option>
              <option value="2"<?php if($status==2){echo 'selected';} ?>>Inactive</option>
             </select>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('login_create') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>