<?php
	
	require_once 'connect.php';
	require_once 'functions.php';

	if(check_signin()){
		header("Location: welcome.php");	
	}
?>

<?php 
	
	$uname = $_POST['username'];
	$temp_pass = $_POST['password'];
	$confirm_pass = $_POST['confirm_password'];
	$pass = password_hash($temp_pass,PASSWORD_DEFAULT);

	$insertArray = array(

		"Username" => $uname,
		"Password" => $pass
	);


	$query = check_user($uname);
	$pquery = password_check($temp_pass,$confirm_pass);

	if($query=true && $pquery==true){
		signup($insertArray);
		header("Location: login.php");
	}

	else if(!($query)){
		echo "Username already exists. Please try another one !";
	}
	else if(!(pquery)){
		echo "Passwords do not match";
	}

?>
