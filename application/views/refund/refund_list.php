<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Refund List          
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
                <?php //echo anchor(site_url('revenue/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('revenue/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
             <th>Employee</th>     
		    <th>Building Id</th>
            <th>Room Id</th>
		    <th>Customer Id</th>
		    <!-- <th>Payment Type</th> -->
		    <th>Amount</th>
		    <th>Payment Mode</th>
		    <th>Date</th>
		    <th>Comment</th>
		   <!--  <th>Process</th> -->
		    <?php 
                $log_id=$this->session->userdata('type');
             if($log_id==1 && $log_id==4){  ?>
            <th>Action</th>
        <?php } ?>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($revenue_data as $revenue)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php $emp=$this->Employee_model->get_by_id($revenue->emp_id); if($emp){ echo $emp->name;} ?></td>
            <td><?php $buil=$this->Building_model->get_by_id($revenue->building_id); if($buil){ echo $buil->name;} ?></td>
            <td><?php $room=$this->Buil_details_model->get_by_id($revenue->room_id); if($room){ echo $room->name;} ?></td>
		    <td><?php $cus=$this->Customer_model->get_by_id($revenue->customer_id); if($cus){ echo $cus->name;} ?></td>
		    <!-- <td><?php echo $revenue->payment_type ?></td>  -->
		    <td><?php echo $revenue->amount ?></td>
		    <td><?php $pay=$this->Payment_mode_model->get_by_id($revenue->payment_mode);if($pay){echo $pay->name;}?></td>
		    <td><?php echo date('d-m-Y',strtotime($revenue->date)) ?></td>
		    <td><?php echo $revenue->comment ?></td>
		   <!--  <td><a href="<?php echo base_url('revenue/update/'.$revenue->id) ?>/Refund" class="btn btn-info btn-sm">Refund</a></td> -->
             <?php  $log_id=$this->session->userdata('type');
               if($log_id==1 && $log_id==4){    ?>
		    <td style="text-align:center" width="200px">

			<?php 
			echo anchor(site_url('refund/read/'.$revenue->id),'<i class="fa fa-eye"></i>'); 
			echo ' | '; 
			// echo anchor(site_url('revenue/update/'.$revenue->id),'<i class="fa fa-pencil-square-o"></i>'); 
			// echo ' | '; 
			// echo anchor(site_url('revenue/delete/'.$revenue->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
            <button class="btn btn-danger" id="<?php echo $revenue->id ?>" onclick="showmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
		    </td>
          <?php } ?>
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
              function showmodel(id){
               // alert(id);
              $('#myModal').modal('show');
              $('#refund_id').val(id);
               }
        </script>
    <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>


    </div>

< <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Reason of Delete</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
           <form action="<?php echo base_url('refund/delete') ?>" method="post" autocomplete="off">
               <input type="hidden" name="refund_id" id="refund_id" >
               <div>
               <textarea class="form-control" name="reason" id="reason"></textarea>
              </div>
              <br>
               <div>
                   <button type="submit" class="btn btn-primary">Submit</button> 
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
           </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        
      </div>

    </div>
  </div>
</div>
  