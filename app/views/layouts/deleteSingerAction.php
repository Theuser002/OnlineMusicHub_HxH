<?php
include_once('../../controllers/admin.controller.php');
$c = new AdminController();
$SingerID = $_GET['SingerID'];
$c->deleteSinger($SingerID);
?>