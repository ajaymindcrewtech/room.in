<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Consultancy</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Custom font family -->
<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">-->
<!-- External Files -->
<link href="<?php echo base_url();?>assets/frontend/css/animate.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/frontend/css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.lightbox-0.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.idTabs.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/frontend/css/jquery.lightbox-0.5.css">
									
<!-- Owl -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/frontend/js/owl/owl.carousel.min.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/frontend/js/owl/owl/animate.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/frontend/js/owl/owl.theme.default.min.css"/>    
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/owl/owl.carousel.js"></script>
<!-- Owl -->

<script src="<?php echo base_url();?>assets/frontend/js/jquery.easing.min.js"></script>
<!-- External Files -->

<!-- Flexislider -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/flexslider.css" type="text/css" media="screen" />
<script defer src="<?php echo base_url();?>assets/frontend/js/jquery.flexslider.js"></script>
<!-- Flexislider -->

<!-- Internal Files -->
<script src="<?php echo base_url();?>assets/frontend/js/all.js"></script>
<link href="<?php echo base_url();?>assets/frontend/fonts/font-awesome.css" rel="stylesheet" type="text/css" />
<!-- Internal Files -->
<!-- Mega Menu -->
 <link href="<?php echo base_url();?>assets/frontend/css/ddmenu.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo base_url();?>assets/frontend/js/ddmenu.js" type="text/javascript"></script>
<!-- Mega Menu -->
</head>
<body>
<!-- Header -->
<div class="main_header">
 <div class="wrapper">
	 <div class="logo"><a href="index.html"><img src="<?php echo base_url();?>assets/frontend/images/logo.png" alt=""/></a></div>
	
	<!-- Mega Menu -->
	<nav id="ddmenu">
    
    <ul>
        <li class="full-width">
            <span class="top-heading"><i class="fa fa-home" aria-hidden="true"></i><a href="<?php echo base_url();?>">Home</a></span>
           
<!--
<i class="caret"></i>
            <div class="dropdown">
                <div class="dd-inner">
                    <ul class="column">
                     <li><h3>Pellentesque</h3></li>
                        <li><a href="#">Fermentum ut nulla</a></li>
                        <li><a href="#">Duis ut mauris</a></li>
                        <li><h3>Volutpat</h3></li>
                        <li><a href="#">Quisque dictum</a></li>
                        <li><a href="#">Nulla scelerisque</a></li>

                        
                    </ul>
                    <ul class="column">
                        <li><h3>Suspendisse</h3></li>
                        <li><a href="#">Suspendisse potenti</a></li>
                        <li><a href="#">Curabitur in mauris</a></li>
                        <li><a href="#">Phasellus ultrices</a></li>
                        <li><a href="#">Quisque ornare</a></li>
                        <li><a href="#">Vestibulum</a></li>
                        <li><a href="#">Vitae tempus risus</a></li>
                    </ul>
                    <ul class="column mayHide">
                        <li><br /><img src="<?php echo base_url();?>assets/frontend/images/hp_service_icon1.jpg" /></li>
                    </ul>
                </div>
            </div>
-->
        </li>
        <li class="no-sub"><a class="top-heading" href="<?php echo base_url();?>about"><i class="fa fa-users" aria-hidden="true"></i>About Us</a></li>
       <!-- <li class="no-sub">
