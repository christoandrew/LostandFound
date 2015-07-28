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
                        <a href="index.php" class="navbar-brand">Lost And Found</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="categories.php">Categories</a></li>
                            <?php
                            if (isset($_SESSION['user_type'])) {
                                if ($_SESSION['user_type'] == 'admin') {
                                    echo '<li class="active"><a href="admin.php">Admin</a></li>';
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
            <h2>Manage Property</h2>

            <p>
                Edit or delete property which has been taken or verified.
            </p>
        </div>
    </div>

</div>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="admin.php">Home</a></li>
        <li class="active"><a href="#">Manage Property</a></li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs pull-right" id="list-select" role="tablist">
                            <li class="active"><a href="#list" role="tab" data-toggle="tab"><i
                                        class="fa fa-list"></i></a>
                            </li>
                        </ul>
                    </div>


                </div>
                <br>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="list">
                        <table class="table" id="container" style="background-color: #ffffff">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th class="hidden-sm">Description</th>
                                <th>Category</th>
                                <th>Verified</th>
                                <th>Verification Code</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getAllAnimals = $mysqli->query("SELECT items.*, DATE_FORMAT(items.DatePosted,'%b %d %Y') AS DatePosted FROM items");

                            if ($getAllAnimals) {
                                if (mysqli_num_rows($getAllAnimals) > 0) {
                                    while ($rows = mysqli_fetch_array($getAllAnimals, MYSQL_ASSOC)) {
                                        $getCategory = $mysqli->query("SELECT * FROM categories WHERE catId ='" . $rows['Category'] . "' ");
                                        $getSubCategory = $mysqli->query("SELECT * FROM subcategories WHERE catId ='" . $rows['Subcategory'] . "' ");
                                        $getUser = $mysqli->query("SELECT * FROM Users WHERE userId='" . $rows['userId'] . "'");
                                        $userRow = mysqli_fetch_array($getUser, MYSQL_ASSOC);
                                        if (!$getSubCategory || !$getCategory) printf("Error occurred %s", $mysqli->error);
                                        $subcatRow = mysqli_fetch_array($getSubCategory, MYSQL_ASSOC);
                                        $catRow = mysqli_fetch_array($getCategory, MYSQL_ASSOC);
                                        echo '<tr>
                                <td>
                                    <img class="" src="uploads/' . $rows["Photo"] . '" alt="" width="80px" height="80px">
                                </td>
                                <td class="td-width">
                                    <h4><a href="details.php?id=' . $rows['itemId'] . '">' . $rows["Name"] . '</a></h4>
                                        <p class="description">' . $rows["Description"] . '</p>
                                    <i class="fa fa-calendar"></i><small class=""> Posted ' . $rows["DatePosted"] . '</small>
                                </td>
                                <td>
                                    <span class="label label-success">' . $catRow['Category'] . '</span>&nbsp;
                                    <span class="label label-success">' . $subcatRow['Subcategory'] . '</span>
                                </td>
                                <td>';
                                        if ($rows['verified'] == 1) {
                                            echo 'Verified';
                                        } else {
                                            echo 'Not Verified';
                                        }


                                        echo '</td>
                                <td>';
                                    if($rows['verified'] == 1){
                                        echo $rows['verification_code'];
                                    }else{
                                        echo 'No code';
                                    }
                                echo '</td>

                                <td>
                                    <a href="edit.php?id=' . $rows['itemId'] . '" class="btn btn-primary">Edit</a>
                                    <a href="delete.php?id=' . $rows['itemId'] . '" class="btn btn-danger">Delete</a>
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

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">

            <div class="col-sm-12 footer2">
                <p>&copy; 2015 <a href="#">iCona Systems</a>, Inc. All rights reserved.</p>
            </div>
        </div>


    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>

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