<?php
session_start();
?><head>
	<link href="css/pagination.css" rel="stylesheet" type="text/css">
</head>


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
				echo "<ul class=\"navbar-nav\"><li class=\"nav-item\"><a class=\"nav-link active\" href=\"mv-page.php?tab=1\">A-Z List</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"mv-page.php?tab=2\">Latest</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"mv-page.php?tab=3\">Top View</a></li></ul>";
			}elseif($tab==2){
				echo "<ul class=\"navbar-nav\"><li class=\"nav-item\"><a class=\"nav-link\" href=\"mv-page.php?tab=1\">A-Z List</a></li>
			<li class=\"nav-item\"><a class=\"nav-link active\" href=\"mv-page.php?tab=2\">Latest</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"mv-page.php?tab=3\">Top View</a></li></ul>";
			}elseif($tab==3){
				echo "<ul class=\"navbar-nav\"><li class=\"nav-item\"><a class=\"nav-link\" href=\"mv-page.php?tab=1\">A-Z List</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"mv-page.php?tab=2\">Latest</a></li>
			<li class=\"nav-item\"><a class=\"nav-link active\" href=\"mv-page.php?tab=3\">Top View</a></li></ul>";
			}
			?>
	</div>
</nav>
<br>
<div class="container">
	<?php
	if($tab==1){
		include_once('mv-nav-1.php');
	}elseif($tab==2){
		include_once('mv-nav-3.php');
	}else{
		include_once('mv-nav-3.php');
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