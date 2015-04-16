<?php
    include_once '../utils/db_connect.php';

    $db = Database::getInstance();
    $mysqli = $db->getConnection();

    if(isset($_POST['report-found'])){
        $brand;
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $date_posted = $year.'-'.$month.'-'.$day;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $type = "Found";
        $photo = "Default.png";
        $color = $_POST['color'];
        $category = $_POST['category'];
        $subcategory = $_POST['subcategory'];
        if(isset($_POST['brand'])){
            $brand = $_POST['brand'];
        }else{
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

        $createFoundItem = "INSERT INTO items(Name,Description,Type,Category,Subcategory,Brand,Serial,Model,Photo,Color,VenueType,DatePosted,District,Town,SpecificLocation,userId)
                            VALUES ('$name','$description','$type','$category','$subcategory','$brand','$serial',
                            '$model','$photo','$color','$venue','$date_posted','$district','$town','$specific_location','$userId')";

        if($mysqli->query($createFoundItem)){
            echo "<script>alert('Item Created')</script>";
        }else{
            printf("Error occurred %s",$mysqli->error);
        };

    };


?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Uganda Police - Lost And Found
    </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/functions.js"></script>
    <script src="../js/ajax.js"></script>
</head>
<body onload="doAjax('../utils/get_categories.php', '', 'populateCategories', 'post', '1');">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>Item Information</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="Found.php">
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
                                        onchange="resetValues();doAjax('../utils/get_subcategories.php', 'catId='+getValue('category'), 'populateSubcategories', 'post', '1')">
                                    <option value="0">--Choose A Category</option>
                                </select>

                                <div id="loading" style="display: none;"></div>
                                <h5>Subcategory</h5>
                                <select class="form-control" id="subcategory" name="subcategory" disabled="disabled"
                                        onchange="doAjax('../utils/get_brands.php', 'catId='+getValue('category')+'&subcatId='+getValue('subcategory'), 'populateBrands', 'post', '1')">
                                    <!-- <option value="0">--Choose A Subcategory--</option>-->
                                </select>
                                <h5>Choose A Brand</h5>
                                <select id="brand" name="brand" class="form-control" disabled="disabled">
                                    <!--<option value="0">--Choose A Brand--</option>-->
                                </select>
                                <h5>If You Cant See Your Brand!</h5>
                                <input type="text" id="specify-brand" name="specific-brand" placeholder="Specify Brand" class="form-control"/>
                                <h5>Model</h5>
                                <input type="text" id="model" name="model" placeholder="Item Model" class="form-control"/>
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
                                <textarea class="span12 form-control" name="name" rows="3" placeholder="What's up?" required></textarea>
                                <h5>Specific Description:</h5>
                                <small>Detailed Description: Name, Size, Weight, Type, Contents</small>
                                <textarea class="span12 form-control" name="description" rows="5" placeholder="What's up?" required></textarea>
                                <br><br><br>
                                <input type="submit" value="Upload Photo" id="upload-photo"
                                       class="btn btn-success btn-block"/>
                            </div>
                        </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Location Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Address (If Any):</h5>
                                    <textarea class="span12 form-control" rows="2" name="address"
                                              placeholder="Please fill in the street number and address"
                                              required></textarea>
                                    <h5>Specific Location:</h5>
                                    <small>
                                        Please describe the exact location where you believe
                                        the item was lost or found. For example: under seat 22,
                                        classroom, locker.
                                    </small>
                                    <textarea class="span12 form-control" rows="2" placeholder="What's up?" name="specific-location"
                                              required></textarea>
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
            </div>
        </div>
    </div><br><br>
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
</body>
<script type="text/javascript" src="../js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="../js/boostrap.js"></script>
</html>