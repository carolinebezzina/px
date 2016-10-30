<?php 

	session_start();
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');	
	require_once($WebsiteRoot . '/includes/loggedIn.php');

	if ($_SESSION["user"] == false && $_SESSION["admin"] == false )

    {

        header("Location: http://www.southcoasttyrerecycling.com.au");

        exit;

    }
	//get users email
	$session = $_SESSION['username'];
	//get id from database
	
	$sqlID = "SELECT user_ID from user_details WHERE email = '". $session."'";	
	$userIDrs = mysqli_query($conn, $sqlID);
	$userValue = mysqli_fetch_assoc($userIDrs);
	$userID = "{$userValue['user_ID']}";
	

	
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Sheets- South Coast Tyre Recycling</title>
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
                <div class="mainContent" >
					
					<h1>Job Sheets</h1>
					
					<p> When job is completed, click the 'Complete' Button and it will remove it from the table </p>
					<br/>
					
					<form action = "booking.php">
						<input type = "submit" class="btn btn-primary" name ="" value ="Go to Bookings" />
					</form>
					<form id = "jobsheetView" method = "post" action = "" accept-charset='UTF-8' >
					<br/>
					
									<table>
						<thead>
							<tr style="background-color:#ddd;">
								<th> Complete </th>								
								<th> Job </th>							
								<th> ID </th>
								<th> Company</th>
								<th> Type </th>
								<th> Quantity </th>
								<th> Phone </th>
								<th> Street </th>
								<th> Suburb </th>


							</tr>
							</thead>
						<tbody>
						<?php
						
						
					//get job number from database
					
					$jobSql = "SELECT job_sheet_job_number FROM job_drivers WHERE user_ID = $userID";
					$rsJob = mysqli_query($conn, $jobSql);

						//$jobValue = mysqli_fetch_array($rsJob);
						while($jobValue = mysqli_fetch_array($rsJob)) {
							$job = "{$jobValue['job_sheet_job_number']}";
							
							//getting values to populate job sheet table
							$userSql = "SELECT booking_ID, quantity, type, ready_date, contact_name, business_name, contact_number, postcode, address, suburb FROM booking WHERE booking_statusID = 3 AND job_number = $job";
							$rs = mysqli_query($conn, $userSql);

							if ($rs->num_rows > 0)
							{
								
								while ($row = mysqli_fetch_assoc($rs))
								{
								
									echo "<tr>";
									echo 	'<td> <a href = "completeBookingStaff.php?bookingID=' .$row['booking_ID']. '"> Completed </a></td>';
									echo		"<td>{$jobValue['job_sheet_job_number']}</td>";
									echo		"<td>{$row['booking_ID']}</td>";
									echo		"<td>{$row['business_name']}</td>";
									echo		"<td>{$row['type']}</td>";
									echo		"<td>{$row['quantity']}</td>";
									echo		"<td>{$row['contact_number']}</td>";
									echo		"<td>{$row['address']}</td>";
									echo		"<td>{$row['suburb']}</td>";

									echo "</tr>";
							
								}
							}
						}
					$conn->close(); 

					?>
						</tbody>
					</table>

					</form>
					<br/>
					
					<?php
						
							if((isset($_SESSION['admin']))){
								echo'
								<form action = "jobSheetAdmin.php">
								<input type = "submit" class="btn btn-primary" name ="" value ="Create Job Page" />
								</form>
								<br/>';
							
							}
		
					?>
                </div>
           
            </div>
			      <div class="col-xs-0 col-sm-1 col-lg-1 sidenav"></div>
			
        </div>
	</div>
	<nav class="navbar navbar-footer navbar-inverse">
	</nav>
	

</body>
</html>