<!DOCTYPE html>
<html>
<head>
    <title>
        Uganda Police - Lost And Found
    </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/functions.js"></script>
    <style>
        #loading{
            background:url('img/loader64.gif') no-repeat;
            height: 63px;
        }
    </style>
    <script type="text/javascript" src="js/ajax.js"/>
    <script  type="text/javascript" language="JavaScript">
        function init() {
            doAjax('test.php', '', 'populateCategories', 'post', '1');
        }
    </script>


</head>
<body onload="doAjax('utils/getcategories.php', '', 'populateCategories', 'post', '1');">
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
    <form class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <select name="category" id="category" onchange="resetValues();doAjax('utils/getsubcategories.php', 'catId='+getValue('category'), 'populateSubcategories', 'post', '1')"">
                <option value="">--Choose A Category--</option>
            </select>
            <div id="loading" style="display: none;" ></div>
            <select name="subcategory" id="subcategory" disabled="disabled">
                <option value="">--Choose A SubCategory--</option>
            </select>

        </div>
        <div id="loading" style="display: none;" ></div>
    </div>
</div>

</body>
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/boostrap.js"></script>

</html>