<?php 	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	include($WebsiteRoot . '/includes/noCache.php');
	//require_once($WebsiteRoot . '/includes/loggedIn.php');
	//	$bookingID = $_GET['bookingID'];
	
	//Send email after confirmation - uses bookingID to get the email
			
		$sql = "SELECT email, contact_name, business_name, type, quantity, ready_date FROM booking WHERE booking_ID = $bookingID";
		$rs = mysqli_query($conn, $sql);
		
		/*	if ($conn->query($sql) === TRUE) {
					echo "You have created a booking";	
				} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				}
		*/
		
		$row = mysqli_fetch_assoc($rs);
		
		$email = "{$row['email']}";
		$type = "{$row['type']}";
		$quantity = "{$row['quantity']}";
		$date = "{$row['ready_date']}";
		
		/*
		echo " The booking id is: $bookingID <br/> <br/>";
		echo " The email is: $email <br/> <br/>";
		*/
		
		$name = "{$row['contact_name']}";
		$company = "{$row['business_name']}";
		$message = "$name from $company";
		
		
		$link = 'http://www.southcoasttyrerecycling.com.au/viewBooking.php?';
		
		require_once ( $WebsiteRoot . '/phpmailer/PHPMailerAutoload.php');
		
			//PHPMailer Object
			$mail = new PHPMailer;
			
			//SMTP setup
			//$mail->IsSMTP();
			$mail->Host = 'mail.southcoasttyrerecycling.com.au';							
			$mail->SMTPAuth = true;
			$mail->Username = 'noreply@southcoasttyrerecycling.com.au';
			$mail->Password = 'Recycle123';
			$mail->Port= 25;


			//From email address and name
			$mail->From = "noreply@southcoasttyrerecycling.com.au";
			$mail->FromName = "South Coast Tyre Recycling";

			//To address and name
			$mail->addAddress($email, $message);
			

			//Address to which recipient will reply
			$mail->addReplyTo("noreply@southcoasttyrerecycling.com.au", "Reply");

			//Send HTML or Plain Text email
			$mail->isHTML(true);
			$mail->Subject = "Booking Confirmation - Set to Active";
			$mail->Body = "<i>Hi, <br/> This is information regarding your Booking - Your booking has been Confirmed. We will contact you ASAP to check if it is correct. <br/>
			
			This message is sent to notify $message that your booking has been set to active and we will be creating a job for it shortly. <br/> <br/>
			
			Your booking consists of $quantity, $type to be picked up on or after $date. <br/> <br/>
			
			To view your booking, click on this link and login:
			</br></br><a href='$link'>$link</a></i>";
			$mail->AltBody = "Hi, This is a confirmation booking email. $link";

			if(!$mail->send()) 
			{
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
//			else 
	//		{
			
		//		echo "Message has been sent successfully";
			//}
			
?>