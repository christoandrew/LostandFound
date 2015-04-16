<?php
include_once "utils/db_connect.php";
include_once "utils/PasswordHash.php";

$db = Database::getInstance();
$mysqli = $db->getConnection();

if (isset($_POST['register'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = create_hash($_POST['password']);
  $phone = $_POST['phone'];
  $username = $_POST['username'];

  $createUser = "INSERT INTO Users SET firstname='$firstname', lastname='$lastname',email='$email',password='$password', phone='$phone',ProfilePhoto='guest.png' username='$username'";

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
	</head>
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <form class="form-horizontal" method="POST" action="register.php">
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="username" class="form-control" id="username" name="username" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" placeholder=Email>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-10">
            <input type="submit" id="register" name="register" class="btn btn-default" value="Register"></input>
          </div>
        </div>
      </form>      
    </div>
	</body>
	<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/boostrap.js"></script>
</html>