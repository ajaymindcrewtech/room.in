<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cash Hand Over List          
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
              <form name="fillter" method="post" id="fillter" action="<?php echo base_url('emp_to_emp/excel') ?>">
                     
                  
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
                       
                       <a href="<?php echo base_url('emp_to_emp/create') ?>" class="btn btn-primary pull-right " >Create</a>
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
          
            <th>Transaction id </th>
            <th>From Employee </th>
            <th>Mode</th>
            <th>Expense</th>
            <th>To Employee </th>
            <th>To mode</th>
            <th>Income</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Date diff</th>
            <th>Created At</th>
            <th>Payment Status</th>            
             <?php 
                $log_id=$this->session->userdata('type');
             if( $log_id==4){  ?>
            <th>Action</th>
        <?php } ?>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($income_register_data as $value)
            {
                if($value->delete_status==1){
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $value->transaction_id ?></td>
             <td><?php $res=$this->Employee_model->get_by_id($value->employee_id); if($res){echo $res->name.'-('.$res->id.')';} ?></td>
             <td><?php $res=$this->Payment_mode_model->get_by_id($value->mode); if($res){echo $res->name;} ?></td>
             <td><?php echo  $value->expense ?></td>
              
               <td><?php $res=$this->Employee_model->get_by_id($value->other_emp_id); if($res){echo $res->name.'-('.$res->id.')';} ?></td>
             <td><?php $res=$this->Payment_mode_model->get_by_id($value->other_mode); if($res){echo $res->name;} ?></td>
             <td><?php echo  $value->income ?></td>
             <td><?php echo  $value->comment ?></td>
             <td><?php echo date('d-m-Y',strtotime($value->date)) ?></td>
               <td><?php echo $value->date_diff ?></td>
             
             <td><?php echo date('d-m-Y',strtotime( $value->createdat));?></td>
             <td><?php echo  ($value->payment_status==1)?'Send':'Seen' ;?></td>
              <?php  $log_id=$this->session->userdata('type');

               if($log_id==1 || $log_id==4){    ?>
            <td style="text-align:center" width="200px">
            <?php 
            // echo anchor(site_url('emp_to_emp/read/'.$value->id),'<i class="fa fa-eye"></i>'); 
            // echo ' | '; 
            // echo anchor(site_url('emp_to_emp/update/'.$value->id),'<i class="fa fa-pencil-square-o"></i>'); 
            // echo ' | '; 
            // echo anchor(site_url('emp_to_emp/delete/'.$value->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            ?>
             <button class="btn btn-danger" id="<?php echo $value->id ?>" onclick="showmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
            </td>
        <?php } ?>
            </tr>
                <?php
            }}
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
              $('#emp_id').val(id);
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
           <form action="<?php echo base_url('emp_to_emp/delete') ?>" method="post" autocomplete="off">
               <input type="hidden" name="emp_id" id="emp_id" >
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