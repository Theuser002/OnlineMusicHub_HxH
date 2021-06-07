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
$singer = $c->getOwnSinger($MVID);
$relateList =  $c->getRelateVideo($MVID);
?>
<body id="index-body">
<br><br><br>
<div class="container">
	<div class="mv-holder">
		<iframe width="100%" height="500px" src="<?php echo $mv->getMVLink();?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<div class="container">
			<?php
			echo "<font size=\"6\">".$mv->getMVTitle()."</font>"."<br>Artist: ".$singer->getSingerName()."<br>View: ".$mv->getMVView(); 
			if(isset($_SESSION['accountID'])){
				echo "<button class=\"btn btn-light btn-lg btn-block\" onclick=\"addFavMV(".$MVID.")\">Add to favourite</button>";
			}
			?>	
			
		</div>
	</div>
	<div class="relate-video container"><br>
		<?php
		foreach($relateList as $data){ ?>
		<div class="relate-video-holder"><a href="single-mv-page.php?MVID=<?php echo $data->getMVID() ?>" onClick="updateMVView(<?php echo $data->getMVID() ?>)"><img class="relate-img" src="images/<?php echo $data->getMVImage() ?>"></a><?php echo $data->getMVTitle() ?><br>View: <?php echo $data->getMVView() ?></div><div class="clearfix"></div><br>
		<?php } ?>
	</div>
</div>
<div class="clearfix"></div>
<script src="js/ajax.js"></script>
</body>
<?php
require 'footer.php';
?>