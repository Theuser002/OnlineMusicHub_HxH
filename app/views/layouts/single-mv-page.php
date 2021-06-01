<?php
session_start();
?>
<?php
require "navbar.php";
?>
<style>
	.mv-holder{
		width: 70%;
		height: 100%;
		float: left;
		margin-right: 1%;
	}
	.relate-video{
		width: 29%;
		height: inherit;
		float: left;
	}
	.relate-img{
		float: left;
		width: 40%;
		max-height: 100%;
		margin-right: 5px;
	}
	.relate-video-holder{
		display: block;
		height: 80px;
	}
</style>
<?php
if(isset($_GET['MVID'])){
	$MVID = $_GET['MVID'];
}else{
	include_once('error.php');
	die();
}
include_once('../../controllers/mv.controller.php');
$c = new Ctrl_MV();
$mv = $c->getSingleMV($MVID);
?>
<body id="index-body">
<br><br><br>
<div class="container">
	<div class="mv-holder">
		<video src="videos/<?php echo $mv->getMVLink();?>" controls autoplay muted width="100%"></video>
		<div class="container">
			<?php echo $mv->getMVTitle(); ?>
			<?php echo $mv->getMVView(); ?>
		</div>
	</div>
	<div class="relate-video container"><br>
		<div class="relate-video-holder"><img class="relate-img" src="images/2002.jpg">Other MV</div><div class="clearfix"></div><br>
		<div class="relate-video-holder"><img class="relate-img" src="images/tonesandi.jpg">Other MV</div><div class="clearfix"></div><br>
		<div class="relate-video-holder"><img class="relate-img" src="images/badliar.jpg">Other MV</div><div class="clearfix"></div><br>
		<div class="relate-video-holder"><img class="relate-img" src="images/kingandqueen.jpg">Other MV</div><div class="clearfix"></div><br>
	</div>
</div>
<div class="clearfix"></div>
</body>
<?php
require 'footer.php';
?>