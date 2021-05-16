<?php
require "header.php";
?>

<header class="header-account">
	
</header>

<section id="intro">

  <div class="container" style="margin-top: 50px;">
	<h3 class="text-center"><br>Introduction<br></h3><hr>
	<div class="row">
	  <!--carousel-->
	  <div class="col-sm"><br><br>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img class="d-block intro-img" src="images/unnamed.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
			  <img class="d-block intro-img" src="images/viva.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
			  <img class="d-block intro-img" src="images/alone.jpg" alt="Third slide">
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div><br><br>
	  </div>

	  <!--end of carousel-->

	  <div class="col-sm">
		<div class="arranging"><br><br>
<!--			<br>-->
		  <hr>
		  <h4 class="text-center">About Music Hub</h4><br>
		  <p class="p1">
			Music Hub is a website created by <b>HxH group</b>
		  <p class="p0">
			This website provides you hours of immersive music experienece
			from listening to your favourite songs, watching MVs, viewing artists' information, catching up on the trending news about music industry, ... and more.
			<br>
			Have fun!!!
			<br>
			<img src="images/signature.png" alt="signature" style="display: block;
						margin-left: auto;
						margin-right: auto;">
		  </p>
		  </p>
		  <hr>
		</div>
	  </div>
	</div><br>
  </div>
</section>
<?php
require "footer.php";
?>
