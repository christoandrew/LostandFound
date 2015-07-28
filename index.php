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
                            if (isset($_SESSION['user_type'])) {
                                if ($_SESSION['user_type'] == 'admin') {
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
                            } else {
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
            <h1>Online Property Ownership Verification System</h1>

            <p>
                This is a platform where the general public can find lost property that has been found<br>
                and they verify ownership.
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
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 6 AND verified=0"));
                        ?></span></a>
                <a href="Category/jewellery.php" class="list-group-item"><i
                        class="fa fa-diamond fa-2x"></i>Jewellery<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 8 AND verified=0"));
                        ?></span></a>
                <a href="Category/animals.php" class="list-group-item"><i class="fa fa-paw fa-2x fa-fw"></i>Animals<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 1 AND verified=0"));
                        ?></span></a>
                <a href="Category/baggage.php" class="list-group-item"><i class="fa fa-briefcase fa-2x fa-fw"></i>
                    Luggage<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 2 AND verified=0"));
                        ?></span></a>
                <a href="Category/literature.php" class="list-group-item"><i class="fa fa-book fa-2x fa-fw"></i>Literature<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 9 AND verified=0"));
                        ?></span></a>
                <a href="Category/transportation.php" class="list-group-item"><i class="fa fa-car fa-2x fa-fw"></i>Transportation<span
                        class="badge pull-right"><?php
                        echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 18 AND verified=0"));
                        ?></span></a>
            </div>
            <a href="categories.php" class="btn btn-default btn-block">All Categories<i
                    class="fa fa-angle-double-right" style="margin-left: 10px;"></i> </a>

        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row" style="margin-top: 4px">

                <div class="col-md-12 col-sm-12 col-s-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
                            </li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                            <!-- First slide -->
                            <div class="item active" style="background: url(img/slider/Lost-Property.jpg) no-repeat;">
                                <div class="carousel-caption">
                                    <h3 data-animation="animated bounceInLeft">
                                        This is the caption for slide 1
                                    </h3>

                                    <h3 data-animation="animated bounceInRight">
                                        This is the caption for slide 1
                                    </h3>
                                    <button class="btn btn-primary btn-lg"
                                            data-animation="animated zoomInUp">Button
                                    </button>
                                </div>
                            </div>
                            <!-- /item -->

                            <!-- Second slide -->
                            <div class="item" style="background: url(img/slider/road.jpg) no-repeat;">
                                <div class="carousel-caption">
                                    <h3 class="icon-container" data-animation="animated bounceInDown">
                                        <span class="glyphicon glyphicon-heart"></span>
                                    </h3>

                                    <h3 data-animation="animated bounceInUp">
                                        This is the caption for slide 2
                                    </h3>
                                    <button class="btn btn-primary btn-lg"
                                            data-animation="animated zoomInRight">Button
                                    </button>
                                </div>
                            </div>
                            <!-- /.item -->

                            <!-- Third slide -->
                            <div class="item">
                                <div class="carousel-caption">
                                    <h3 class="icon-container" data-animation="animated zoomInLeft">
                                        <span class="glyphicon glyphicon-glass"></span>
                                    </h3>

                                    <h3 data-animation="animated flipInX">
                                        This is the caption for slide 3
                                    </h3>
                                    <button class="btn btn-primary btn-lg"
                                            data-animation="animated lightSpeedIn">Button
                                    </button>
                                </div>
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.carousel-inner -->

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic"
                           role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic"
                           role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                    <!-- /.carousel -->
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
    </div>
    <br><br>

    <div class="row">
        <div class="container">
            <div class="col-sm-12 footer2">
                <p>&copy; 2015 <a href="#">iCona Systems</a>, Inc. All rights reserved.</p>
            </div>
        </div>


    </div>

</div>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/animate.js"></script>

<script>
    $('#news-feed').mCustomScrollbar({
        theme: "dark-thick"
    })(jQuery);
</script>

</body>
</html>