<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Complain List          
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
                         <?php  $log_id=$this->session->userdata('type');
               if($log_id==1 || $log_id==4 || $log_id==2 ){ ?>
            
                   
                        <div class="row" style="margin-bottom: 10px">
             <!-- <div class="alert alert-success"> -->
              <form name="fillter" method="post" id="fillter" action="<?php echo base_url('complain/index') ?>">
                     
                  
                    <div class="col-md-3">
                       
                        <label for="int">Status<?php echo form_error('com_status') ?></label>


                        <select class="form-control" name="com_status" id="com_status">
                            <option value="">Select Status</option>
                            <option value="1"<?php if($com_status==1){echo 'selected';} ?>>Open</option>
                            <option value="2"<?php if($com_status==2){echo 'selected';} ?>>Closed</option>
                            <option value="3"<?php if($com_status==3){echo 'selected';} ?>>Wip</option>
                            <option value="4"<?php if($com_status==4){echo 'selected';} ?>>Vender Required</option>
                            <option value="5"<?php if($com_status==5){echo 'selected';} ?>>Vender Allocated</option>
                            <option value="6"<?php if($com_status==6){echo 'selected';} ?>>Oh hold</option>
                            <option value="7"<?php if($com_status==7){echo 'selected';} ?>>Cust Damage</option>
                        </select>

                                                
                    </div>

                     <div class="col-md-3">
                         <label for="int">Building <?php echo form_error('building_id') ?></label>

                        <select class="form-control" name="building_id" id="building_id">

                            <option value="">--Select--</option>

                            <?php foreach ($building as $key => $value) {?>

                                <option value="<?php echo $value->id ?>" <?php if($building_id==$value->id){echo 'selected';} ?>><?php echo $value->name ?></option>

                            <?php  } ?>

                        </select>
                     </div>

                                       

                    
                    <div class="col-xs-3" >
                       <button type="submit" class="btn btn-primary form-control" name="bt" value="submit" style="margin-top: 23px;">Submit</button> 
                    </div>
            </form>
             <?php } ?>
        <!-- </div> -->
            <div class="col-xs-3"  style="margin-top: 23px;">
                       
                       <a href="<?php echo base_url('complain/create') ?>" class="btn btn-primary pull-left " >Create</a>
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
            <?php $login_type= $this->session->userdata('type');

         if($login_type==5){
            $block_style="display: none";   // vender not see - customer see
            $block_hide="display: none";    // vender not see - customer not see 
            $blo_hide="display: show";      // vender  see - customer not see
            $list_show="display: show";      // vender  see - customer see  all see

        }
         elseif($login_type==3){
           $block_style="display: show";
            $block_hide="display: none";
            $blo_hide="display: none";
             $list_show="display: show";

        }
        else{
            $block_style="display: show";
            $block_hide="display: show";
            $blo_hide="display: show";
             $list_show="display: show";
        }


        ?>
            <div class="col-md-4 text-right" style="<?php echo $block_style;  ?>">
                <?php //echo anchor(site_url('complain/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php //echo anchor(site_url('complain/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Date</th>
            <th>Emp</th>
		    <th>Building Id</th>
		    <th>Room Id</th>
		    <th>Com Category</th>
		    <th>Com Subcategory</th>
		    <th>Com Status</th>
		    <th>Com Details</th>
		    <th>Asset Id</th>
		    <th>Model</th>
            <th>Image</th>
		   
		    <th style="<?php echo  $block_style ?>">Recovery Amount</th>
		    <th style="<?php echo  $block_style ?>">Closure Remark</th>
		    <th style="<?php echo  $block_style ?>">Closure Remark By</th>
            <th style="<?php echo  $block_style ?>">Closed By</th>

             <th style="<?php echo  $block_hide ?>">Icr</th>

             <th style="<?php echo  $blo_hide ?>">Bill</th>
            <th style="<?php echo  $blo_hide ?>">Warranty</th>
		    <th style="<?php echo  $blo_hide ?>">Agreed Amount</th>
		    <th style="<?php echo  $blo_hide ?>">Tat</th>
            <th style="<?php echo  $blo_hide ?>">Assign Vender</th>

		    
		    
		    <th style="<?php echo  $blo_hide ?>">Category</th>
		    <th style="<?php echo  $blo_hide ?>">Vendor Bill</th>
		    <th style="<?php echo  $blo_hide ?>">Shop Name</th>
		    <th style="<?php echo  $blo_hide ?>">Amount</th>
		    <th style="<?php echo  $blo_hide ?>">Part Details</th>
		    <th style="<?php echo  $blo_hide ?>">Material Cost</th>
		    <th style="<?php echo  $blo_hide ?>">Labour Cost</th>
		    <th style="<?php echo  $blo_hide ?>">Createdat</th>
		    <th style="<?php echo  $blo_hide ?>">Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($complain_data as $complain)
            { 
            	if($complain->com_status==1){
            		$st="Open";
            	}
            	elseif($complain->com_status==2){
            		$st="Close";
            	}
            	elseif($complain->com_status==2){
            		$st="Close";
            	}
            	elseif($complain->com_status==3){
            		$st="Wip";
            	}
            	elseif($complain->com_status==4){
            		$st="Vender Required";
            	}
            	elseif($complain->com_status==5){
            		$st="Vender Allocated";
            	}
            	elseif($complain->com_status==6){
            		$st="Oh hold";
            	}
            	else{
            		$st="Cust Damage";
            	}

                                 
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $complain->date ?></td>

            <td><?php 
                if($complain->log_type==3){
                 $res=$this->Customer_model->get_by_id($complain->log_id);if($res){echo $res->name;}
                   }else{
                $res=$this->Employee_model->get_by_id($complain->log_id);if($res){echo $res->name;}
               } ?>
                </td>
            <!-- <td><?php if($complain->name){echo $complain->name;}?></td> -->
		    <td><?php $res=$this->Building_model->get_by_id($complain->building_id);if($res){echo $res->name;}?></td>
		    <td><?php $res=$this->Buil_details_model->get_by_id($complain->room_id);if($res){echo $res->name;} ?></td>
		    <td><?php  $res=$this->Com_category_model->get_by_id($complain->com_category);if($res){echo $res->name;} ?></td>
		    <td><?php  $res=$this->Com_sub_category_model->get_by_id($complain->com_subcategory);if($res){echo $res->name;} ?></td>
		    <td><?php echo $st ?></td>
		    <td><?php echo $complain->com_details ?></td>
		    <td><?php echo $complain->asset_id ?></td>
		    <td><?php echo $complain->model ?></td>
             <td><img src="<?php echo base_url($complain->image) ?>"style="height: 60px;"></td>

		   
		    
		    <td style="<?php echo  $block_style ?>" ><?php echo $complain->re_amount ?></td>
		    <td style="<?php echo  $block_style ?>"><?php echo $complain->closure_remark ?></td>
		    <td style="<?php echo  $block_style ?>"><?php echo $complain->closure_remark_by ?></td>
            <td style="<?php echo  $block_style ?>"><?php echo ($complain->closed_by==1)?'Staff':'Vender'; ?></td>

            <td style="<?php echo  $block_hide ?>"><?php echo $complain->icr ?></td>

            <td style="<?php echo  $blo_hide ?>"><?php echo $complain->bill ?></td>
            <td style="<?php echo  $blo_hide ?>"><?php echo $complain->warranty ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->agreed_amount ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->tat ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo ($complain->assign_vender==1)?'yes':'no'; ?></td>
		    
		    
		    <td style="<?php echo  $blo_hide ?>"><?php $res=$this->Expense_category_model->get_by_id($complain->category);if($res){echo $res->name;} ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->vendor_name ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->shop_name ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->amount ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->part_details ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->material_cost ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->labour_cost ?></td>
		    <td style="<?php echo  $blo_hide ?>"><?php echo $complain->createdat; ?></td>
		    <td style="text-align:center" width="200px">
                <a href="<?php echo base_url('complain/read/'.$complain->id) ?>" style="<?php echo $block_style; ?>"><i class="fa fa-eye"></i></a>
                <a href="<?php echo base_url('complain/update/'.$complain->id) ?>" style="<?php echo $blo_hide; ?>"><i class="fa fa-pencil-square-o"></i></a>
                 <?php if($login_type==4){ ?>
                 <a href="<?php echo base_url('complain/delete/'.$complain->id) ?>" style="<?php //echo $blo_hide; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

			<?php 
			}
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