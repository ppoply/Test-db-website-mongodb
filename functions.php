<?php
	session_start();

	function signup($doc){
		
		global $collection;
		$collection->insert($doc);
		return true;
	}

	function check_user($username){

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

		return($pass==$cpass);

	}


	function user_login($username){

		$_SESSION["userSignedIn"] = 1;
		global $collection;
		$h = $collection->findOne(array('Username'=>$username));
		$_SESSION["username"] = $h["Username"];
		return true;
	}


	function check_signin(){

		if($_SESSION["userSignedIn"] == 1){
			return true;
		}
		else{
			return false;
		}
	}

?>
