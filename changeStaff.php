<?php	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
	
	
	$staffMail = trim($_POST['email']);
	//$jobButton = trim($_POST['jobID']);
		
			//if(isset($_POST["jobID"])){
		
		
		
				if(!empty($_POST['selectedNum'])) 
				{
				 
					//$jobNumber = $_GET['job_sheet_job_number'];
						foreach($_POST['selectedNum'] as $value) 
						{
							
							$staffIDsql = "SELECT user_ID FROM user_details WHERE email = '". $staffMail."'";	
							$IDsql = mysqli_query($conn, $staffIDsql);	
							
							$getID = mysqli_fetch_assoc($IDsql);
							$staffID = "{$getID['user_ID']}";
							
							
							$updateJobSheetSql = "UPDATE job_drivers SET user_ID='$staffID' WHERE job_sheet_job_number = $value"; 
							$updateQuery = mysqli_query($conn, $updateJobSheetSql);



				
							header("Location: jobSheet.php");	
						}
					
					
				}else {
					header("Location: jobSheet.php");
				}
?>