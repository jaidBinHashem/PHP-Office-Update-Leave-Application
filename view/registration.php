<?php

	if(!isset($_SESSION)){
		session_start();
	}

	if(isset($_SESSION['uname'])){
		header("Location: login.php");
	}

	include("../controller/dbInteraction.php");

	$fname="";
	$lname="";
	$email="";
	$phone="";
	$eid="";
	$uname="";
	$upass="";
	$cpassword="";

	if($_SERVER["REQUEST_METHOD"] =="POST" ){
		if($_POST["fname"]){
			//$fname=mysql_real_escape_string(trim($_POST["fname"]));
			$fname=$_POST["fname"];
		}

		if($_POST["lname"]) {
			//$lname = mysql_real_escape_string( trim( $_POST["lname"] ));
			$lname=$_POST["lname"];
		}

		if($_POST["uname"]) {
			//$username = mysql_real_escape_string( trim( $_POST["username"] ));
			$uname=$_POST["uname"];
		}
		if($_POST["email"]) {
			//$email = mysql_real_escape_string( trim( $_POST["email"] ));
			$email=$_POST["email"];
		}
		if($_POST["phone"]) {
			//$phone = mysql_real_escape_string( trim( $_POST["phone"] ));
			$phone=$_POST["phone"];
		}
		
		if($_POST["eid"]){
			$eid=$_POST["eid"];
		}

		if($_POST["upass"]) {
			//$password = mysql_real_escape_string( trim( $_POST["password"] ));
			$upass=$_POST["upass"];
		}
		if($_POST["cpassword"]) {
			//$cpassword = mysql_real_escape_string( trim( $_POST["cpassword"] ));
			$cpassword=$_POST["cpassword"];
		}
	
	$isValid = true;

	if($fname != "" && $lname != "" && $email != "" && $phone != "" && $username != "" && $upass != "" && $cpassword != ""){

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo 'Invalid EMAIL<br>';
			$isValid = false;
		}
	
		if($upass != $cpassword) {
			echo 'The password did not matched!!!<br>';
			$isValid = false;
			$upass = $cpassword = "";
		}
		
	} 
	else {
		echo 'Please fill up all fields...';
				$isValid = false;
		}

		if( $isValid && !(CheckUName($uname)) &&!(CheckTUName($uname))){
				CompleteTempRegistration($fname,$lname,$email,$phone,$eid,$uname,$upass);
				header("Location: login.php");
			}
			else{
				echo "User Name not availabe";
			}
		}

	
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>

	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">

	<script>
		function validateForm(){

				var firstName=document.getElementById("firstName").value;
				if(firstName=="")
				{
					
					document.getElementById("lfirstName").innerHTML="  *First Name is must";
					return false;
				}
				else if(firstName!="")
				{
					document.getElementById("lfirstName").innerHTML="";
				}

				var lastName=document.getElementById("lastName").value;
				if(lastName=="")
				{
					document.getElementById("llastName").innerHTML="  *Last Name is must";
					return false;
				}
				else if(lastName!="")
				{
					document.getElementById("llastName").innerHTML="";
				}

				var email = document.getElementById('email').value;
				var expr="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$";
				if(!email.match(expr) || email=="")
				{
					document.getElementById('lemail').innerHTML="  *Enter a valid Email";
					return false;
				}
				else if(email.match(expr))
				{
					document.getElementById('lemail').innerHTML="";
				}

				var number = document.getElementById('phone').value;
				var expr = /[1-9]/g;
				if(!number.match(expr) || number=="")
				{
					document.getElementById('lphone').innerHTML="  *Input Must Be Numbers";
					return false;
				}
				else if(number.match(expr))
				{
					document.getElementById('lphone').innerHTML="";
				}

				password = document.getElementById('password').value;
				if(!(password.length>4))
				{
					document.getElementById("lpassword").innerHTML="  *Must greater than 4 char in length";
					return false;
				}
				else
				{
					document.getElementById("lpassword").innerHTML="";
				}

				cpassword=document.getElementById("cpassword").value;
				if(password!=cpassword)
				{
					document.getElementById("lcpassword").innerHTML="  *Must br same with password";
					return false;
				}
				else
				{
					document.getElementById("lcpassword").innerHTML="";
				}

		}
</script>
</head>
<body>
<br/>
<div id="main_container">
<form method="POST" action="registration.php" onsubmit="return validateForm()">
	<div>
		<span>First Name:</span>
		<input type="text" id="firstName" name="fname" value="<?=$fname?>" /><label id='lfirstName'></label>
	</div>
	<div>
		<span>Last Name:</span>
		<input type="text" id="lastName" name="lname" value="<?=$lname?>" /><label id='llastName'></label>
	</div>
	<div>
		<span>Email:</span>
		<input type="text" id="email" name="email" value="<?=$email?>" /><label id='lemail'></label>
	</div>
	<div>
		<span>Phone Number:</span>
		<input type="text" id="phone" name="phone" value="<?=$phone?>" /><label id='lphone'></label>
	</div>
	<div>
		<span>Employe Id:</span>
		<input type="number" name="eid" value="<?=$eid?>" />
	</div>
	<div>
		<span>Your Username:</span>
		<input type="text" name="uname" value="<?=$uname?>" />
	</div>
	<div>
		<span>Your Password:</span>
		<input type="password" id="password" name="upass" value="<?=$upass?>" /><label id='lpassword'></label>
	</div>
	<div>
		<span>Confirm Password:</span>
		<input type="password" id="cpassword" name="cpassword" value="<?=$cpassword?>" /><label id='lcpassword'></label>
	</div>
	<div>
	<br/>
		<input type="submit" value="Register"/>
		<button><a href="login.php">Login</a></button>
	</div>
	
</form>
</div>
</body>
</html>