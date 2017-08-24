<!DOCTYPPE html>
<html>
<head>  
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet" type="text/css" />

  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
       <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>

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
         
    <script src="js/index.js"></script>
</head>
<body>

<div id="regContainer" class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>
              <div class="col-xs-6">
                <a href="#" id="register-form-link">Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="#" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" action="#" method="POST" role="form" style="display: none;">
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
                  <span style="color:red" id="usernameResult"></span>
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
                    <input type="checkbox" name="notifications" id="notifications">
                  </div>
                     <div class="form-group">
                    <label for="terms">I have read and accept the Terms and Conditions</label>
                    <input type="checkbox" name="terms" id="terms">
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
                 $result = mysqli_query($conn,$query);
                 
        	
               }	
	?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    </body>
</html>