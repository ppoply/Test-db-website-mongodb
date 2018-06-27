<?php

  require_once 'functions.php';

  if(check_signin()){
    header("Location: welcome.php");  
  }
?>


<html lang="en">
  <head>

    <title>Log in</title>


    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="styledude.css">
  </head>

  <body class="text-center">
    <form class="form-signin" action="login_validation.php" method="post">
      <img class="mb-4" src="http://cdn.differencebetween.net/wp-content/uploads/2018/02/Difference-Between-Cool-and-Cold-1.gif" alt="" width="144" height="96">
      <h1 class="h3 mb-3 font-weight-normal">Please fill your details to Log in</h1>

 <div class="form-group">
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
      
 </div>
      
 <div class="form-group">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      
 </div>
      

 

 <div class="yeah">  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
 </div>


 	<p>Don't have an account? <a href="register.php">Sign up here.</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-20XX Parth Poply</p>

      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </form>
  </body>
</html>