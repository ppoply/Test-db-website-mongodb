/* File for handling registration with proper validation and error handling  */
<?php
  
  require_once 'connect.php';
  require_once 'functions.php';

  if(check_signin()){
    header("Location: welcome.php");  
  }

?>

<?php 

  $username_err=$password_err=$confirm_password_err="";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $uname = $_POST['username'];
      $temp_pass = $_POST['password'];
      $confirm_pass = $_POST['confirm_password'];
      $pass = password_hash($temp_pass,PASSWORD_DEFAULT);
    
      $insertArray = array(
    
        "Username" => $uname,
        "Password" => $pass
      );
    
      //Checking for validation errors
      $query = check_user($uname);
      $pquery = password_check($temp_pass,$confirm_pass);
      $plquery = password_lencheck($temp_pass);
    
      if($query==true && $pquery==true && $plquery==true){
        signup($insertArray);
        header("Location: login.php");
      }
      else if(!($query)){
        $username_err = "This username is already taken.";
        
      }
      else if(!($pquery)){
        $confirm_password_err = 'Password did not match.';
        
      }
      else if(!($plquery)){
        $password_err = "Password length should be more than 8 characters";
        
      }
  }
  
?>
//Template for Signup form with proper validation 
<!doctype html>
<html lang="en">
  <head>

    <title>Sign Up</title>


    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="styledude.css">
  </head>

  <body class="text-center">
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <img class="mb-4" src="http://cdn.differencebetween.net/wp-content/uploads/2018/02/Difference-Between-Cool-and-Cold-1.gif" alt="" width="144" height="96">
      <h1 class="h3 mb-3 font-weight-normal">Please fill up these details to sign up</h1>

 <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" >
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" value="<?php echo $uname; ?>" required>
      <span class="help-block"><?php echo $username_err; ?></span>
      
 </div>
      
 <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" value="<?php echo $temp_pass; ?>" required>
      <span class="help-block"><?php echo $password_err; ?></span>
 </div>
      

 <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
      <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
      <input type="password" name="confirm_password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" value="<?php echo $confirm_pass; ?>" 
      required>
      <span class="help-block"><?php echo $confirm_password_err; ?></span>
 </div>
 

 <div class="yeah">  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
 </div>


 	<p>Already have an account? <a href="login.php">Login here</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-20XX Parth Poply</p>

      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    </form>
  </body>
</html>