<?php 

	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
  	//require_once($WebsiteRoot . '/includes/noCache.php');

	if(isset($valid)){
		if($valid){
			if($_POST['submit']){
				errorMsg();
					
				$id = $_POST["Email-req-email"];
				$pword = $_POST["Password-req"];
				$id = stripcslashes($id); //protect from SQL injection
				$pword = stripslashes($pword); //protect from SQL injection				
			
				if (!empty($id) && !empty($pword)){
									
					require_once($WebsiteRoot . '/includes/dataConnect.php');
					$sql = "SELECT email, password, user_typeID FROM user_details WHERE email = '$id'";
					$rs = mysqli_query($conn, $sql);
	
					if (mysqli_num_rows($rs) == 1 ) {   
				
					 
						while($row = $rs->fetch_assoc()) {
							
							//password check
					
							if (password_verify($pword, $row["password"])) {
								
								/*
								If a user is currently logged in it will end their session and create a new session.
								*/
								//session_destroy();
								//$_SESSION["loggedIn"] = true;
								$_SESSION["username"] = $id;
								/*
								This switch case uses the query to test for the user level of the individual logging in.
								"0" is a customer. "1" is an employee. "2" is an admin user.
								*/
								switch($row["user_typeID"]){
								case "2": 			 						
									$_SESSION["customer"] = true;
									unset($_SESSION["user"]);
									unset($_SESSION["admin"]);
									header("location: accounts.php");
									exit();
									break;	
								case "1":									
									$_SESSION["user"] = true;
									unset($_SESSION["customer"]);
									unset($_SESSION["admin"]);
									header("location: accounts.php");
									exit();
									break;	
								case "0":
									$_SESSION["admin"] = true;								
									unset($_SESSION["customer"]);
									unset($_SESSION["user"]);		
									header("location: accounts.php");
									exit();
									break;
								default:
									$reqiuredField = "System Error: User Type Issue.";
									array_push($messages, $reqiuredField);
									header("location: login.php");
									exit();
									break;
								}			
							}else{
								$reqiuredField = "Username or Password is incorrect!";
								array_push($messages, $reqiuredField );
							}
						
						}
					}else{			
						$reqiuredField = "Username or Password is incorrect!";
						array_push($messages, $reqiuredField );
					}
					
				}else{
					$reqiuredField = "Username or Password is incorrect!";
					array_push($messages, $reqiuredField );
				}
			}
		}
	}

?>
	 
	 
	 	