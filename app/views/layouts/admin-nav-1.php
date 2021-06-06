<?php
include_once('../../controllers/admin.controller.php');
include_once('../../controllers/songs-display.controller.php');
$cs = new SongsDisplayController();
$c = new AdminController();
?><head>
<link href="css/pagination.css" rel="stylesheet" type="text/css">
<script src="js/ajax.js"></script>
</head>


<div class="container">
	<table width="100%" border="1" cellpadding="2">
	  <tbody>
		<tr>
		  <th scope="col">&nbsp;SongID&nbsp;</th>
		  <th scope="col">&nbsp;SongTitle&nbsp;</th>
		  <th scope="col">&nbsp;SongImage&nbsp;</th>
		  <th scope="col">&nbsp;SongLink&nbsp;</th>
		  <th scope="col">&nbsp;SongView&nbsp;</th>
		  <th scope="col">&nbsp;Singer&nbsp;</th>
		  <th scope="col">&nbsp;Modify&nbsp;</th>
		</tr>
		  <?php 
		  $list = $c->invokeSong();
		  foreach($list as $song){
			  $singer = $cs->getOwnSinger($song->getSongID());
		  ?>
		<tr>
		  <td><?php echo $song->getSongID() ?></td>
		  <td><?php echo $song->getSongTitle() ?></td>
		  <td><?php echo $song->getSongImageLink() ?></td>
		  <td><?php echo $song->getAudioLink() ?></td>
		  <td><?php echo $song->getViews() ?></td>
		  <td><?php echo $singer->getSingerName() ?></td>
		  <td>
			<a class="fa fa-wrench" data-toggle="modal" data-target="#myModal_fixsong<?php echo $song->getSongID() ?>"></a>/
			<a class="fa fa-trash" onClick="deleteMV(<?php echo $song->getSongID() ?>)"></a>
			</td>
		</tr>
<!--	Modal	  -->
<div class="container">
			<!-- The Modal -->
			<div class="modal fade" id="myModal_fixsong<?php echo $song->getSongID() ?>">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Update Song <?php echo $song->getSongTitle() ?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="signin-form">
								<form action="account-admin.php?tab=1" method="post">
									<p class="hint-text">Update new information for Song</p>
									<div class="form-group">
										<input type="text" class="form-control" name="newSongID" value="<?php echo $song->getSongID() ?>" readonly>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="newSongTitle" value="<?php echo $song->getSongTitle() ?>" required="required">
									</div>
									<div class="form-group">
										<input type="file" class="form-control" name="newSongImage" required >
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="newSongLink" value="<?php echo $song->getAudioLink() ?>" required="required">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="newSinger" value="<?php echo $singer->getSingerName() ?>" required="required">
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
								<form action="account-admin.php?tab=1" method="post">
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