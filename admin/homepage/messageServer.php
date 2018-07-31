<?php
include '../../dbconnect.php';


	$format = '/^[0-9]{2}-[0-9]{5}-[0-9]{1}|[0-9]{2}-[0-9]{5}-[0-9,]{1}|[0-9]{4}-[0-9]{3}-[0-9]{1}|[0-9]{4}-[0-9]{3}-[0-9,]{1}$/';

	$flag = 1;
	$check = 1;
	
	if(empty($_REQUEST["receiver_ID"]) || empty($_REQUEST["message"])){

		echo "<p class='updated' style='color: #fff;
	background-color: #CF4847;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin-left: 38%;
	margin-right: 38%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;'>Some field are empty.</p>";
	$flag = 0;

	}
	else if(!preg_match($format, $_REQUEST["receiver_ID"])) {

    echo "<p class='updated' style='color: #fff;
	background-color: #CF4847;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin: 15px 34% 0 34%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;'>Invalid ID format. ID looks like XX-XXXXX-X or XXXX-XXX-X.</font></p>";
	$flag = 0;
	}

	else{

	if($flag == 1)
	{

		
	$pieces = explode(",", $_REQUEST["receiver_ID"]);

		//if(null !== ",")
		//{

		foreach($pieces as $i =>$key) {

		if($key != "")
		{

		$student_exist_qry = "SELECT * FROM studentinfo WHERE username='".$key."'";
		$student_exist_rslt = mysqli_query($db, $student_exist_qry);

		$mod_exist_qry = "SELECT * FROM moderatorinfo WHERE user_ID='".$key."'";
		$mod_exist_rslt = mysqli_query($db, $mod_exist_qry);


		if (mysqli_num_rows($mod_exist_rslt) != 1 && mysqli_num_rows($student_exist_rslt) != 1){

		$check = 0;

		}
		else{
		
		$message =  mysqli_real_escape_string($db,$_REQUEST["message"]);

		//$message = $_REQUEST["message"];

 	 	$sql="INSERT INTO message(recieverID, senderID, message, time, senderName, senderType)
		values ('".$key."','".$_REQUEST["sender_ID"]."','$message', ROUND(UNIX_TIMESTAMP(CURTIME(4)) * 1000),'".$_REQUEST["sender_Name"]."','admin')";

		$reslt = mysqli_query($db, $sql);
				}
			}
		}
		if($check == 0){

			echo "<p class='updated' style='color: #fff;
				background-color: #CF4847;
				padding: 5px 0;
				border-radius: 2px;
				width:300px;
				margin: 15px 34% 0 34%;
				text-align: center;
				font-family: Tw Cen MT,ROBOTO,helvetica;
				font-size: 17px;
				border: 2px dashed #fff;'>Please check the Receiver ID again. Seems like the ID(s) doesn't exist in our database.</p>";

		}
		else{

		if($reslt)
		{
			echo "<p class='updated' style='font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:38%; margin-right:38%; width: 200px; text-align: center; border-radius:20px; padding: 5px 5px; color: #f2f2f2;
				background-color: rgba(32, 128, 0,0.7);
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
}


		//}
	//	else{
	//		echo "hi";
		//}
		