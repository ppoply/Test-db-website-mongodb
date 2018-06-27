<?php

	require_once 'functions.php';

	if(check_signin()){
		header("Location: welcome.php");	
	}
?>

<!doctype html>
<html lang="en">
  <head>

    <title>Sign Up</title>


    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="styledude.css">
  </head>

  <body class="text-center">
    <form class="form-signin" action="insert_user.php" method="post">
      <img class="mb-4" src="http://cdn.differencebetween.net/wp-content/uploads/2018/02/Difference-Between-Cool-and-Cold-1.gif" alt="" width="144" height="96">
      <h1 class="h3 mb-3 font-weight-normal">Please fill up these details to sign up</h1>

 <div class="form-group>">
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required>
      
 </div>
      
 <div class="form-group">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      
 </div>
      

 <div class="form-group">
      <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
      <input type="password" name="confirm_password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" onblur="errorpw()" required>
      
 </div>
 
<div id="error"></div>

 <div class="yeah">  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
 </div>


 	<p>Already have an account? <a href="login.php">Login here</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-20XX Parth Poply</p>

      <script src="check_error.js" type="text/javascript"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">

    </form>
  </body>
</html>