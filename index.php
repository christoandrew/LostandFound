<?php
session_start();

include_once "utils/db_connect.php";

$db = Database::getInstance();
$mysqli = $db->getConnection();

//$getPhoto = $mysqli->query("SELECT Photo")


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
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
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
                        <a class="navbar-brand">Lost And Found</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="categories.php">Categories</a></li>
                            <?php
                                if(isset($_SESSION['user_type'])){
                                    if($_SESSION['user_type'] == 'admin') {
                                        echo '<li><a href="admin.php">Admin</a></li>';
                                    }
                                }
                            ?>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>

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

    <div class="col-lg-12 banner">
        <div class="container">
            <h1>Welcome To Lost And Found</h1>

            <p>
                This is a portal where you can find property lost and save yourself the misery and hustle<br>
                of having to move long distances pay lots of money in search for your property.
            </p>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-3 hidden-sm hidden-xs">
            <h3 class="side-heading">Categories</h3>

            <div class="list-group">
                <a href="Category/electronics.php" class="list-group-item"><i class="fa fa-laptop fa-2x fa-fw"></i>Electronics<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 6"));
                        ?></span></a>
                <a href="Category/money.php" class="list-group-item"><i class="fa fa-money fa-2x"></i> Money<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 5"));
                        ?></span></a>
                <a href="Category/jewellery.php" class="list-group-item"><i
                        class="fa fa-diamond fa-2x"></i>Jewellery<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 8"));
                        ?></span></a>
                <a href="Category/animals.php" class="list-group-item"><i class="fa fa-paw fa-2x fa-fw"></i>Animals<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 1"));
                        ?></span></a>
                <a href="Category/baggage.php" class="list-group-item"><i class="fa fa-briefcase fa-2x fa-fw"></i>
                    Luggage<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 2"));
                        ?></span></a>
                <a href="Category/mail.php" class="list-group-item"><i class="fa fa-envelope fa-2x fa-fw"></i> Mail<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 10"));
                        ?></span></a>
                <a href="Category/collectables.php" class="list-group-item"><i class="fa fa-trophy fa-2x fa-fw"></i>Collectables<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 4"));
                        ?></span></a>
                <a href="Category/literature.php" class="list-group-item"><i class="fa fa-book fa-2x fa-fw"></i>Literature<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 9"));
                        ?></span></a>
                <a href="Category/transportation.php" class="list-group-item"><i class="fa fa-car fa-2x fa-fw"></i>Transportation<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 18"));
                        ?></span></a>
            </div>
            <a href="categories.php" class="btn btn-default btn-block">All Categories<i
                    class="fa fa-angle-double-right" style="margin-left: 10px;"></i> </a>

            <div class="adsbygoogle">

            </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row" style="margin-top: 4px">

                <div class="col-md-12 col-sm-12 col-s-12">
                    <div class="main-gallery">
                        <div class="gallery-cell" style="background: url(img/slider/flower.jpg) 100%;">
                            <!--<img src="img/slider/flower.jpg"/>-->
                            <div class="carousel-caption">
                                <h1 class="animated slideInLeft"><b>You mother cant find it</b></h1>

                                <p class="animated slideInUp">
                                    We will find it for you
                                </p>
                            </div>

                        </div>
                        <div class="gallery-cell" style="background-image: url(img/slider/trackr-bravo.png);">

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
                                            <?php
                                            $getLatest = $mysqli->query("SELECT * FROM items ORDER BY DatePosted DESC LIMIT 6");
                                            if ($getLatest) {
                                                if (mysqli_num_rows($getLatest) > 0) {
                                                    while ($rows = mysqli_fetch_array($getLatest, MYSQL_ASSOC)) {
                                                        echo '<div class="col-md-4 col-sm-6 col-xs-6">

                                                                <div class="thumbnail item-home">
                                                                    <img class="img" width="900" height="600" src="uploads/' . $rows["Photo"] . '" alt="">

                                                                    <div class="caption">
                                                                        <a href="#">' . $rows["Name"] . '</a>


                                                                        <p class="hidden-sm">' . $rows["Description"] . '</p>
                                                                    </div>

                                                                </div>

                                                            </div>';
                                                    }
                                                }

                                            } else {
                                                printf("Error occurred %s", $mysqli->error);
                                            }
                                            ?>
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
        <div class="container">
            <div class="col-lg-12 footer">
                <div class="col-sm-6 col-md-3">
                    <div><h3>About Us</h3>

                        <div>
                            <p>
                                Lost and Found is an online portal for enabling people to locate items they or items
                                they found.
                                The main reason as to why this initiative is to create and generate a platform to
                                simplify the life of an average Ugandan who has lost hope after losing a valuable item.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div><h3>Latest News</h3>

                                <div id="news-feed" class="news-feed">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="Images/testimonial2.jpg" width="50px"
                                                 height="50px" alt="...">
                                        </a>

                                        <div class="media-body">
                                            <h5 class="media-heading"><b>Lorem ipsum</b></h5>
                                            <small style="font-size: smaller;">Lorem ipsum consequat. Duis aute irure
                                                dolor in
                                                reprehenderit in voluptate velit.
                                            </small>

                                        </div>
                                    </div>
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="Images/testimonial1.jpg" width="50px"
                                                 height="50px" alt="...">
                                        </a>

                                        <div class="media-body">
                                            <h5 class="media-heading"><b>Lorem ipsum</b></h5>
                                            <small style="font-size: smaller;">Lorem ipsum consequat. Duis aute irure
                                                dolor in
                                                reprehenderit in voluptate velit.
                                            </small>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="Images/testimonial2.jpg" width="50px"
                                                 height="50px" alt="...">
                                        </a>

                                        <div class="media-body">
                                            <h5 class="media-heading"><b>Lorem ipsum</b></h5>
                                            <small style="font-size: smaller;">Lorem ipsum consequat. Duis aute irure
                                                dolor in
                                                reprehenderit in voluptate velit.
                                            </small>

                                        </div>
                                    </div>
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="Images/testimonial1.jpg" width="50px"
                                                 height="50px" alt="...">
                                        </a>

                                        <div class="media-body">
                                            <h5 class="media-heading"><b>Lorem ipsum</b></h5>
                                            <small style="font-size: smaller;">Lorem ipsum consequat. Duis aute irure
                                                dolor in
                                                reprehenderit in voluptate velit.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
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
<script>
    $('#news-feed').mCustomScrollbar({
        theme: "dark-thick"
    })(jQuery);
</script>

</body>
</html>