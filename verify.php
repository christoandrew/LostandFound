<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if ($_SESSION['username'] == '' || $_SESSION['username'] == null){
    header("Location:login.php?return_url=verify.php&id=".$id);
}

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
                        <a href="../index.php" class="navbar-brand">Lost And Found</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
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
                        < <ul class="nav navbar-nav pull-right">
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
            <h2>Verification</h2>

            <p>
                Please correctly fill the form to claim your property.
            </p>
        </div>
    </div>

</div>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="#" class="active">Verification</a></li>
    </ol>

    <div class="row">
        <div class="col-md-5 col-md-offset-4" style="">
            <h3>Please answer the security question</h3>
            <label>What is the serial number of the property</label>

            <form role="form" action="confirm-verification.php" method="post">
                <div class="form-group">
                    <input type="text" name="serial" class="form-control" placeholder="Serial Number" required>
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                </div>
                <div class="form-group">
                    <input type="submit" name="verify" value="Submit" class="btn btn-success pull-right"><br><br>
                </div>
            </form>
        </div>
    </div>


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
<script type="text/javascript" src="../js/jquery-1.11.2.js"></script>
<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="..js/dataTables.bootstrap.js"></script>

<script>
    $('#news-feed').mCustomScrollbar({
        theme: "dark-thick"
    })(jQuery);
</script>
<script>
    $(document).ready(function () {
        $('#container').DataTable();
    });
</script>
</body>
</html>