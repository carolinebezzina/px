<?php
	if(isset($valid)){
		
		if($valid){

			$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
			require_once($WebsiteRoot . '/includes/noCache.php');
			require_once ( $WebsiteRoot . '/phpmailer/PHPMailerAutoload.php');

			if(isset($_POST["submit"])){
				$name = $_POST['Name-req-alpha'];
				$email = $_POST['Email-email'];
				$phone = $_POST['Phone-req-num'];
				$message = $_POST['Message-req-alphachar'];

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
				$mail->From = 'noreply@southcoasttyrerecycling.com.au';

				$mail->FromName = $name;

				//To address and name
				$mail->addAddress("info@southcoasttyrerecycling.com.au", "South Coast Tyre Recycling");

				//Address to which recipient will reply
				$mail->addReplyTo($email, "Reply");

				// //CC and BCC
				// $mail->addCC("cc@example.com");
				// $mail->addBCC("bcc@example.com");

				//Send HTML or Plain Text email
				$mail->isHTML(true); 

				$mail->Subject = "Contact - South Coast Tyre Recycling";
				
				if ($email == null)
				{
					$mail->Body = 
								"<p>You have received a contact request through southcoasttyrerecycling.com.au</p>
								<p>The details are as follows:</p>
								<p>Name: " . $name . "</p>
								<p>Email: No email provided</p>
								<p>Phone: " . $phone . "</p>
								<p>Message:</p>
								<p>" . $message . "</p>
					";
					$mail->AltBody = "$name $phone $message";
				}
				else 
				{
					$mail->Body = 
								"<p>You have received a contact request through southcoasttyrerecycling.com.au</p>
								<p>The details are as follows:</p>
								<p>Name: " . $name . "</p>
								<p>Email: <a href='mailto:" . $email . "'>" . $email . "</a></p>
								<p>Phone: " . $phone . "</p>
								<p>Message:</p>
								<p>" . $message . "</p>
					";
					$mail->AltBody = "$name $phone $email $message";
				}
				if(!$mail->send()) 
				{
				    echo "Mailer Error: " . $mail->ErrorInfo;
				} 
				else 
				{
				    header('location:http://southcoasttyrerecycling.com.au/contact.php');
				}
			}
		}
	}
?>