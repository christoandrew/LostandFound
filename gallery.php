<?php
session_start();

if ($_SESSION['username'] == '' || $_SESSION['username'] == null) header("Location:login.php");
?>
<?php
include_once "utils/db_connect.php";

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
    <!--<div class="row" id="header">
        <div class="col-md-4 col-xs-4">
            Logo Here
        </div>
        <div class="col-md-8 col-xs-8">
            Google
        </div>
    </div>-->
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="Report/Lost.php">Lost Item</a></li>
                                    <li><a href="utils/Found.php">Found Item</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>

                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <li>
                                <p class="navbar-text navbar-right">Signed in as <a href="#"
                                                                                    class="navbar-link"><?php echo $_SESSION['username'] ?></a>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12 banner">

    </div>

</div>
<div class="container">

</div>

<div class="row">
    <div class="container">
        <div class="col-lg-12 footer">
            <div class="col-sm-6 col-md-3">
                <div><h3>About Us</h3>

                    <div>
                        <p>
                            Lost and Found is an online portal for enabling people to locate items they or items they
                            found.
                            The main reason as to why this initiative is to create and generate a platform to
                            simplify the life of an average Ugandan who has lost hope after losing a valuable item.
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div><h3>Latest News</h3>

                    <div>
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div><h3>Contact Us</h3>

                    <div>
                        <p>
                        <address class="md-margin-bottom-40">
                            25, Lorem Lis Street, Orange <br>
                            California, US <br>
                            Phone: 800 123 3456 <br>
                            Fax: 800 123 3456 <br>
                            Email: <a href="mailto:info@anybiz.com" class="">info@anybiz.com</a>
                        </address>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div><h3>Subscribe</h3>
                    <div>
                        <form method="post"><p>
                                Subscribe to our mailing list to receive an update when new items arrive!</p>

                            <div class="form-group">
                                <input class="form-control"
                                       placeholder="Your email address"
                                       required="" type="email">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" value="Sign up" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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