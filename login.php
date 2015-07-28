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
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                              <strong>Please Activate Your Email </strong>
                                              </div>

                        </div>
                        </div>
                        </div>
                        ';
            }else{
                session_start();
                $_SESSION['userId'] = $rows['userId'];
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $_SESSION['email'] = $rows['Email'];
                $user_type = $rows['usertype'];

                if($user_type == 'Admin'){
                    $_SESSION['user_type'] = 'admin';
                } else{
                    $_SESSION['user_type'] = 'user';
                }
                $location = null;

                if($_POST['location'] != ''){
                    $location = $_POST['location'];
                }

                if(isset($location)){
                    header("Location:".$location);
                }







            }

        } else{
            echo '<div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                              <strong>Sorry Invalid Login</strong>
                                              </div>

                        </div>
                        </div>
                        </div>
                        ';
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
<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

            <form class="reg-page" method="post" action="login.php">
                <img src="Images/uganda-police.jpg" class="img img-responsive">
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Username" name="username" required="" class="form-control">
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" placeholder="Password" name="password" required="" class="form-control">
                </div>
                <div class="input-group margin-bottom-20">
                    <input type="hidden" name="location" value="
                    <?php
                    if(isset($_GET['return_url']) && isset($_GET['id'])){
                        $return_url = $_GET['return_url'];
                        $id = $_GET['id'];
                        echo  $return_url."?id=".$id;
                    }else{
                        echo "index.php";
                    }
                    ?>">
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
                    <a href="forgot-password.php">Forgot Password</a>
                </p>
            </form>
        </div>
    </div>

</div>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>


</html>