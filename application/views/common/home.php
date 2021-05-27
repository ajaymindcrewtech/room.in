<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Manager</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-user-plus"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Student Registration</span>
                                <span class="info-box-number"><?php echo $tot_student;?><small></small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-group (alias)"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Employee</span>
                                <span class="info-box-number"><?php echo $tot_employee;?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-edit (alias)"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Enquiries</span>
                                <span class="info-box-number"><?php echo $tot_demo;?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-rupee (alias)"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Fee's Collection</span>
                                <span class="info-box-number"><?php echo $tot_fee['paid_amount'];?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

            </div>

        </div>
         <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="box panel-heading">
                            <span class="info-box-text"><b>Today's Student Birthday</b></span>
                                <div class='panel-body'>
                                    <form action="#" method="post" class="form">
                                        <table class="table table-bordered table-condensed">
                                            <tr>
                                                <th class="no_print"> 
                                                    <input type="checkbox" value="1" id="Allcheck2">
                                                </th>    
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Date of Birth</th>                                
                                            </tr>
                                            <?php foreach ($birthday as $b) { ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" value="<?php echo $b['id']; ?>" name="check[]" id="<?php echo $b['id']; ?>"
                                                               class=" allchecked2 singlecheck">
                                                    </td>
                                                    <td><?php echo $b['name']; ?></td>
                                                    <td><?php echo $b['mob']; ?></td>
                                                    <td><?php echo $b['dob']; ?></td>                                
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        <button type="submit" data-loading-text="Sending Please wait..." class="btn btn-success" id="bday">Send SMS
                                        </button>
                                    </form> 
                                </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="box panel-heading">
                            <span class="info-box-text"><b>Today's Student Fee Dues</b></span>
                                <div class='panel-body'>
                                    <form action="#" method="post" class="form">
                                        <table class="table table-bordered table-condensed">
                                            <tr>
                                                <th class="no_print"> 
                                                    <input type="checkbox" value="1" id="Allcheck2">
                                                </th>    
                                                <th>Name</th>
                                                <th>Mobile No</th>                              
                                            </tr>
                                            <?php foreach ($fee_dues as $b) { ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" value="<?php echo $b['id']; ?>" name="check[]" id="<?php echo $b['id']; ?>"
                                                               class=" allchecked2 singlecheck">
                                                    </td>
                                                    <td><?php echo $b['name']; ?></td>
                                                    <td><?php echo $b['mob']; ?></td>                               
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        <button type="submit" data-loading-text="Sending Please wait..." class="btn btn-success" id="bday">Send SMS
                                        </button>
                                    </form> 
                                </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>

            </div>

        </div>
</div>