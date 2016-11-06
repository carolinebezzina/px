<?php 
	session_start();
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	include($WebsiteRoot . '/includes/noCache.php');

	if($_POST['submit']){
			$password = $_POST['Password-req'];	
			
		if (!empty($password)){
			$id = $_SESSION['email'];	
			$password = stripcslashes($password); //protect from SQL injection					
			$password = password_hash($password, PASSWORD_BCRYPT);
			
			require_once($WebsiteRoot . '/includes/dataConnect.php');
			
			$sql = "UPDATE user_details SET password = '$password' WHERE email = '$id'";
			$rs = mysqli_query($conn, $sql);
			
			$sql = "SELECT password FROM user_details WHERE email = '$id'";
			$rs = mysqli_query($conn, $sql);
			$row = mysqli_fetch_row($rs);
			$updatePass = $row[0];
			
			if ($row[0] == $updatePass) {
				
				unset($_SESSION['email']);
			
				if (isset($_SESSION['username'])){
					
				?>
					<script type="text/javascript">
					alert("Password has been updated!");
					window.location.href = 'http://www.southcoasttyrerecycling.com.au/accounts.php';
					</script>		
					
				<?php
				
					header('location: accounts.php');
				
				 }else{
					
				?>
					<script type="text/javascript">
					alert("Password has been updated! Please login with your new password!");
					window.location.href = 'http://www.southcoasttyrerecycling.com.au/login.php'
					</script>
								
				<?php 
				
					header('location: login.php');			
				 }
						
			}else{
				$error = "Account not updated, error in query!";
				array_push($messages, $error );
			}
			
		}
	}
	
?>
	 
	 
	 	