<?php

$session = $this->session->userdata('cvm_admin_in');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Dsoi</title>
<script src="<?php echo base_url(); ?>backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>backend/sweet/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/sweet/sweetalert.css">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>Dsoi</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Dsoi</b></span> </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <!--          <li class="dropdown messages-menu">

                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                          <i class="fa fa-envelope-o"></i>

                                          <span class="label label-success">4</span>

                                        </a>

                                        <ul class="dropdown-menu">

                                          <li class="header">You have 4 messages</li>

                                          <li>

                                             inner menu: contains the actual data 

                                            <ul class="menu">

                                              <li> start message 

                                                <a href="#">

                                                  <div class="pull-left">

                                                    <img src="<?php echo base_url(); ?>backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                                  </div>

                                                  <h4>

                                                    Support Team

                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>

                                                  </h4>

                                                  <p>Why not buy a new awesome theme?</p>

                                                </a>

                                              </li>

                                               end message 

                                              <li>

                                                <a href="#">

                                                  <div class="pull-left">

                                                    <img src="<?php echo base_url(); ?>backend/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">

                                                  </div>

                                                  <h4>

                                                    AdminLTE Design Team

                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>

                                                  </h4>

                                                  <p>Why not buy a new awesome theme?</p>

                                                </a>

                                              </li>

                                              <li>

                                                <a href="#">

                                                  <div class="pull-left">

                                                    <img src="<?php echo base_url(); ?>backend/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">

                                                  </div>

                                                  <h4>

                                                    Developers

                                                    <small><i class="fa fa-clock-o"></i> Today</small>

                                                  </h4>

                                                  <p>Why not buy a new awesome theme?</p>

                                                </a>

                                              </li>

                                              <li>

                                                <a href="#">

                                                  <div class="pull-left">

                                                    <img src="<?php echo base_url(); ?>backend/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">

                                                  </div>

                                                  <h4>

                                                    Sales Department

                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>

                                                  </h4>

                                                  <p>Why not buy a new awesome theme?</p>

                                                </a>

                                              </li>

                                              <li>

                                                <a href="#">

                                                  <div class="pull-left">

                                                    <img src="<?php echo base_url(); ?>backend/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">

                                                  </div>

                                                  <h4>

                                                    Reviewers

                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>

                                                  </h4>

                                                  <p>Why not buy a new awesome theme?</p>

                                                </a>

                                              </li>

                                            </ul>

                                          </li>

                                          <li class="footer"><a href="#">See All Messages</a></li>

                                        </ul>

                                      </li>-->
        <!-- Notifications: style can be found in dropdown.less -->
        <!--          <li class="dropdown notifications-menu">

                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                          <i class="fa fa-bell-o"></i>

                                          <span class="label label-warning">10</span>

                                        </a>

                                        <ul class="dropdown-menu">

                                          <li class="header">You have 10 notifications</li>

                                          <li>

                                             inner menu: contains the actual data 

                                            <ul class="menu">

                                              <li>

                                                <a href="#">

                                                  <i class="fa fa-users text-aqua"></i> 5 new members joined today

                                                </a>

                                              </li>

                                              <li>

                                                <a href="#">

                                                  <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the

                                                  page and may cause design problems

                                                </a>

                                              </li>

                                              <li>

                                                <a href="#">

                                                  <i class="fa fa-users text-red"></i> 5 new members joined

                                                </a>

                                              </li>

                                              <li>

                                                <a href="#">

                                                  <i class="fa fa-shopping-cart text-green"></i> 25 sales made

                                                </a>

                                              </li>

                                              <li>

                                                <a href="#">

                                                  <i class="fa fa-user text-red"></i> You changed your username

                                                </a>

                                              </li>

                                            </ul>

                                          </li>

                                          <li class="footer"><a href="#">View all</a></li>

                                        </ul>

                                      </li>-->
        <!-- Tasks: style can be found in dropdown.less -->
        <!--          <li class="dropdown tasks-menu">

                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                          <i class="fa fa-flag-o"></i>

                                          <span class="label label-danger">9</span>

                                        </a>

                                        <ul class="dropdown-menu">

                                          <li class="header">You have 9 tasks</li>

                                          <li>

                                             inner menu: contains the actual data 

                                            <ul class="menu">

                                              <li> Task item 

                                                <a href="#">

                                                  <h3>

                                                    Design some buttons

                                                    <small class="pull-right">20%</small>

                                                  </h3>

                                                  <div class="progress xs">

                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                                                      <span class="sr-only">20% Complete</span>

                                                    </div>

                                                  </div>

                                                </a>

                                              </li>

                                               end task item 

                                              <li> Task item 

                                                <a href="#">

                                                  <h3>

                                                    Create a nice theme

                                                    <small class="pull-right">40%</small>

                                                  </h3>

                                                  <div class="progress xs">

                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                                                      <span class="sr-only">40% Complete</span>

                                                    </div>

                                                  </div>

                                                </a>

                                              </li>

                                               end task item 

                                              <li> Task item 

                                                <a href="#">

                                                  <h3>

                                                    Some task I need to do

                                                    <small class="pull-right">60%</small>

                                                  </h3>

                                                  <div class="progress xs">

                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                                                      <span class="sr-only">60% Complete</span>

                                                    </div>

                                                  </div>

                                                </a>

                                              </li>

                                               end task item 

                                              <li> Task item 

                                                <a href="#">

                                                  <h3>

                                                    Make beautiful transitions

                                                    <small class="pull-right">80%</small>

                                                  </h3>

                                                  <div class="progress xs">

                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                                                      <span class="sr-only">80% Complete</span>

                                                    </div>

                                                  </div>

                                                </a>

                                              </li>

                                               end task item 

                                            </ul>

                                          </li>

                                          <li class="footer">

                                            <a href="#">View all tasks</a>

                                          </li>

                                        </ul>

                                      </li>-->
        <li class="dropdown notifications-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share-alt"></i> <span class="label label-warning count-li"></span> </a>
          <ul class="dropdown-menu">
            <!--                                          <li class="header">You have following quick link</li>-->
            <li> </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php /*if ($this->customlib->read_admin_image()->image != "") { ?>
          <img src="<?php echo base_url() . '' . $this->customlib->read_admin_image()->image; ?>" class="user-image" alt="User Image">
          <?php } else {*/ ?>
          <img src="<?php echo base_url(); ?>images/admin_image/default.jpg" class="user-image" alt="User Image">
          <?php //}?>
          <span class="hidden-xs"><?php echo "Dsoi";//$session['first_name'] . ' ' . $session['last_name']; ?></span> </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <?php /* if ($this->customlib->read_admin_image()->image != "") { ?>
              <img src="<?php echo base_url() . '' . $this->customlib->read_admin_image()->image; ?>" class="img-circle" alt="User Image">
              <?php } else {*/ ?>
              <img src="<?php echo base_url(); ?>images/admin_image/default.jpg" class="img-circle" alt="User Image">
              <?php //} ?>
              <p> <?php //echo $session['first_name'] . ' ' . $session['last_name']; ?> <small>Dsoi</small> </p>
            </li>
            <li class="user-footer">
              <div class="pull-left"> <a href="<?php echo base_url(); ?>admin/profile/profileView" class="btn btn-default btn-flat">Profile</a> </div>
              <div class="pull-right"> <a href="<?php echo base_url(); ?>site/logout" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
</header>
