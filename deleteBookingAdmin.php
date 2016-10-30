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

		header("Location: listBooking.php");	
		
	}else {
		header("Location: listBooking.php");
	}
	//$bookingID = $_POST['booking_ID'];
	//$sql = "DELETE FROM booking WHERE booking_ID = '$_POST[booking_ID]'";
	//$deleteQuery = mysqli_query($conn, $sql);
	/* if ($conn->query($sql) === TRUE) {
			echo "You have deleted a booking";	
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} */

?>