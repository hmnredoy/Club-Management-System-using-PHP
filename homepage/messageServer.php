<?php
include '../dbconnect.php';


	if(empty($_REQUEST["message"])){

		echo "Write a reply first.";

	}
	else{

		$message =  mysqli_real_escape_string($db,$_REQUEST["message"]);
		


		//$sql='INSERT INTO message(recieverID, senderID, message, time, senderName) values ("'.$_REQUEST["receiver_ID"].'","'.$_REQUEST["sender_ID"].'","'.mysql_real_escape_string($_REQUEST["message"]).'", now(),"'.$_REQUEST["sender_Name"].'")';

		$sql = "INSERT INTO message(recieverID, senderID, message, time, senderName) values ('".$_REQUEST["receiver_ID"]."', '".$_REQUEST["sender_ID"]."','$message',ROUND(UNIX_TIMESTAMP(CURTIME(4)) * 1000),'".$_REQUEST["sender_Name"]."')";

		$reslt = mysqli_query($db, $sql);
		
		if($reslt)
		{
			echo "Message Sent!";
		}
		else{
			echo "Something went wrong.";
		}

		
	}