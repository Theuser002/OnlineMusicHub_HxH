<?php
session_start();
if(!isset($_SESSION['isAdmin'])||$_SESSION['isAdmin']!=1) die();
?><head>
	<link href="css/pagination.css" rel="stylesheet" type="text/css">
</head>

<style>
a.active{
		background-color: #C8C8C8; 
	}
</style>
<?php
require 'navbar.php'
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
				echo "<ul class=\"navbar-nav\"><li class=\"nav-item\"><a class=\"nav-link active\" href=\"account-admin.php?tab=1\">Song</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"account-admin.php?tab=2\">MV</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"account-admin.php?tab=3\">Artist</a></li></ul>";
			}elseif($tab==2){
				echo "<ul class=\"navbar-nav\"><li class=\"nav-item\"><a class=\"nav-link\" href=\"account-admin.php?tab=1\">Song</a></li>
			<li class=\"nav-item\"><a class=\"nav-link active\" href=\"account-admin.php?tab=2\">MV</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"account-admin.php?tab=3\">Artist</a></li></ul>";
			}elseif($tab==3){
				echo "<ul class=\"navbar-nav\"><li class=\"nav-item\"><a class=\"nav-link\" href=\"account-admin.php?tab=1\">Song</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"account-admin.php?tab=2\">MV</a></li>
			<li class=\"nav-item\"><a class=\"nav-link active\" href=\"account-admin.php?tab=3\">Artist</a></li></ul>";
			}
			?>
	</div>
</nav>
<br>
<div class="container">
<?php
	if($tab==1){
		include_once('admin-nav-1.php');
	}elseif($tab==2){
		include_once('admin-nav-2.php');
	}else{
		include_once('admin-nav-3.php');
	}
	?>
</div>

  </div>
  <br>
  <br>
</body>
<?php
require 'footer.php';
?>