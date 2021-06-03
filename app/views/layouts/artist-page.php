<?php
session_start();
?>
<?php
require "navbar.php";
?>
<?php
if(!isset($_GET['tab'])){
	$tab = 1;
}else{
	$tab = $_GET['tab'];
}
include_once('../../controllers/singer.controller.php');
$c = new SingerController();
$singerList = $c->invoke();
?>
<style>
	.hide{
		display: none;
	}
	.onhover:hover + .hide{
		display: block;
		
	}
</style>
<body id="index-body">
<br>
<br>
<div id="gallery"><br>
		  <div class="container">
			<h3 class="text-center"><br>Artist Gallery<br>
			  <hr><br>
			</h3>
			<div class="d-flex flex-row flex-wrap justify-content-center">
				<?php
				for($i=0;$i<8;$i++){ ?>
			  <div class="d-flex flex-column">
				  <a href="single-singer-page.php?singerID=<?php echo $singerList[$i]->getSingerID(); ?>" class="onhover">
				<img src="images/<?php echo $singerList[$i]->getSingerImage(); ?>" class="img-fluid">
					  <h5><?php echo $singerList[$i]->getSingerName(); ?></h5>
				  </a>
				  <div class="hide"><?php echo 'Song: 10'.'<br>'.'MV: 5' ?></div>
			  </div>
				<?php } ?>
			</div>
			<br><br>
		  </div>
		</div>
  <br>
  <br>
</body>
<?php
require "footer.php";
?>