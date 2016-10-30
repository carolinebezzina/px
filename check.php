<?php

	session_start();

	$email = $_SESSION['username'];
	
	echo 'Username is: ' . $email ;
	
	echo '<pre>';
	var_dump($_SESSION);
	echo '</pre>';	


?>