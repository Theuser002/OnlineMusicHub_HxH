<?php
session_start();
?>
<?php
include_once('../../controllers/mv.controller.php');
$c = new Ctrl_MV();
echo "adding MV to Favourite";
$MVID = $_GET['MVID'];
$accID = $_SESSION['accountID'];
$c->removeFavMV($MVID, $accID);
?>