<?php	
	session_start();
	require_once("includes/noCache.php");	

	if (isset($_POST['editSubmit'])) {

	$jobnumber = "NULL";
	$companyName = trim($_POST['companyName']);
	$address = trim($_POST['address']);
	$pcode = trim($_POST['postcode']);
	$state = trim($_POST['state']);
	$contact = trim($_POST['contactName']);
	$eMail = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$type = trim($_POST['type']);
	$quantity = trim($_POST['quantity']);
	$readydate = $_POST['readydate'];
	
	
	require_once("includes/dataConnect.php");
	
	// get booking status
	$statusQuery = "SELECT booking_statusID FROM booking_status WHERE name = 'Pending'";
	$query = mysqli_query($conn, $statusQuery);
	$getValue = mysqli_fetch_assoc($query);
	$status = "{$getValue['booking_statusID']}";
	
	//get user id from user details table to use in adding to the bookings table	
	$session = $_SESSION['username'];
	$userName = "SELECT user_ID FROM user_details WHERE email = '". $session."'";	
	//$userName = stripcslashes($userName);
	$rs = mysqli_query($conn, $userName);
	$row = mysqli_fetch_assoc($rs);
	//$row = mysqli_fetch_row($rs);
	
	
	$userID = "{$row['user_ID']}";
	
	//adding data to the bookings table

	$sql = "INSERT INTO booking (booking_statusID, user_ID, business_name ,address, postcode, state, email , contact_name, contact_number, type, quantity, ready_date, job_number, date_created) ";
	$sql = $sql . "VALUES ('$status','$userID','$companyName','$address','$pcode','$state','$eMail ','$contact','$phone','$type','$quantity','$readydate', $jobnumber ,now())" ;
	
	$mainquery = mysqli_query($conn, $sql);		
	
	/*if ($conn->query($sql) === TRUE) {
		echo "You have created a booking";	
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}*/
	
	
	
	} else {
		header ("Location newBooking.php");
	}
	$conn->close();
	
?>


