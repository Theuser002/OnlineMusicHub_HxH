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
		max-width: 40%;
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
<br><br><br>
<div class="container">
	<div class="mv-holder">
		<video src="videos/<?php echo $mv->getMVLink();?>" controls autoplay muted width="100%"></video>
		<div class="container">
			<?php echo $mv->getMVTitle(); ?>
			<?php echo $mv->getMVView(); ?>
		</div>
	</div>
	<div class="relate-video">
		<div class="relate-video-holder"><img class="relate-img" src="images/alanw.jpg">Other MV</div><div class="clearfix"></div><br>
		<div class="relate-video-holder"><img class="relate-img" src="images/alanw.jpg">Other MV</div><div class="clearfix"></div><br>
		<div class="relate-video-holder"><img class="relate-img" src="images/alanw.jpg">Other MV</div><div class="clearfix"></div><br>
		<div class="relate-video-holder"><img class="relate-img" src="images/alanw.jpg">Other MV</div><div class="clearfix"></div><br>
		<div class="relate-video-holder"><img class="relate-img" src="images/alanw.jpg">Other MV</div><div class="clearfix"></div><br>
	</div>
</div>
<div class="clearfix"></div>
<?php
require 'footer.php';
?>