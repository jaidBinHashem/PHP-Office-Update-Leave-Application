<?php
	include('./../controller/VerifySession.php');
	
	if( !ifCredentialSaved() ) {
		header("Location: ./../controller/logout.php");
	}
	
	if(getSession()){
		if($_SESSION['utype']=="user"){
			header("Location:userhome.php");
		}
		elseif ($_SESSION['utype']=="admin") {
			header("Location:adminhome.php");
		}
	}

	print_r( getSession() );
	echo "<br/>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<a href="../controller/logout.php">Log Out</a>
</body>
</html>