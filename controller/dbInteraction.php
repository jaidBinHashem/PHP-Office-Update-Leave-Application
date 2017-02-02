<?php
	
	include("../model/db.php");

	function CheckUName($uname){
		$result=CheckUserName($uname);
		if($result->num_rows > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function CheckTUName($uname){
		$result=CheckTUserName($uname);
		if($result->num_rows > 0){
			return true;
		}
		else{
			return false;
		}
	}


	function CompleteRegistration($fname,$lname,$email,$phone,$eid,$uname,$upass){
		SaveNewProfile($fname,$lname,$email,$phone,$eid,$uname,$upass);
		SaveNewUser($uname,$upass);
	}

	function CompleteTempRegistration($fname,$lname,$email,$phone,$eid,$uname,$upass){
		SaveTempProfile($fname,$lname,$email,$phone,$eid,$uname,$upass);
	}

?>