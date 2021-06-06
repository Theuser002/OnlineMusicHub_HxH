<?php
include_once('../../controllers/admin.controller.php');
$c = new AdminController();
if(isset($_POST['MVTitle'],$_POST['MVImage'],$_POST['MVLink'],$_POST['SingerName'])){
	$MVTitle = $_POST['MVTitle'];
	$MVImage = $_POST['MVImage'];
	$MVLink = $_POST['MVLink'];
	$SingerName = $_POST['SingerName'];
	$c->addMV($MVTitle,$MVImage,$MVLink,$SingerName);
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
		  <th scope="col">&nbsp;Modify&nbsp;</th>
		</tr>
		  <?php 
		  $list = $c->invokeMV();
		  foreach($list as $mv){
		  ?>
		<tr>
		  <td><?php echo $mv->getMVID() ?></td>
		  <td><?php echo $mv->getMVTitle() ?></td>
		  <td><?php echo $mv->getMVImage() ?></td>
		  <td><?php echo $mv->getMVLink() ?></td>
		  <td><?php echo $mv->getMVView() ?></td>
		  <td>
			<a class="fa fa-wrench" data-toggle="modal" data-target="#myModal_newmv"></a>/
			<a class="fa fa-trash" onClick="deleteMV(<?php echo $mv->getMVID() ?>)"></a>
			</td>
		</tr>
		  <?php } ?>
	  </tbody>
		<div>
			<ul class="navbar-nav ml-auto">
				<li><a class="nav-link fa fa-folder-plus" data-toggle="modal" data-target="#myModal_newmv">&nbsp;New MV</a></li>
			</ul> 
		</div>
	</table><br>
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