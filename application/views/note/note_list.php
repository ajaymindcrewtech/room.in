<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Note List          
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
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
              
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('note/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('note/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    
            <th>Date</th>
		    <th>Image</th>
		   <!-- <th>Createdat</th> -->
		    <th>Note</th>
            <th>Description</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($note_data as $note)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $note->date ?></td>
		    <td><img src="<?php echo base_url($note->image);?>" style="height:40px"></td>		   
		    <!-- <td><?php echo $note->createdat ?></td> -->
		    <td><?php echo $note->note ?></td>
            <td><?php echo $note->description ?></td>		    
             <td><?php echo ($note->status==1)?'Active':'Inactive'; ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('note/read/'.$note->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('note/update/'.$note->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('note/delete/'.$note->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>