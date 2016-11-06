<?php	
	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
	//use this to change the booking from 'Active'/'Pending' to Complete
	
	if(isset($_GET['bookingID'])&& is_numeric($_GET['bookingID'])){
		//if(isset($_POST["bookID"])){
		//$bookingID = trim($_POST['bookID']);	
		$bookingID = $_GET['bookingID'];
		$sql = "UPDATE booking SET booking_statusID = 4 WHERE booking_ID = $bookingID";
		$activeQuery = mysqli_query($conn, $sql);

		header("Location: jobSheet.php");
	}
	else
	{
		header("Location: jobSheet.php");
	}
	
	
	
	$conn->close();
	
?>