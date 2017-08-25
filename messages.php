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



  /*    SELECT goodquality1,goodquality2,goodquality3,goodquality4,goodquality5, COUNT(*) AS Total , (COUNT(*) / (SELECT COUNT(*) FROM messages WHERE msg_to='$username')) * 100 AS 'Percentage to all items', 
FROM messages
WHERE msg_to='$username'
GROUP BY goodquality1; 

*/

/*SELECT * FROM messages
WHERE EXISTS (SELECT goodquality1 FROM messages WHERE msg_to='$username') OR
      EXISTS (SELECT goodquality2 FROM messages WHERE msg_to='$username') OR
      EXISTS (SELECT goodquality3 FROM messages WHERE msg_to='$username');*/


    /*  SELECT *
     , CONCAT_WS('', goodquality1, goodquality2,goodquality3,goodquality4,goodquality5) AS good_quality
  FROM messages WHERE msg_to='$username';
*/
      //$sql="select * from messages where msg_to='$username' ORDER BY msg_date desc";
   /*   $sql= "SELECT goodquality1, goodquality2,goodquality3,goodquality4,goodquality5, COUNT(*) AS Total,
        (COUNT(*) / (SELECT COUNT(*) FROM messages WHERE msg_to='$username')) * 100 AS 'Percentage1' 
        FROM messages  WHERE msg_to='$username' GROUP BY goodquality1";
*/

  /*$sql ="SELECT *
     , CONCAT_WS('', goodquality1, goodquality2,goodquality3,goodquality4,goodquality5) AS good_quality,
      (COUNT(*) / ((goodquality1, goodquality2,goodquality3,goodquality4,goodquality5)  )) * 100 AS 'Percentage1'
  FROM messages WHERE msg_to='$username' GROUP BY good_quality";*/


  $goodsql="SELECT goodquality1 AS gquality FROM messages WHERE msg_to='$username' 
UNION ALL
SELECT goodquality2 AS gquality FROM messages WHERE msg_to='$username' 
UNION ALL
SELECT goodquality3 AS gquality FROM messages WHERE msg_to='$username'
UNION ALL
SELECT goodquality4 AS gquality FROM messages WHERE msg_to='$username'
UNION ALL
SELECT goodquality5 AS gquality FROM messages WHERE msg_to='$username'";


$count_good=0;
	$query=mysqli_query($conn,$goodsql);
	   $arr =array();
	   while($row= mysqli_fetch_assoc($query)){	
       if(($row["gquality"] !=NULL)) {		
        array_push($arr, $row["gquality"]);
        $count_good++;
       }
     }
    
     $t = array_count_values($arr);
      arsort($t);
    
foreach ($t as $key => $value):
     ?>
	    <br/> <a name="poll_bar"><?php echo $key; ?> </a> <span style="margin-left:100px;" name="poll_val"><?php echo round($value/$count_good,4)*100 .' %';?> </span>
    
<?php

endforeach;

?>
 </div>
  
   
	</div>  
</div>
<div class="panel panel-primary" style="width:40%; margin:20px" >
    <div class="panel-heading">
  	<h3 class="panel-title">
  	Bad Qualities
    </h3>    
  </div>     
	<div class="panel-body"  style="margin:0px; width:115%;">
	  
	  <div id="Main">
<?php
 $sql_bad="SELECT badquality1 AS bquality FROM messages WHERE msg_to='$username' 
UNION ALL
SELECT badquality2 AS bquality FROM messages WHERE msg_to='$username' 
UNION ALL
SELECT badquality3 AS bquality FROM messages WHERE msg_to='$username'
UNION ALL
SELECT badquality4 AS bquality FROM messages WHERE msg_to='$username'
UNION ALL
SELECT badquality5 AS bquality FROM messages WHERE msg_to='$username'";

$count_bad=0;
	$query_bad=mysqli_query($conn,$sql_bad);
	   $arr_bad =array();
	   while($row= mysqli_fetch_assoc($query_bad)){	
       if(($row["bquality"] !=NULL)) {		
        array_push($arr_bad, $row["bquality"]);
        $count_bad++;
       }
     }
    
     $afterSortBad = array_count_values($arr_bad);
      arsort($afterSortBad);
    
foreach ($afterSortBad as $key => $value):
     ?>
	    <br/> <a name="poll_bar"><?php echo $key; ?> </a> <span style="margin-left:100px;" name="poll_val"><?php echo round($value/$count_bad,4)*100 .'%';?> </span>
    
<?php

endforeach;

?>
   
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