<?php
session_start();

include_once "utils/db_connect.php";
include_once "utils/mail_functions.php";

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
                            <?php
                            if(isset($_SESSION['user_type'])){
                                if($_SESSION['user_type'] == 'admin') {
                                    echo '<li><a href="admin.php">Admin</a></li>';
                                }
                            }
                            ?>
                            <li><a href="about.php">About</a></li>
                            <li class="active"><a href="contact.php">Contact</a></li>

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
    <section id="contact-us">
        <div class="container">
            <div class="row">
                <div id="content" class="site-content col-md-8" role="main">
                    <header class="entry-header">
                        <h4 class="entry-title">
                            Contact Us                        </h4>
                    </header>
                    <?php
                        if(isset($_POST['send'])){
                            $email = $_POST['email'];
                            $name = $_POST['name'];
                            $message = $_POST['message'];

                            $info = array(
                                'name' => $name,
                                'message' => $message,
                                'email' => $email
                            );

                            if(send_feedback_email($info)){
                                echo '<div class="alert alert-success">Your message has been sent.</div>';
                            }else{
                                echo '<div class="alert alert-danger">Error occurred try again later</div>';
                            }


                        }

                    ?>

                    <form id="contact-form" class="contact-form" name="contact-form" method="post" action="contact.php">

                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" required="required" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" required="required" placeholder="Email">
                                </div>
                                <button class="btn btn-primary btn-lg" name="send">Send Message</button><br><br>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <textarea rows="10" class="form-control" placeholder="Message" name="message" required="required"></textarea>
                                </div>
                            </div>
                        </div>

                    </form>
                </div><!--/#content-->
                <div class="col-md-4">
                    <h4>Our Location</h4>
                    <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=&amp;aq=0&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;t=m&amp;output=embed"></iframe>
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section>
</div>

<div class="row">
    <div class="container">
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