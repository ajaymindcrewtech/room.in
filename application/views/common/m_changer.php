<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Institute Management</title>
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
                    <span class="logo-lg"><b>Institute</b>MNG</span>
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Administrator</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            Administrator - Institute
                                            <small></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <!--                <div class="pull-left">
                                                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                                                        </div>-->
                                        <div class="pull-right">
                                            <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
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
            <!-- Content Wrapper. Contains page content -->
            <?php $this->load->view($content); ?>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.5
                </div>
                <strong>Copyright &copy;<?php date('Y');?> <a href="http://YellowZacket.com">YellowZacket.com</a>.</strong> All rights
                reserved.
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->

                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Other sets of options are available
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
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


<!--        <script>
            $(document).ready(function () {

                var i = 1;
                $("#add_row").click(function () {
                    $('#addr' + i).html("<td>" + (i + 1) + "</td><td><label class='input'><input  name='item_dispatch[]' type='text' placeholder='Items Of Dispatch'  class='form-control input-md'></td><td><label class='input'><input  name='quantity[]' type='text' placeholder='Quantity'  class='form-control input-md'></td>");
                    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                    i++;
                });
                $("#delete_row").click(function () {
                    if (i > 1) {
                        $("#addr" + (i - 1)).html('');
                        i--;
                    }
                });
            });
            $(function () {
                //  $('#dep_date').datepicker({
                //                    autoclose: true
                //                });
                //                $('#expect_time').datepicker({
                //                    autoclose: true
                //                });
                $("#expect_time").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                $("#dep_date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            });

            $(document).on('focus', '.autocomplete', function () {
                type = $(this).data('type');
                //alert(type);
                if (type === 'clientCompanyName')
                    autoTypeNo = 0;
                //if(type =='productName' )autoTypeNo=1;

                $(this).autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: '<?php echo base_url('requesting_data/git_employename') ?>',
                            dataType: "json",
                            method: 'post',
                            data: {
                                name_startsWith: request.term,
                                type: type
                            },
                            success: function (data) {
                                response($.map(data, function (item) {
                                    var code = item.split("|");
                                    return {
                                        label: code[autoTypeNo],
                                        value: code[autoTypeNo],
                                        data: item
                                    }
                                }));
                            }
                        });
                    },
                    autoFocus: true,
                    minLength: 0,
                    select: function (event, ui) {
                        var names = ui.item.data.split("|");
                        id_arr = $(this).attr('id');
                        id = id_arr.split("_");
                        $('#from_adress').val(names[1]);
                        $('#from_mobile').val(names[2]);

                        //$('#quantity_'+id[1]).val(1);
                        //$('#price_'+id[1]).val(names[2]);
                        //$('#total_'+id[1]).val( 1*names[2] );
                        //calculateTotal();
                    }
                });
            });
            $(document).on('focus', '.autocomplete_txtc', function () {
                type = $(this).data('type');
                //alert(type);
                if (type === 'clientCompanyName1')
                    autoTypeNo = 0;
                //if(type =='productName' )autoTypeNo=1;

                $(this).autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: '<?php echo base_url('requesting_data/git_employename1') ?>',
                            dataType: "json",
                            method: 'post',
                            data: {
                                name_startsWith: request.term,
                                type: type
                            },
                            success: function (data) {
                                response($.map(data, function (item) {
                                    var code = item.split("|");
                                    return {
                                        label: code[autoTypeNo],
                                        value: code[autoTypeNo],
                                        data: item
                                    }
                                }));
                            }
                        });
                    },
                    autoFocus: true,
                    minLength: 0,
                    select: function (event, ui) {
                        var names = ui.item.data.split("|");
                        id_arr = $(this).attr('id');
                        id = id_arr.split("_");
                        $('#where_address').val(names[1]);
                        $('#where_mobile').val(names[2]);

                        //$('#quantity_'+id[1]).val(1);
                        //$('#price_'+id[1]).val(names[2]);
                        //$('#total_'+id[1]).val( 1*names[2] );
                        //calculateTotal();
                    }
                });
            });
        </script>-->

    </body>
</html>
