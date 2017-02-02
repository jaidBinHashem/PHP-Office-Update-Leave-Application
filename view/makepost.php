<?php

	$lname="";
	$uname="";

	include('./../controller/VerifySession.php');
	
	if( !ifCredentialSaved() ) {
		header("Location: ./../controller/logout.php");
	}

	
	$uname=getSession();
	$lname=getLName($uname['uname']);
	
	echo "Welcome ".$lname."<br/>";
	echo "<br/>";

	if(isset($_POST['accept'])){
		makepost($_POST['uname'],$_POST['date'],$_POST['subject'],$_POST['text']);
	}

?>


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Make Post</title>
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">

	</style>
</head>
<body>

<ul>
<a href="home.php">Home</a></li>
<a href="makepost.php">Make Post</a></li>
<a href="leaveapplication.php">Leave Application</a></li>
<a href="../controller/logout.php">Log Out</a></li>
</ul>
<br/><br/>


	<div id="main_container">
	<form action="makepost.php" method="POST">

		Username: <input type="text" name="uname" value="<?php echo $_SESSION['uname']; ?>" readonly>
		<br/>
		Post Date: <input type="text" name="date" value="<?php echo date("Y-m-d"); ?>" readonly>
		<br/>
		Topic: <input type="text" name="subject">

		<br/><br/>
		Post: <input type="text" name="text" style="width: 500px; height: 100px;">
		<br/><br/>
		<button type='submit' name='accept' value='accept'>Post</button>

	</form>
	</div>
</body>
</html>