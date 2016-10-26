<?php
	if(isset($valid)){
		
		if($valid){
			session_start();
			$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
			require_once($WebsiteRoot . '/includes/noCache.php');
			require_once($WebsiteRoot . '/includes/dataConnect.php');			
			$userType = "2";
			$userTypeID = (int)$userType;
			$fName = trim($_POST['First_Name-req-alpha']);
			$lName = trim($_POST['Last_Name-req-alpha']);
			$address = trim($_POST['Address-req-alphachar']);
			$pcode = (int)trim($_POST['Postcode-req-num']);
			$state = trim($_POST['State-req']);
			$cName = trim($_POST['Company_Name-req-alphachar']);
			$eMail = trim($_POST['Email-req-email']);
			$phone = trim($_POST['Phone-req-num']);
			$suburb = trim($_POST['Suburb-req-alpha']);
			$password = $_POST['Password-req'];
			$password = password_hash($password, PASSWORD_BCRYPT);
			
			$sql = "SELECT * FROM user_details WHERE email = '$eMail'";			
			$rs = mysqli_query($conn, $sql);
	
			if (mysqli_num_rows($rs) == 0 ) {   
	
				$sql = "INSERT INTO user_details (user_typeID, first_name, last_name, address, postcode, state, business_name, email, phone_number, password, suburb, date_created) ";
				$sql = $sql . "VALUES ( '$userTypeID' , '$fName' ,'$lName', '$address', '$pcode', '$state', '$cName', '$eMail', '$phone', '$password','$suburb', now())" ;
				//$rs = mysqli_query($conn, $sql);		
				
				if ($conn->query($sql) === TRUE) {
					$_SESSION['username'] = $eMail;	
					header("location:http://southcoasttyrerecycling.com.au/home.php");	
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();
			}else{
				array_push($messages, "That Email is already in use!");
			}
		}
	}
?>
