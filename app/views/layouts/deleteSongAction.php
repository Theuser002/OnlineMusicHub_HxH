<?php
include_once('../../controllers/admin.controller.php');
$c = new AdminController();
$SongID = $_GET['SongID'];
$c->deleteSong($SongID);
?>