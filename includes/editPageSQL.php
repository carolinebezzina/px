<?php 

	session_start();
	$username = $_SESSION['username'];
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once($WebsiteRoot . '/includes/dataConnect.php');
	
	$sql_pages = "SELECT page_title FROM edit_content";
	$rs_pages = mysqli_query($conn, $sql_pages) or die(mysqli_error());

	$sql_home = "SELECT * FROM edit_content WHERE page_title = 'home'";
	$rs_home = mysqli_query($conn, $sql_home) or die(mysqli_error());

	$sql_services = "SELECT * FROM edit_content WHERE page_title = 'services'";
	$rs_services = mysqli_query($conn, $sql_services) or die(mysqli_error());

	$sql_why = "SELECT * FROM edit_content WHERE page_title = 'why'";
	$rs_why = mysqli_query($conn, $sql_why) or die(mysqli_error());

	$sql_about = "SELECT * FROM edit_content WHERE page_title = 'about'";
	$rs_about = mysqli_query($conn, $sql_about) or die(mysqli_error());

?>