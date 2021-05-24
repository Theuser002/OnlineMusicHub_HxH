<?php
session_start();
?><head>
</head>

<style>
	.mv-title{
		text-align: left;
	}
	
	.mv-view{
		text-align: right;
	}
</style>
<?php
require "navbar.php";
?>
<?php
include_once('../../controllers/mv.controller.php');
$c = new Ctrl_MV();
?>
<body id="index-body">
<br>
<br>
<div id="gallery">
<nav class="navbar navbar-expand-md navbar-light">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item"> <a class="nav-link active" id="tab-javascript" data-toggle="tab"
         href="#content-javascript"
         role="tab" aria-controls="content-javascript" aria-selected="false"> A-Z list </a> </li>
      <li class="nav-item"> <a class="nav-link" id="tab-css" data-toggle="tab"
         href="#content-css"
         role="tab" aria-controls="content-css" aria-selected="false"> Top View </a> </li>
      <li class="nav-item"> <a class="nav-link" id="tab-bootstrap" data-toggle="tab"
         href="#content-bootstrap"
         role="tab" aria-controls="content-bootstrap" aria-selected="false"> Latest </a> </li>
    </ul>
    <br>
    <br>
  </div>
	</nav>
	<div class="tab-content" id="myTabContent">
   <div class="tab-pane fade show active" id="content-javascript"
      role="tabpanel" aria-labelledby="tab-javascript">
	   <br>
		<?php include_once('mv-nav.php'); ?>
   </div>
   <div class="tab-pane fade" id="content-css"
      role="tabpanel" aria-labelledby="tab-css">
      <br>
				   <div class="container">
						<h3 class="text-center"><br>Top view<br>
						  <hr><br>
						</h3>
						<div class="d-flex flex-row flex-wrap justify-content-center">
						  <div class="d-flex flex-column">
							<img src="images/dave.jpg" class="img-fluid">
							  <img src="images/jimi.jpeg" class="img-fluid">
						  </div>
						  <div class="d-flex flex-column">
							<img src="images/drake.jpg" class="img-fluid">
							<img src="images/album2.jpg" class="img-fluid">
						  </div>
						  <div class="d-flex flex-column">
							<img src="images/album3.jpg" class="img-fluid">
							<img src="images/album4.jpg" class="img-fluid">
						  </div>
						<div class="d-flex flex-column">
							<img src="images/album1.jpg" class="img-fluid">
							<img src="images/alanw.jpg" class="img-fluid">
						  </div>
						</div>
						<br><br>
					  </div>
   </div>
   <div class="tab-pane fade" id="content-bootstrap"
      role="tabpanel" aria-labelledby="tab-bootstrap">
      <br>
				   <div class="container">
						<h3 class="text-center"><br>Latest<br>
						  <hr><br>
						</h3>
						<div class="d-flex flex-row flex-wrap justify-content-center">
						  <div class="d-flex flex-column">
							<img src="images/drake.jpg" class="img-fluid">
							<img src="images/album2.jpg" class="img-fluid">
						  </div>
						<div class="d-flex flex-column">
							<img src="images/jimi.jpeg" class="img-fluid">
							<img src="images/dave.jpg" class="img-fluid">
						  </div>
						  <div class="d-flex flex-column">
							<img src="images/album1.jpg" class="img-fluid">
							<img src="images/alanw.jpg" class="img-fluid">
						  </div>
						  <div class="d-flex flex-column">
							<img src="images/album3.jpg" class="img-fluid">
							<img src="images/album4.jpg" class="img-fluid">
						  </div>
						</div>
						<br><br>
					  </div>
   </div>
</div>
  </div>
  <br>
  <br>
</body>
<?php
require 'footer.php';
?>