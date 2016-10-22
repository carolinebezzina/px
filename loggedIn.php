<?php
session_start();
if(!isset($_SESSION['username'])){	
	header("Location : http://www.southcoasttyrerecycling.com.au");
	session_destroy();
}
?>