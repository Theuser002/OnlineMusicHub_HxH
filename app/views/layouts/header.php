<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <!--favicon-->
    <title>Online Music Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--style.css document-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--font-awesome-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--bootstrap-->
    <script src="js/jquery.js"></script>
    <!--googleapis jquery-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--font-awesome-->
    <script src="js/slim.js"></script>
    <!--bootstrap-->
    <script src="js/popper.js"></script>
    <!--bootstrap-->
    <script src="js/bootstrap.js"></script>
    <!--bootstrap-->
</head>
<style>
    .flex-column {
        max-width: 260px;
    }

    .container {
        background: #f9f9f9;
        border-radius: 25px;
    }

    .img {
        margin: 5px;
    }

    .logo img {
        width: 250px;
        height: 250px;
        margin-top: 90px;
        margin-bottom: 40px;
    }

    ul {
        list-style-position: inside;
    }

    .intro-img {
        width: 500px;
        height: 400px;
/*        margin-left: 20px;*/
    }

    .img-fluid {
        width: 250px;
        height: 250px;
        margin: 3px;
    }

    #about-us {
        color: white;
        font-size: 20px;
        font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif"
    }

    hr .hr1 {
        border-top: 1px solid white;
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }
	.carousel-item img {
		width: 100%
	}
</style>

<body>
    <!---navbar--->
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <strong><em>Music Hub</em></strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navi">
                <ul class="navbar-nav mr-auto">


                    <?php
                    //set navigation bar when logged in
                    if (isset($_SESSION['user_id'])) {
                        echo '
                    <li class="nav-item">
                        <a class="nav-link" href="reservation.php" >Songs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_reservations.php" >MVs</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="view_reservations.php" >Artists</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="view_reservations.php" >Account</a>
                    </li>';

                        //set navigation bar when logged in and role of admin
                        if ($_SESSION['role'] == 2) {
                            echo '
                    <li class="nav-item">
                        <a class="nav-link" href="schedule.php" >Edit Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tables.php" >Edit Tables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_tables.php" >View Tables</a>
                    </li>';
                        }
                    }
                    //main page not logged in navigation bar
                    else {
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
                //log out button when user is logged in
                if (isset($_SESSION['user_id'])) {
                    echo '
                    <form class="navbar-form navbar-right" action="includes/logout.inc.php" method="post">
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

    <div class="container">
        <!-- The Modal -->
        <div class="modal fade" id="myModal_login">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Login</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <?php
                        if (isset($_GET['error1'])) {

                            //script for modal to appear when error 
                            echo '  <script>
                    $(document).ready(function(){
                    $("#myModal_login").modal("show");
                    });
                    </script> ';


                            //error handling of log in

                            if ($_GET['error1'] == "emptyfields") {
                                echo '<h5 class="text-danger text-center">Fill all fields, Please try again!</h5>';
                            } else if ($_GET['error1'] == "error") {
                                echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
                            } else if ($_GET['error1'] == "wrongpwd") {
                                echo '<h5 class="text-danger text-center">Wrong Password, Please try again!</h5>';
                            } else if ($_GET['error1'] == "error2") {
                                echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
                            } else if ($_GET['error1'] == "nouser") {
                                echo '<h5 class="text-danger text-center">Username or email not found, Please try again!</h5>';
                            }
                        }
                        echo '<br>';
                        ?>

                        <div class="signin-form">
                            <form action="includes/login.inc.php" method="post">
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
                            echo '  <script>
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
                            echo '  <script>
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