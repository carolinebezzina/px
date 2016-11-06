<?php
	session_start();
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once($WebsiteRoot . '/includes/dataConnect.php');
	require_once($WebsiteRoot . '/includes/noCache.php');	
	
	
	if(isset($_POST["submitpage"])){	
		
		$_SESSION['maincontent'] = $_POST['maincontent'];
		$_SESSION['columnleft'] = $_POST['columnleft'];
		$_SESSION['columnmiddle'] = $_POST['columnmiddle'];
		$_SESSION['columnright'] = $_POST['columnright'];
		$main_content = $_POST['maincontent'];
		$column_left = $_POST['columnleft'];
		$column_middle = $_POST['columnmiddle'];
		$column_right = $_POST['columnright'];
		$page_title = $_SESSION['pagetitle'];

		$sql = "UPDATE edit_content SET main_content = '$main_content', column_left = '$column_left', column_middle = '$column_middle', column_right = '$column_right' WHERE page_title = '$page_title'";

		if ($conn->query($sql) === TRUE) {
			header('location:..\editPage.php');
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
	}
?>
