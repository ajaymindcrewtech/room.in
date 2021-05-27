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
                  
                    </ul>

                  <!--   <ul class="sidebar-menu">
                        <li class="header">Login Management</li>
                        <li class="treeview">
                        <a href="<?php echo base_url('login_create'); ?>">
                            <i class="fa fa-circle-o"></i> <span>Login</span>
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right"></span>
                            </span>
                        </a>
                    </li>
                  
                    </ul> -->
                     <ul class="sidebar-menu">
                        <!-- <li class="header">Customer Management</li> -->
                        <li class="treeview">
                        <a href="<?php echo base_url('customer'); ?>">
                            <i class="fa fa-table"></i> <span>Customer</span>
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right"></span>
                            </span>
                        </a>
                    </li>
                  
                    </ul>

                 <ul class="sidebar-menu">
                        <!-- <li class="header">Employee Management</li> -->
                      <li class="treeview">
                        <a href="<?php echo base_url('employee'); ?>">
                            <i class="fa fa-edit"></i> <span>Employee</span>
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right"></span>
                            </span>
                        </a>
                    </li>
                  </ul>

                     <ul class="sidebar-menu">
                        <!-- <li class="header">Payment Management</li> -->
                        <li class="treeview">
                        <a href="<?php echo base_url('payment'); ?>">
                            <i class="fa fa-circle-o"></i> <span>Payment</span>
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right"></span>
                            </span>
                        </a>
                    </li>
                  
                    </ul>
                   
                     <ul class="sidebar-menu">
                        <li class="header">Supported Cms</li>                                     
                    </li>
                    </ul>
                    
                  

               

                    
                
                       
                       
                      
                  
                  
                  

                                      
                    
                    
                </section>
                <!-- /.sidebar print/consignment_manifest-->
            </aside>