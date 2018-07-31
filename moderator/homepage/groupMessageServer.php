<?php
include '../../dbconnect.php';

	
	if(empty($_REQUEST["message"])){

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

	}
	else{

		$message =  mysqli_real_escape_string($db,$_REQUEST["message"]);
		$sql_grp = "INSERT INTO group_chat(groupName, receiverID, senderID, message, time, senderName)
		values ('".$_REQUEST["groupMsg_name"]."','".$_REQUEST["sender_ID"]."','".$_REQUEST["sender_ID"]."','$message', ROUND(UNIX_TIMESTAMP(CURTIME(4)) * 1000),'".$_REQUEST["sender_Name"]."')";

		$reslt = mysqli_query($db, $sql_grp);
		
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
			font-size: 17px;'>Oops! Something went wrong.</p>";
		}

		
	}