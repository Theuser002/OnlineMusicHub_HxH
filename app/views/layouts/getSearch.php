<?php
if(isset($_GET['key'])){
$key = $_GET['key'];
}
include_once('../../controllers/search.controller.php');
$c = new Ctrl_Search();
$list = $c->getSearch($key);
?>