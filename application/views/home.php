<!-- Section About

================================================== -->

<section id="about" class="hp_welcome">

<div class="container">

	<div class="row">

		<div class="col-lg-6 wow fadeInLeft">

			<h2 class="section-heading"><?php echo $memoriam['page_name'];?> </b></h2>

			<hr>

			

<?php 

			echo $memoriam['description'];

			?>

			

	</div>

	<div class="col-lg-6 wow fadeInRight">

	<p >

			<img src="<?php echo base_url().$memoriam['page_img'];?>" alt="" class="img-responsive">

			</p>

	<p  class="home_leftside">

			<strong>BORN ON:</strong> 29-9-1926</p> <p class="home_leftside"><strong>PASSED AWAY:</strong> 13-12-1987 

 </p>

			

	</div>

</div>

</div>

</section>

<!-- Section About Us

================================================== -->

<section id="pricing" class="parallax parallax-image about_usbox" style="background-image:url(<?php echo base_url();?>public/frontend/img/about_bg.jpg);">

<div class="container">

<div class="row">

	<div class="col-lg-12 text-center">

		<h2 class="section-heading"><b>About Us</b></h2>

		<hr class="primary">

		<br/>

	</div>

</div>

</div>

<div class="container">

<div class="row wow fadeInRight">

	<div class="wow-pricing-table col-md-4">

		<h4><?php echo $mission['page_name'];?></h4>

		<?php echo  word_limiter($mission['description'], 34); ?>

	

		<div class="read_more_about"><a href="<?php echo base_url();?>introduction">Read More</a></div>

	</div>

	<!-- /.col-md-4 -->

	<div class="wow-pricing-table col-md-4">

		<h4><?php echo $vision['page_name'];?></h4>

		<?php echo  word_limiter($vision['description'], 17); ?>

		<div class="read_more_about"><a href="<?php echo base_url();?>vision">Read More</a></div>

	</div>

	<!-- /.col-md-4 -->

	<div class="wow-pricing-table col-md-4">

		<h4><?php echo $objecive['page_name'];?></h4>

		<?php echo  word_limiter($objecive['description'], 34); ?>

		<div class="read_more_about"><a href="<?php echo base_url();?>objective">Read More</a></div>

	</div>

	<!-- /.col-md-4 -->

</div>

</div>

</section>

<div class="clearfix"></div>

<!-- Section after About Us  -->



<!-- Section Gallery

================================================== -->

<section id="portfolio" class="hp_gallery">

<div class="container">

<div class="row">

	<div class="col-lg-12 text-center">

		<h2 class="section-heading"><b>Our Gallery</b></h2>

		<hr class="primary">

		<br/>

	</div>

</div>

</div>

<div class="container">

<div class="row  wow fadeInLeft">

<?php 
foreach($gallery as $gallvalue)
{
?>

   <div class="col-md-3 teambox">

<div class="team-thumb overlay-image view-overlay">

	<img src="<?php echo base_url().$gallvalue['gallery_img'];?>" alt="" class="img-responsive">

	<div class="mask team_quote">

		<div class="port-zoom-link">

			<p>

				<a href="<?php echo base_url();?>gallery/<?php echo $gallvalue['album_id'];?>"><?php echo $gallvalue['album_title'];?></a>

			</p>

		</div>

	</div>

</div>

</div>

<?php 
}
?>
  <!--<div class="col-md-3 teambox">

<div class="team-thumb overlay-image view-overlay">

	<img src="<?php// echo base_url();?>public/frontend/gallery/multisensoryroom6.jpg" alt="" class="img-responsive">

	<div class="mask team_quote">

		<div class="port-zoom-link">

			<p>

				<a href="<?php// echo base_url();?>gallery/multisensory_room">Multisensory Room</a>

			</p>

		</div>

	</div>

</div>

</div>

<div class="col-md-3 teambox">

<div class="team-thumb overlay-image view-overlay">

	<img src="<?php// echo base_url();?>public/frontend/gallery/dignotriesvisite2.jpg" alt="" class="img-responsive">

	<div class="mask team_quote">

		<div class="port-zoom-link">

			<p>

				<a href="<?php// echo base_url();?>gallery/dignotries_visited">Our Special Visitant</a>

			</p>

		</div>

	</div>

</div>

