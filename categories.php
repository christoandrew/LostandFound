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
    <link rel="stylesheet" type="text/css" href="css/flickity.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script>
        $(function(){
            $(".cat-item").fadeTo(, 0.2); // initial opacity

            $(".cat-item").hover(function( e ) {
                $(".cat-inner", this).stop().fadeTo(300, e.type=="mouseenter"?1:0.2);
        });
    </script>
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
            <nav class="navbar navbar-default">
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
    <div class="row">
        <div class="col-md-9">
            <div class="row" id="cat-item">
                <a href="transportation.php">
                    <div class="col-md-3">
                        <div class="cat-item" id="cat-item">
                            <div class="cat-icon">
                                <img src="img/icons/transport.png" class="img-responsive img-circle"/>
                            </div>
                            <div class="cat-inner">
                                <a href="#">Transportation</a>
                            </div>
                        </div>
                    </div>
                </a>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/media.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/electronics.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/luggage.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/medical.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/mail.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/pet.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/money.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/tools.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/shirt.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/jewellery.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/collectables.jpg" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="cat-icon">
                        <img src="img/icons/ticket.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>
</div>
<div class="row">
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
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>

</body>
</html>