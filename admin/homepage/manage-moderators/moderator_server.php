<?php

include '../../../dbconnect.php';

if(isset($_REQUEST["name"])){

	
	$moderator_format = '/^[0-9]{4}-[0-9]{3}-[0-9]{1}$/';
	$temp_flag = 1;

	$id = $_REQUEST["id"];
	$email = $_REQUEST["email"];


	if(empty($_REQUEST["name"]) || empty($_REQUEST["id"]) || empty($_REQUEST["gender"]) || empty($_REQUEST["email"]) || 
	empty($_REQUEST["password"]) || empty($_REQUEST["clubID"]) || empty($_REQUEST["confpass"]))
	{

	echo "<div style='color: #b35c00;
				background-color: #ffe6cc;
				padding: 5px 0;
				border-radius: 20px;
				width:300px;
				margin: 20px 0 10px 35%;
				border:1px dashed #b35c00;
				text-align: center;'>No field can be empty.</div>";

				$temp_flag = 0;

	}


if (!preg_match($moderator_format, $id)) {

			echo "<div style='color: #b35c00;
				background-color: #ffe6cc;
				padding: 5px 0;
				border-radius: 20px;
				width:350px;
				margin: 20px 32.5% 10px 32.5%;
				border:1px dashed #b35c00;
				text-align: center;'>Wrong ID format. ID should look like XXXX-XXX-X.</div>";
			$temp_flag = 0;

	}

if (!filter_var($email,FILTER_VALIDATE_EMAIL)){ 

	echo "<div style='color: #b35c00;
				background-color: #ffe6cc;
				padding: 5px 0;
				border-radius: 20px;
				width:300px;
				margin: 20px 0 10px 35%;
				border:1px dashed #b35c00;
				text-align: center;'>Invalid Email format.</div>";

				$temp_flag = 0;
}

if($_REQUEST["password"] != $_REQUEST["confpass"]){

	echo "<div style='color: #b35c00;
				background-color: #ffe6cc;
				padding: 5px 0;
				border-radius: 20px;
				width:300px;
				margin: 20px 0 10px 35%;
				border:1px dashed #b35c00;
				text-align: center;'>Password didn't match.</div>";

				$temp_flag = 0;

}

if($temp_flag == 1){
		$mod_query = "SELECT * FROM moderatorinfo WHERE user_ID='$id'";
		$mod_rslt = mysqli_query($db, $mod_query);

		$admin_query = "SELECT * FROM admininfo WHERE username='$id'";
		$admin_rslt = mysqli_query($db, $admin_query);

		$mod_query_club = "SELECT * FROM moderatorinfo WHERE Club_ID=".$_REQUEST['clubID']."";
		$mod_rslt_club = mysqli_query($db, $mod_query_club);

		if (mysqli_num_rows($admin_rslt) == 1) {

			echo "<div style='color: #b35c00;
				background-color: #ffe6cc;
				padding: 5px 0;
				border-radius: 20px;
				width:500px;
				margin: 20px 26% 10px 26%;
				border:1px dashed #b35c00;
				text-align: center;'>Moderator cannot have the same ID as Admin.</div>";
			
		}

		else if (mysqli_num_rows($mod_rslt) == 1) {

			echo "<div style='color: #b35c00;
				background-color: #ffe6cc;
				padding: 5px 0;
				border-radius: 20px;
				width:300px;
				margin: 20px 0 10px 35%;
				border:1px dashed #b35c00;
				text-align: center;'>This id already exists.</div>";
			
		}
		else if (mysqli_num_rows($mod_rslt_club) == 1) {

			echo "<div style='color: #b35c00;
				background-color: #ffe6cc;
				padding: 5px 0;
				border-radius: 20px;
				width:300px;
				margin: 20px 0 10px 35%;
				border:1px dashed #b35c00;
				text-align: center;'>This club already has a moderator.</div>";
			
		}

	else{

		 $mod_sql="INSERT INTO moderatorinfo(user_ID, Name, Club_ID, Club_Name, Gender, Email, Password, Date_Time, Avatar) values ('".$_REQUEST["id"]."','".$_REQUEST["name"]."','".$_REQUEST["clubID"]."','".$_REQUEST["clubName"]."','".$_REQUEST["gender"]."','".$_REQUEST["email"]."','".$_REQUEST["password"]."',now(),'moderator.png')";

		
		$sql_club ="UPDATE clubinfo SET moderator = '".$_REQUEST["name"]."', moderator_ID = '".$_REQUEST["id"]."'  WHERE club_ID = '".$_REQUEST["clubID"]."'";
		


		$mod_res = mysqli_query($db, $mod_sql);

		$result_club = mysqli_query($db, $sql_club);

		echo "<p style=' margin-left:34%; color: #1e7b1e; width: 30%; background-color: #c2f0c2; text-align: center; border-radius:20px; padding: 5px 5px; border:1px dashed #1e7b1e;'>Moderator Created.</p>";
		
	
		}

	}

}

?>