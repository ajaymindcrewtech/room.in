<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee List          
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
                <a href="<?php echo  base_url('employee/truncate') ?>" class="btn btn-danger"  onclick="return confirm('Are you sure you want to Truncate this item?');">Truncate</a> 
                          
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
               
          <?php echo anchor(site_url('employee/create'), 'Create', 'class="btn btn-primary"'); ?>
		  <?php echo anchor(site_url('employee/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
         <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <th>Phone</th>
		    <th>Email</th>
		    <th>Address</th>
            <th>Designation</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($employee_data as $employee)
            {

                if($employee->type==4){
                    $des='Super Admin';
                 }
                elseif($employee->type==2){
                   $des='Employee';

                  }
                  else{
                    $des='Admin';
                  }

                
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><a href="<?php echo base_url('employee/profile/'.$employee->id) ?>"><?php echo $employee->name.'-('.$employee->id.')' ?></a></td>
		    <!-- <td><?php echo $employee->name ?></td> -->
		    <td><?php echo $employee->phone ?></td>
		    <td><?php echo $employee->email ?></td>
		    <td><?php echo $employee->address ?></td>
            <td><?php echo $des  ?></td>
		    <td><?php echo ($employee->status==1)?'Active':'Inactive' ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('employee/read/'.$employee->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			echo anchor(site_url('employee/update/'.$employee->id),'<i class="fa fa-pencil-square-o"></i>'); 
			echo ' | '; 
			echo anchor(site_url('employee/delete/'.$employee->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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