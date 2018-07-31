<?php
include '../../dbconnect.php';

	   //$conn = mysqli_connect("localhost", "root", "root","club");
	

	if(empty($_REQUEST["notice"]) || empty($_REQUEST["user"])){

		echo "<p class='updated' style='color: #fff;
	background-color: #CF4847;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin: 15px 33% 0 33%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;'>No field can be empty.</p>";

	}
	else if(empty($_REQUEST["club"]) && empty($_REQUEST["ntc_all"])){

		echo "<p class='updated' style='color: #fff;
	background-color: #CF4847;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin: 15px 33% 0 33%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;'>Please select a club.</p>";

	}
	else if($_REQUEST["ntc_all"]==1){


		$query = "SELECT * FROM clubinfo";
		$results = mysqli_query($db, $query);

		while($row = mysqli_fetch_assoc($results)) {

		$sql="INSERT INTO notice_table(notice, time_date, posted_by, club_ID)
		values ('".$_REQUEST["notice"]."', now(), '".$_REQUEST["user"]."','".$row['club_ID']."')";

		$reslt = mysqli_query($db, $sql);
		
		}


		echo "<p class='updated' style='font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:38%; margin-right:38%; color: rgb(86, 132, 46); width: 200px; background-color: rgb(216, 235, 198); text-align: center; border-radius:20px; padding: 5px 5px; border: 1px solid rgb(86, 132, 46);'>Notice Posted to all clubs!</p>";
	}

	else{

        $sql="INSERT INTO notice_table(notice, time_date, posted_by, club_ID) values ('".$_REQUEST["notice"]."', now(), '".$_REQUEST["user"]."','".$_REQUEST["club"]."')";

		$reslt = mysqli_query($db, $sql);

		echo "<p class='updated' style='font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:38%; margin-right:38%; color: rgb(86, 132, 46); width: 200px; background-color: rgb(216, 235, 198); text-align: center; border-radius:20px; padding: 5px 5px; border: 1px solid rgb(86, 132, 46);'>Notice Posted!</p>";

		
}

?>