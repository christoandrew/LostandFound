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
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Date The Item Was Found</h5>

                            <div class="form-inline">
                                <select id="day" class="form-control">
                                    <option value="0">Select Day</option>
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
                                <select name="year" class="form-control">
                                    <option value="0">Select Year</option>
                                </select>
                            </div>
                            <h5>Category</h5>

                            <select class="form-control" name="category" id="category"
                                    onchange="resetValues();doAjax('../utils/get_subcategories.php', 'catId='+getValue('category'), 'populateSubcategories', 'post', '1')">
                                <option value="0">--Choose A Category</option>
                            </select>

                            <div id="loading" style="display: none;"></div>
                            <h5>Subcategory</h5>
                            <select class="form-control" id="subcategory" disabled="disabled"
                                    onchange="doAjax('../utils/get_brands.php', 'catId='+getValue('category')+'&subcatId='+getValue('subcategory'), 'populateBrands', 'post', '1')">
                                <!-- <option value="0">--Choose A Subcategory--</option>-->
                            </select>
                            <h5>Choose A Brand</h5>
                            <select id="brand" class="form-control" disabled="disabled">
                                <!--<option value="0">--Choose A Brand--</option>-->
                            </select>
                            <h5>If You Cant See Your Brand!</h5>
                            <input type="text" id="specify-brand" placeholder="Specify Brand" class="form-control"/>
                            <h5>Model</h5>
                            <input type="text" id="model" placeholder="Item Model" class="form-control"/>
                            <h5>Serial Number/ID/Baggage Claim</h5>
                            <input type="text" id="serial" class="form-control"/>
                            <h5>Color</h5>
                            <select class="form-control"></select>
                        </div>
                        <div class="col-md-6">
                            <h5>Title:</h5>
                            <small>
                                Short, generic description - example: "Large Black Lab" or "Smart Phone"
                            </small>
                            <textarea class="span12 form-control" rows="3" placeholder="What's up?" required></textarea>
                            <h5>Specific Description:</h5>
                            <small>Detailed Description: Name, Size, Weight, Type, Contents</small>
                            <textarea class="span12 form-control" rows="5" placeholder="What's up?" required></textarea>
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
                                    <textarea class="span12 form-control" rows="2"
                                              placeholder="Please fill in the street number and address"
                                              required></textarea>
                                    <h5>Specific Location:</h5>
                                    <small>
                                        Please describe the exact location where you believe
                                        the item was lost or found. For example: under seat 22,
                                        classroom, locker.
                                    </small>
                                    <textarea class="span12 form-control" rows="2" placeholder="What's up?"
                                              required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <h5>District:</h5>
                                    <select class="form-control"></select>
                                    <h5>Town:</h5>
                                    <select class="form-control"></select>
                                    <h5>Location/Venue Type:</h5>
                                    <select class="form-control"></select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-lg btn-info pull-right" value="Save Changes And Submit"
                   id="report-found"/>
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