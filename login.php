<?php
include_once "utils/PasswordHash.php";
include_once "utils/db_connect.php";
$db = Database::getInstance();
$mysqli = $db->getConnection();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $checkLogin = $mysqli->query("SELECT * FROM Users WHERE username='$username'");
    $rows = mysqli_fetch_array($checkLogin, MYSQL_ASSOC);
    if($checkLogin){
        if (mysqli_num_rows($checkLogin) > 0 && validate_password($password,$rows['Password'])) {
            if($rows['Activation'] == 0){
                echo '<div class="container">
                        <div class="alert alert-warning alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                              <strong>Please Activate Your Email </strong>
                                            </div>

                        </div>';
            }else{
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;

                header("Location:index.php");
            }

        } else{
            echo '<div class="container">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                              <strong>Invalid Username / Password Combination</strong>
                                            </div>

                        </div>';
        }
    } else{
        printf("Error occurred %s", $mysqli->error);
    }


}


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
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Lost And Found</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

            <form class="reg-page" method="post" action="login.php">
                <div class="media">
                    <a class="pull-left" href="#">
                        <img src="img/lost_found_sign.jpg" width="100px" height="130px" class="">
                    </a>
                    <div class="media-body">
                        <div class="reg-header">
                            <h2 >Login to your account</h2>
                        </div>
                    </div>
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Username" name="username" required="" class="form-control">
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" placeholder="Password" name="password" required="" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6 checkbox">
                        <label><input type="checkbox">Remember me</label>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success  pull-right" type="submit">Login</button>
                    </div>
                </div>

                <hr>
                <p>
                    Don't have and account? <a href="register.php">Register Here</a>
                </p>
            </form>
        </div>
    </div>

</div>

</body>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</html>