<?php
 include("dbConnect.php");
if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($conn, $_POST['username']);

	$sql = "SELECT * FROM `users` WHERE u_name='$username'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		echo "Username Not Available";
	}else{
		echo "Username Available";
	}
}

?>