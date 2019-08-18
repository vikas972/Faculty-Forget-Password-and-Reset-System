<?php
session_start();
if(isset($_GET['email'] , $_GET['token'])){
	$conn = mysqli_connect("localhost", "root", "", "college");

	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	
	 $email = mysqli_real_escape_string($conn,$_GET['email']);
	 $token = mysqli_real_escape_string($conn,$_GET['token']);
	
	$query = "SELECT * FROM `user_accounts` WHERE `token` = '$token'  and email_id = '$email'";
	
/*	SELECT * FROM `members` WHERE `token` = 'y53r7' and member_email = 'user@gmail.com'*/
	
	$select_query = mysqli_query($conn, $query);
	$count = mysqli_num_rows($select_query);
	if($count > 0 ){
		
		$_SESSION['email'] = $email;
		header("Location:new_pass.php");
	
		
	}else{
		echo " Plesase check your link";
		
	}
	
}else{
	echo "click on link";
}
?>

<!--
<input type="password" name="new_pass" id="new_pass"><br>
<button type="submit">Submit</button>-->
