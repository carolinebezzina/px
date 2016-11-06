<?php

	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Open Bookings - South Coast Tyre Recycling</title>
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
	
		<style> 
	 td {text-align: center;
			border: 1px solid #ddd;
			padding: 8px;}
	 th {text-align: center;
			background-color: #ddd;
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

<?php	

	if(isset($_GET['job_sheet_job_number'])&& is_numeric($_GET['job_sheet_job_number'])){
		
		echo"</br>";
		echo"</br>";
		echo '
		<form action = "jobSheet.php">
			<input type = "submit" name ="view" value ="Return to Job Sheets" class="btn btn-primary"/>
		</form>
		';
		echo "<br/>";
		$jobID = $_GET['job_sheet_job_number'];
				
		
		echo "<form action=exportCsv.php method=post>";
		
		$getJobSql = "SELECT booking_ID, business_name, quantity, type, address, suburb, ready_date, job_number FROM booking WHERE job_number = $jobID";
		$rsJob = mysqli_query($conn, $getJobSql);

		
		echo '<table name = "jobBooking">
				<thead>														
						<th> Booking</th>							
						<th> Company </th>
						<th> Type</th>
						<th> Quantity</th>
						<th> Street</th>
						<th> Suburb</th>
						<th> Date </th>
					</tr>
					</thead>
				<tbody>';
	
	

	
		if ($rsJob->num_rows > 0){
			while ($row = mysqli_fetch_assoc($rsJob))
			{
				
				$date = $row['ready_date'];
				$newDate = date("d-m-Y",strtotime($date));
			
						echo "<tr>";
						//	echo	'<td> <a href = "openBooking.php?job_sheet_job_number=' .$staffrow['job_sheet_job_number']. '">Open Bookings </a></td>';
							echo	"<td>{$row['booking_ID']}</td>";
							echo	"<td>{$row['business_name']}</td>";
							echo	"<td>{$row['type']}</td>";
							echo	"<td>{$row['quantity']}</td>";
							echo	"<td>{$row['address']}</td>";
							echo	"<td>{$row['suburb']}</td>";
							echo "<td> $newDate </td>";
					
				//$jobNumber = $row['job_number'];
						
				
					
					
			}	
		}
					echo "</tr>";
				echo "</tbody>";
			echo "</table>";
			echo "<br/>";
			
			echo	'<td> <a href = "exportCsv.php?job_number='.$jobID.'" class = "btn btn-primary" name = "buttonID">Export Table to CSV</a></td>';


		
			echo "</form>";
	}
		
	?>
   </div>


	</div>
	</div>
    <footer></footer>  
</body>
</html>