<a class="js-open-modal" href="#" data-modal-id="popup1"><i class="fa fa-handshake-o" aria-hidden="true"></i>Login</a>
        </li>-->
        <li>
            <span class="top-heading"><i class="fa fa-upload" aria-hidden="true"></i>Login</span>
               <i class="caret"></i>
               <div class="dropdown right-aligned login-aligned">
                <div class="dd-inner">
                    <ul class="column" style="text-align:center;">
                        <li>
                        <i class="fa fa-suitcase" aria-hidden="true" style="font-size:50px; color:#00e1fe"></i>
                        <h3>JOB SEEKER</h3>
                        </li>
                        <li style="font-size:17px;"><a class="js-open-modal" href="#" data-modal-id="popup2"><i style="display:inline-block" class="fa fa-handshake-o" aria-hidden="true"></i> Login </a></li>
						<li style="font-size:17px;"><a class="js-open-modal" href="#" data-modal-id="popup1"><i style="display:inline-block" class="fa fa-sign-in" aria-hidden="true"></i></i> Signup</a></li> 
                       
                    </ul>
                    <ul class="column" style="text-align:center;">
                        <li>
                        <i class="fa fa-users" aria-hidden="true" style="font-size:50px; color:#00e1fe"></i>
                        <h3>EMPLOYEER</h3></li>
                        <li style="font-size:17px;"><a class="js-open-modal" href="#" data-modal-id="popup3"><i style="display:inline-block" class="fa fa-handshake-o" aria-hidden="true"></i> Login </a></li>
                        <li style="font-size:17px;">&nbsp; &nbsp;<a href="<?php echo base_url()?>employeer_signup"><i style="display:inline-block" class="fa fa-sign-in" aria-hidden="true"></i>  Signup</a></li>
                    </ul>
                </div>
            </div>
               <!--
            <div class="dropdown offset300">
                <div class="dd-inner">
                    <ul class="column">
                        <li><br /><img src="<?php echo base_url();?>assets/frontend/images/hp_service_icon1.jpg" /></li>
                        <li><a class="js-open-modal" href="#" data-modal-id="popup1"><i class="fa fa-handshake-o" aria-hidden="true"></i>Job seeker</a></li>
                    </ul>
                    <ul class="column">
                      
                        <li><br /><img src="<?php echo base_url();?>assets/frontend/images/hp_service_icon1.jpg" /></li>
                        <li><a class="js-open-modal" href="#" data-modal-id="popup1"><i class="fa fa-handshake-o" aria-hidden="true"></i>Employeer</a></li>
                    </ul>
                    
                </div>
            </div> 
            -->
        </li>
        <li class="no-sub">
            <a class="top-heading" href="#"><i class="fa fa-fire" aria-hidden="true"></i>Hot Jobs</a>
            <i class="caret"></i>
            
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <ul class="column">
                        <li><a href="#">In tempus semper (1)</a></li>
                        <li><a href="#">Hendrerit tincidunt (1)</a></li>
                        <li><a href="#">Duis ut mauris (1)</a></li>
                        <li><a href="#">pretium amet (1)</a></li>
                        <li><a href="#">Vel faucibus leo (1)</a></li>
                        <li><a href="#">Duis ut mauris (1)</a></li>
                        <li><a href="#">In tempus semper (1)</a></li>
                        <li><a href="#">laoreet erat (1)</a></li>
                        <li><a href="#">In tempus semper (1)</a></li>
                        <li><a href="#">laoreet erat (1)</a></li>
                    </ul>
                    <ul class="column">
                        <li><a href="#">In tempus semper (1)</a></li>
                        <li><a href="#">Hendrerit tincidunt (1)</a></li>
                        <li><a href="#">Duis ut mauris (1)</a></li>
                        <li><a href="#">pretium amet (1)</a></li>
                        <li><a href="#">Vel faucibus leo (1)</a></li>
                        <li><a href="#">Duis ut mauris (1)</a></li>
                        <li><a href="#">In tempus semper (1)</a></li>
                        <li><a href="#">laoreet erat (1)</a></li>
                        <li><a href="#">In tempus semper (1)</a></li>
                        <li><a href="#">laoreet erat (1)</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <span class="top-heading"><i class="fa fa-paper-plane" aria-hidden="true"></i>Post Jobs</span>
            <i class="caret"></i>
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <ul class="column" style="text-align:center;">
                        <li>
                        
                        <i class="fa fa-book" aria-hidden="true" style="font-size:50px; color:#00e1fe"></i>
                        <h3>CLASSIFIED</h3>
                        </li>
                        <li style="font-size:17px;"><a class="js-open-modal" href="#" data-modal-id="popup3"><i style="display:inline-block" class="fa fa-handshake-o" aria-hidden="true"></i> Login </a></li>
                        <li style="font-size:17px;">&nbsp; &nbsp;<a href="<?php echo base_url();?>employeer_signup"><i style="display:inline-block" class="fa fa-sign-in" aria-hidden="true"></i>  Signup</a></li>
                    </ul>
                    <ul class="column" style="text-align:center;">
                        <li>
                        
                        <i class="fa fa-globe" aria-hidden="true" style="font-size:50px; color:#00e1fe"></i>
                        <h3>PREIMUM CLASSIFIED</h3></li>
                        <li style="font-size:17px;"><a class="js-open-modal" href="#" data-modal-id="popup3"><i style="display:inline-block" class="fa fa-handshake-o" aria-hidden="true"></i> Login </a></li>
                        <li style="font-size:17px;">&nbsp; &nbsp;<a href="<?php echo base_url();?>employeer_signup"><i style="display:inline-block" class="fa fa-sign-in" aria-hidden="true"></i>  Signup</a></li>
                    </ul>
                </div>
            </div>
            <!--
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <ul class="column">
                        <li><h3>Classified</h3></li>
                        
                    </ul>
                    <ul class="column">
                        <li><h3>Premium Classified</h3></li>
                        
                    </ul>
                </div>
            </div>
            -->
        </li>
         <li class="no-sub">
            <a href="<?php echo base_url();?>contact_us" class="js-open-modal"><i class="fa fa-phone" aria-hidden="true"></i>Contact Us</a>
        </li>
    </ul>
