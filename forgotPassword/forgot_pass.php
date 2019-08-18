<?php

if(isset($_POST['submit'])){

	$conn = mysqli_connect("localhost", "root", "", "sih");

	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	$name = $_POST['name'];

	echo $name = mysqli_real_escape_string($conn,$name);


	$query = "SELECT reqQuantity,avaQuantity FROM `medicine` WHERE `name` = '$name'";

	$select_query = mysqli_query($conn,$query);

	if(!$select_query){

		die( mysqli_error($conn));
	}
while ($row = $select_query->fetch_assoc()) {
    echo $row['reqQuantity']."<br>";
		echo $row['avaQuantity'];

	/*
*/
$email="vikasmaurya9732@gmail.com";
/*$qa="SELECT avaQuantity FROM medicine";
$qr="SELECT reqQuantity FROM medicine";
$qaa=mysqli_query($conn,$qa);
$qrr=mysqli_query($conn,$qr);
echo	$avaQuantity=mysqli_real_escape_string($conn,(string)$qaa);
echo	$reqQuantity=mysqli_real_escape_string($conn,(string)$qrr);
*/
	if($row['reqQuantity'] > $row['avaQuantity']  ){
/*		$str = "0123456789qwerty#$%^&*";
		$str = str_shuffle($str);
		echo $str = substr($str,0,5);*/

		$url = "http://localhost/sih/dashboard/specid0.html?email=$email";



/*
	require "../phpmailer/PHPMailerAutoload.php";*/
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;*/
/*
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';*/
/*    require_once '../vendor/autoload.php';*/
   require '../vendor/autoload.php';

	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure="tls";
   // $mail->SMTPDebug = 2;
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

/*	$mail->Username="summerproject83@gmail.com"; //emailid
	$mail->Password="summer@123"; //password*/
  $mail->Username="sihnotifications@gmail.com"; //emailid
	$mail->Password="travisscott"; //password

	$mail->setfrom("sihnotifications@gmail.com","ESIC");
	$mail->addAddress($email);

	$mail->isHTML(true);

	$mail->Subject="Medicine Requirement for following:<br>$name";
	$mail->Body    = "To know more visit this link : $url";
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
    echo 'Message could not be sent.<br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<br>Message has been sent';
}


}
     /*   $query = "update `user_accounts` set token = '$str' where email_id = '$email'" ;
		$update_query = mysqli_query($conn,$query);

		if(!$update_query){
			die(mysqli_error($conn));
		}

	}else{
		echo "please check your inputs!";
	}*/

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
   			<form action="" method="POST" id='forgot_form'>
   				<table>
   					<tr>
   						<td><label>Email</label></td>
   						<td><input  name="name" id="name" required="true"></td>
   					</tr>

   					<tr>
   						<td></td>
   						<td><input type="submit" class="submit" name="submit" value="SUBMIT"></td>

   					</tr>

   				</table>




   			</form>
   		</div>
   	</div>
</body>
</html>
