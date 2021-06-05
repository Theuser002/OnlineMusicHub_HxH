<?php
session_start();
if(!isset($_SESSION['isAdmin'])||$_SESSION['isAdmin']!=1) die();
?>
<?php
require 'navbar.php'
?>

<?php
require 'footer.php';
?>