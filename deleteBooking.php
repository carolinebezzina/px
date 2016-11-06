<?php
	
	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');


	// get id value and use the id to delete from the bookings table 

	if(isset($_GET['bookingID'])&& is_numeric($_GET['bookingID'])){
		$bookingID = $_GET['bookingID'];
		$sql = "DELETE FROM booking WHERE booking_ID = $bookingID";
		$deleteQuery = mysqli_query($conn, $sql);
		

		header("Location: viewBooking.php");	
		
	}else {
		header("Location: viewBooking.php");
	}

?>