</div>

	<div class="col-md-3 teambox">

<div class="team-thumb overlay-image view-overlay">

	<img src="<?php //echo base_url();?>public/frontend/gallery/school_activity25.jpg" alt="" class="img-responsive">

	<div class="mask team_quote">

		<div class="port-zoom-link">

			<p>

				<a href="<?php// echo base_url();?>gallery/school_activity">School Activity</a>

			</p>

		</div>

	</div>

</div>

</div>

	

	   <div class="col-md-3 teambox">

<div class="team-thumb overlay-image view-overlay">

	<img src="<?php// echo base_url();?>public/frontend/gallery/school_inguration1.jpg" alt="" class="img-responsive">

	<div class="mask team_quote">

		<div class="port-zoom-link">

			<p>

				<a href="<?php// echo base_url();?>gallery/school_inguration">School Inguration </a>

			</p>

		</div>

	</div>

</div>

</div>

  <div class="col-md-3 teambox">

<div class="team-thumb overlay-image view-overlay">

	<img src="<?php// echo base_url();?>public/frontend/gallery/teachers_training_programme12.jpg" alt="" class="img-responsive">

	<div class="mask team_quote">

		<div class="port-zoom-link">

			<p>

				 <a href="<?php// echo base_url();?>gallery/teachers_training_programme">Teachers Training Programme</a>

			</p>

		</div>

	</div>

</div>

</div>

<div class="col-md-3 teambox">

<div class="team-thumb overlay-image view-overlay">

	<img src="<?php// echo base_url();?>public/frontend/jeevika/20.jpg" alt="" class="img-responsive">

	<div class="mask team_quote">

		<div class="port-zoom-link">

			<p>

				  <a href="<?php/// echo base_url();?>public/frontend/jeevika/20.jpg">Jeevika</a>

			</p>

		</div>

	</div>

</div>

</div>
-->
	<!--<div class="col-md-3 teambox">

<div class="team-thumb overlay-image view-overlay">

	<img src="<?php// echo base_url();?>public/frontend/jeevika/22.jpg" alt="" class="img-responsive">

	<div class="mask team_quote">

		<div class="port-zoom-link">

			<p>

				 <a href="<?php// echo base_url();?>public/frontend/jeevika/22.jpg">Jeevika</a>

			</p>

		</div>

	</div>

</div>

</div>-->

	

	

</div>

</div>

</section>



<!-- Latest News -->

<section class="hp_news">

<div class="container">

<div class="row">

	<div class="col-lg-12 text-center">

		<h2 class="section-heading"><b>Latest News &amp; Events</b></h2>

		<hr class="primary">

		<br/>

	</div>

</div>

</div>

<div class="container">

<div class="row  wow fadeInRight">
<?php 
foreach($news as $newsvalue)
{
?>
	<div class="col-md-6 hp_news_box">
		<div class="col-lg-6"><img src="<?php echo base_url().$newsvalue['news_img'];?>" alt="" class="img-responsive"></div>
		<div class="col-lg-6">
			<h4><?php echo $newsvalue['news_title'];?> </h4>
			<p><?php echo character_limiter($newsvalue['news_desc'], 50);?></p>
			<div class="hp_news_rm"><a href="<?php echo base_url();?>news/<?php echo $newsvalue['news_id'];?>">Read More</a></div>
		</div>
		<div class="clearfix"></div>
	</div>
<?php 
	}
?>


	

	

	

	

	

	

</div>

</div>

</section>

<!-- Latest News -->



<!-- Section Newsletter

================================================== -->

<section id="social" class="parallax parallax-image subscribe_n" style="background-image:url(<?php echo base_url();?>public/frontend/img/newsletter_bg.jpg);">

<div class="wrapsection">

<div class="container">

	<div class="parallax-content">

		<div class="row wow fadeInLeft">

			<div class="col-md-12">

				<div class="funfacts text-center">

					<h4>Subscribe to Our Newsletter!</h4>

					<div class="form_box">

						<div class="form_box_input"><input type="text" placeholder="Your Email Address"></div>

						<div class="form_box_cta"><input type="submit" value="Subscribe!"></div>

						<div class="clearfix"></div>

					</div>

				</div>

			</div>

			

			

			

		</div>

	</div>

</div>

</div>

</section>

<div class="clearfix"></div>