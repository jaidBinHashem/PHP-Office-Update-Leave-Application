<?php
	
	include("../model/db.php");

	if(!isset($_SESSION)){
		session_start();
	}

	function ifCredentialSaved(){
		if(!isset($_SESSION['uname'])
			|| !isset($_SESSION['upass'])
			|| $_SESSION['uname']==""
			|| $_SESSION['upass']==""){
			return false;
		}
		else{
			return true;
		}
	}

	function verify($uname,$upass){
		$result=CheckUser($uname,$upass);
		if($result->num_rows == 1){
			return true;
		}
		else{
			return false;
		}
	}

	function saveCredential($uname,$upass){
		$result=CheckUser($uname,$upass);
		if($result->num_rows==1){
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				//print_r($row);
				$_SESSION['uname']=$row['username'];
				$_SESSION['upass']=$row['password'];
				$_SESSION['utype']=$row['type'];
			}
		}
	}

	function getSession(){
		return $_SESSION;
	}

	function getLName($uname){

		return getLastName($uname);
	}

	function getTempProfiles(){
		$result=getTprofiles();
		return $result;
	}


	function saveTempProfileToDb($uname){
		$result=getTprofile($uname);

		if($result->num_rows>0)
		{
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$fname=$row['fname'];
				$lname=$row['lname'];
				$email=$row['email'];
				$phone=$row['pnumber'];
				$eid=$row['eid'];
				$uname=$row['username'];
				$upass=$row['password'];
			}
		}

		SaveNewProfile($fname,$lname,$email,$phone,$eid,$uname,$upass);
		SaveNewUser($uname,$upass);
		DeleteTempProfile($uname);
		header("Location: ../view/profilerequest.php");

	}

	function deleteTempProfileFromDb($uname){
		DeleteTempProfile($uname);
		header("Location: ../view/profilerequest.php");
	}


	function getPosts(){
		$result=getPost();
		return $result;
	}


	function makepost($uname,$date,$subject,$text){
		savePostToDb($uname,$date,$subject,$text);
		header("Location: ../view/login.php");
	}

	function makerequest($uname,$fromdate,$todate,$reason){
		saveTempRequestToDb($uname,$fromdate,$todate,$reason);
		header("Location: ../view/requests.php");
	}

	function checkTempRequest($uname){
		$result=checkTempRequestToDb($uname);
		if(($result->num_rows)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function getTempRequests(){
		$result=getTempRequestsFromDb();
		return $result;
	}

	function acceptRequest($uname){
		$result=checkTempRequestToDb($uname);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$uname=$row['username'];
				$fromdate=$row['fromdate'];
				$todate=$row['todate'];
				$reason=$row['reason'];
				$status='Accepted';
			}
		}

		saveRequest($uname,$fromdate,$todate,$reason,$status);
		deleteTempRequest($uname);
		header("Location: ../view/pendingleaverequest.php");
	}

	function rejectRequest($uname){
		$result=checkTempRequestToDb($uname);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$uname=$row['username'];
				$fromdate=$row['fromdate'];
				$todate=$row['todate'];
				$reason=$row['reason'];
				$status='Rejected';
			}
		}
		saveRequest($uname,$fromdate,$todate,$reason,$status);
		deleteTempRequest($uname);
		header("Location: ../view/pendingleaverequest.php");
	}

	function getRequest($uname){
		$result=getRequestFromDb($uname);
		return $result;
	}

?>