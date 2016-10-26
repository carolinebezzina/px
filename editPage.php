<?php 
    $WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
    include ($WebsiteRoot . '/includes/editPageSQL.php');
    require_once($WebsiteRoot . '/includes/loggedIn.php');
    if ($_SESSION["admin"] == false)
    {
        header("Location: http://www.southcoasttyrerecycling.com.au");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Pages - South Coast Tyre Recycling</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galdeano" rel="stylesheet">
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
                        <li class = 'active'>
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
                        <li>
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
                                    <li>
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
                    <h1>Edit Pages</h1>
                    
                    <form name = "selectpage" id="selectpage" method="POST" action="includes\selectpage.php">
                        Select page to edit:
                        <select name="pages" id="pages">
                            <?php
                                while ($row = mysqli_fetch_array($rs_pages)) {
                                    echo "<option value='" . $row['page_title'] . "'>" . $row['page_title'] . "</option>";
                                }
                            ?>
                        </select>
                        <input type ="submit" id="selectpage" name ="selectpage" value ="Select Page" size = "6" />
                    </form>
                    
                    <form name="pages" id="pages" method="post" action="includes\updatepage.php" accept-charset='UTF-8'>
                        <?php 
                            if(!empty($_SESSION['pagetitle'])){echo "<h2 id='currentedit'>Editing " . $_SESSION['pagetitle'] . " Page</h2>";}
                        ?>
                        <ul id="editpages">
                            <li>
                                Main Section:
                            </li>
                            <li>
                                <textarea rows="4" cols="60" maxlength="2000" name="maincontent" id="maincontent"><?php if(!empty($_SESSION['maincontent'])){echo $_SESSION['maincontent'];} ?></textarea>
                            </li>
                            <li>
                                Left Column:
                            </li>
                            <li>
                                <textarea rows="4" cols="60" maxlength="500" name="columnleft" id="columnleft"><?php if(!empty($_SESSION['columnleft'])){echo $_SESSION['columnleft'];} ?></textarea>
                            </li>
                            <li>
                                Middle Column:
                            </li>
                            <li>
                                <textarea rows="4" cols="60" maxlength="500" name="columnmiddle" id="columnmiddle"><?php if(!empty($_SESSION['columnmiddle'])){echo $_SESSION['columnmiddle'];} ?></textarea>
                            </li>
                            <li>
                                Right Column:
                            </li>
                            <li>
                                <textarea rows="4" cols="60" maxlength="500" name="columnright" id="columnright"><?php if(!empty($_SESSION['columnright'])){echo $_SESSION['columnright'];} ?></textarea>
                            </li>
                            <li>
                                <input type ="submit" class="hidden" id="submitpage" name ="submitpage" value ="Submit" size = "6"/>
                            </li>
                        </ul>
                    </form>
                    <button id="enableEdit" onclick="enableEdit()">Edit Details</button>
                    <button id="cancelEdit" class="hidden" onclick="disableEdit()">Cancel Edit</button> 
                    
                    <script type="text/javascript">
                        
                        function enableEdit() {
                            document.getElementById("maincontent").disabled = false;
                            document.getElementById("columnleft").disabled = false;
                            document.getElementById("columnmiddle").disabled = false;
                            document.getElementById("columnright").disabled = false;
                            document.getElementById("submitpage").classList.remove("hidden");
                            document.getElementById("enableEdit").classList.add("hidden");
                            document.getElementById("cancelEdit").classList.remove("hidden");
                        }

                        function disableEdit() {
                            document.getElementById("maincontent").disabled = true;
                            document.getElementById("columnleft").disabled = true;
                            document.getElementById("columnmiddle").disabled = true;
                            document.getElementById("columnright").disabled = true;
                            document.getElementById("enableEdit").classList.remove("hidden");
                            document.getElementById("cancelEdit").classList.add("hidden");
                        }

                        window.onload = disableEdit;

                    </script>
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <nav class="navbar navbar-footer navbar-inverse"></nav>
</body>
</html>