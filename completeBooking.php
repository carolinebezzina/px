<?php	
	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
	//use this to change the booking from 'Active'/'Pending' to Complete
	
	if(isset($_GET['bookingID'])&& is_numeric($_GET['bookingID'])){
		$bookingID = $_GET['bookingID'];
		$sql = "UPDATE booking SET booking_statusID = 4 WHERE booking_ID = $bookingID";
		$activeQuery = mysqli_query($conn, $sql);
		
		header("Location: listBooking.php");
	}
	else
	{
		header("Location: listBooking.php");
	}
	
	//use this to change the booking from 'Active'/'Pending' to Complete
	
	$conn->close();
	
?>