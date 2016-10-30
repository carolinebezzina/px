<?php 
	session_start();
	$username = $_SESSION['username'];
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once($WebsiteRoot . '/includes/dataConnect.php');
	
	
	if(isset($_POST["fillform"])){	
		$selected = $_POST['user'];
		$_SESSION['selected'] = $selected;
		
		//$sql = "SELECT first_name, last_name, address, postcode, state, business_name, email, phone_number, suburb, emergency_contact, emergency_no, name.user_type FROM user_details INNER JOIN user_type ON  WHERE email = '$selected' ";
		$sql = "SELECT first_name, last_name, address, postcode, state, business_name, email, phone_number, suburb, emergency_contact, emergency_no, name ";
		$sql .= " FROM user_details INNER JOIN user_type ";
		$sql .= " ON user_details.user_typeID = user_type.user_typeID ";
		$sql .= " WHERE email = '$selected' ";
		//echo $sql;
		$rs = mysqli_query($conn, $sql) or die(mysqli_error()); 
		
		$row = mysqli_fetch_array($rs) or die(mysqli_error());
		$_SESSION['fname'] = $row['first_name'];
		$_SESSION['lname'] = $row['last_name'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['postcode'] = $row['postcode'];
		$_SESSION['state'] = $row['state'];
		$_SESSION['business'] = $row['business_name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['emailTwo'] = $row['email'];
		$_SESSION['phone'] = $row['phone_number'];
		$_SESSION['suburb'] = $row['suburb'];
		$_SESSION['emPhone'] = $row['emergency_no'];
		$_SESSION['emName'] = $row['emergency_contact'];
		$_SESSION['userType'] = $row['name'];
		header( 'Location: ..\editUser.php' ) ;
	}else{
		echo "form no work";
	}
	
?>