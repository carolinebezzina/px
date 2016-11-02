<?php 
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
		

	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else {$page=1; }; 
	$resultsPerPage = 20;
	$startPage = ($page-1) * $resultsPerPage;
  
  if ($_SESSION["admin"] == false)

    {

        header("Location: http://www.southcoasttyrerecycling.com.au");

        exit;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List All Bookings - South Coast Tyre Recycling</title>
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
			word-wrap: break-word;
			padding: 8px;}
			
	 th {text-align: center;
			background-color: #ddd;
			border: 1px solid #ddd;
			padding: 8px;}
			
	table.table1 {align: right;
			width:100%;}
			
	thead {width 100%;}		
			
	 tr:hover {background-color: #ddd;}
	 
	 div.container-fluid text-center {
		 overfow: auto;
	 }
	 
	 @media only screen and (max-width: 1300px)
	 {
		#active, td:nth-child(1) {display: none; visibility:hidden;}
		#active, th:nth-child(1){display: none; visibility:hidden;}
		#id, td:nth-child(2){display: none; visibility:hidden;}
		#id, th:nth-child(2){display: none; visibility:hidden;}
		#status, td:nth-child(3){display: none; visibility:hidden;}
		#status, th:nth-child(3){display: none; visibility:hidden;}
		#mail, td:nth-child(7){display: none; visibility:hidden;}
		#mail, th:nth-child(7){display: none; visibility:hidden;}
		#name, td:nth-child(8){display: none; visibility:hidden;}
		#name, th:nth-child(8){display: none; visibility:hidden;}
		#number, td:nth-child(9){display: none; visibility:hidden;}
		#number, th:nth-child(9){display: none; visibility:hidden;}
		#date, td:nth-child(12){display: none; visibility:hidden;}
		#date, th:nth-child(12){display: none; visibility:hidden;}
		#complete, td:nth-child(13){display: none; visibility:hidden;}
		#complete, th:nth-child(13){display: none; visibility:hidden;}
		#delete, td:nth-child(14){display: none; visibility:hidden;}
		#delete, th:nth-child(14){display: none; visibility:hidden;}
	 }

	</style>
	
</head>
<body>


<?php
	//Select rows from the booking table to be displayed
	
	$sql = "SELECT booking_ID, booking_statusID, business_name, address, suburb, postcode, state, email, contact_name, contact_number, type, quantity,ready_date FROM booking ORDER BY booking_statusID, booking_ID ASC LIMIT $startPage, 20";
	$result = mysqli_query($conn, $sql);
	
	/*	if ($conn->query($sql) === TRUE) {
					echo "You have created a booking";	
				} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				} */
				
	$bookingTotal = "SELECT COUNT(booking_ID) AS totalBooking FROM booking";
	$totalResult = $conn->query($bookingTotal);
	$row = mysqli_fetch_assoc($totalResult);
	$totalPages = ceil($row["totalBooking"] / $resultsPerPage); // calculate total pages with results
	
	
	?>



    <div class="container-fluid text-center" >
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
                
     
                <div class="mainContent">
				
					<h1>List All Bookings</h1>
					
					
					<form action = "exportCsvBooking.php">
						<button type = "submit" name ="" class="btn btn-primary">Export To CSV</button>
					</form>
					<br/>
					<form id = "adminView" method = "post" action = "" accept-charset='UTF-8' >
						
					<table class ="table1">
						<thead>
							<tr>
								<th id="active"> Active </th>
								<th id="id"> ID </th>
								<th id="status"> Status </th>
								<th id="company"> Company </th>
								<th id="address"> Address </th>
								<th id="suburb"> Suburb </th>
								<th id="mail"> Email </th>
								<th id="name"> Name </th>
								<th id="number"> Number </th>
								<th id="type"> Type </th>
								<th id="quantity"> Amount</th>
								<th id="date"> Date </th>
								<th id="complete"> Complete </th>
								<th id="delete"> Delete </th>
							</tr>
							</thead>
						
						
						<tbody>
						<?php
						
						
						
						if ($result->num_rows > 0){
							while ($row = mysqli_fetch_assoc($result))
							{
								
								Switch($row['booking_statusID']){
									case 1:
										$bookingID = "Pending";
										break;
									case 2:
										$bookingID = "Active";
										break;	
									case 3:
										$bookingID = "In-Progress";
										break;
									case 4:
										$bookingID = "Complete";
										break;
									Default:
										$bookingID = "Pending";
										break;
								}
							
							$date = $row['ready_date'];
							$newDate = date("d-m-Y",strtotime($date));
										
								//	echo "<form action=deleteBooking.php method=post>";
									echo "<tr>";
									echo 	'<td> <a href = "activeBooking.php?bookingID=' .$row['booking_ID']. '" class="btn btn-primary"> Active </a></td>';
									echo		"<td>{$row['booking_ID']}</td>";
									echo		"<td>{$bookingID}</td>";
									echo		"<td>{$row['business_name']}</td>";
									echo		"<td>{$row['address']}</td>";
									echo		"<td>{$row['suburb']}</td>";
									//echo		"<td>{$row['postcode']}</td>";
									echo		"<td>{$row['email']}</td>";
									echo		"<td>{$row['contact_name']}</td>";
									echo		"<td>{$row['contact_number']}</td>";
									echo		"<td>{$row['type']}</td>";
									echo		"<td>{$row['quantity']}</td>";
									echo		"<td>$newDate</td>";	
									echo 	'<td> <a href = "completeBooking.php?bookingID=' .$row['booking_ID']. '" class="btn btn-primary"> Complete </a></td>';
									echo 	'<td> <a href = "deleteBookingAdmin.php?bookingID=' .$row['booking_ID']. '" class="btn btn-primary"> Delete </a></td>';
									echo "</tr>";
								//	echo "</form> \n";
								
								}
						}	else {
										echo "0 records found";
							}
			
					
				
			
	
					$conn->close(); 

					?>
					
						</tbody>
					</table>
					
					</form>
					<br/>
						<?php 
						
						echo "Pages: ";
		for ($i=1; $i<=$totalPages; $i++) {
					// print links for all pages
			echo "<a href=listBooking.php?page=".$i." class = 'btn btn-primary'";
			if ($i==$page)  echo "class='curPage'";
			echo ">".$i."</a>"; 
			
			
		}
		
	  
						
						?>
						<br/>
						<br/>
					<form action = "booking.php">
					<button type = "submit" name ="view" class="btn btn-primary">Return To Bookings</button>
					</form>
						
                </div>
            </div>
			<div class="col-xs-0 col-sm-1 col-lg-1 sidenav"></div>			
			
        </div>
	</div>
    <footer></footer>  
</body>
</html>