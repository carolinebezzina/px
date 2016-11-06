<?php	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
//	if (isset($_POST['buttonID'])) {

		$jobID = $_GET['job_number'];
		

	
				header('Content-Type: text/csv, charset=utf-8');
				header('Content-Disposition: attachment; filename=EmployeejobSheet.csv');
	
				//write data to the output
				$data = fopen('php://output', 'w');
				
				//optput headings
				fputcsv($data, array('BookingID', 'Company', 'Type', 'Quantity', 'Street', 'Suburb', 'Date'));
						
				$select ="SELECT booking_ID, business_name, type, quantity, address, suburb, ready_date FROM booking WHERE job_number = $jobID";	$selectRes = mysqli_query($conn, $select);
			
				
				while($row = mysqli_fetch_assoc($selectRes)){
				//$date = $row['ready_date'];
				//$newDate = date("d-m-Y",strtotime($date));
				
				/*
				$book = "{$row['booking_ID']}";
				$comp = "{$row['business_name']}";
				$type = "{$row['type']}";
				$quantity = "{$row['quantity']}";
				$address = "{$row['address']}";
				$suburb = "{$row['suburb']}";
				*/
				
					fputcsv($data, $row);
				}
				
				// $book, $comp, $type, $quantity, $address, $suburb, $newDate)
	//}
	?>