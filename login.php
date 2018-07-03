/*File for handling Login requests with proper verification and error handling */

<?php
  

  require_once 'connect.php'; 
  require_once 'functions.php';

  if(check_signin()){
    header("Location: welcome.php");  
  }
?>

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $username_err = $password_err = "";
      $uname = $_POST['username'];
      $temp_pass = $_POST['password'];
      $search = array("Username"=>$uname);
      $find = $collection->findOne($search); /* checking for username in global collection */
    
      if(empty($find)){
        $username_err = 'No account found with that username.';
      }
    
      else{
        $pass = $find["Password"];
        if(password_verify($temp_pass,$pass)){  
          $logged = user_login($uname); /*Successfull login if password matches to the one in database */
    
    
          if($logged){
            header("Location: welcome.php"); 
          }
          else{
            echo "Login Unsucessfull... Please try again later.";
          }
        }
        else{
          $password_err = 'The password you entered was not valid.';
        }
      }
  }

 ?>

// Template for login form with proper validation
<html lang="en">
  <head>

    <title>Log in</title>


    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="styledude.css">
  </head>

  <body class="text-center">
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <img class="mb-4" src="http://cdn.differencebetween.net/wp-content/uploads/2018/02/Difference-Between-Cool-and-Cold-1.gif" alt="" width="144" height="96">
      <h1 class="h3 mb-3 font-weight-normal">Please fill your details to Log in</h1>

 <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" value="<?php echo $uname; ?>" required autofocus>
      <span class="help-block"><?php echo $username_err; ?></span>
 </div>
      
 <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" value="<?php echo $temp_pass; ?>" required>
      <span class="help-block"><?php echo $password_err; ?></span>
 </div>
      

 

 <div class="yeah">  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
 </div>


  <p>Don't have an account? <a href="register.php">Sign up here.</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-20XX Parth Poply</p>

      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </form>
  </body>
</html>