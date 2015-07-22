<?php
session_start();

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
        $(function () {
            $(".cat-item").fadeTo(, 0.2); // initial opacity

            $(".cat-item").hover(function (e) {
                $(".cat-inner", this).stop().fadeTo(300, e.type == "mouseenter" ? 1 : 0.2);
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
                            <li><a href="index.php">Home</a></li>
                            <li class="active"><a href="categories.php">Categories</a></li>
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
            <h2>Categories</h2>

            <p>
                Browse through the various categories, maybe surprised by what you find.
            </p>
        </div>

    </div>

</div>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Categories</li>

    </ol>
    <div class="row">
        <div class="isotope">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 item">
                        <a href="Category/transportation.php">
                            <img src="img/icons/transport.png" class="img-responsive "/>
                        </a>

                        <div align="center">
                            <h4>Transportation</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 18"));?>
                        </div>

                    </div>

                    <div class="col-md-3 item">
                        <a href="Category/media.php">
                            <img src="img/icons/media.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Media</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 11"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/electronics.php">
                            <img src="img/icons/electronics.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Electronics</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 6"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/baggage.php">
                            <img src="img/icons/luggage.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Luggage</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 2"));?>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col-md-3 item">
                        <a href="Category/medical.php">
                            <img src="img/icons/medical.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Medical</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 12"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/mail.php">
                            <img src="img/icons/mail.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Mail</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 10"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/animals.php">
                            <img src="img/icons/pet.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Pets And Animals</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 1"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/money.php">
                            <img src="img/icons/money.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Money</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 5"));?>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col-md-3 item">
                        <a href="Category/household.php">
                            <img src="img/icons/tools.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Household And Tools</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 7"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/clothing.php">
                            <img src="img/icons/shirt.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Clothing</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 3"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/jewellery.php">
                            <img src="img/icons/jewellery.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Jewellery</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 8"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/collectables.php">
                            <img src="img/icons/collectables.jpg" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Collectibles</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 4"));?>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col-md-3 item">
                        <a href="Category/tickets.php">
                            <img src="img/icons/ticket.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Tickets</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 16"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/musical.php">
                            <img src="img/icons/music.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Musical Equipment</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 13"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/literature.php">
                            <img src="img/icons/book.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Literature</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 9"));?>
                        </div>
                    </div>
                    <div class="col-md-3 item">
                        <a href="Category/visual.php">
                            <img src="img/icons/art.png" class="img-responsive img-circle"/>
                        </a>

                        <div align="center">
                            <h4>Art</h4>
                            <b>Items: </b><?php echo mysqli_num_rows($mysqli->query("SELECT * FROM items WHERE Category = 19"));?>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="">

        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-12 footer2">
            <p>&copy; 2015 <a href="#">iCona Systems</a>, Inc. All rights reserved.</p>
        </div>
    </div>

</div>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
<script>
    var $container = $('.isotope');
    $container.isotope({
        itemSelector: '.isotope',
        layoutMode: 'fitRows'
    });
</script>

</body>
</html>