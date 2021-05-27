 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

         <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" style="margin-top: 15px;">

        </div>

        <div class="pull-left info">

          <?php $name= $this->session->userdata('name');

                $log_id= $this->session->userdata('reg_id');

          ?>

          <p style="margin-top: 8px;"><?php echo $name.'-'.$log_id; ?></p>

          <?php $type= $this->session->userdata('type'); 

                if($type==1){

                  $login='Admin';

                }else if($type==2){

                  $login='Employee';

                }else{

                  $login='User';

                }

          ?>

          <a href="#"><i class="fa fa-circle text-success" style="margin-top: 8px;"></i><?php echo $login; ?> - Online</a>

        </div>

      </div>

      <!-- search form -->

     <!--  <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

              <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                </button>

              </span>

        </div>

      </form> -->

      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">

          <a href="<?php echo base_url('dashboard') ?>">

            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

            <span class="pull-right-container">

              <!-- <i class="fa fa-angle-left pull-right"></i> -->

            </span>

          </a>

         <a href="<?php echo base_url('note/note_page') ?>">

            <i class="fa fa-dashboard"></i> <span>Notice</span>

            <span class="pull-right-container">

              <!-- <i class="fa fa-angle-left pull-right"></i> -->

            </span>

          </a>

        </li>



         <!-- <li class="treeview">

          <a href="<?php echo base_url('allotment') ?>">

            <i class="fa fa-files-o"></i>

            <span>Allotment Management</span>

            <span class="pull-right-container">

              <span class="label label-primary pull-right">4</span>

            </span>

          </a>

        

        </li> -->



        <li class="treeview">

          <a href="<?php echo base_url('revenue') ?>">

            <i class="fa fa-files-o"></i>

            <span>Revenue Management</span>

            <span class="pull-right-container">

              <!-- <span class="label label-primary pull-right">4</span> -->

            </span>

          </a>

         

        </li> 


        <li class="treeview">

          <a href="#">

            <i class="fa fa-edit"></i> <span>Expense</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('expense') ?>"><i class="fa fa-circle-o"></i>Expense</a></li>

            <li><a href="<?php echo base_url('emp_to_emp') ?>"><i class="fa fa-circle-o"></i>Emp To Emp</a></li>

            <li><a href="<?php base_url('refund') ?>"><i class="fa fa-circle-o"></i> Refund</a></li>

          </ul>

        </li>


        <!-- <li class="treeview">

          <a href="<?php echo base_url('income_register') ?>">

            <i class="fa fa-files-o"></i>

            <span>Income Register</span>

            <span class="pull-right-container">

              <span class="label label-primary pull-right">4</span>

            </span>

          </a>      

        </li> -->



        
         <li class="treeview">

          <a href="<?php echo base_url('balance_sheet') ?>">

            <i class="fa fa-files-o"></i>

            <span>Balance Sheet</span>

            <span class="pull-right-container">

              <!-- <span class="label label-primary pull-right">4</span> -->

            </span>

          </a>

       

        </li>


         <li class="treeview">

          <a href="<?php echo base_url('complain') ?>">

            <i class="fa fa-files-o"></i>

            <span>Complain</span>

            <span class="pull-right-container">

           </span>

          </a>

         

        </li>



          



        

<!-- 

        <li class="treeview">

          <a href="#">

            <i class="fa fa-pie-chart"></i>

            <span>Charts</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>

            <li><a href="charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>

            <li><a href="charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>

            <li><a href="charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>

          </ul>

        </li> -->



      <!--   <li class="treeview">

          <a href="#">

            <i class="fa fa-laptop"></i>

            <span>UI Elements</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>

            <li><a href="UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>

            <li><a href="UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>

            <li><a href="UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>

            <li><a href="UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>

            <li><a href="UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>

          </ul>

        </li> -->



     <!--    <li class="treeview">

          <a href="#">

            <i class="fa fa-edit"></i> <span>Forms</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>

            <li><a href="forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>

            <li><a href="forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>

          </ul>

        </li>

 -->

        <!-- <li class="treeview">

          <a href="#">

            <i class="fa fa-table"></i> <span>Tables</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>

            <li><a href="tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>

          </ul>

        </li> -->



       <!--  <li>

          <a href="calendar.html">

            <i class="fa fa-calendar"></i> <span>Calendar</span>

            <span class="pull-right-container">

              <small class="label pull-right bg-red">3</small>

              <small class="label pull-right bg-blue">17</small>

            </span>

          </a>

        </li>



        <li>

          <a href="mailbox/mailbox.html">

            <i class="fa fa-envelope"></i> <span>Mailbox</span>

            <span class="pull-right-container">

              <small class="label pull-right bg-yellow">12</small>

              <small class="label pull-right bg-green">16</small>

              <small class="label pull-right bg-red">5</small>

            </span>

          </a>

        </li> -->



       <!--  <li class="treeview">

          <a href="#">

            <i class="fa fa-folder"></i> <span>Examples</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>

            <li><a href="examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>

            <li><a href="examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>

            <li><a href="examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>

            <li><a href="examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>

            <li><a href="examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>

            <li><a href="examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>

            <li><a href="examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>

            <li><a href="examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>

          </ul>

        </li>



        <li class="treeview">

          <a href="#">

            <i class="fa fa-share"></i> <span>Multilevel</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>

            <li class="treeview">

              <a href="#"><i class="fa fa-circle-o"></i> Level One

                <span class="pull-right-container">

                  <i class="fa fa-angle-left pull-right"></i>

                </span>

              </a>

              <ul class="treeview-menu">

                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>

                <li class="treeview">

                  <a href="#"><i class="fa fa-circle-o"></i> Level Two

                    <span class="pull-right-container">

                      <i class="fa fa-angle-left pull-right"></i>

                    </span>

                  </a>

                  <ul class="treeview-menu">

                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>

                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>

                  </ul>

                </li>

              </ul>

            </li>

            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>

          </ul>

        </li> -->



        <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->

        <li class="header">Supported Management</li>

        <!-- <li class="treeview">

          <a href="<?php echo base_url('customer') ?>">

            <i class="fa fa-files-o"></i>

            <span>Customer Management</span>

            <span class="pull-right-container"></span>

          </a>

         </li> -->



     <!--    <li class="active">

          <a href="<?php echo base_url('employee') ?>">

            <i class="fa fa-th"></i> <span>Employee Management</span>

         

          </a>

        </li> -->

       <!--  <li class="treeview">

          <a href="#">

            <i class="fa fa-table"></i> <span>Building Management</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('building') ?>"><i class="fa fa-circle-o"></i>Create Building</a></li>

            <li><a href="<?php echo base_url('buil_details') ?>"><i class="fa fa-circle-o"></i>Crate Building Details</a></li>



          </ul>

           <li><a href="<?php echo base_url('payment_mode') ?>"><i class="fa fa-circle-o"></i>Payment mode</a></li>

           <li><a href="<?php echo base_url('login_create') ?>"><i class="fa fa-circle-o"></i>Login</a></li>

        </li>

 -->      

      </ul>

    </section>

    <!-- /.sidebar -->

  </aside>