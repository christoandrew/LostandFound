<?php
session_start();

include_once "utils/db_connect.php";
include_once "utils/PasswordHash.php";

$db = Database::getInstance();
$mysqli = $db->getConnection();


?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Uganda Police - Lost And Found
    </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" class="navbar-brand">Lost And Found</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="categories.php">Categories</a></li>
                            <?php
                            if(isset($_SESSION['user_type'])){
                                if($_SESSION['user_type'] == 'admin') {
                                    echo '<li><a href="admin.php">Admin</a></li>';
                                }
                            }
                            ?>
                            <li class="active"><a href="about.php">About</a></li>
                            <li ><a href="contact.php">Contact</a></li>

                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<li>
                                            <img src="uploads/avatar.png" height="50px" width="50px"
                                                 class="profile-photo img img-circle">
                                          </li>';
                                echo '<li><p class="navbar-text navbar-right">
                                            <a href="#"  class="navbar-link">' . $_SESSION['username'] . '</a>
                                          </p></li>';

                                echo '<li><a href="logout.php"> <span><i class="fa fa-power-off fa-fw fa-2x"></i> </span></a></li>';
                            }else{
                                echo '<li><a href="login.php">Login / Register</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="row">

    <div class="row">

        <div class="col-lg-12 banner">
            <div class="container">
                <h1>Reset Password</h1>
                <p>
                    Change your password regularly to increase security.
                </p>
            </div>
        </div>

    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php
            if(isset($_POST['change-pass'])){
                $resetEmail = $_POST['email'];
                $resetToken = $_POST['reset-token'];

                $oldPass = $_POST['new-pass'];
                $confirmPass = $_POST['new-pass-conf'];

                if($oldPass != $confirmPass){
                    echo '<div class="alert alert-danger">Passwords dont match please check <a href="reset-password.php?email='.$resetEmail.'&reset_token='.$resetToken.'">Back</a> </div>';
                }else{
                    $hash = create_hash($confirmPass);
                    $updatePassword = $mysqli->query("UPDATE users SET Password='$hash' WHERE Email='$resetEmail'");
                    if($updatePassword){
                        echo '<div class="alert alert-success">Password successfully changed <a href="login.php">Login Here</a> </div>';
                    }else{
                        echo '<div class="alert alert-danger">Error resetting password try again later</div>';
                    }
                }

            }

            ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="col-sm-12 footer2">
            <p>&copy; 2015 <a href="#">iCona Systems</a>, Inc. All rights reserved.</p>
        </div>
    </div>


</div>

</div>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
</body>
</html>