<?php 

include("../controller/VerifySession.php");

$uname="";
$upass="";

if( ifCredentialSaved()){
	header("Location: home.php");
}

if( $_SERVER["REQUEST_METHOD"] == "POST" ){
	if($_POST["uname"]){
		$uname=$_POST["uname"];
	}
	if($_POST["upass"]){
		$upass=$_POST["upass"];
	}

	if( $uname !=""  && $upass != ""){
		if( verify($uname,$upass)){
			saveCredential($uname,$upass);
			header("Location:home.php");
		}
		else{
			echo "User Not Detected";
		}

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">

	<script type="text/javascript">
		function redirectRegistration(obj){
			window.location.href = "registration.php";
		}
	</script>

</head>
<body>
<div id="main_container">
<form method="POST" action="login.php">
	<div>
	<br/>
		<span>Username</span>
		<input type="text" name="uname" value="<?=$uname?>" />
	</div>
	<br/>
	<div>
		<span>Password</span>
		<input type="password" name="upass" value="<?=$upass?>" />
	</div>
	<div>
	<br/>
		<input type="submit" value="Sign In"/>
		<input type="button" value="Registration" onclick="redirectRegistration(this)" />
	</div>
</form>
</div>
</body>
</html>