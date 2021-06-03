<?php
session_start();
?>
<style>
	.mv-title{
		text-align: left;
	}
	
	.mv-view{
		text-align: right;
	}
	a.active{
		background-color: #C8C8C8; 
	}
</style>
<?php
require "navbar.php";
?>
<?php
$singerID = $_GET['singerID'];
if(!isset($_GET['tab'])){
	$tab = 1;
}else{
	$tab = $_GET['tab'];
}
?>
<body id="index-body">
<br>
<br>
<div id="gallery">
<nav class="navbar navbar-expand-md navbar-light">
	<div class="container">
		<?php
			if($tab==1){
				echo "<ul class=\"navbar-nav\"><li class=\"nav-item\"><a class=\"nav-link active\" href=\"single-singer-page.php?singerID=".$singerID."&tab=1\">Song</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"single-singer-page.php?singerID=".$singerID."&tab=2\">MV</a></li></ul>";
			}elseif($tab==2){
				echo "<ul class=\"navbar-nav\"><li class=\"nav-item\"><a class=\"nav-link\" href=\"single-singer-page.php?singerID=".$singerID."&tab=1\">Song</a></li>
			<li class=\"nav-item\"><a class=\"nav-link active\" href=\"single-singer-page.php?singerID=".$singerID."&tab=2\">MV</a></li></ul>";
			}
			?>
	</div>
</nav>
<br>
<div class="container">
	<?php
	if($tab==1){
		include_once('singer-nav-1.php');
	}elseif($tab==2){
		include_once('singer-nav-2.php');
	}
	?>
</div>

  </div>
  <br>
  <br>
<script src="js/ajax.js"></script>
</body>
<?php
require 'footer.php';
?>