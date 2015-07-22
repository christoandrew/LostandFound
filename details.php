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
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
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

    </div>

</div>
<div class="container">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $getItemDetails = $mysqli->query("SELECT * FROM items WHERE itemId='$id'");
        if ($getItemDetails) {
            if (mysqli_num_rows($getItemDetails) > 0) {
                while ($rows = mysqli_fetch_array($getItemDetails, MYSQL_ASSOC)) {
                    echo '<div class="col-md-4">
        <div class="" >
            <img src="uploads/'.$rows['Photo'].'" class="img img-responsive thumbnail" width="320px" height="320px">
            <h4>Date Posted</h4>
            '.$rows['DatePosted'].'
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4>Item Details</h4>
            </div>
            <div class="panel-body">
             <a href="verify.php?id='.$id.'" class="btn btn-success pull-right">Verify</a>
                <h4>Name :</h4>
                '.$rows['Name'].'
                <h4>Description</h4>
                '.$rows['Description'].'
                <h4>Serial</h4>
                '.$rows['Serial'].'
                <h4>Model</h4>
                '.$rows['Model'].'
                <h4>District</h4>
                 '.$rows['District'].'
                <h4>Town</h4>
                '.$rows['Town'].'
                <h4>Specific Location</h4>
                '.$rows['SpecificLocation'].'
            </div>
        </div>

    </div>';
                }
            } else {
                echo '<div class="alert alert-info alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                              <strong>No item found</strong>
                                            </div>';
            }
        } else {
            printf("Error occurred %s", $mysqli->error);
        }
    } else {
        echo '<div class="alert alert-danger">Invalid Item</div>';
    }
    ?>
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

<script>
    $(document).ready(function () {
        $('#container').DataTable();
    });
</script>
</body>
</html>