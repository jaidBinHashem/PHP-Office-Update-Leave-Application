<?php

	$nothing="";
	$lname="";
	$uname="";

	include('./../controller/VerifySession.php');
	
	if( !ifCredentialSaved() ) {
		header("Location: ./../controller/logout.php");
	}

	if(getSession()){
		if(($_SESSION['utype']=="user")){
			header("Location:userhome.php");
		}
	}
	
	$uname=getSession();
	$lname=getLName($uname['uname']);
	
	echo "Welcome ".$lname."<br/>";
	
	echo "<br/>";


	if(isset($_POST['accept'])){
		acceptRequest($_POST['uname']);
	}

	if(isset($_POST['reject'])){
		rejectRequest($_POST['uname']);
	}

?>


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Pending Leave Request</title>
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">

	</style>
</head>
<body>

<ul>
<li><a href="home.php">Home</a></li>
<li><a href="makepost.php">Make Post</a></li>
<li><a href="profilerequest.php">Pending New Profile Request</a></li>
<li><a href="pendingleaverequest.php">Pending Leave Request</a>	</li>
<li><a href="../controller/logout.php">Log Out</a></li>
</ul>

<br/><br/>

	<form action="pendingleaverequest.php" method="POST">
	<div id="main_container">
		
	<table id="request_table" border="5" align="center">
		<th>User Name</th>
		<th>From</th>
		<th>Till</th>
		<th>Reason</th>
		<th>Accept</th>
		<th>Reject</th>

		<?php

			$result=getTempRequests();
			$num_rows = $result->num_rows;
			$printed_num_rows=0;
			if($result->num_rows > 0)
			{
				
				while ($row=$result->fetch_array(MYSQLI_ASSOC)){
					if($printed_num_rows<=($num_rows-2)){
					echo "<tr><td><input type='text' name='uname' value='".$row['username']."' readonly></td><td>".$row['fromdate']."</td><td>".$row['todate']."</td><td>".$row['reason']."</td><td><button type='submit' name='accept' value='accept' disabled>Accept</button></td><td><button type='submit' name='reject' value='reject' disabled>Reject</button></td></tr>";
					$printed_num_rows++;
				}
				else{
					echo "<tr><td><input type='text' name='uname' value='".$row['username']."' readonly></td><td>".$row['fromdate']."</td><td>".$row['todate']."</td><td>".$row['reason']."</td><td><button type='submit' name='accept' value='accept'>Accept</button></td><td><button type='submit' name='reject' value='reject'>Reject</button></td></tr>";
					//echo $printed_num_rows++;
				}
				
			}
			
			}
		?>

	</table>
	</div>
	</form>

</body>
</html>
