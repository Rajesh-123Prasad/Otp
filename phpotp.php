<?php
	// Authorisation details.
if (isset($_POST['login'])) {
	
	$username = "22rajeshprasad@gmail.com";
	$hash = "e860f5f22dd790d1018384a0f956b3ba72915f82fadddeb5ba52218cfe9d0982";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";
	$name=$_POST['name'];

	// Data for text message. This is the text message data.
	$sender = "API Test"; // This is who the message appears to be from.
	$numbers = $_POST['num'];  // A single number or a comma-seperated list of numbers
	$otp=mt_rand(100000,999999);
	setcookie("otp",$otp);
	$message = "Hey".$name."your otp is".$otp;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	echo ("otp send successfully");
	curl_close($ch);

  }

 if(isset($_POST['ver'])){
 	$verotp=$_POST['otp'];
 	if($verotp==$_COOKIE['otp']){

 		echo ("logined successfully");
 	}
 	else
 	{
 		echo ("otp wrong");
 	}

 }

?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>opt verification</title>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
	<form method="post" action="phpotp.php">
		
		<table align="center" class="table table-dark table-hover">
			<div class="formcontrol">
               <tr>
				<td>Name:</td>
				<td><input type="text" name="name" class="formcontrol" placeholder="Enter your Name"></td>
			 </tr>
			</div>

			<div class="formcontrol">
				<tr>
				<td>Phone Number:</td>
				<td><input type="text" name="num" class="formcontrol" placeholder="Enter Valid Phone Number with country code"></td>
			</tr>
			</div>

			<div>
				<tr>
				<td>Send OTP</td>
				<td><input type="submit" name="login"  class="formcontrol" value="sign(login)[send otp]" style="background-color: #433396; border:0px;"></td>
			</tr>
			</div>

			<div>
				<tr>
			<td>Verify Otp:</td>
			<td><input type="text" name="otp" class="formcontrol" placeholder="Enter recieved otp"></td>
             </tr>
			</div>
			
			<div>
				<tr>
				<td></td>
				<td><input type="submit" name="ver" class="formcontrol" value="verify otp" style="background-color: green; border:0px;"></td>
			</tr>
			</div>
		</table>
		
	</form>
</div>

</body>
</html>
