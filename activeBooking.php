<?php	
	session_start();
	require_once("includes/noCache.php");	

	require_once("includes/dataConnect.php");

	//use this to change the booking from 'Pending' to 'Active'
	if(isset($_GET['bookingID'])&& is_numeric($_GET['bookingID'])){
		$bookingID = $_GET['bookingID'];
		$sql = "UPDATE booking SET booking_statusID = 2 WHERE booking_ID = $bookingID";
		$activeQuery = mysqli_query($conn, $sql);

		header("Location: listBooking.php");	
	}
	else
	{
		header("Location: listBooking.php");
	}

	$conn->close();
	
?>