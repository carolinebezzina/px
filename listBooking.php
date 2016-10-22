<?php 
	session_start();
	
	require_once("includes/noCache.php");
	require_once("includes/dataConnect.php");
	//require_once("includes/checkUserType.php");
	
	
	//get user detail to get booking values

/*	$session = $_SESSION['username'];
	$userName = "SELECT user_typeID FROM user_details where email = '". $session."'";
	//$userName = stripcslashes($userName);
	$rs = mysqli_query($conn, $userName);
	$value = mysqli_fetch_assoc($rs);
	$usertype = "{$value['user_typeID']}";
*/
	
							/*	if(($loginValue = '0') || ($loginValue = 1)) {
									header('location:login.php');
								}
							*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking - South Coast Tyre Recycling</title>
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


<?php
	
	//Select rows from the booking table to be displayed
	
	$sql = "SELECT booking_ID, booking_statusID, business_name, address, postcode, state, email, contact_name, contact_number, type, quantity,ready_date FROM booking";
	$result = mysqli_query($conn, $sql);
	
	?>



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
                        <li>
                            <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                        <li>
                            <a href="registration.php"><span class="glyphicon glyphicon-user"></span> Register</a>
                        </li>
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
                    <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span></a> <a class="right carousel-control" data-slide="next" href= "#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span> <span class=                   "sr-only">Next</span></a>
                </div>
                <div class="mainContent" >
					<form id = "bookingView" method = "post" action = "" accept-charset='UTF-8' >
					<h2>View Bookings</h2>
					<p>Booking Status - 1 = Pending, 2 = Active, 3 = Complete</p>
									<table>
						<thead>
							<tr>
								<th> ID </th>
								<th> Booking Status </th>
								<th> Company </th>
								<th> Address </th>
								<th> Postcode </th>
								<th> State </th>
								<th> Email </th>
								<th> Name </th>
								<th> Number </th>
								<th> Type </th>
								<th> Quantity</th>
								<th> Date </th>
							</tr>
							</thead>
						
						
						<tbody>
						<?php
						if ($result->num_rows > 0){
							while ($row = mysqli_fetch_assoc($result))
							{
					//	echo "<form action=deleteBooking.php method=post>";
						echo "<tr>";
						echo		"<td>{$row['booking_ID']}</td>";
						echo		"<td>{$row['booking_statusID']}</td>";
						echo		"<td>{$row['business_name']}</td>";
						echo		"<td>{$row['address']}</td>";
						echo		"<td>{$row['postcode']}</td>";
						echo		"<td>{$row['state']}</td>";
						echo		"<td>{$row['email']}</td>";
						echo		"<td>{$row['contact_name']}</td>";
						echo		"<td>{$row['contact_number']}</td>";
						echo		"<td>{$row['type']}</td>";
						echo		"<td>{$row['quantity']}</td>";
						echo		"<td>{$row['ready_date']}</td>";
						echo 	'<td> <a href = "activeBooking.php?bookingID=' .$row['booking_ID']. '"> Set Active </a></td>';
						echo 	'<td> <a href = "completeBooking.php?bookingID=' .$row['booking_ID']. '"> Set Complete </a></td>';
									echo 	'<td> <a href = "deleteBookingAdmin.php?bookingID=' .$row['booking_ID']. '"> Delete </a></td>';
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
						
						
					<form action = "booking.php">
					<input type = "submit" name ="view" value ="Return to Booking" />
					</form>
						
                </div>
                <div class="col-xs-1 col-md-2 sidenav"></div>
            </div>
			
			
        </div>
	</div>
	<nav class="navbar navbar-footer navbar-inverse">
	</nav>
	

</body>
</html>