</nav>
	<!-- Mega Menu -->
	
	<div class="clr"></div>
</div>
	<div class="main_header_arrow"></div>
</div>
<!-- Header -->   

<div id="popup1" class="modal-box">
  <header> <a href="#" class="js-modal-close close">*</a>
    <h3>Sign Up</h3>
  </header>
  <div class="modal-body">
	  <div class="modal-body_box">
		  <div class="modal-body_icon"><img src="<?php echo base_url();?>assets/frontend/images/login_icon1.png" alt=""/></div>
	      <a href="<?php echo base_url();?>seeker_signup">I am a Fresher</a>
    </div>
	  <div class="modal-body_box">
	  <div class="modal-body_icon"><img src="<?php echo base_url();?>assets/frontend/images/login_icon2.png" alt=""/></div>
	  	<a href="<?php echo base_url();?>seeker_signup">I am a Professional </a>
	  </div>
	  <div class="clr"></div>
  </div>
</div>

<div id="popup2" class="modal-box">
  <header> <a href="#" class="js-modal-close close">*</a>
    <h3>Job Seeker Login</h3>
  </header>
  <form action="<?php echo base_url() ?>seekerLogin" name="loginfrm" method="post">
  <div class="modal-body">
      <div class="signup_box_main">
	  <div class="sign_up_input"><input type="text" name="mobile_no" id="login" value="<?php echo set_value('mobile_no') ?>" placeholder="Mobile"></div>
	  <div class="sign_up_input"><input type="password"  name="password" id="password" value="" placeholder="password"></div>
	  
	  <div class="contact_input_cta"><input value="Submit" type="submit"></div>
	  </div>
	  <div class="clr"></div>
  </div>
  </form>
</div>
<div id="popup3" class="modal-box">
  <header> <a href="#" class="js-modal-close close">*</a>
    <h3>Employeer Login</h3>
  </header>
  <div class="modal-body">
      <div class="signup_box_main">
	  <div class="sign_up_input"><input type="text" placeholder="Email"></div>
	  <div class="sign_up_input"><input type="email" placeholder="password"></div>
	  
	  <div class="contact_input_cta"><input value="Submit" type="submit"></div>
	  </div>
	  <div class="clr"></div>
  </div>
</div>
	
