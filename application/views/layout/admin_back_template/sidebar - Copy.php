<?php
$session = $this->session->userdata('cvm_admin_in');
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if ($this->customlib->read_admin_image()->image != "") { ?>
                    <img src="<?php echo base_url() . '' . $this->customlib->read_admin_image()->image; ?>" class="img-circle" alt="User Image">
                <?php } else { ?>    
                    <img src="<?php echo base_url(); ?>images/admin_image/default.jpg" class="img-circle" alt="User Image">
                <?php } ?>

            </div>
            <div class="pull-left info">
                <p><?php echo $session['first_name'] . ' ' . $session['last_name']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!--      <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo base_url(); ?>admin/profile/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>Personal Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/profile/profileView"><i class="fa fa-circle-o"></i> View Profile</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/profile/changPassword"><i class="fa fa-circle-o"></i> Change Password</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-globe"></i>
                    <span>Location Catalogue</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/country/index"><i class="fa fa-circle-o"></i> Countries</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/state/index"><i class="fa fa-circle-o"></i> States</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/city/index"><i class="fa fa-circle-o"></i> Cities</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/area/index"><i class="fa fa-circle-o"></i> Area</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Education Catalogue</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/ugdegree/index"><i class="fa fa-circle-o"></i> Graduation</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/pgdegree/index"><i class="fa fa-circle-o"></i> Post Graduataion</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/university/index"><i class="fa fa-circle-o"></i> Universities</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/college/index"><i class="fa fa-circle-o"></i> Colleges</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/language/index"><i class="fa fa-circle-o"></i> Language</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i>
                    <span>Service Catalogue</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/industry/index"><i class="fa fa-circle-o"></i> Sectors</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/functionality/index"><i class="fa fa-circle-o"></i> Functional Area</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/skill/index"><i class="fa fa-circle-o"></i> Skill</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/roll/index"><i class="fa fa-circle-o"></i> Role</a></li>
                </ul>
            </li>
            <?php /*?><li class="treeview">
                <a href="#">
                    <i class="fa fa-life-ring"></i>
                    <span>Theme Catalogue</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                	                    <li><a href="<?php echo base_url(); ?>admin/Theme_type/index"><i class="fa fa-circle-o"></i> Web Theme Type</a></li>

                    <li><a href="<?php echo base_url(); ?>admin/theme/webIndex"><i class="fa fa-circle-o"></i> Web Theme</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/theme/resumeIndex"><i class="fa fa-circle-o"></i> Resume Theme</a></li>
                    
                </ul>
            </li><?php */?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pied-piper-alt"></i>
                    <span>Job</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <?php /*?>  <li><a href="<?php echo base_url(); ?>admin/jobcategory/index"><i class="fa fa-pied-piper-alt"></i> <span>job's category</span></a></li><?php */?>
                    <li><a href="<?php echo base_url(); ?>admin/job/add"><i class="fa fa-pied-piper-alt"></i> <span>Add job</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/job/index"><i class="fa fa-pied-piper-alt"></i> <span>jobs's</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/job/pending"><i class="fa fa-pied-piper-alt"></i> <span>Pending jobs's</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/job/rejected"><i class="fa fa-pied-piper-alt"></i> <span>Rejected jobs's</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/appliedjob/index"><i class="fa fa-pied-piper-alt"></i> <span>Applied jobs's</span></a></li>
                    
                </ul>
            </li>
             <li>
                <a href="<?php echo base_url(); ?>admin/job/index"><i class="fa fa-pied-piper-alt"></i> <span>jobs's</span></a>
            </li> 
            <li>
                <a href="<?php echo base_url(); ?>admin/recruiter/index"><i class="fa fa-user-secret"></i> <span>Recruiter's</span></a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url(); ?>admin/seeker/index"><i class="fa fa-users"></i> <span>Seeker's</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span></a>
                    
                    
                    <ul class="treeview-menu">
                    
					<!--<li><a href="<?php echo base_url(); ?>admin/seeker/domain"><i class="fa fa-users"></i> <span>Domain Seeker's</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span></a></li>
                   -->
                    
                     <li><a href="<?php echo base_url(); ?>admin/seeker/wpage"><i class="fa fa-users"></i> <span>Wpage Seeker's</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span></a></li>
                    <!--
                     <li><a href="<?php echo base_url(); ?>admin/seeker/index"><i class="fa fa-users"></i> <span>Void Seeker's</span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span></a></li>
-->                    
                  </ul>
                    
                    
                    
                    
                    
                    
                    
            </li>
            
            <li>
                <a href="<?php echo base_url(); ?>admin/crm/index"><i class="fa fa-users"></i> <span>CRM's</span></a>
            </li>
              <li>
                <a href="<?php echo base_url(); ?>admin/news/index"><i class="fa fa-newspaper-o"></i> <span>News Letter</span></a>
            </li>
            
            
            	<li>
                <a href="<?php echo base_url(); ?>admin/Empnews/index"><i class="fa fa-newspaper-o"></i> <span>Emp News</span></a>
            </li>
            
             <li>
                <a href="<?php echo base_url(); ?>admin/about/index"><i class="fa fa-user-secret"></i> <span>Say About</span></a>
            </li>
            
            
            
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-pied-piper-alt"></i>
                    <span>CMS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/page/index"><i class="fa fa-pied-piper-alt"></i> <span>Page</span></a></li>
                    
                     <li><a href="<?php echo base_url(); ?>admin/Expage/index"><i class="fa fa-pied-piper-alt"></i> <span>External Page</span></a></li>
                    
                    <li><a href="<?php echo base_url(); ?>admin/menu/index"><i class="fa fa-pied-piper-alt"></i> <span>Menu</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/social/add"><i class="fa fa-pied-piper-alt"></i> <span>Social</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/slider/index"><i class="fa fa-pied-piper-alt"></i> <span>Slider</span></a></li>
                     <li><a href="<?php echo base_url(); ?>admin/settings/index"><i class="fa fa-pied-piper-alt"></i> <span>Settings</span></a></li>
                       <li><a href="<?php echo base_url(); ?>admin/link/index"><i class="fa fa-pied-piper-alt"></i> <span>Quick Link</span></a></li>
                </ul>
            </li>
            

              <li class="treeview">
                <a href="#">
                    <i class="fa fa-pied-piper-alt"></i>
                    <span>Supports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/helpline/index"><i class="fa fa-pied-piper-alt"></i> <span>Helpline</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/email_support/index"><i class="fa fa-pied-piper-alt"></i> <span>Email Support</span></a></li>
                    
                    <li><a href="<?php echo base_url(); ?>admin/faqcat/index"><i class="fa fa-pied-piper-alt"></i> <span>FAQ Category</span></a></li>
                    
                    <li><a href="<?php echo base_url(); ?>admin/faq/index"><i class="fa fa-pied-piper-alt"></i> <span>FAQ</span></a></li>
                </ul>
            </li>
            
            
            
            

                 
            <!--        <li class="treeview">
                      <a href="#">
                        <i class="fa fa-share"></i> <span>Multilevel</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                          <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
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
                    </li>-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
