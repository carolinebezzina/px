<?php	
	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
//	require_once($WebsiteRoot . '/includes/loggedIn.php');

	//use this to change the booking from 'Pending' to 'Active'
	if(isset($_GET['bookingID'])&& is_numeric($_GET['bookingID'])){
		$bookingID = $_GET['bookingID'];
	//	$bookingID = stripcslashes($bookingID);
		
		$sql = "UPDATE booking SET booking_statusID = 2 WHERE booking_ID = $bookingID AND booking_statusID != 3 AND booking_statusID != 4";
		$activeQuery = mysqli_query($conn, $sql);
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		
		include ($WebsiteRoot. '/includes/sendBookingCustomer.php');
		
		header("Location: listBooking.php");	
	}
	else
	{
		header("Location: listBooking.php");
	}

	//$conn->close();
	
?>