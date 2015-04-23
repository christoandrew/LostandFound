<?php
include_once "../utils/db_connect.php";

$db = Database::getInstance();
$mysqli = $db->getConnection();


?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Uganda Police - Lost And Found
    </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
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
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <li>
                                <form class="navbar-form" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </div>
    </div>
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="../categories.php">Category</a></li>
        <li class="active">Animals</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="col-lg-12 footer">
                <div class="col-sm-6 col-md-3">
                    <div><h3>About Us</h3>

                        <div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div><h3>About Us</h3>

                        <div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div><h3>About Us</h3>

                        <div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div><h3>About Us</h3>

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
<script type="text/javascript" src="../js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>