<?php
	session_start();
	if(!(isset($_SESSION['ulogin'])))
      {
	     if(!($_SESSION['ulogin'] == "yes")){
			 header("location: login.php");
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
  
    <title>FarqPadtaHai- Messages</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <script src="js/jquery-3.2.1.js"  crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>

    <!-- Custom styles for this template -->
  
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">FarqPadtaHai</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="signup.php">Register <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h5>All Messages</h5>
        	<div id="received">
                <ul>
		<?php
			     include("dbConnect.php");
           $username= $_SESSION["username"];
	$sql="select * from messages where msg_to='$username' ORDER BY msg_date desc";
	$query=mysqli_query($conn,$sql);
	   
	   while($row= mysqli_fetch_assoc($query)):	 		
?>		
<tr style="font-size:16px">
	<li>
    <span><?php echo $row['msg_id'] ?></span>
	<span><?php echo $row['msg_data']; ?></span>
	<span><?php echo $row['msg_date']; ?></span>
    </li>
	<?php
		endwhile;
	?>
	</ul>
	</div>
</div> 


<div class="panel panel-primary" style="width:40%; margin:20px" >
    <div class="panel-heading">
  	<h3 class="panel-title">
  	Good Qualities
    </h3>    
  </div>     
	<div class="panel-body"  style="margin:0px; width:115%;">
	  
	  <div id="Main">
      <?php 
      $sql="select * from messages where msg_to='$username' ORDER BY msg_date desc";
	$query=mysqli_query($conn,$sql);
	   
	   while($row= mysqli_fetch_assoc($query)):	 		
     ?>
	     <a name="poll_bar"><?php echo $row['good1'] ?> </a> <span name="poll_val">60.1% </span><br/>
       <a name="poll_bar">Firefox</a> <span name="poll_val">23.4% </span><br/>
       <a name="poll_bar">IE     </a> <span name="poll_val">9.8%  </span><br/>
       <a name="poll_bar">Safari </a> <span name="poll_val">3.7%  </span><br/>
       <a name="poll_bar">Opera  </a> <span name="poll_val">1.6%  </span><br/>
    </div>
    
   
	</div>  
</div>


      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    </body>
</html>