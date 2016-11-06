<?php
	session_start();
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once($WebsiteRoot . '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/noCache.php');	
	
	if(isset($_POST["delete"])){
	
			if(isset($_POST['Email-req-email'])){
				$email= $_POST['Email-req-email'];
			}else{
				$email = $_SESSION['email'];
			}
			
			$sql = "SELECT user_ID FROM user_details WHERE email = '$email' ";
			$rs = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($rs);
			$userID = $row['user_ID'];
			
			$sql = "SELECT * FROM booking WHERE user_ID = '$userID' ";
			$rs = mysqli_query($conn, $sql);	
			//mysqli_query($conn, $sql);
			
			if(mysqli_num_rows($rs) == 0){
			
				$sql = "DELETE FROM user_details WHERE email = '$email' ";
				
				if ($conn->query($sql) === TRUE) { 
				
					unset($_SESSION['fname']);
					unset($_SESSION['lname']);
					unset($_SESSION['address']);
					unset($_SESSION['postcode']);
					unset($_SESSION['state']);
					unset($_SESSION['business']);
					unset($_SESSION['phone']);
					unset($_SESSION['suburb']);
					unset($_SESSION['emPhone']);
					unset($_SESSION['emName']);	
					unset($_SESSION['emailTwo']);
					unset($_SESSION['userType']);				
					unset($_SESSION['selected']);
				
				}else {						
					echo "Error: " . $sql . "<br>" . $conn->error . "<br>" . $userID . "test";
				}
			}else{
				$msg = "User has a booking, cannot delete user!";
			}
				
				$conn->close();
			
	}
	if($valid){
		if(isset($_POST["submit"])){
			
			$fName = trim($_POST['First_Name-req-alpha']);
			$lName = trim($_POST['Last_Name-req-alpha']);
			$address = trim($_POST['Address-req-alphanum']);
			$pcode = (int)trim($_POST['Postcode-req-num']);
			$state = trim($_POST['State-req']);
			$cName = trim($_POST['Company_Name-req-alphanum']);
			$eMail = trim($_POST['EMail-req-email']);
			$phone = trim($_POST['Phone-req-num']);
			$suburb = trim($_POST['Suburb-req-alpha']);
			
	
			
			if((isset($_POST['Emergency_Phone-num'])) && (isset($_POST['Emergency_Contact_Name-alpha']))){
				$emPhone = trim($_POST['Emergency_Phone-num']);
				$emName = trim($_POST['Emergency_Contact_Name-alpha']);
			}else{
				$emPhone = null;
				$emName = null;
			}
			
			if(isset($_POST['newusertype'])){
				$userID = trim($_POST['newusertype']);
				
				$userTypeID = "";
				
				switch($_SESSION['userType']){
					case "Adminstrator":
						$userTypeID = 0;
						break;
					case "Employee":
						$userTypeID = 1;
						break;
					case "Customer":
						$userTypeID  = 2;
						break;
					default:
						break;
				}
					
				switch($userID){
					case "0":
						$_SESSION['userType'] = "Adminstrator";
						break;
					case "1":
						$_SESSION['userType'] = "Employee";
						break;
					case "2":
						$_SESSION['userType'] = "Customer";
						break;
					case "4":					
						$userID = $userTypeID;
						break;
					default:
						break;
				}
				
			}
			
			$oldEmail = $_SESSION['email'];
		
			$sql = "UPDATE user_details SET first_name = '$fName', last_name = '$lName', address = '$address', postcode = '$pcode',  ";
			$sql = $sql . "state = '$state', business_name = '$cName', email = '$eMail', phone_number = '$phone', suburb = '$suburb', " ;
			
			if(isset($_POST['newusertype'])){
				$sql = $sql . "emergency_contact = '$emName', emergency_no = '$emPhone', user_typeID = '$userID' " ;
			}else{
				$sql = $sql . "emergency_contact = '$emName', emergency_no = '$emPhone' " ;
			}
			$sql = $sql . " WHERE email	 = '$oldEmail' " ;
			
			if ($conn->query($sql) === TRUE) {		
				
				if($_SESSION['selfEdit'] === "yes"){
					
					if ($_SESSION['username'] != $eMail){
						$_SESSION['username'] = $eMail;	
					}
					
					header('location:..\accounts.php');
					
				}else{
					
					$_SESSION['fname'] = $fName;
					$_SESSION['lname'] = $lName;
					$_SESSION['address'] = $address;
					$_SESSION['postcode'] = $pcode;
					$_SESSION['state'] = $state;
					$_SESSION['business'] = $cName;
					$_SESSION['phone'] = $phone;
					$_SESSION['suburb'] = $suburb;
					
					if((isset($_POST['Emergency_Phone-num'])) && (isset($_POST['Emergency_Contact_Name-alpha']))){
						$_SESSION['emPhone'] = $emPhone;
						$_SESSION['emName'] = $emName;	
					}
					
					//checks if the user selected is currently logged
					//If true, and the email is change it will switch the 
					//current session email to the new email
					if($_SESSION['emailTwo'] == $_SESSION['username']){
						
						if ($_SESSION['username'] != $eMail){
							$_SESSION['username'] = $eMail;	
						}	
					}else{
						$_SESSION['emailTwo'] = $eMail;
					}						
					header('location:..\editUser.php');
				}
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
		}
		
		
	}

	function queryErr($msg){
		
		echo '<font color="red">' . $msg . '</font>';
		return;
	}
?>

	