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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>
	  	tinymce.init({selector:"textarea"});
	</script>
</head>
<body>
    <div class="container-fluid text-center">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#loginNavbar"
                    data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button> <a class="navbar-brand hidden-xs hidden-sm" href="index.php">South Coast Tyre Recycling</a><a class="navbar-brand visible-xs menu">Menu</a>
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
                <div class="mainContent">
                    <h1>Edit Pages</h1>
                    
                    <form name = "selectpage" id="selectpage" method="POST" action="includes\selectpage.php">
                        Select page to edit:
                        <select name="pages" id="pages">
                            <?php
                                while ($row = mysqli_fetch_array($rs_pages)) 
                                {
                                	echo $_SESSION['pagetitle'] . $row['pagetitle'] .
                                    "<option value='" . $row['page_title'] . "'";
                                    if($_SESSION['pagetitle'] == $row['pagetitle'])
                                    {
                                    	echo "selected";
                                    }
                                    echo ">" . $row['page_title'] . "</option>";
                                }
                            ?>
                        </select>
                        <button class="btn btn-primary" type ="submit" id="selectpage" name ="selectpage" size = "6">Select Page</button>
                    </form>
                    <?php 
                        if(!empty($_SESSION['pagetitle']))
                        {
                        	echo
			                    "<form name='pages' id='pages' method='post' action='includes\updatepage.php' accept-charset='UTF-8'>
			                        <h2 id='currentedit'>Editing " . $_SESSION['pagetitle'] . " Page</h2>
			                        <ul id='editpages'>
			                            <li>
			                                Main Section:
			                            </li>
			                            <li>
			                                <textarea rows='4' cols='60' maxlength='2000' name='maincontent' id='maincontent' style='max-width: 100%;'>"
			                                . $_SESSION['maincontent'] .
			                                "</textarea>
			                            </li>
			                            <li>
			                                Left Column:
			                            </li>
			                            <li>
			                                <textarea rows='4' cols='60' maxlength='500' name='columnleft' id='columnleft' style='max-width: 100%;'>" 
											. $_SESSION['columnleft'] .
			                                "</textarea>
			                            </li>
			                            <li>
			                                Middle Column:
			                            </li>
			                            <li>
			                                <textarea rows='4' cols='60' maxlength='500' name='columnmiddle' id='columnmiddle' style='max-width: 100%;'>" 
											. $_SESSION['columnmiddle'] .
			                                "</textarea>
			                            </li>
			                            <li>
			                                Right Column:
			                            </li>
			                            <li>
			                                <textarea rows='4' cols='60' maxlength='500' name='columnright' id='columnright' style='max-width: 100%;'>" 
											. $_SESSION['columnright'] .
			                                "</textarea>
			                            </li>
			                            <li>
			                                <button type ='submit' class='btn btn-primary' id='submitpage' name ='submitpage' size = '6'>Submit</button>
			                            </li>
			                        </ul>
		                    	</form>"
                    	;}
                    ?>
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <footer></footer>    
</body>
</html>