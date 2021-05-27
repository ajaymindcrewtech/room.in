<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Buil_details List          
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
                <?php echo anchor(site_url('buil_details/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('buil_details/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th width="80px">No</th>
		    <th>Bullding Id</th>
		    <th>Name</th>
		    <th>Rent</th>
		    <th>Status</th>
            <th>Booking Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($buil_details_data as $buil_details)
            {
                   if($buil_details->booking_status==1){
                     $colur='btn-success';
                   }
                   else{
                    $colur='btn-danger';
                   }
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php $res=$this->Building_model->get_by_id($buil_details->Bullding_id);if($res){echo $res->name;}?></td>
		    <td><?php echo $buil_details->name ?></td>
		    <td><?php echo $buil_details->rent ?></td>
		    <td><?php echo ($buil_details->status==1)?'Active':'Inactive'; ?></td>
             <td><span class="btn <?php echo $colur; ?> "><?php echo ($buil_details->booking_status==1)?'available':'Booked'; ?></span></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('buil_details/read/'.$buil_details->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('buil_details/update/'.$buil_details->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('buil_details/delete/'.$buil_details->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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