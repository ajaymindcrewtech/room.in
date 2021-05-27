<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>KOI</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/jquery-ui.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
        <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>-->
        <script src="<?php echo base_url() ?>assets/js/angular.js"></script>
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colors/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
         <!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datepicker/datepicker3.css">
        <script src="<?php echo base_url() ?>ckeditor/ckeditor.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>I</b>M</span>
                    <!-- logo for regular state and mobile devices -->
                    <?php
                    if($this->session->userdata('vendor_id')==''){
                        redirect(base_url('login_vendor'));
                    }
                    $user_set_name = $this->session->userdata('logo_name');
                 
                    ?>
                    <span class="logo-lg"><b><?php echo $user_set_name; ?>&nbsp;</b>KOI</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height:50px;">
                                    <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?= ucwords($this->session->userdata('name')); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $user = $this->session->userdata('name'); ?> ADMIN - KOI
                                            <small></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!--<li class="user-body">-->
                                    <!--    <div class="row">-->
                                    <!--        <div class="col-xs-4 text-center">-->
                                    <!--            <a href="#">Followers</a>-->
                                    <!--        </div>-->
                                    <!--        <div class="col-xs-4 text-center">-->
                                    <!--            <a href="#">Sales</a>-->
                                    <!--        </div>-->
                                    <!--        <div class="col-xs-4 text-center">-->
                                    <!--            <a href="#">Friends</a>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                        <!-- /.row -->
                                    <!--</li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?= site_url('admin/auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                        <div class="pull-left">
                                            <a href="<?= site_url('admin/auth/change_pwd'); ?>" class="btn btn-default btn-flat">Change Password</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>


            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= ucwords($this->session->userdata('name')); ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="<?php echo base_url('dashboard/vendor'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right"></span>
                                </span>
                            </a>

                        </li>
                      
                        
<!--                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Category</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                               
                                <li><a href="<?php echo base_url('dsoi_category'); ?>"><i class="fa fa-circle-o"></i> Manage Category</a></li>
                                
                                <li><a href="<?php echo base_url('dsoi_sub_category'); ?>"><i class="fa fa-circle-o"></i> Manage Sub Category</a></li>
                            </ul>
                        </li> 
                       -->
                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Product</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                           <ul class="treeview-menu">
                                <?php
                                $vendor_data=$this->db->get_where('dsoi_vendor',array('vendor_id'=>$this->session->userdata('vendor_id')))->row_array();
//                                print_r($vendor_data);
                                $category= $this->Dsoi_category_model->get_all_category();
                                                            if (!empty($category)) {
                                                                foreach ($category as $rl) {
                                                                   if($rl->cat_title == 'Liquor'){
                                                                       continue;
                                                                        }
                                                                        else if($rl->cat_id == $vendor_data['vendor_category'] ){
                                                                    ?>
                               
                                                                      <li><a href="<?php echo base_url('vendor/item/get_category/'.$rl->cat_id); ?>"><i class="fa fa-circle-o"></i> Manage <?php echo $rl->cat_title ?> </a></li>
                                                                        <?php 
                                                                } 
                                                                
                                                                       }
                                                            }
                                                            ?>
                               
                               
                                
                            </ul>
                        </li> 
<!--                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Event</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php //echo base_url('vendor/dsoi_event'); ?>"><i class="fa fa-circle-o"></i> Manage Event</a></li>
                                <li><a href="<?php //echo base_url('vendor/dsoi_event_product/show'); ?>"><i class="fa fa-circle-o"></i> Show Menu</a></li>
                            </ul>
                        </li> -->


						
					
                    </ul>
                </section>
                <!-- /.sidebar print/consignment_manifest-->
            </aside>

            <!-- Content Wrapper. Contains page content -->


            <?php $this->load->view($content); ?>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.5
                </div>
                <strong>Copyright &copy;<?php date('Y'); ?> <a href="#"></a>.</strong> All rights
                reserved.
            </footer>


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->

        <script src="<?php echo base_url() ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/jQueryUI/jquery-ui.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datepicker/datepicker3.css">
        <script src="<?php echo base_url() ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/admin/dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
         <!--<script src="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>-->
        <script src="<?php echo base_url() ?>assets/admin/plugins/chartjs/Chart.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="<?php echo base_url() ?>assets/admin/dist/js/pages/dashboard2.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.delay.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>


    </body>
</html>
