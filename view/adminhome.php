<?php

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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
</head>
<body>
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="makepost.php">Make Post</a></li>
<li><a href="profilerequest.php">Pending New Profile Request</a></li>
<li><a href="profilerequest.php">Pending Leave Request</a></li>	
<li><a href="../controller/logout.php">Log Out</a></li>
</ul>
<br/><br/>

<div id='main_container'>

	<?php

		$result=getPosts();
		
		if($result->num_rows > 0)
			{
				while ($row=$result->fetch_array(MYSQLI_ASSOC)){
					echo getLName($row['username'])." posted about ".$row['subject']." on ".$row['time'];
					echo "<br/>";
					echo "<strong>Post-</strong>".$row['text'];
					echo "<br/>";
					echo "<br/>";
					echo "<br/>";
					echo "<br/>";
				}

			}


	?>
</div>
</body>
</html>