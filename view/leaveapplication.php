<?php

	$lname="";
	$uname="";

	include('./../controller/VerifySession.php');
	
	if( !ifCredentialSaved() ) {
		header("Location: ./../controller/logout.php");
	}

	if(getSession()){
		if(($_SESSION['utype']=="admin")){
			header("Location:adminhome.php");
		}
	}
	
	$uname=getSession();
	$lname=getLName($uname['uname']);
	
	echo "Welcome ".$lname."<br/>";
	echo "<br/>";


	if(isset($_POST['accept'])){
		if(checkTempRequest($_POST['uname'])){
			echo "Already a request pending";
		}

		else{
			makerequest($_POST['uname'],$_POST['fromdate'],$_POST['todate'],$_POST['reason']);
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Leave Application</title>
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
</head>
<body>

<ul>
<li><a href="home.php">Home</a></li>
<li><a href="makepost.php">Make Post</a></li>
<li><a href="leaveapplication.php">Leave Application</a></li>
<li><a href="../controller/logout.php">Log Out</a></li>
</ul>
<br/><br/>


<div id='main_container'>
	
	<form action="leaveapplication.php" method="POST">

		Username: <input type="text" name="uname" value="<?php echo $_SESSION['uname']; ?>" readonly>
		<br/>

		From: <input type="date" name="fromdate">
		<br/>

		Till: <input type="date" name="todate">
		<br/>

		Reason: <input type="text" name="reason" style="width: 500px; height: 100px;">
		<br/><br/>
		<button type='submit' name='accept' value='accept'>Post</button>
		
	</form>


</div>

</body>
</html>