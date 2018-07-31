<?php
include '../../dbconnect.php';


	if(empty($_REQUEST["message"])){

		echo "<p class='updated' style='color: #fff;
	background-color: #CF4847;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin: 15px 33% 0 33%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;'>Write a reply first.</p>";

	}
	else{

		$sql="INSERT INTO message(recieverID, senderID, message, time, senderName)
		values ('".$_REQUEST["receiver_ID"]."','".$_REQUEST["sender_ID"]."','".$_REQUEST["message"]."', now(),'".$_REQUEST["sender_Name"]."')";

		$reslt = mysqli_query($db, $sql);
		
		if($reslt)
		{
			echo "<p class='updated' style='font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:38%; margin-right:38%; color: rgb(86, 132, 46); width: 200px; background-color: rgb(216, 235, 198); text-align: center; border-radius:20px; padding: 5px 5px; border: 1px solid rgb(86, 132, 46);'>Message Sent!</p>";
		}
		else{
			echo "<p class='updated' style='color: #fff;
			background-color: #CF4847;
			padding: 5px 0;
			border-radius: 2px;
			width:300px;
			margin: 15px 33% 0 33%;
			text-align: center;
			font-family: Tw Cen MT,ROBOTO,helvetica;
			font-size: 17px;
			border: 2px dashed #fff;'>Something went wrong.</p>";
		}

		
	}