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
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
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
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs pull-right" id="list-select" role="tablist">
                            <li><a href="#list" role="tab" data-toggle="tab"><i
                                        class="fa fa-list"></i></a>
                            </li>
                            <li class="active"><a href="#grid" role="tab" data-toggle="tab"><i class="fa fa-th"></i></a>
                            </li>
                        </ul>
                    </div>


                </div>
                <br>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane list" id="list">
                        <table class="table table-bordered table-responsive" id="container">
                            <thead>
                            <tr>
                                <th>Item Id</th>
                                <th>User Image</th>
                                <th class="hidden-sm">About</th>
                                <th>Status</th>
                                <th>Contacts</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getAllAnimals = $mysqli->query("SELECT * FROM items WHERE Category = '1'");
                            if ($getAllAnimals) {
                                if (mysqli_num_rows($getAllAnimals) > 0) {
                                    while ($rows = mysqli_fetch_array($getAllAnimals, MYSQL_ASSOC)) {
                                        echo '<tr>
                                <td>' . $rows["itemId"] . '</td>
                                <td width="140px">
                                    <img class="" src="../uploads/' . $rows["Photo"] . '" alt="" width="130px" height="130px">
                                </td>
                                <td class="td-width">
                                    <h3><a href="#">' . $rows["Name"] . '</a></h3>
                                        <p>' . $rows["Description"] . '</p>
                                    <small class="hex">Posted' . $rows["DatePosted"] . '</small>
                                </td>
                                <td>
                                    <span class="label label-success">Success</span>
                                </td>
                                <td>
                                    <ul class="list-inline s-icons">
                                        <li>
                                            <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                <i class="fa fa-dropbox"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <span><a href="#">info@example.com</a></span>
                                    <span><a href="#">www.htmlstream.com</a></span>
                                </td>
                            </tr>';
                                    }

                                } else {
                                    echo "No Items Found";
                                }
                            } else {
                                printf("Error Occurred %s", $mysqli->error);
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane active" id="grid">
                        <div class="row">
                            <?php
                            $getAllAnimals = $mysqli->query("SELECT * FROM items WHERE Category = '1'");
                            if ($getAllAnimals) {
                                if (mysqli_num_rows($getAllAnimals) > 0) {
                                    while ($rows = mysqli_fetch_array($getAllAnimals, MYSQL_ASSOC)) {
                                        echo '<div class="col-sm-3 col-lg-3 col-md-3">
                                                    <div class="thumbnail">
                                                        <img src="../uploads/'.$rows["Photo"].'" width="320px" height="150px" alt="">

                                                        <div class="caption">
                                                            <h4 class="pull-right">$24.99</h4>
                                                            <h4><a href="#">First Product</a>
                                                            </h4>

                                                            <p>See more snippets like this online store item at <a target="_blank"
                                                                                                                   href="http://www.bootsnipp.com">Bootsnipp
                                                                    - http://bootsnipp.com</a>.</p>
                                                        </div>
                                                        <div class="ratings">
                                                            <p class="pull-right">15 reviews</p>

                                                            <p>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>';
                                    }
                                }
                            }
                            ?>
                        </div>

                    </div>

                </div>

            </div>
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
<script src="../js/jquery.dataTables.min.js"></script>
<script src="..js/dataTables.bootstrap.js"></script>

<script>
    $(document).ready(function () {
        //$('#container').DataTable();
    });
</script>
</body>
</html>