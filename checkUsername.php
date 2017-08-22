<!DOCTYPE html>
<html>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery-3.2.1.js"  crossorigin="anonymous"></script>
       <script src="js/bootstrap.js"  crossorigin="anonymous"></script>
      <script src="js/index.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#usernameLoading').hide();
		$('#username').keyup(function(){
		  $('#usernameLoading').show();
	      $.post("check.php", {
	        username: $('#username').val()
	      }, function(response){
	        $('#usernameResult').fadeOut();
	        setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 400);
	      });
	    	return false;
		});
	});

	function finishAjax(id, response) {
	  $('#usernameLoading').hide();
	  $('#'+id).html(unescape(response));
	  $('#'+id).fadeIn();
	} //finishAjax
</script>
</head>
<body>
<!--
      <form class="form-signin" method="POST">
    <h2 class="form-signin-heading">Please Register</h2>
    <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
	</div>
  
<span id="usernameResult"></span>
	
	<label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
  </form>
 -->

 <div id="regContainer" class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
        
              <div class="col-xs-6">
                <a href="#" id="register-form-link">Register</a>
              </div>
         
            <hr>
          </div>
          <div class="panel-body">
          
            
                <form id="register-form" action="#" method="POST" role="form" >
                  <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"  class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirm password</label>
                    <input type="password" name="confirm-password" id="confirm-password"  class="form-control">
                  </div>
                   <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"  class="form-control" placeholder="Username">
                  <span id="usernameResult"></span>
                    <br>
                  </div>
                   <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                  </div>
                   <div class="form-group">
                    <label for="photo">Photo(Optional)</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                  </div>
                    <div class="form-group">
                    <label for="notifications">Notifications</label>
                    <input type="checkbox" name="notifications" id="notifications" class="form-control">
                  </div>
                     <div class="form-group">
                    <label for="terms">I have read and accept the Terms and Conditions</label>
                    <input type="checkbox" name="terms" id="terms" class="form-control">
                  </div>
        
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                         <?php
	            if(isset($_POST["email"]) ){
                $email = $_POST["email"];
                $password = $_POST["password"];
                $name = $_POST["name"];
		        $uname= $_POST["username"];
                $photo = $_POST["photo"];
                $notification = $_POST["notifications"];

		         $date = date('Y-m-d H:i:s');
							
			     include("dbConnect.php");
			    
       			 $query= "insert into users(u_name,full_name,email,pwd,is_notif_on,dp_link,date) values 
                        ('$uname', '$name', '$email','$password', '$notification', '$photo', '$date')";
                 if(mysqli_query($conn,$query)){
                     $_SESSION["user"]=$uname;
                     echo '<h4 style="color:red">Your Username is '.$uname.'.farqpadtahai.com</h4>';
                 }
        	
               }	
	?>
                </form>
         
          </div>
        </div>
      </div>
    </div>
</body>
</html>