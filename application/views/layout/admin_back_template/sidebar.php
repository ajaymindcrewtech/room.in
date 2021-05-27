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
        <?php /*if ($this->customlib->read_admin_image()->image != "") { ?>
        <img src="<?php echo base_url() . '' . $this->customlib->read_admin_image()->image; ?>" class="img-circle" alt="User Image">
        <?php } else {*/ ?>
        <img src="<?php echo base_url(); ?>images/admin_image/default.jpg" class="img-circle" alt="User Image">
        <?php //}?>
      </div>
      <div class="pull-left info">
        <p><?php echo "DSOI";//echo $session['first_name'] . ' ' . $session['last_name']; ?></p>
        <?php /*?><a href="#"><i class="fa fa-circle text-success"></i> Online</a><?php */?> </div>
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
      <li class="treeview"> <a href="#"> <i class="fa fa-globe"></i> <span>Category</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/category/index"><i class="fa fa-circle-o"></i>View Category</a></li>
          <li><a href="<?php echo base_url(); ?>admin/category/add"><i class="fa fa-circle-o"></i> Add category</a></li>
          <li><a href="<?php echo base_url(); ?>admin/subcategory/index"><i class="fa fa-circle-o"></i>View SubCategory</a></li>
          <li><a href="<?php echo base_url(); ?>admin/subcategory/add"><i class="fa fa-circle-o"></i> Add Subcategory</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-globe"></i> <span>Product</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/productfood/index"><i class="fa fa-circle-o"></i>View Product(Food)</a></li>
          <li><a href="<?php echo base_url(); ?>admin/productfood/add"><i class="fa fa-circle-o"></i> Add Product(Food)</a></li>
          <li><a href="<?php echo base_url(); ?>admin/productliquor/index"><i class="fa fa-circle-o"></i>View Product(Liquor)</a></li>
          <li><a href="<?php echo base_url(); ?>admin/productliquor/add"><i class="fa fa-circle-o"></i> Add Product(Liquor)</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-book"></i> <span>Stock</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/stockliquor/index"><i class="fa fa-list-o"></i> View Liquor  Stock</a></li>
          <li><a href="<?php echo base_url(); ?>admin/stockliquor/index"><i class="fa fa-list-o"></i> Add Stock Liquor</a></li>
        </ul>
      </li>
      <li> <a href="<?php echo base_url(); ?>admin/faculty/index"><i class="fa fa-newspaper-o"></i> <span>Member</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/member/index"><i class="fa fa-users"></i> <span>View Member</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/member/add"><i class="fa fa-users"></i> <span>Add Member</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
        </ul>
      </li>      
      
     <?php /*?> 
      <li> <a href="<?php echo base_url(); ?>admin/profile/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a> </li>      
      <li class="treeview"> <a href="#"> <i class="fa fa-gears"></i> <span>Personal Setting</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/profile/profileView"><i class="fa fa-circle-o"></i> View Profile</a></li>
          <li><a href="<?php echo base_url(); ?>admin/profile/changPassword"><i class="fa fa-circle-o"></i> Change Password</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-globe"></i> <span>Menu</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/menu/index"><i class="fa fa-circle-o"></i> View Menu</a></li>
          <li><a href="<?php echo base_url(); ?>admin/menu/add"><i class="fa fa-circle-o"></i> Add Menu</a></li>
        </ul>
      </li>      
      <li class="treeview"> <a href="#"> <i class="fa fa-book"></i> <span>Slider</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/slider/index"><i class="fa fa-circle-o"></i> View Slider</a></li>
          <li><a href="<?php echo base_url(); ?>admin/slider/index"><i class="fa fa-circle-o"></i> Add Slider</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-link"></i> <span>Pages</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/page/index"><i class="fa fa-circle-o"></i> View Page</a></li>
          <li><a href="<?php echo base_url(); ?>admin/page/index"><i class="fa fa-circle-o"></i> Add Page</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-pied-piper-alt"></i> <span>Gallery</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <?php ?>  <li><a href="<?php echo base_url(); ?>admin/jobcategory/index"><i class="fa fa-pied-piper-alt"></i> <span>job's category</span></a></li><?php ?>
          <li><a href="<?php echo base_url(); ?>admin/album/index"><i class="fa fa-pied-piper-alt"></i> <span>View Album</span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/album/add"><i class="fa fa-pied-piper-alt"></i> <span>Add Album</span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/gallery/index"><i class="fa fa-pied-piper-alt"></i> <span>View Gallery</span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/gallery/add"><i class="fa fa-pied-piper-alt"></i> <span>Add Gallery</span></a></li>
        </ul>
      </li>
      <li> <a href="<?php echo base_url(); ?>admin/news/index"><i class="fa fa-pied-piper-alt"></i> <span>News and Event</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a>
        <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>admin/jobcategory/index"><i class="fa fa-pied-piper-alt"></i> <span>job's category</span></a></li><?php ?>
          <li><a href="<?php echo base_url(); ?>admin/news/index"><i class="fa fa-pied-piper-alt"></i> <span>View News and Event</span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/news/add"><i class="fa fa-pied-piper-alt"></i> <span>Add News and Event</span></a></li>
        </ul>
      </li>
      <li> <a href="<?php echo base_url(); ?>admin/trustee/index"><i class="fa fa-newspaper-o"></i> <span>Trustee</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/trustee/index"><i class="fa fa-users"></i> <span>View Trustee</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/trustee/add"><i class="fa fa-users"></i> <span>Add Trustee</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
        </ul>
      </li>
      <li> <a href="<?php echo base_url(); ?>admin/courses/index"><i class="fa fa-newspaper-o"></i> <span>Courses</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/courses/index"><i class="fa fa-users"></i> <span>View Courses</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/courses/add"><i class="fa fa-users"></i> <span>Add Courses</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
        </ul>
      </li>
      <li> <a href="<?php echo base_url(); ?>admin/faculty/index"><i class="fa fa-newspaper-o"></i> <span>Faculty</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/faculty/index"><i class="fa fa-users"></i> <span>View Facility</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/faculty/add"><i class="fa fa-users"></i> <span>Add Facility</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
        </ul>
      </li>
      <li> <a href="<?php echo base_url(); ?>admin/brochure/index"><i class="fa fa-newspaper-o"></i> <span>Brochure</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/brochure/index"><i class="fa fa-users"></i> <span>View Brochure</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
        </ul>
      </li>
      <li> <a href="<?php echo base_url(); ?>admin/jeevika/index"><i class="fa fa-newspaper-o"></i> <span>Jeevika</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>admin/jeevika/index"><i class="fa fa-users"></i> <span>View Jeevika</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/jeevika/add"><i class="fa fa-users"></i> <span>Add Jeevika</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span></a></li>
        </ul>
      </li>
      <?php */?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
