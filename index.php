<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>FAA Data App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.24/angular.min.js"></script>
    <script src="app.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-touch.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-animate.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/csv.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/pdfmake.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script>
    <script src="http://ui-grid.info/release/ui-grid-unstable.js"></script>
    <link rel="stylesheet" href="http://ui-grid.info/release/ui-grid-unstable.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="Reset3" href="#" style="color:#f5f5f5">FAA Database Info</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" >
                <li id="Reset"><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">

    <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">

            <ul class="nav nav-sidebar">
                <li id="Reset2"><a href="#">Overview</a></li>
                <li id="searchByDateBtn"><a href="#">Search By Date</a></li>
                <li id="searchByModelBtn"><a href="#">Search By Model</a></li>
            </ul>

        </div><!--/span-->

        <div class="col-sm-9 col-md-10 main" style="height:860px">

            <!--toggle sidebar button-->
            <p class="visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
            </p>

            <!-- Page Body -->
            <div id="defaultBody">
                <?php include 'body1.html';?>
            </div>
            <div ng-app='angularPostPHP'>
            <div id="planesByDate">
                <?php include 'planes_by_date_v2.html';?>
            </div>

            <div id="planesByModel">
                <?php include 'planes_by_model.html';?>
            </div>
            </div>
            <!--
            <marquee style="background-color: #eee; border: 1px solid #ccc">
                <p>Sample ticker text goes here</p>
            </marquee> -->


        </div><!--/row-->
    </div>
</div><!--/.container-->

<footer class="navbar-fixed-bottom" style="background-color:#222; color:lightgrey;">

    <div class="container pull-left">

        <p class="muted credit">
        ©2015 SweeneyTech - Contact:<a href="mailto:nsweeney333@gmail.com" target="_top"> nsweeney333@gmail.com</a>
        </p>
    </div>
</footer>



<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script>
    // Using this to hide parts of the page until requested.
    $(document).ready(function() {

        //hide things you dont want to be shown when page is reset
        $("#planesByDate").hide();
        $("#planesByModel").hide();

        $("#searchByDateBtn").click(function() {
            $("#defaultBody").hide();
            $("#searchByModel").hide();
            $("#planesByDate").show();
            //$('#IsLate').val('True');
        });

        $("#searchByModelBtn").click(function() {
            $("#defaultBody").hide();
            $("#planesByDate").hide();
            $("#planesByModel").show();
            //$('#IsLate').val('True');
        });


        $("#Reset").click(function() {
            // Reload the whole body of the page
            location.reload(true);
        });

        $("#Reset2").click(function() {
            // Reload the whole body of the page
            location.reload(true);
        });

        $("#Reset3").click(function() {
            // Reload the whole body of the page
            location.reload(true);
        });

    });
</script>
</body>
</html>