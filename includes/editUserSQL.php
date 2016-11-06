<?php 

	session_start();
	$username = $_SESSION['username'];
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once($WebsiteRoot . '/includes/dataConnect.php');
	
	$sql = "SELECT email FROM user_details ";
	$rs = mysqli_query($conn, $sql) or die(mysqli_error());
	 
	 /*
	$row = mysqli_fetch_array($rs) or die(mysqli_error());
	$fname = $row['first_name'];
	$lname = $row['last_name'];
	$address = $row['address'];
	$postcode = $row['postcode'];
	$state = $row['state'];
	$businessName = $row['business_name'];
	$email = $row['username'];
	$phone = $row['phone_number'];
	*/
?>