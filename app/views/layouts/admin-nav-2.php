<?php
include_once('../../controllers/admin.controller.php');
include_once('../../controllers/mv.controller.php');
$cmv = new Ctrl_MV();
$c = new AdminController();
if(isset($_POST['MVTitle'],$_POST['MVImage'],$_POST['MVLink'],$_POST['SingerName'])){
	$MVTitle = $_POST['MVTitle'];
	$MVImage = $_POST['MVImage'];
	$MVLink = $_POST['MVLink'];
	$SingerName = $_POST['SingerName'];
	$c->addMV($MVTitle,$MVImage,$MVLink,$SingerName);
}
if(isset($_POST['newMVTitle'],$_POST['newMVImage'],$_POST['newMVLink'],$_POST['newMVID'])){
	$MVTitle = $_POST['newMVTitle'];
	$MVImage = $_POST['newMVImage'];
	$MVLink = $_POST['newMVLink'];
	$MVID = $_POST['newMVID'];
	$c->updateMV($MVTitle,$MVImage,$MVLink,$MVID);
}
?><head>
<link href="css/pagination.css" rel="stylesheet" type="text/css">
<script src="js/ajax.js"></script>
</head>


<div class="container">
	<table width="100%" border="1" cellpadding="2">
	  <tbody>
		<tr>
		  <th scope="col">&nbsp;MVID&nbsp;</th>
		  <th scope="col">&nbsp;MVTitle&nbsp;</th>
		  <th scope="col">&nbsp;MVImage&nbsp;</th>
		  <th scope="col">&nbsp;MVLink&nbsp;</th>
		  <th scope="col">&nbsp;MVView&nbsp;</th>
		  <th scope="col">&nbsp;Singer&nbsp;</th>
		  <th scope="col">&nbsp;Modify&nbsp;</th>
		</tr>
		  <?php 
		  $list = $c->invokeMV();
		  foreach($list as $mv){
			  $singer = $cmv->getOwnSinger($mv->getMVID());
		  ?>
		<tr>
		  <td><?php echo $mv->getMVID() ?></td>
		  <td><?php echo $mv->getMVTitle() ?></td>
		  <td><?php echo $mv->getMVImage() ?></td>
		  <td><?php echo $mv->getMVLink() ?></td>
		  <td><?php echo $mv->getMVView() ?></td>
		  <td><?php echo $singer->getSingerName() ?></td>
		  <td>
			<a class="fa fa-wrench" data-toggle="modal" data-target="#myModal_fixmv<?php echo $mv->getMVID() ?>"></a>/
			<a class="fa fa-trash" onClick="deleteMV(<?php echo $mv->getMVID() ?>) alert('deleted')"></a>
			</td>
		</tr>
<!--	Modal	  -->
<div class="container">
			<!-- The Modal -->
			<div class="modal fade" id="myModal_fixmv<?php echo $mv->getMVID() ?>">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Update MV <?php echo $mv->getMVTitle() ?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="signin-form">
								<form action="account-admin.php?tab=2" method="post">
									<p class="hint-text">Update new information for MV</p>
									<div class="form-group">
										<input type="text" class="form-control" name="newMVID" value="<?php echo $mv->getMVID() ?>" readonly>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="newMVTitle" value="<?php echo $mv->getMVTitle() ?>" required="required">
									</div>
									<div class="form-group">
										<input type="file" class="form-control" name="newMVImage" required >
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="newMVLink" value="<?php echo $mv->getMVLink() ?>" required="required">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="newSinger" value="<?php echo $singer->getSingerName() ?>" readonly>
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
				<li><a class="nav-link fa fa-folder-plus" data-toggle="modal" data-target="#myModal_newmv">&nbsp;New MV</a></li>
			</ul> 
		</div>
	</table><br>
	<div><a class="fa fa-sync" onClick="window.location.reload()">&nbsp;Refresh after delete</a></div><br>
</div>

<!--Modal-->
<div class="container">
			<!-- The Modal -->
			<div class="modal fade" id="myModal_newmv">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Add new MV</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="signin-form">
								<form action="account-admin.php?tab=2" method="post">
									<p class="hint-text">Provide new MV information</p>
									<div class="form-group">
										<input type="text" class="form-control" name="MVTitle" placeholder="MVTitle" required="required">
									</div>
									<div class="form-group">
										<input type="file" class="form-control" name="MVImage" required="required">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="MVLink" placeholder="MVLink" required="required">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="SingerName" placeholder="Singer" required="required">
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