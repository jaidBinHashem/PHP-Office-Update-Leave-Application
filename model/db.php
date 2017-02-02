<?php
	$connection=null;

	$server="localhost";
	$username="root";
	$password="";
	$db_name="company";

	function connect ($server,$username,$password,$db_name){
		$connection=mysqli_connect($server,$username,$password,$db_name);

		if(!$connection){
			die("Didn't connected");
		}
		else
			return $connection;
	}


	function CheckUserName($uname){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql = "select * from users where username='".$uname."'";
			$result=$connection->query($sql);
			return $result;
		}
	}


	function CheckTUserName($uname){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql = "select * from tempprofile where username='".$uname."'";
			$result=$connection->query($sql);
			return $result;
		}
	}



	function CheckUser($uname,$upass){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql = "select * from users where username='".$uname."' AND password='".$upass."'";
			$result=$connection->query($sql);
			return $result;
		}
	}




	function SaveNewProfile($fname,$lname,$email,$phone,$eid,$uname,$upass){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){

			$sql = "INSERT INTO profiles (id,fname,lname,email,pnumber,eid,username,password) VALUES (NULL,'".$fname."','".$lname."','".$email."','".$phone."','".$eid."','".$uname."','".$upass."')";

			$connection->query($sql);
		}
	}


	function SaveTempProfile($fname,$lname,$email,$phone,$eid,$uname,$upass){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){

			$sql = "INSERT INTO tempprofile (id,fname,lname,email,pnumber,eid,username,password) VALUES (NULL,'".$fname."','".$lname."','".$email."','".$phone."','".$eid."','".$uname."','".$upass."')";

			$connection->query($sql);
		}
	}

	function DeleteTempProfile($uname){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){

			$sql = "delete from tempprofile where username='".$uname."'";

			$connection->query($sql);
		}
	}




	function SaveNewUser($uname,$upass){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){

			$sql = "INSERT INTO users (id,username,password,type) VALUES (NULL,'".$uname."','".$upass."','user')";

			$connection->query($sql);
		}
	}


	function getLastName($uname){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql = "select lname from profiles where username='".$uname."'";
			$result=$connection->query($sql);
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return $row['lname'];
		}

	}

	function getTprofiles(){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql="select * from tempprofile";
			$result=$connection->query($sql);
			return $result;
		}
	}

	function getTprofile($uname){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql="select * from tempprofile where username='".$uname."'";
			$result=$connection->query($sql);
			return $result;
		}
	}


	function getPost(){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql="select * from posts";
			$result=$connection->query($sql);
			return $result;
		}
	}

	function savePostToDb($uname,$date,$subject,$text){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql="insert into posts(id,username,time,subject,text) values (NULL,'".$uname."','".$date."','".$subject."','".$text."')";
			$connection->query($sql);
		}
	}


	function checkTempRequestToDb($uname){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql="select * from templeaverequest where username='".$uname."'";
			$result=$connection->query($sql);
			return $result;
		}
	}

	function saveTempRequestToDb($uname,$fromdate,$todate,$reason){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql="insert into templeaverequest(id,username,fromdate,todate,reason) values (NULL,'".$uname."','".$fromdate."','".$todate."','".$reason."')";
			$connection->query($sql);
		}
	}

	function getTempRequestsFromDb(){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql="select * from templeaverequest";
			$result=$connection->query($sql);
			return $result;
		}
	}


	function saveRequest($uname,$fromdate,$todate,$reason,$status){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){
			$sql="insert into leaverequest(id,username,fromdate,todate,reason,status) values (NULL,'".$uname."','".$fromdate."','".$todate."','".$reason."','".$status."')";
			$connection->query($sql);
		}
	}

	function deleteTempRequest($uname){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){

			$sql = "delete from templeaverequest where username='".$uname."'";

			$connection->query($sql);
		}
	}


	function getRequestFromDb($uname){
		$connection=connect($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db_name']);

		if($connection){

			$sql = "select * from leaverequest where username='".$uname."'";

			$result=$connection->query($sql);
			return $result;
		}
	}

?>