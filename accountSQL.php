<?php 	
	
	if(isset($_SESSION['username'])){
		
		$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];	
		$username = $_SESSION['username'];
		require_once($WebsiteRoot . '/includes/dataConnect.php');
		
		$sql = "SELECT first_name, last_name, address,  suburb, postcode, state, ";
		$sql .= "business_name, email, phone_number, emergency_contact, emergency_no  FROM user_details WHERE email = '$username'";	
			
		$rs = mysqli_query($conn, $sql) or die(mysqli_error());
		$row = mysqli_fetch_array($rs) or die(header("location: http://www.southcoasttyrerecycling.com.au"));
		
		$fname = $row['first_name'];
		$lname = $row['last_name'];
		$address = $row['address'];
		$suburb = $row['suburb'];
		$postcode = $row['postcode'];
		$state = $row['state'];
		$businessName = $row['business_name'];
		$email = $row['email'];
		$phone = $row['phone_number'];	
		$emName = $row['emergency_contact'];
		$emPhone = $row['emergency_no'];
		
		
	}else{
		header("location: http://www.southcoasttyrerecycling.com.au");
	}
	
?>