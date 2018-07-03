//File for Handling logout by destroying current session 
<?php
	session_start();
 
	$_SESSION = array();
 
	session_destroy();
	header("location: login.php");
	exit;
?>
