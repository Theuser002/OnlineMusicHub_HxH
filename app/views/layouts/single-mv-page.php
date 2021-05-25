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
		max-height: auto;
	}
	.relate-video-holder{
		display: block;
		height: 33%;
	}
</style>
<br><br><br>
<div class="container">
	<div class="mv-holder">
		<video src="videos/test.mp4" controls width="100%"></video>
		<div class="container">
			MV TITLE
		</div>
	</div>
	<div class="relate-video">
		<div class="relate-video-holder"><img class="relate-img" src="images/alanw.jpg">Other MV</div><div class="clearfix"></div><br>
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