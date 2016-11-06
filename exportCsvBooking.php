<?php	
	session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	require_once($WebsiteRoot. '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');

				header('Content-Type: text/csv, charset=utf-8');
				header('Content-Disposition: attachment; filename=AllBookings.csv');
	
				//write data to the output
				$data = fopen('php://output', 'w');
				
				//optput headings
				fputcsv($data, array('booking ID', 'user ID', 'ready date', 'quantity', 'type', 'date modified', 'date created', 'booking status ID', 'job number', 'postcode', 'state', 'street', 'suburb', 'contact name', 'contact number', 'business name', 'email'));
						
				$booking ="SELECT * FROM booking";	
				$allBooking = mysqli_query($conn, $booking);
				
				while($row = mysqli_fetch_assoc($allBooking)){

					fputcsv($data, $row);
				}
			
	?>