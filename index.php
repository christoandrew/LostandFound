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
            <nav class="navbar navbar-inverse">
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
        <div class="col-md-3 hidden-sm hidden-xs">
            <h3 class="side-heading">Categories</h3>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-laptop fa-2x fa-fw"></i>Electronics<span
                        class="badge pull-right">32</span></li>
                <li class="list-group-item"><i class="fa fa-money fa-2x fa-fw"></i> Money</li>
                <li class="list-group-item"><i class="fa fa-diamond fa-2x fa-fw"></i>Jewellery</li>
                <li class="list-group-item"><i class="fa fa-paw fa-2x fa-fw"></i>Animals</li>
                <li class="list-group-item"><i class="fa fa-briefcase fa-2x fa-fw"></i> Luggage</li>
                <li class="list-group-item"><i class="fa fa-envelope fa-2x fa-fw"></i> Mail</li>
                <li class="list-group-item"><i class="fa fa-trophy fa-2x fa-fw"></i>Collectables</li>
                <li class="list-group-item"><i class="fa fa-book fa-2x fa-fw"></i>Literature</li>
                <li class="list-group-item"><i class="fa fa-car fa-2x fa-fw"></i>Transportation</li>
            </ul>
            <a href="all-categories" class="btn btn-default btn-block">All Categories<i
                    class="fa fa-angle-double-right" style="margin-left: 10px;"></i> </a>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-s-12">
                    <div class="main-gallery">
                        <div class="gallery-cell">
                            <img src="img/slider/flower.jpg"/>
                        </div>
                        <div class="gallery-cell">
                            <img src="img/slider/nature.jpg"/>
                        </div>
                        <div class="gallery-cell">
                            <img src="img/slider/road.jpg"/>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col-md-12">
                    <div class="side-heading">
                        Recently Added
                        <div class="pull-right">
                            <a class="" href="#carousel-example-generic"
                               role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="" href="#carousel-example-generic" role="button"
                               data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="carousel-example-generic" data-interval="false" class="carousel slide"
                                 data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sielit.</p>
                                                    </div>

                                                    <div class="ratings">
                                                        <p class="pull-right">31 revi
                                                            ews</p>
                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-5 col-xs-5">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6">

                                                <div class="thumbnail">
                                                    <img src="http://placehold.it/320x150" alt="">

                                                    <div class="caption">
                                                        <h4 class="pull-right">$74.99</h4>
                                                        <h4><a href="#">Third Product</a>
                                                        </h4>

                                                        <p>This is a short description. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing
                                                            elit.</p>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="pull-right">31 reviews</p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star"></span>
                                                            <span class="glyphicon glyphicon-star-empty"></span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    ...
                                </div>

                                <!-- Controls -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="testimonial-wrapper">
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class=testimonial>
                        <div class="testimonial-content">
                            <div style="visibility: visible;" class="testimonial-item">

                                <div class="testimonial-person-pic">
                                    <img src="img/testimonial2.jpg" alt="John Doe" class="img-responsive">
                                </div>

                                <div class="testimonial-text">
                                    Lorem ipsum dolor sit amet. liber regione eu sit.
                                </div>

                                <div class="testimonial-by">
                                    <span class="testimonial-by-name">John Doe,</span>
                                    <span class="testimonial-by-position">Project Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class=testimonial>
                        <div class="testimonial-content">
                            <div style="visibility: visible;" class="testimonial-item">

                                <div class="testimonial-person-pic">
                                    <img src="img/testimonial2.jpg" alt="John Doe" class="img-responsive">
                                </div>

                                <div class="testimonial-text">
                                    Lorem ipsum dolor sit amet. liber regione eu sit.
                                </div>

                                <div class="testimonial-by">
                                    <span class="testimonial-by-name">John Doe,</span>
                                    <span class="testimonial-by-position">Project Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class=testimonial>
                        <div class="testimonial-content">
                            <div style="visibility: visible;" class="testimonial-item">

                                <div class="testimonial-person-pic">
                                    <img src="img/testimonial2.jpg" alt="John Doe" class="img-responsive">
                                </div>

                                <div class="testimonial-text">
                                    Lorem ipsum dolor sit amet. liber regione eu sit.
                                </div>

                                <div class="testimonial-by">
                                    <span class="testimonial-by-name">John Doe,</span>
                                    <span class="testimonial-by-position">Project Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>

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
<script type="text/javascript" src="js/flickity.pkgd.min.js"></script>

<script type="text/javascript">
    $('.main-gallery').flickity({
        // options
        cellAlign: 'left',
        contain: true,
        autoPlay: true
    });
</script>

</body>
</html>