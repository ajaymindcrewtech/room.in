<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vendor List          
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
                <a href="<?php echo  base_url('vender/truncate') ?>" class="btn btn-danger"  onclick="return confirm('Are you sure you want to Truncate this item?');">Truncate</a> 
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                
                <?php echo anchor(site_url('vender/create'), 'Create', 'class="btn btn-primary"'); ?>
            		<?php echo anchor(site_url('vender/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            	    </div>
                    </div>
          <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>Expense Category</th>        
		    <th>Vendor Name</th>
		    <th>Vendor Type</th>
		    <th>Vdor Business</th>
		    <th>Building Id</th>
		    <th>Date Of Onboarding</th>
		    <th>Date Of Leaving</th>
		    <!-- <th>Refrence Name</th> -->
		     <th>Mobile</th>
		    <!-- <th>Mobile2</th> -->
		    <!-- <th>Landline</th> -->
		    <th>Shop Address</th>
		    <th>Gst</th>
		    <th>Stauts</th>
		    <!-- <th>Createdat</th> -->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($vender_data as $vender)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php $res=$this->Expense_category_model->get_by_id($vender['exep_category']);if($res){echo $res->name;} ?></td>
            <td><?php echo $vender['vendor_name'].'-('.$vender['id'].')' ?></td>
		    <td><?php $res=$this->Vender_type_model->get_by_id($vender['vendor_type']); if($res){echo $res->name;} ?></td>
		    <td><?php echo $vender['vdor_business'] ?></td>
		    <td><?php $res=$this->Building_model->get_by_id($vender['building_id']);if($res){echo $res->name;}?></td>
		    <td><?php echo $vender['date_of_onboarding'] ?></td>
		    <td><?php echo $vender['date_of_leaving'] ?></td>
		    <!-- <td><?php echo $vender['refrence_name'] ?></td> -->
		    <td><?php echo $vender['mobile'] ?></td>
		    <!-- <td><?php echo $vender['mobile2'] ?></td> -->
		    <!-- <td><?php echo $vender['landline'] ?></td> -->
		    <td><?php echo $vender['shop_address'] ?></td>
		    <td><?php echo $vender['gst'] ?></td>
		    <td><?php echo ($vender['stauts'])?'Active':'Inactive' ?></td>
		    <!-- <td><?php echo $vender['createdat'] ?></td> -->
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('vender/read/'.$vender['id']),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('vender/update/'.$vender['id']),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('vender/delete/'.$vender['id']),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
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
    <script type="text/javascript">
        
    </script>