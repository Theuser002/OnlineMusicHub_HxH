<?php
include_once('../../controllers/admin.controller.php');
$c = new AdminController();
if(isset($_POST['SingerName'],$_POST['Background'],$_POST['SingerImage'])){
	$SingerName = $_POST['SingerName'];
	$Background = $_POST['Background'];
	$SingerImage = $_POST['SingerImage'];
	$c->addSinger($SingerName,$Background,$SingerImage);
}
if(isset($_POST['newSingerName'],$_POST['newBackground'],$_POST['newSingerImage'],$_POST['newSingerID'])){
	$SingerName = $_POST['newSingerName'];
	$Background = $_POST['newBackground'];
	$SingerImage = $_POST['newSingerImage'];
	$SingerID = $_POST['newSingerID'];
	$c->updateSinger($SingerName,$Background,$SingerImage,$SingerID);
}
?><head>
<link href="css/pagination.css" rel="stylesheet" type="text/css">
<script src="js/ajax.js"></script>
</head>


<div class="container">
	<table width="100%" border="1" cellpadding="2">
	  <tbody>
		<tr>
		  <th scope="col">&nbsp;SingerID&nbsp;</th>
		  <th scope="col">&nbsp;SingerName&nbsp;</th>
		  <th scope="col">&nbsp;Background&nbsp;</th>
		  <th scope="col">&nbsp;SingerImage&nbsp;</th>
		  <th scope="col">&nbsp;Modify&nbsp;</th>
		</tr>
		  <?php 
		  $list = $c->invokeSinger();
		  foreach($list as $singer){
		  ?>
		<tr>
		  <td><?php echo $singer->getSingerID() ?></td>
		  <td><?php echo $singer->getSingerName() ?></td>
		  <td><?php echo $singer->getBackground() ?></td>
		  <td><?php echo $singer->getSingerImage() ?></td>
		  <td>
			<a class="fa fa-wrench" data-toggle="modal" data-target="#myModal_fixsinger<?php echo $singer->getSingerID() ?>"></a>/
			<a class="fa fa-trash" onClick="deleteSinger(<?php echo $singer->getSingerID() ?>) alert('deleted')"></a>
			</td>
		</tr>
		  <!--Modal-->
<div class="container">
			<!-- The Modal -->
			<div class="modal fade" id="myModal_fixsinger<?php echo $singer->getSingerID() ?>">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Update Singer <?php echo $singer->getSingerName() ?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="signin-form">
								<form action="account-admin.php?tab=3" method="post">
									<p class="hint-text">Update new information for singer</p>
									<div class="form-group">
										<input type="text" class="form-control" name="newSingerID" value="<?php echo $singer->getSingerID() ?>" readonly>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="newSingerName" value="<?php echo $singer->getSingerName() ?>" required="required">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="newBackground" value="<?php echo $singer->getBackground() ?>" required="required">
									</div>
									<div class="form-group">
										<input type="file" class="form-control" name="newSingerImage" required >
									</div>
									<div class="form-group">
										<button type="submit" name="login-submit" class="btn btn-dark btn-lg btn-block">Update</button>
										<button type="reset" name="login-reset" class="btn btn-secondary btn-lg btn-block">Clear
										</button>
									</div>
								</form>
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		  <?php } ?>
	  </tbody>
		<div>
			<ul class="navbar-nav ml-auto">
				<li><a class="nav-link fa fa-folder-plus" data-toggle="modal" data-target="#myModal_newsinger">&nbsp;New Singer</a></li>
			</ul> 
		</div>
	</table><br>
	<div><a class="fa fa-sync" onClick="window.location.reload()">&nbsp;Refresh after delete</a></div><br>
</div>

<!--Modal-->
<div class="container">
			<!-- The Modal -->
			<div class="modal fade" id="myModal_newsinger">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Add new Singer</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="signin-form">
								<form action="account-admin.php?tab=3" method="post">
									<p class="hint-text">Provide new Singer information</p>
									<div class="form-group">
										<input type="text" class="form-control" name="SingerName" placeholder="SingerName" required="required">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="Background" placeholder="Background" required="required">
									</div>
									<div class="form-group">
										<input type="file" class="form-control" name="SingerImage" required="required">
									</div>
									<div class="form-group">
										<button type="submit" name="login-submit" class="btn btn-dark btn-lg btn-block">Add</button>
										<button type="reset" name="login-reset" class="btn btn-secondary btn-lg btn-block">Clear
										</button>
									</div>
								</form>
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>

