<?php 	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	include($WebsiteRoot . '/includes/noCache.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	if(isset($valid))
	{
		if($valid)
		{
			if($_POST['submit'])
			{
			
						$sql = "SELECT email, contact_name, business_name, contact_number FROM booking where booking_ID = $bookingID";
						$rs = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($rs);
						$customerEmail = "{$row['email']}";
						
						
					/*	echo " The booking id is: $bookingID <br/> <br/>";
						echo " The email is: $email <br/> <br/>";
						echo " The email is: $company <br/> <br/>";
						echo " The email is: $message <br/> <br/>";
						*/
						//email data
						$name = "{$row['contact_name']}";
						$number = "{$row['contact_number']}";
						$company = "{$row['business_name']}";
						$message = "$name from $company";
						
						//email recipient
						$displayName = "South Coast tyre Recycling";
						$email = "jake-hodges@hotmail.com";
						
						$link = 'http://www.southcoasttyrerecycling.com.au/listBooking.php';
						
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
							$mail->addAddress($email, $displayName);
							

							//Address to which recipient will reply
							$mail->addReplyTo("noreply@southcoasttyrerecycling.com.au", "Reply");

							//Send HTML or Plain Text email
							$mail->isHTML(true);
							$mail->Subject = "A new Booking has been made by $company";
							$mail->Body = "<i>Hi, <br/> A new booking has been made by $message. You will need to activate this booking to be able to create a job sheet.<br/>
							
							You can contact them via phone by: $number <br/> email by: $customerEmail.
							
							To activate this booking, click on this link and login then click active:
							</br></br><a href='$link'>$link</a></i>";
							$mail->AltBody = "Hi, <br/> $message has made a booking. <br/> You can contact them via phone by: $number <br/> email by: $customerEmail<br/>			$link";

							if(!$mail->send()) 
							{
								echo "Mailer Error: " . $mail->ErrorInfo;
							} else 
							{
								header("location: bookingSuccess.php");
								echo "Message has been sent successfully";
							}
					}
			}
	}
	
	
?>