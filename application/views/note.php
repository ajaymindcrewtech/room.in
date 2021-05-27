 <style type="text/css">
   
   @media (min-width: 12px)
.container {
    width: 11px;
    height:20px;
}

 </style>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Note <?php //echo $button ?>          
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- ******************/master header end ****************** -->

                        <!DOCTYPE html>
<html lang="en">
<!-- <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> -->
<body>
<div class="col-xs-12">
<div class="container" style="width: 650px;">
  <h2></h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        

         
         <div class="item active">
        <img src="<?php echo base_url($noti->image); ?>" alt="Los Angeles" style="width:100%;">
      </div>

     
      

   <!--    <div class="item">
        <img src="<?php echo base_url($noti->image); ?>" alt="Chicago" style="width:50%;">
      </div> -->
    
      <div class="item">
        <img src="<?php echo base_url($noti->image); ?>" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</div>


<div class="col-md-6" style="margin-top: 30px;">
         <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
                <?php echo $noti->description;  ?>
               
              </div>
        </div>

</body>
</html>


                       

                  

                <!--   <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div> -->
        
     <!-- ******************/master footer ****************** -->
                    </div>
                   </div>
                </div>
            </div>
    </section>
    </div>


























                 
                 