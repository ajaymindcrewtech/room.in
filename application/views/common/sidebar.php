<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

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
                            <a href="<?php echo base_url('dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right"></span>
                                </span>
                            </a>

                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Member Register</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('member/add'); ?>"><i class="fa fa-circle-o"></i> Add Member</a></li>
                                <li><a href="<?php echo base_url('member'); ?>"><i class="fa fa-circle-o"></i> Manage Member</a></li>
                            </ul>
                        </li> 
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Food Item</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('item/create'); ?>"><i class="fa fa-circle-o"></i> Add Items</a></li>
                                <li><a href="<?php echo base_url('item'); ?>"><i class="fa fa-circle-o"></i> Manage Items</a></li>
                            </ul>
                        </li> 
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Event</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('dsoi_event/create'); ?>"><i class="fa fa-circle-o"></i> Add Event</a></li>
                                <li><a href="<?php echo base_url('dsoi_event'); ?>"><i class="fa fa-circle-o"></i> Manage Event</a></li>
                                <li><a href="<?php echo base_url('front/show'); ?>"><i class="fa fa-circle-o"></i> Show Menu</a></li>
                            </ul>
                        </li> 

                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>MemberShip Fee</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('dsoi_membership_fee/create'); ?>"><i class="fa fa-circle-o"></i> Add Fee</a></li>
                                <li><a href="<?php echo base_url('dsoi_membership_fee'); ?>"><i class="fa fa-circle-o"></i> Manage Fee</a></li>
                            </ul>
                        </li> 
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Users</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('users/add'); ?>"><i class="fa fa-circle-o"></i> Add Users</a></li>
                                <li><a href="<?php echo base_url('users'); ?>"><i class="fa fa-circle-o"></i> Manage Users</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Settings</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('category'); ?>"><i class="fa fa-circle-o"></i>Category</a></li>
                            </ul>
                        </li>

                        <li class="header">LABELS</li>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Report</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Label</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Manifest</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar print/consignment_manifest-->
            </aside>

            <!-- Content Wrapper. Contains page content -->

  
<script>
  $("#<?= $cur_tab; ?>").addClass('active');
</script>
