<?php
	

  require_once 'connect.php';	
  require_once 'functions.php';

  if(check_signin()){
    header("Location: welcome.php");  
  }



	$uname = $_POST['username'];
	$temp_pass = $_POST['password'];
	$search = array("Username"=>$uname);
	$find = $collection->findOne($search);

	if(empty($find)){
		echo "Username not registered .";
	}

	else{
		$pass = $query["Password"];
		if(password_verify($temp_pass,$pass)){
			$logged = user_login($uname);


			if($logged){
				header("Location: welcome.php");
			}
			else{
				echo "Login Unsucessfull... Please try again later.";
			}
		}
		else{
			"Invalid password. Please enter the write password.";
		}
	}

 ?>