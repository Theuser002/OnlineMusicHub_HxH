<?php
include_once('../../controllers/admin.controller.php');
$c = new AdminController();
$MVID = $_GET['MVID'];
$c->deleteMV($MVID);
?>