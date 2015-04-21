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
                echo "Please Activate Your Email";
            }
            /*session_start();
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            header("Location:index.php");*/
        } else{
            echo "<script>alert('Invalid Login');</script>";
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
            <a class="navbar-brand" href="#">Project name</a>
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
    <div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Login to site.com</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="well">
                            <form id="loginForm" method="POST" action="login.php" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="username" class="control-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value=""
                                           required="" title="Please enter you username"
                                           placeholder="example@gmail.com">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                           required="" title="Please enter your password">
                                    <span class="help-block"></span>
                                </div>
                                <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember"> Remember login
                                    </label>

                                    <p class="help-block">(if this is a private computer)</p>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <p class="lead">Register now for <span class="text-success">FREE</span></p>
                        <ul class="list-unstyled" style="line-height: 2">
                            <li><span class="fa fa-check text-success"></span> See all your orders</li>
                            <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                            <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                            <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                            <li><span class="fa fa-check text-success"></span> Get a gift
                                <small>(only new customers)</small>
                            </li>
                            <li><a href="/read-more/"><u>Read more</u></a></li>
                        </ul>
                        <p><a href="/new-customer/" class="btn btn-info btn-block">Yes please, register now!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/boostrap.js"></script>

</html>