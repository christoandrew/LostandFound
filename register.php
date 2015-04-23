<?php
include_once "utils/db_connect.php";
include_once "utils/PasswordHash.php";
include_once "utils/functions.php";


$db = Database::getInstance();
$mysqli = $db->getConnection();

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = create_hash($_POST['password']);
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $activation_token = getToken();

    $info = array(
        'username' => $username,
        'email' => $email,
        'key' => $activation_token
    );

    //send the email
    if (send_email($info)) {

        echo "Thanks for signing up. Please check your email for confirmation!\n";
        echo json_encode($info);

    } else {
        echo "Error";
    }

    $createUser = "INSERT INTO Users SET firstname='$firstname', lastname='$lastname',email='$email',password='$password',ActivationToken='$activation_token', phone='$phone',ProfilePhoto='guest.png', username='$username'";

    if ($mysqli->query($createUser)) {
        echo "User Successfully Registered";
    } else {
        printf("Errormessage: %s\n", $mysqli->error);
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
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <script src="js/functions.js"></script>
</head>
<body>
<!--<nav class="navbar navbar-inverse navbar-fixed-top">
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
        <!--/.nav-collapse
    </div>
</nav>-->

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <form class="reg-page" method="post" action="register.php">
                <div class="reg-header">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" width="100px" src="img/lost_found_sign.jpg" alt="...">
                        </a>

                        <div class="media-body">
                            <h3 class="media-heading">Register New Account</h3>
                            <hr>
                            <p>
                                Are you already registered <a href="login.php">Click Here</a> to Login
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-inline">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                   onkeydown="validate('error-firstname', this.value, 'firstname')"
                                   placeholder="Firstname"/>

                            <div id="error-firstname"></div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                   onkeydown="validate('error-lastname', this.value, 'lastname')"
                                   placeholder="Lastname">
                        </div>
                        <div id="error-lastname"></div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="Username" id="username" name="username"
                                   onblur="validate('error-username', this.value, 'username')"
                                   class="form-control margin-bottom-20">
                        </div>
                        <div id="error-username"></div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" placeholder="Email Address"
                                   onblur="validate('error-email', this.value, 'email')"
                                   id="email" name="email" class="form-control margin-bottom-20">
                        </div>
                        <div class="message" id="error-email"></div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" id="phone" placeholder="Phone"
                                   onkeydown="validate('error-phone', this.value, 'phone')"
                                   class="form-control margin-bottom-20">
                        </div>
                        <div id="error-phone"></div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                            <input type="text" name="password" id="password" placeholder="Password"
                                   onkeydown="validate('error-password', this.value, 'password')"
                                   class="form-control margin-bottom-20">

                            <div id="error-password"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                            <input type="text" name="conf-password" id="conf-password" placeholder="Confirm Password"
                                   onkeydown="validate('error-confirm', this.value, 'conf-password')"
                                   class="form-control margin-bottom-20">
                        </div>
                        <div id="error-confirm"></div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-lg-6 checkbox">
                        <label>
                            <input type="checkbox">
                            I read <a href="page_terms.html" class="color-green">Terms and Conditions</a>
                        </label>
                    </div>
                    <div class="col-lg-6 text-right">
                        <input class="btn btn-success" type="submit" value="Register"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/boostrap.js"></script>
</html>