<?php 
	session_start();
	$username = $_SESSION['username'];
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once($WebsiteRoot . '/includes/dataConnect.php');
	
	
	if(isset($_POST["selectpage"])){	
		$selected = $_POST['pages'];
		$sql = "SELECT page_title, main_content, column_left, column_middle, column_right FROM edit_content WHERE page_title = '$selected'";
		$rs = mysqli_query($conn, $sql) or die(mysqli_error()); 
		
		$row = mysqli_fetch_array($rs) or die(mysqli_error());
		$_SESSION['pagetitle'] = $row['page_title'];
		$_SESSION['maincontent'] = $row['main_content'];
		$_SESSION['columnleft'] = $row['column_left'];
		$_SESSION['columnmiddle'] = $row['column_middle'];
		$_SESSION['columnright'] = $row['column_right'];

		header( 'Location: ..\editPage.php' ) ;
	}
?>