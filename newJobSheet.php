<?php	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
	
	$staffEmail = trim($_POST['email']);
	
	//get users email
	$email = $_SESSION['username'];

	//getting inputted staff value then getting the user id from database for the staff	

			$staffIDsql = "SELECT user_ID FROM user_details WHERE email = '". $staffEmail."'";	
			$IDsql = mysqli_query($conn, $staffIDsql);			
			$getID = mysqli_fetch_assoc($IDsql);
			$staffID = "{$getID['user_ID']}";


	if(!empty($_POST['selectedJob'])) {
		
		
		//updating the job sheet table
		$jobUpdate = "INSERT INTO job_sheet(`created_by`, `date_created`) ";
		$jobUpdate = $jobUpdate . "VALUES ('$email', now())";
		$runSql = mysqli_query($conn, $jobUpdate);
		$increment = mysqli_insert_id($conn);
	

		//updating the job_driver table with employee id, date created and job number
		$jobEmployee = "INSERT INTO job_drivers (`user_ID`, `date_created`, `job_sheet_job_number`) " ;
		$jobEmployee = $jobEmployee . " VALUES ('$staffID', now(), '$increment')" ;
		$runSql = mysqli_query($conn, $jobEmployee);
		foreach($_POST['selectedJob'] as $value) {

		
		
		// inserting booking into job_sheet table

			  // getting the job_sheet identifier
			  $jobNumberSql = "SELECT job_number FROM job_sheet WHERE job_number = $increment";
			  $runSql = mysqli_query($conn, $jobNumberSql);
			  $row = mysqli_fetch_assoc($runSql);
			  $jobNumber = "{$row['job_number']}";
			  
			  
			  //updating the bookings table to reflect that it is in a job and that it will be completed
			  $updateSql = "UPDATE booking SET booking_statusID = '3', job_number = '$jobNumber' WHERE booking_ID = $value";
			  $run = mysqli_query($conn, $updateSql);
			  
		
		}
		header("Location: jobSheetAdmin.php");	
	}
		session_write_close();
	
?>