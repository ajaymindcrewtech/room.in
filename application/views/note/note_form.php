<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Note <?php echo $button ?>          
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
        <form action="<?php echo $action; ?>" method="post" autocomplete="off" enctype="multipart/form-data">

        <div class="form-group">
            <label for="varchar">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </div>
	    
	    <div class="form-group">
            <label for="varchar">Image <?php echo form_error('image') ?></label>
            <!-- <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" /> -->
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
	   
	    
	    <div class="form-group">
            <label for="note">Note <?php echo form_error('note') ?></label>
            <textarea class="form-control" rows="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea>
        </div>
	    

        <div class="form-group">
            <label for="description">Description <?php echo form_error('description') ?></label>
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
        </div>

        <div class="form-group">
            <label for="datetime">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status" id="status">

                <option value="">--Select--</option>

                <option value="1"<?php if($status==1){echo 'selected';} ?>>Active</option>
                <option value="2"<?php if($status==2){echo 'selected';} ?>>Inactive</option>

           </select>
        </div>

	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('note') ?>" class="btn btn-default">Cancel</a>
	</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>