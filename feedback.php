<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Feedback</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
</head>

	
<body >
	<!-- Header Section Starts -->
 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Register <span class="sr-only">(current)</span></a>
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

      
   <!-- Navigation bar ends -->
 
 <div class="container">

	 <div class="row form-horizontal col-md-7 col-md-offset-2" style="margin-top:8px">
			<form method="POST"  role="form" >
	 		  <div class="col-md-12">
            <div class="row" id="qualities">
              <div id="goodQuality" class="col-md-6">
                <h5>Good Qualities</h5>
                <input type="text" class="form-control" name="good1" id="good1" placeholder="Quality 1" required />
                <input type="text" class="form-control" name="good2" id="good2" placeholder="Quality 2" required />
                <input type="text" class="form-control" name="good3" id="good3" placeholder="Quality 3"  />
                <input type="text" class="form-control" name="good4" id="good4" placeholder="Quality 4"  />
                <input type="text" class="form-control" name="good5" id="good5" placeholder="Quality 5"  />
              </div>
              <div id="badQuality" class="col-md-6">
                <h5>Bad Qualities</h5>
                <input type="text" class="form-control" name="bad1" id="bad1" placeholder="Quality 1" required />
                <input type="text" class="form-control" name="bad2" id="bad2" placeholder="Quality 2" required />
                <input type="text" class="form-control" name="bad3" id="bad3" placeholder="Quality 3"  />
                <input type="text" class="form-control" name="bad4" id="bad4" placeholder="Quality 4"  />
                <input type="text" class="form-control" name="bad5" id="bad5" placeholder="Quality 5"  />
              </div>
            </div>  
             
         </div> 
       	<textarea type="text" class="form-control" name="feedback" id="feedback" style="height:100px" placeholder="Feedback" required ></textarea>
	   <div class="form-group">
                  <input type="checkbox" name="iCanHelp" id="iCanHelp" value="iCanHelp"/>
                    <span style="display:inline-block" for="iCanHelp">I Can Help You!!</span>
                
                  </div>
      <?php
	        if(isset($_POST["feedback"]) ){
			       
		         $feedback= $_POST["feedback"];
		 $date = date('Y-m-d H:i:s');
							
			     include("dbConnect.php");
			    
       			 $query= "insert into messages(msg_data,msg_date) values ('$feedback','$date')";
                 $result = mysqli_query($conn,$query);
        	
               }	
	?>
				 <button class="btn btn-primary" style="margin-top:14px;margin-left:45%;width:90px" >Send</button>
	 		</form> 
	</div>
    </div>
</body>
</html>