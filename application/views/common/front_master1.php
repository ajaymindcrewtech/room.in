<!DOCTYPE html>
<head>
<title>DSOI Jabalpur</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?php echo base_url() ?>front/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo base_url() ?>front/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo base_url() ?>front/css/font.css" type="text/css"/>
<link href="<?php echo base_url() ?>front/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?php echo base_url() ?>front/js/jquery2.0.3.min.js"></script>
<script src="<?php echo base_url() ?>front/js/modernizr.js"></script>
<script src="<?php echo base_url() ?>front/js/jquery.cookie.js"></script>
<script src="<?php echo base_url() ?>front/js/screenfull.js"></script>
<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}
			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
</script>

<!--skycons-icons-->
<script src="<?php echo base_url() ?>front/js/skycons.js"></script>
<!--//skycons-icons-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>front/css/table-style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>front/css/basictable.css" />
<script type="text/javascript" src="<?php echo base_url() ?>front/js/jquery.basictable.min.js"></script>

</head>
<body class="dashboard-page">
<?php $user=$this->session->userdata('rf_member');
       $name=$this->Member_model->get_by_rfid($user);
?>
	<nav class="main-menu">
          
		<ul>
			<li>
				<a href="<?php echo base_url()?>front_member/member_view_front">
					<i class="fa fa-home nav_icon"></i>
					<span class="nav-text">Home</span>
				</a>
			</li>
			<!--<li>
				<a href="#">
					<i class="fa fa-bar-chart nav_icon"></i>
					<span class="nav-text">Membership</span>
				</a>
			</li>
-->
			<li>
				<a href="<?php echo base_url('front_member/view_by_member/'.$user) ?>">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<span class="nav-text">View Members</span>
				</a>
			</li>
                        <li>
				<a href="<?php echo base_url('front_member/all_transaction/'.$user.'/'.$name['member_code']) ?>">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<span class="nav-text">All Transaction</span>
				</a>
			</li>
            <li>
				<a href="<?php echo base_url()?>front_member/member_deactivate">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<span class="nav-text">Card Deactivate</span>
				</a>
			</li>
			<li>
                            <a href="<?php echo base_url();?>front_member/logout_mem">
                <i class="icon-off nav-icon"></i>
                <span class="nav-text">Logout</span>
                </a>
			</li>
		</ul>
</nav>
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
		  <i class="icon-reorder"></i>			</a>		</nav>
		<section class="title-bar">
			<div class="logo">
				<h1><a href="index.html"><img src="<?php echo base_url() ?>front/images/logo.jpg" alt="" />DSOI JABALPUR</a></h1>
			</div>
<!--			<div class="full-screen">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
				</section>
			</div>-->
			
			<div class="header-right">
				<div class="profile_details_left">
					<div class="header-right-left">
						<!--notifications of menu start -->
                                                <ul class="nofitications-dropdown">
                                                       <?php echo 'Welcome '.$name['member_fname']." ".$name['member_lname'];?> 
							<div class="clearfix"> </div>
						</ul>
					</div>	
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#">
									<div class="profile_img">	
                                       <span class="prfil-img"><!--<img src="<?php //echo base_url().$name['member_img'] ?>" alt="" style="width: 50px;height: 50px"/>--></span> 
										<div class="clearfix"></div>	
									</div>	
								</a>
								
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</section>
			
 <?php $this->load->view($content); ?>
		<!-- footer -->
		<div class="footer">
			<p>© 2018 DSOIJabalpur. All Rights Reserved.</p>
		</div>
		<!-- //footer -->
</section>
	<script src="<?php echo base_url() ?>front/js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>front/js/proton.js"></script>
</body>
</html>
