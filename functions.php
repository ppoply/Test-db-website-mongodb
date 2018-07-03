
<?php
/* File containing all the functions needed during the processing of data (for code reusability) */

	session_start();

	function signup($doc){
		//function for inserting a user document into global collection for users 
		global $collection;
		$collection->insert($doc);
		return true;
	}

	function check_user($username){
		/* function for checking whether a username already exists with the given parameter */
		global $collection;
		$x = $collection->findOne(array('Username'=>$username));
		
		if(empty($x)){
			return true;
		}
		else{
			return false;
		}
	}

	function password_check($pass,$cpass){
		// function for checking whether password and confirm_password match or not 
		return($pass==$cpass);
		
	}

	function password_lencheck($pass){
		// function for checking whether length of password in given range or not 
		return(!(strlen($pass) < 8));

	}


	function user_login($username){
		//function for setting up session variables upon successfull login 
		$_SESSION["userSignedIn"] = 1;
		global $collection;
		$h = $collection->findOne(array('Username'=>$username));
		$_SESSION["username"] = $h["Username"];
		return true;
	}


	function check_signin(){
		// function for checking if user already logged in or not 
		if($_SESSION["userSignedIn"] == 1){
			return true;
		}
		else{
			return false;
		}
	}

?>
