<!---AUTO-CHANGING NAVBAR--->
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container">
<!--			//In the header, if you click to logo you'll always go back to the home page (index.php)-->
            <a class="navbar-brand" href="index.php">
                <strong><em>Music Hub</em></strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navi">
                <ul class="navbar-nav mr-auto">

					<!--auto change based on login status-->
                    <?php
						//set navigation bar when logged in
						if (isset($_SESSION['accountID'])) {
						//set navigation bar when logged in and role of admin
							if ($_SESSION['isAdmin'] == 1) {
								echo '
									<li class="nav-item">
										<a class="nav-link" href="song-page.php" >Songs</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="mv-page.php" >MVs</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="artist-page.php" >Artists</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="news-page.php" >News</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="account-page.php" >Account</a>
									</li>';
							}
							else
							{
								 echo '
									<li class="nav-item">
										<a class="nav-link" href="song-page.php" >Songs</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="mv-page.php" >MVs</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="artist-page.php" >Artists</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="news-page.php" >News</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="account-page.php" >Account</a>
									</li>';
							}	
						}	
						//main page not logged in navigation bar
						else 
						{
							echo '
								<li class="nav-item">
									<a class="nav-link" href="#intro">Introduction</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="#gallery">Gallery</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#about-us">About us</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#footer">Contact us</a>
								</li>
								';
						}
                    ?>

                </ul>

                <?php
                //logout button when user is logged in
                if (isset($_SESSION['accountID'])) {
                    echo '
                    <form class="navbar-form navbar-right" action="../../controllers/logout.controller.php" method="post">
                    	<button type="submit" name="logout-submit" class="btn btn-outline-dark">Logout</button>
                    </form>';
                } else {
                    echo '
                    <div>
						<ul class="navbar-nav ml-auto">
							<li><a class="nav-link fa fa-sign-in" data-toggle="modal" data-target="#myModal_reg">&nbsp;Sign Up</a></li>
							<li><a class="nav-link fa fa-user-plus" data-toggle="modal" data-target="#myModal_login">&nbsp;Login</a></li>
						</ul> 
                    </div>
                    ';
                }
                ?>

            </div>
        </div>
    </nav>
	
<!--MY MODEL LOGIN-->
    <div class="container">
        <!-- The Modal -->
        <div class="modal fade" id="myModal_login">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Login Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <?php
                        if (isset($_GET['error1'])) {
                            //script for modal to re-appear when error (to allow user to keep entering if they made a mistake) 
                            echo '  
							<script>
								$(document).ready(function(){
									$("#myModal_login").modal("show");
								});
							</script> ';


                            //error handling of log in
                            if ($_GET['error1'] == "loginfailed") {
                                echo '<h5 class="text-danger text-center">Wrong username or password, Please try again!</h5>';
                            }
                        }
                        echo '<br>';
                        ?>

                        <div class="signin-form">
                            <form action="../../controllers/login.controller.php" method="post">
                                <p class="hint-text">If you have already an account please log in.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login-submit" class="btn btn-dark btn-lg btn-block">Log In</button>
									<button type="reset" name="login-reset" class="btn btn-decondary btn-lg btn-block">Clear
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

<!--MY MODEL REGISTER-->
    <div class="container">
        <!-- The Modal -->
        <div class="modal fade" id="myModal_reg">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Register</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <?php
                        if (isset($_GET['error'])) {
                            //script for modal to appear when error 
                            echo '  
							<script>
                                $(document).ready(function(){
                                	$("#myModal_reg").modal("show");
                                });
                            </script> ';


                            //error handling for errors and success --sign up form

                            if ($_GET['error'] == "emptyfields") {
                                echo '<h5 class="bg-danger text-center">Fill all fields, Please try again!</h5>';
                            } else if ($_GET['error'] == "invalidemailusername") {
                                echo '<h5 class="bg-danger text-center">Username or Email are taken!</h5>';
                            } else if ($_GET['error'] == "invalidemail") {
                                echo '<h5 class="bg-danger text-center">Invalid Email, Please try again!</h5>';
                            } else if ($_GET['error'] == "usernameemailtaken") {
                                echo '<h5 class="bg-danger text-center">Username or email is taken, Please try again!</h5>';
                            } else if ($_GET['error'] == "invalidusername") {
                                echo '<h5 class="bg-danger text-center">Invalid Username, Please try again!</h5>';
                            } else if ($_GET['error'] == "invalidpassword") {
                                echo '<h5 class="bg-danger text-center">Invalid password, Please try again!</h5>';
                            } else if ($_GET['error'] == "passworddontmatch") {
                                echo '<h5 class="bg-danger text-center">Password must match, Please try again!</h5>';
                            } else if ($_GET['error'] == "error1") {
                                echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
                            } else if ($_GET['error'] == "error2") {
                                echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
                            }
                        }
                        if (isset($_GET['signup'])) {
                            //script for modal to appear when success
                            echo '  
								<script>
									$(document).ready(function(){
									$("#myModal_reg").modal("show");
									});
								</script> ';

                            if ($_GET['signup'] == "success") {
                                echo '<h5 class="bg-success text-center">Sign up was successfull! Please Log in!</h5>';
                            }
                        }
                        echo '<br>';
                        ?>

                        <!---sign up form -->
                        <div class="signup-form">
                            <form action="includes/signup.inc.php" method="post">
                                <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="uid" placeholder="Username" required="required">
                                    <small class="form-text text-muted">Username must be 4-20 characters long</small>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="mail" placeholder="Email" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                                    <small class="form-text text-muted">Password must be 6-20 characters long</small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password" required="required">
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="signup-submit" class="btn btn-dark btn-lg btn-block">Register Now</button>
                                </div>
                            </form>
                            <div class="text-center">Already have an account? <a href="#">Sign in</a></div>
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