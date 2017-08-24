<?php
	session_start();
	if(isset($_SESSION['ulogin']))
      {
	     if($_SESSION['ulogin'] == "yes"){
			 header("location: dashboard.php");
			 exit();
		 }
      }
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form method="POST" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        
          
	           <?php
             include("dbConnect.php");
              if((isset($_POST["username"]) && isset($_POST["password"])) ){
                $username= $_POST["username"];
                $password = $_POST["password"];

                $query ="select * from users where u_name='$username' and pwd='$password'";
                $result = mysqli_query($conn,$query);
                
                if(mysqli_num_rows($result)>0){
                  header("location: dashboard.php");
                  //   header("location:".$username.".farqpadtahai.com/dashboard.php");
                    $_SESSION["ulogin"] = "yes";
                    $_SESSION["username"]=$username;
                }
                else{
                echo '<p class="h2" style="color:red"> Login Failed</p>';
                }
             }	 
	          ?>


        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
