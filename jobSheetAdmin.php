<?php 
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
    if(($_SESSION["admin"] == false ) && ($_SESSION["user"] == false))
    {

        header("Location: http://www.southcoasttyrerecycling.com.au");

        exit;

    }
	
	

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
	<script src="gen_validatorv4.js" type="text/javascript"></script>
	
	
</head>
<body>


<?php
	
	//get staff emails
	$type = "SELECT email from user_details WHERE user_typeID = 1";
	$rs = mysqli_query($conn, $type);
	//$status = "{$getValue['booking_statusID']}";
	
//	$row = mysqli_fetch_assoc($rs);		

	 
	
	//get rows from the booking table to be displayed
	
	$sql = "SELECT booking_ID, booking_statusID, business_name,  address, suburb, postcode, state, email, contact_name, contact_number, type, quantity,ready_date FROM booking WHERE job_number IS NULL AND booking_statusID = 2";
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

                        <li class='active'>

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
					<form id = "jobSheetCreate" method = "post" action = "newJobSheet.php" accept-charset='UTF-8' >
					
					
						<span class="labels">Staff Email Address:</span>
							<div class="inputs">
								<div class="left-column">
									<select name="email" id = "email">
									<?php 
										
										if ($rs->num_rows > 0){
											while ($row = mysqli_fetch_assoc($rs))
											{
												echo '<option value = "' . $row['email'] .'"> '. $row['email'] .' </option>';
											}
										} else {
											echo '<option value = "No staff Results" </option>';
										}
									?>
									</select>
								</div>
							</div>
					
									
					<h2>Active Bookings</h2>					
					
					<p>Tick the check box and select submit to add a job to the staff email</p>
					
					
					
						<table class="table table-hover">
						<thead>
							<tr >
								<th> Add Job </th>							
								<th> Job ID </th>
								<th> Status </th>
								<th> Company </th>
								<th> Suburb </th>
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
						echo		'<td> <input type = "checkbox" name = "selectedJob[]" value='.$row['booking_ID'].'></td>';						
						echo		"<td>{$row['booking_ID']}</td>";
						echo		"<td>{$row['booking_statusID']}</td>";
						echo		"<td>{$row['business_name']}</td>";
						echo		"<td>{$row['suburb']}</td>";
						echo		"<td>{$row['contact_name']}</td>";
						echo		"<td>{$row['contact_number']}</td>";
						echo		"<td>{$row['type']}</td>";
						echo		"<td>{$row['quantity']}</td>";
						echo		"<td>{$row['ready_date']}</td>";
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
					<br/>
					<input type = "submit" name ="createJob" value ="Create Job Sheet" />
					</form>
						
					<br/>
					<br/>
					
					<form action = "booking.php">
					<input type = "submit" name ="view" value ="Return to Booking" />
					</form>
						
                </div>
             
            </div>
			 <div class="col-xs-0 col-sm-1 col-lg-1 sidenav"></div>
			
        </div>
	</div>

</body>
</html>