<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery-3.2.1.js"  crossorigin="anonymous"></script>
       <script src="js/bootstrap.js"  crossorigin="anonymous"></script>
    
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
 
</body>