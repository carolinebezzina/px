<?php 
    $WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
    include ($WebsiteRoot . '/includes/editPageSQL.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - South Coast Tyre Recycling</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galdeano" rel="stylesheet">
    <meta name="description" content="South Coast Tyre Recycling is an EPA certified company that offer a pick-up service to customers, which allows for the easy disposal of unwanted tyres.">
</head>
<body>
    <div class="container-fluid text-center">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#loginNavbar"
                    data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button> <a class="navbar-brand hidden-xs" href="index.php">South Coast Tyre Recycling</a><a class="navbar-brand visible-xs menu">Menu</a>
                </div>
                <div class="collapse navbar-collapse" id="loginNavbar">
                    <ul class="nav navbar-nav navbar-right">
                    <!-- If not logged in -->
                    <?php if ($_SESSION["customer"] == false && $_SESSION["user"] == false && $_SESSION["admin"] == false) {echo "
                        <li>
                            <a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>
                        </li>
                        <li>
                            <a href='registration.php'><span class='glyphicon glyphicon-user'></span> Register</a>
                        </li>
                    ";}?>
                    <!-- If logged in as customer -->
                    <?php if ($_SESSION["customer"] == true) {echo "

                    ";}?>
                    <!-- If logged in as admin -->
                    <?php if ($_SESSION["admin"] == true) {echo "
                        <li>
                            <a href='editUser.php'>Edit Users</a>
                        </li>
                        <li>
                            <a href='editPage.php'>Edit Pages</a>
                        </li>
                    ";}?>
                    <!-- If logged in as employee or admin -->
                    <?php if ($_SESSION["user"] == true || $_SESSION["admin"] == true) {echo "
                        <li>
                            <a href='jobSheet.php'>Job Sheets</a>
                        </li>
                    ";}?>
                    <!-- If logged in -->
                    <?php if ($_SESSION["customer"] == true || $_SESSION["user"] == true || $_SESSION["admin"] == true) {echo "
                        <li>
                            <a href='booking.php'>Bookings</a>
                        </li>
                        <li>
                            <a href='accounts.php'><span class='glyphicon glyphicon-user'></span> Account</a>
                        </li>
                        <li>
                            <a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>
                        </li>
                    ";}?>
                    </ul>
                    <hr class="visible-xs">
                    <ul class="nav navbar-nav visible-xs">
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li>
                        <li>
                            <a href="why.php">Why?</a>
                        </li>
                        <li>
                            <a href="about.php">About Us</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row content">
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-left">
                <header>
                    <div class="navContainer">
                        <nav class="navbar navbar-default">
                            <div class="hidden-xs" id="mainNavbar">
                                <ul class="nav nav-tabs navbar-right">
                                    <li class="active">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li>
                                        <a href="services.php">Services</a>
                                    </li>
                                    <li>
                                        <a href="why.php">Why?</a>
                                    </li>
                                    <li>
                                        <a href="about.php">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>
                <div class="carousel slide" data-ride="carousel" id="myCarousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#myCarousel"></li>
                        <li data-slide-to="1" data-target="#myCarousel"></li>
                        <li data-slide-to="2" data-target="#myCarousel"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active"><img alt="Image1" src="img/01.jpg"></div>
                        <div class="item"><img alt="Image2" src="img/02.jpg"></div>
                        <div class="item"><img alt="Image3" src="img/03.jpg"></div>
                    </div>
                    <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span></a> <a class="right carousel-control" data-slide="next" href= "#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span> <span class= "sr-only">Next</span></a>
                </div>
                <div class="mainContent">
                    <h1>Home</h1>
                    <img src="img/epalicence.jpg" class="epa" alt="NSW EPA Licence No. 20651">
                    
                    <?php
                        if (mysqli_num_rows($rs_home) > 0) {
                            while ($row = mysqli_fetch_assoc($rs_home)) {
                                echo $row["main_content"];
                    ?>

                    <div class="columns">
                        <?php
                                    echo $row["column_left"];
                                    echo $row["column_middle"];
                                    echo $row["column_right"];
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <nav class="navbar navbar-footer navbar-inverse"></nav>
</body>
</html>