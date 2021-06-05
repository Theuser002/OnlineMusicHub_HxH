<?php
include_once('../../controllers/songs-display.controller.php');

$controller = new SongsDisplayController();

$songID = $_GET['songID'];
$controller->updateViews($songID);
?>