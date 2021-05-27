<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Login List          
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
                <?php echo anchor(site_url('login_create/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
         <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
            <th>Number</th>
		    <th>Email</th>
		    <th>Password</th>
		    <!-- <th>Designation</th> -->
		    <th>Type</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($login_data as $login)
            {
                if($login->type==3){
                    $log='User';
                }
                 elseif($login->type==2){
                    $log='Employee';
                }
                 elseif($login->type==1){
                    $log='Admin';
                }

                 elseif($login->type==5){
                    $log='Vender';
                }
                else{
                    $log='Super admin'; 
                }
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $login->name ?></td>
            <td><?php echo $login->number ?></td>
		    <td><?php echo $login->email ?></td>
		    <td><?php echo $login->password ?></td>
		    <!-- <td><?php echo $login->designation ?></td> -->
		    <td><?php echo  $log ?></td>
		    <td><?php echo ($login->status==1)?'Active':'Inactive'; ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('login_create/read/'.$login->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('login_create/update/'.$login->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('login_create/delete/'.$login->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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