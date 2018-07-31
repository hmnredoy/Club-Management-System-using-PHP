<?php
include '../../dbconnect.php';


	$format = '/^[0-9]{2}-[0-9]{5}-[0-9]{1}|[0-9]{4}-[0-9]{3}-[0-9]{1}$/';

	$flag = 1;
	$check = 1;
	
	if(empty($_REQUEST["receiver_ID"]) || empty($_REQUEST["message"])){

		echo "<p class='updated' style='color: #fff;
	background-color: #CF4847;
	padding: 15px 0;
	border-radius: 2px;
	width:300px;
	margin: 15px 33% 0 33%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;
	-webkit-box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);
	-moz-box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);
	box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);'>Some field are empty.</p>";
	$flag = 0;

	}
	if(!preg_match($format, $_REQUEST["receiver_ID"])) {

    echo "<p class='updated' style='color: #fff;
	background-color: #CF4847;
	padding: 15px 0;
	border-radius: 2px;
	width:300px;
	margin: 15px 34% 0 34%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;
	-webkit-box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);
	-moz-box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);
	box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);'>Invalid ID format. ID looks like XX-XXXXX-X or XXXX-XXX-X.</font></p>";

	$flag = 0;
	}
	else{

	$senderID = $_REQUEST["sender_ID"];
	$recieverID = $_REQUEST["receiver_ID"];
	
	$user_exist_qry = "SELECT * FROM studentinfo WHERE username='".$_REQUEST["receiver_ID"]."'";
	$user_exist_rslt = mysqli_query($db, $user_exist_qry);

	$mod_exist_qry = "SELECT * FROM moderatorinfo WHERE user_ID ='$recieverID' AND user_ID <> '$senderID'";
	$mod_exist_rslt = mysqli_query($db, $mod_exist_qry);

	$admin_exist_qry = "SELECT * FROM admininfo WHERE username ='$recieverID'";
	$admin_exist_rslt = mysqli_query($db, $admin_exist_qry);


	if (mysqli_num_rows($mod_exist_rslt) != 1 && mysqli_num_rows($user_exist_rslt) != 1 && mysqli_num_rows($admin_exist_rslt) != 1){

	$check = 0;

	}


}

	if($check == 0)
	{
		echo "<p class='updated' style='color: #fff;
	background-color: #CF4847;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin: 15px 34% 0 34%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;
	-webkit-box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);
	-moz-box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);
	box-shadow: 1px 6px 23px 1px rgba(112,112,112,1);'>Please check the Receiver ID again. This ID doesn't exist in our database.</p>";
	$flag = 0;
	}

	else{

	if($flag == 1)
	{


		$message =  mysqli_real_escape_string($db,$_REQUEST["message"]);
		
		
		$sql="INSERT INTO message(recieverID, senderID, message, time, senderName, senderType)
		values ('".$_REQUEST["receiver_ID"]."','".$_REQUEST["sender_ID"]."','$message', ROUND(UNIX_TIMESTAMP(CURTIME(4)) * 1000),'".$_REQUEST["sender_Name"]."','moderator')";

		$reslt = mysqli_query($db, $sql);
		
		if($reslt)
		{
			echo "<p class='updated' style='font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:38%; margin-right:38%;  width: 200px; text-align: center; padding: 15px 5px; color: #f2f2f2;
				background-color: rgba(38, 38, 38,0.7);
				border-radius: 20px;'>Message Sent!</p>";
	
		}
		else{
			echo "<p class='updated' style='color: #fff;
			background-color: rgba(203, 52, 52,0.8);
			padding: 15px 0;
			border-radius: 2px;
			width:300px;
			margin: 15px 33% 0 33%;
			text-align: center;
			font-family: Tw Cen MT,ROBOTO,helvetica;
			font-size: 17px;
			'>Oops! Something went wrong.</p>";
		}

		
	}

}