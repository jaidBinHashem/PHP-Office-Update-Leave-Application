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
	echo "<br/>";


?>


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Leave Requests</title>
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
	</style>
</head>
<body>

<ul>
<li><a href="home.php">Home</a></li>
<li><a href="makepost.php">Make Post</a></li>
<li><a href="leaveapplication.php">Leave Application</a></li>
<li><a href="../controller/logout.php">Log Out</a></li>
</ul>

<div id='main_container'>
	

	<br/><br/>
	<table id="request_table" border="5" align="center">
		<th>User Name</th>
		<th>From</th>
		<th>Till</th>
		<th>Reason</th>
		<th>Status</th>

	<?php

		$result=getRequest($_SESSION['uname']);
		if($result->num_rows>0){
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				echo "<tr><td>".$row['username']."</td><td>".$row['fromdate']."</td><td>".$row['todate']."</td><td>".$row['reason']."</td><td>".$row['status']."</tr>";
			}
		}
	?>


</div>

</body>
</html>