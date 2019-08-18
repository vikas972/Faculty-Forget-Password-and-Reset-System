<?php
session_start();
if(isset($_POST['submit'])){

	$conn = mysqli_connect("localhost", "root", "", "sih");

	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	/*$passowrd = mysqli_real_escape_string($conn,$_POST['new_pass']);*/
   $passowrd=$_POST['new_pass'];
	/*$passowrd = password_hash($passowrd,PASSWORD_BCRYPT,array('cost'=>10));	*/
	echo $email = $_SESSION['email'] ;
   echo "<br>Your password is succesfully changed";

	$query = "update `user` set password ='$passowrd' where email ='$email'";


	$update_query = mysqli_query($conn,$query);
if(!$update_query){
	die (mysqli_error($conn));
}
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forgot Password</title>
	<link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   	<style type="text/css">
   		body{
   			color: black !important;
   			font-size: 15px;
   		}
   		.login_portal{
   			margin-left:30%;
   			margin-right: 30%;
   			margin-top: 5%;
   			width:40%;
   			padding:1%;
   			position: relative;
   		}
   		.submit{
   			position: relative;
   			float:right;
   			width:50%;
   		}
   		input{
   			float: right;
   			width:90%;
   			padding:5px;
   		}
   		label{
   			padding:5px;
   			font-weight:600;
   		}
   	</style>
</head>
<body>
	<div class = "float">
		<div class="header">
			<header id="header" class="hoc clear">
      			<p align="center" style="font-size:30px;font-family:sans-serif ; color:white;">
      				<img src="../../images/Gbank.png" style="width:150px; height:150px; background:none !important;border: none !important;"/>
      						FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY
      			</p>
   			</header>
   		</div>
   		<div class="login_portal">
   			<form action="" method="POST" id='new_pass'>
   				<table>
   					<tr>
   						<td><label>NEW PASSWORD</label></td>
   						<td><input type="password" name="new_pass"  id="new_pass" required="true"></td>
   					</tr>

   					<tr>
   						<td></td>
   						<td><button type="submit" name="submit">Submit</button>	</td>

   					</tr>

   				</table>




   			</form>
   		</div>
   	</div>
</body>
</html>
