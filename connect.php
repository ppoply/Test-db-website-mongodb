<?php
	try{
		$conn = new MongoClient();
		//echo "Connection to db successfully<br>";

		$db = $conn->f20160249db;
		//echo "db f20160249db selected successfully<br>";
		
		$collection = $db->users;
		//echo "collection users selected successfully<br>";

	}catch(Exception $e){
		die("Connection unsuccesfull ... Please try again later ");	
	}

	session_start();
	
?>

