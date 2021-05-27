<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer <?php  ?>          
            <small></small>
        </h1>
    </section>

<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/images') ?>/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $res->name  ?></h3>

              <p class="text-muted text-center">Customer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
         
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Payment</a></li>
              <li><a href="#timeline" data-toggle="tab">expense</a></li>
              <li><a href="#settings" data-toggle="tab">Balance</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              
             
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
               
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
              
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  </div>