<?php	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');



	if(isset($valid))
	{
		if($valid)
		{
			if (isset($_POST['submit'])) 
			{

			$jobnumber = "NULL";
			$companyName = trim($_POST['companyName-req-alphanum']);
			$address = trim($_POST['address-req-alphanum']);
			$suburb =trim($_POST['Suburb-req-alpha']);
			$pcode = trim($_POST['postcode-req-num']);
			$state = trim($_POST['State-req']);
			$contact = trim($_POST['contactName-req-alpha']);
			$eMail = trim($_POST['Email-req-email']);
			$phone = $_POST['phone-req-num'];
			$type = trim($_POST['type-req']);
			$quantity = trim($_POST['quantity-req-num']);
			$readydate = $_POST['readydate-req'];

				require_once($WebsiteRoot. '/includes/dataConnect.php');		
				
					
				// get booking status
				$statusQuery = "SELECT booking_statusID FROM booking_status WHERE name = 'Pending'";
				$query = mysqli_query($conn, $statusQuery);
				$getValue = mysqli_fetch_assoc($query);
				$status = "{$getValue['booking_statusID']}";

				//get user id from user details table to use in adding to the bookings table	
				$session = $_SESSION['username'];
				$userName = "SELECT user_ID FROM user_details WHERE email = '". $session."'";	
				$rs = mysqli_query($conn, $userName);
				$row = mysqli_fetch_assoc($rs);
				$userID = "{$row['user_ID']}";

				//adding data to the bookings table

				$sql = "INSERT INTO booking (booking_statusID, user_ID, business_name ,address,suburb ,postcode, state, email , contact_name, contact_number, type, quantity, ready_date, job_number, date_created) ";
				$sql = $sql . " VALUES ('$status','$userID','$companyName','$address','$suburb','$pcode','$state','$eMail ','$contact','$phone','$type','$quantity','$readydate', $jobnumber ,now())" ;
				$mainquery = mysqli_query($conn, $sql);		

				$bookingID = mysqli_insert_id($conn);

				include ($WebsiteRoot. '/includes/sendBookingSCTR.php');

				
			
				//testing database code
			/*
				if ($conn->query($sql) === TRUE) {
					echo "You have created a booking";	
				} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				}
				*/
	
				}

				
		}

		
	}	
		

?>

