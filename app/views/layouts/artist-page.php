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
  </div>
  <br>
  <br>
</body>
<?php
require "footer.php";
?>