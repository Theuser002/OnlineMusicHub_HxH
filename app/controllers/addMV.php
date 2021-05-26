<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
include('../models/mv.model.php');
	$model = new Model_MV();
if(isset($_POST['MVTitle'],$_POST['MVImage'],$_POST['MVLink'])){
	$MVTitle = $_POST['MVTitle'];
	$MVImage = $_POST['MVImage'];
	$MVLink = $_POST['MVLink'];
	$model->insertMV($MVTitle, $MVImage, $MVLink);
}else{
	echo 'not enough parameter';
}
?>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<input type="text" name="MVTitle" placeholder="MVTitle"><br>
	<input type="text" name="MVImage" placeholder="MVImage"><br>
	<input type="text" name="MVLink" placeholder="MVLink"><br>
	<input type="submit" value="Submit">
	<input type="reset" value="Reset">
	</form>
</body>
</html>
