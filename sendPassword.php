<?php 
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	include($WebsiteRoot . '/includes/noCache.php');

	session_start();
	
	if(isset($valid)){
		if($valid){
			if($_POST['submit']){
					
				$id = $_POST['Email-req-email'];
				$id = stripcslashes($id); //protect from SQL injection
				
				if (!empty($id)){
										
					require_once($WebsiteRoot . '/includes/dataConnect.php');
					$sql = "SELECT email, first_name, last_name FROM user_details WHERE email = '$id'";
					$rs = mysqli_query($conn, $sql);
					
					if (mysqli_num_rows($rs) == 1 ) {
						
						$row = mysqli_fetch_row($rs);	
						$email = $row[0];
						$fullname = $row[1] . " " . $row[2];	
					
						$token = uniqid('id',true);
						$link = 'http://www.southcoasttyrerecycling.com.au/resetpassword.php?token=' . $token . '&email=' . $email;
						
						$token = password_hash($token, PASSWORD_BCRYPT);
						
						$sql = "Select * FROM reset_password WHERE email = '$email'";
						$rs = mysqli_query($conn, $sql);
						
						if (mysqli_num_rows($rs) == 1 ) {
							$sql = "UPDATE reset_password SET email = '$email', token = '$token', date_created = now()";
						}else{
							$sql = "INSERT INTO reset_password (email, token, date_created) VALUES ('$email', '$token', now())";
						}
						mysqli_query($conn, $sql);
						
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
							$mail->FromName = "Full Name";

							//To address and name
							$mail->addAddress($email, $fullname);
							

							//Address to which recipient will reply
							$mail->addReplyTo("noreply@southcoasttyrerecycling.com.au", "Reply");

							/*CC and BCC
							$mail->addCC("cc@example.com");
							$mail->addBCC("bcc@example.com");
							*/
							//Send HTML or Plain Text email
							$mail->isHTML(true);
							$mail->Subject = "Password";
							$mail->Body = "<i>Hi, Here is your password reset token. Follow the link to reset your password. Token is valid for 24 hrs.</br></br><a href='$link'>$link</a></i>";
							$mail->AltBody = "Hi, Here is your password reset token. Token is valid for 24hrs. $link";

							if(!$mail->send()) 
							{
								echo "Mailer Error: " . $mail->ErrorInfo;
							} 
							else 
							{
								echo "Message has been sent successfully";
							}
					}else{
						$error = "No account is linked to this E-Mail!";
						array_push($messages, $error );
					}
					
				}
			}
		}
	}

?>
	 
	 
	 	