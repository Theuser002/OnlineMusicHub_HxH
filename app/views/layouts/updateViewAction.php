<?php
include_once('../../controllers/mv.controller.php');
$c = new Ctrl_MV();
echo "Updating View";
$MVID = $_GET['MVID'];
$c->updateView($MVID);
?>