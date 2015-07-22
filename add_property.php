<?php
session_start();
if($_SESSION['user_type'] != 'admin') header("Location:index.php");
?>

<?php
include_once 'utils/db_connect.php';

$db = Database::getInstance();
$mysqli = $db->getConnection();

$user_id =  $_SESSION['userId'];

if (isset($_POST['report-found'])) {
    $brand;
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $date_posted = $year . '-' . $month . '-' . $day;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $color = $_POST['color'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    if (isset($_POST['brand'])) {
        $brand = $_POST['brand'];
    } else {
        $brand = $_POST['specific-brand'];
    }
    $model = $_POST['model'];
    $serial = $_POST['serial'];
    $address = $_POST['address'];
    $specific_location = $_POST['specific-location'];
    $district = $_POST['district'];
    $town = $_POST['town'];
    $venue = $_POST['venue'];
    $userId = "admin";

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $temp = explode(".", basename($_FILES["fileToUpload"]["name"]));
    $photo = rand(1, 99999) . '.' . end($temp);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG"
        && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" && $imageFileType != "GIF"

    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "" . $photo)) {
            // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $createFoundItem = "INSERT INTO items(Name,Description,Type,Category,Subcategory,Brand,Serial,Model,Photo,Color,VenueType,DatePosted,District,Town,SpecificLocation,userId)
                            VALUES ('$name','$description','$category','$subcategory','$brand','$serial',
                            '$model','$photo','$color','$venue','$date_posted','$district','$town','$specific_location','$user_id')";

    if ($mysqli->query($createFoundItem)) {
        echo "<script>alert('Item Created')</script>";
    } else {
        printf("Error occurred %s", $mysqli->error);
    };

};


?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Uganda Police - Lost And Found
    </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/cropper.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/main.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/ajax.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }

        }
    </script>
</head>
<body onload="doAjax('utils/get_categories.php', '', 'populateCategories', 'post', '1');">
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
            <h1>Add Property</h1>

            <p>
                If at any point you have a query please email the support team: support@reportmyloss.com
            </p>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="">

            </div>
            <ol class="breadcrumb">
                <li><a href="admin.php">Home</a></li>
                <li class="active">Add Property</li>
            </ol>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>Item Information</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Date The Item Was Found</h5>

                                <div class="form-inline">
                                    <select id="day" name="day" class="form-control">
                                        <option value="0">Select Day</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                    </select>
                                    <select name="month" id="month" class="form-control select-date">
                                        <option value="0">Select Month</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sept</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>
                                    <select name="year" name="year" class="form-control">
                                        <option value="0">Select Year</option>
                                        <option>2015</option>
                                        <option>2014</option>
                                        <option>2013</option>
                                        <option>2012</option>
                                        <option>2011</option>
                                        <option>2010</option>
                                        <option>2009</option>
                                        <option>2008</option>
                                        <option>2007</option>
                                        <option>2006</option>
                                        <option>2004</option>
                                        <option>2003</option>
                                        <option>2002</option>
                                        <option>2001</option>
                                        <option>2000</option>
                                        <option>1999</option>
                                        <option>1998</option>
                                    </select>
                                </div>
                                <h5>Category</h5>

                                <select class="form-control" name="category" id="category"
                                        onchange="resetValues();doAjax('utils/get_subcategories.php', 'catId='+getValue('category'), 'populateSubcategories', 'post', '1')">
                                    <option value="0">Choose A Category</option>
                                </select>

                                <div id="loading" style="display: none;"></div>
                                <h5>Subcategory</h5>
                                <select class="form-control" id="subcategory" name="subcategory" disabled="disabled"
                                        onchange="doAjax('utils/get_brands.php', 'catId='+getValue('category')+'&subcatId='+getValue('subcategory'), 'populateBrands', 'post', '1')">
                                </select>
                                <h5>Choose A Brand</h5>
                                <select id="brand" name="brand" class="form-control" disabled="disabled">
                                    <!--<option value="0">--Choose A Brand--</option>-->
                                </select>
                                <h5>If You Cant See Your Brand!</h5>
                                <input type="text" id="specify-brand" name="specific-brand" placeholder="Specify Brand"
                                       class="form-control"/>
                                <h5>Model</h5>
                                <input type="text" id="model" name="model" placeholder="Item Model"
                                       class="form-control"/>
                                <h5>Serial Number/ID/Baggage Claim</h5>
                                <input type="text" id="serial" name="serial" class="form-control"/>
                                <h5>Color</h5>
                                <select class="form-control" name="color" id="color">
                                    <option>Black</option>
                                    <option>white</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <h5>Title:</h5>
                                <small>
                                    Short, generic description - example: "Large Black Lab" or "Smart Phone"
                                </small>
                                <textarea class="span12 form-control" name="name" rows="3" placeholder="What's up?"
                                    ></textarea>
                                <h5>Specific Description:</h5>
                                <small>Detailed Description: Name, Size, Weight, Type, Contents</small>
                                <textarea class="span12 form-control" name="description" rows="5"
                                          placeholder="What's up?"></textarea>
                                <br>
                                <div class="img-view">
                                    <img src="img/lost_found_sign.jpg" id="img-preview" name="img-preview" alt="Item Image" width="100px"
                                         height="100px"/>
                                </div><br>

                                <input type="file" value="Upload Photo" required="" id="fileToUpload" name="fileToUpload"
                                       class="btn btn-success btn-block" onchange="readURL(this)"/>
                            </div>
                        </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>Location Information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Address (If Any):</h5>
                                    <textarea class="span12 form-control" rows="2" name="address"
                                              placeholder="Please fill in the street number and address"
                                        ></textarea>
                                    <h5>Specific Location:</h5>
                                    <small>
                                        Please describe the exact location where you believe
                                        the item was lost or found. For example: under seat 22,
                                        classroom, locker.
                                    </small>
                                    <textarea class="span12 form-control" rows="2" placeholder="What's up?"
                                              name="specific-location"
                                        ></textarea>
                                </div>
                                <div class="col-md-6">
                                    <h5>District:</h5>
                                    <select class="form-control" name="district">
                                        <option>Kampala</option>
                                        <option>Jinja</option>
                                    </select>
                                    <h5>Town:</h5>
                                    <select class="form-control" name="town">
                                        <option>--Select District--</option>
                                        <option>Bweyogerere</option>
                                        <option>Walukuba</option>
                                    </select>
                                    <h5>Location/Venue Type:</h5>
                                    <select class="form-control" name="venue">
                                        <option>Cinema</option>
                                        <option>Hospital</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-lg btn-info pull-right" value="Save Changes And Submit"
                   id="report-found" name="report-found"/>
            </form>
        </div>
        <div class="col-md-3 hidden-xs">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pro Tips
                </div>
                <div class="list-group">
                    <p class="list-group-item pro-tip">

                        We recommend omitting one important, but not
                        obvious characteristic about the found property or
                        pet to help ensure the correct owner is identified.

                    </p>

                    <p class="list-group-item pro-tip">

                        When someone contacts you about your found ad,
                        this omission will help you identify the true owner,
                        and avoid scam artists.

                    </p>

                    <p class="list-group-item pro-tip">

                        For pets, we recommend that you not reveal the gender.
                        If you are ever in doubt, take the item to
                        your local law enforcement department.

                    </p>

                    <p class="list-group-item pro-tip">

                        We also recommmend that you fill the information to best of your ability.
                        Inaccurate information will lead to a more delayed time to find your property
                        or not at all.

                    </p>
                </div>
                <div>

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
                <div><h3>Useful Links</h3>

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
                                ="" type="email">
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
</body>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/cropper.min.js"></script>

</html>