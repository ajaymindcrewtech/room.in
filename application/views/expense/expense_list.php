<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Expense List          

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
                      <div class="row" style="margin-bottom: 10px">
             <!-- <div class="alert alert-success"> -->
              <form name="fillter" method="post" id="fillter" action="<?php echo base_url('expense/excel') ?>">
                     
                  
                    <div class="col-md-3">
                       <label >From Date</label>
                        <input type="text" id="fro" name="fro" class="form-control datepicker" value="<?php echo date('d-m-Y');?>"/>
                    </div>

                     <div class="col-md-3">
                        <label >To Date</label>
                        <input type="text" id="to" name="to" class="form-control datepicker" value="<?php  echo date('d-m-Y');?>">
                     </div>

                                       

                    
                    <div class="col-xs-3" >
                       <button type="submit" class="btn btn-primary form-control" name="bt" value="submit" style="margin-top: 23px;">Submit</button> 
                    </div>
            </form>
        <!-- </div> -->
            <div class="col-xs-3"  style="margin-top: 23px;">
                       
                       <a href="<?php echo base_url('expense/create') ?>" class="btn btn-primary pull-right " >Create</a>
                    </div> 
        </div>

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

            	
	    </div>

        </div>

        <div style="overflow-x:auto;">

        <table class="table table-bordered table-striped" id="mytable">

            <thead>

                <tr>

                    <th width="80px">No</th>

		    <th>Date</th>
        <th>Date diff</th>

		    <th>Transaction Id</th>

		    <th>Category</th>

		    <th>Subcategory</th>

		    <!-- <th>Item Detail</th> -->

		    <th>Paying Employee</th>

		    <th>Amount Paid</th>

		    <th>Payment Mode</th>

		    <th>Building Id</th>

		    <th>Room Id</th>

		    <th>Room Type</th>

		    <th>Type</th>

		     <?php  $log_id=$this->session->userdata('type');
               if($log_id==1 || $log_id==4){ ?>
            <th>Action</th>
        <?php } ?>

                </tr>

            </thead>

	    <tbody>

            <?php

            $start = 0;

            foreach ($expense_data as $expense)

            {  
                if($expense->delete_status==1){

                ?>

                <tr>

		    <td><?php echo ++$start ?></td>

		    <td><?php echo date('d-m-Y',strtotime($expense->date))?></td>
         <td><?php echo $expense->date_diff ?></td>

		    <td><?php echo $expense->transaction_id ?></td>

		    <td><?php $res=$this->Expense_category_model->get_by_id($expense->category);if($res){echo $res->name;} ?></td>

         <td><?php $res=$this->Expense_subcategory_model->get_by_id($expense->subcategory);if($res){echo $res->name;} ?></td>

		

		    <td><?php $res=$this->Employee_model->get_by_id($expense->paying_employee);if($res){echo $res->name.'-('.$res->id.')';} ?></td>

		    <td><?php echo $expense->amount_paid ?></td>

		    <td><?php $res=$this->Payment_mode_model->get_by_id($expense->payment_mode);if($res){echo $res->name;} ?></td>

		    <td><?php $res=$this->Building_model->get_by_id($expense->building_id);if($res){echo $res->name;}?></td>

		    <td><?php echo $expense->room_id ?></td>

		    <td><?php $res=$this->Room_type_model->get_by_id($expense->room_type);if($res){echo $res->name;} ?></td>

		    <td><?php echo ($expense->type==1)?'Ev':'Ve'; ?></td>

             <?php  $log_id=$this->session->userdata('type');
               if( $log_id==4){ ?>

		    <td style="text-align:center" width="200px">

			<?php 

			echo anchor(site_url('expense/read/'.$expense->id),'<i class="fa fa-eye"></i>'); 

			echo ' | '; 

			// echo anchor(site_url('expense/delete/'.$expense->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 

			?>
             <button class="btn btn-danger" id="<?php echo $expense->id ?>" onclick="showmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
		    </td>

        <?php } ?>

	        </tr>

                <?php

            } }

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

            function showmodel(id){
               // alert(id);
              $('#myModal').modal('show');
              $('#expense_id').val(id);
               }

        </script>

    <!-- ******************/master footer ****************** -->

                    </div>

                </div>

            </div>

    </section>

    </div>


     <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Reason of Delete</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
           <form action="<?php echo base_url('expense/delete') ?>" method="post" autocomplete="off">
               <input type="hidden" name="expense_id" id="expense_id" >
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