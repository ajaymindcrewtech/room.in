<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        
            <small>Manager</small>
           <span><?php echo $this->session->userdata('mess') ?></span>
        </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $customer ?></h3>

              <p>Customer</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-bag"></i> -->
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $emp ?><sup style="font-size: 20px"></sup></h3>

              <p>Employee</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-stats-bars"></i> -->
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Payment</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-person-add"></i> -->
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Expense</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-pie-graph"></i> -->
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </section>
        

</div>       
        
