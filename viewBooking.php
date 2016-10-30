<?php 

	session_start();
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');	
    require_once($WebsiteRoot . '/includes/loggedIn.php');
	
	    if (($_SESSION["customer"] == false)  && ($_SESSION["admin"] == false) && ($_SESSION["user"] == false) )

    {

        header("Location: http://www.southcoasttyrerecycling.com.au");

        exit;

    }

	//get user detail to get booking values

	$session = $_SESSION['username'];
	$userName = "SELECT user_ID FROM user_details where email = '". $session."'";
	//$userName = stripcslashes($userName);
	$rs = mysqli_query($conn, $userName);
	$value = mysqli_fetch_assoc($rs);
	$userID = "{$value['user_ID']}";
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View My Bookings - South Coast Tyre Recycling</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galdeano" rel="stylesheet">
	
	<style> 
	 td {text-align: center;
			border: 1px solid #ddd;
			padding: 8px;}
	 th {text-align: center;
			border: 1px solid #ddd;
			padding: 8px;}
			table {align:"right";
			width: 100%;}
			
	 tr:hover {background-color: #ddd;}
	</style>
</head>
<body>


<?php
	
	//use userID to get all bookings with the same user_ID
	
	$sql = "SELECT booking_ID, business_name, address, suburb, postcode, state, email, contact_name, contact_number, type, quantity,ready_date FROM booking WHERE user_ID = '". $userID."'";
	$result = mysqli_query($conn, $sql);
	
	?>



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

                        <li class='active'>

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
            <div class="col-xs-0 col-sm-1 col-lg-1 sidenav"></div>
            <div class="col-xs-12 col-sm-10 col-lg-10 text-left">
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
                <div class="mainContent" >
					<form id = "bookingView" method = "post" action = "" accept-charset='UTF-8' >
					<h1>View My Bookings</h1>
									<table>
						<thead>
							<tr style="background-color:#ddd;">
								<th> Job No. </th>
								<th> Company</th>
								<th> Address </th>
								<th> Suburb </th>
								<th> Postcode </th>
								<th> Type </th>
								<th> Quantity</th>
								<th> Date </th>
								<th> Remove </th>
							</tr>
							</thead>
						
						
						<tbody>
						<?php
						if ($result->num_rows > 0){
							while ($row = mysqli_fetch_assoc($result))
							{
						echo "<form action=deleteBooking.php method=post>";
						echo "<tr>";
						echo		"<td>{$row['booking_ID']}</td>";
						echo		"<td>{$row['business_name']}</td>";
						echo		"<td>{$row['address']}</td>";
						echo		"<td>{$row['suburb']}</td>";
						echo		"<td>{$row['postcode']}</td>";
					//	echo		"<td>{$row['email']}</td>";
						echo		"<td>{$row['type']}</td>";
						echo		"<td>{$row['quantity']}</td>";
						echo		"<td>{$row['ready_date']}</td>";
						echo 	'<td> <a href = "deleteBooking.php?bookingID=' .$row['booking_ID']. '"> Delete </a></td>';
						echo "</tr>";
						echo "</form> \n";
							}	
						} else {
							echo "0 records found";
						}
	
					$conn->close(); 

					?>
						</tbody>
					</table>

					</form>
					<br/>
					
					<form action = "booking.php">
						<input type = "submit" class="btn btn-primary" name ="view" value ="Return to Bookings" />
					</form>
                </div>
                
            </div>
			
			<div class="col-xs-0 col-sm-1 col-lg-1 sidenav"></div>
			
        </div>
	</div>
	<nav class="navbar navbar-footer navbar-inverse">
	</nav>
	

</body>
</html>