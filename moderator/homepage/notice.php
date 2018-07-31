<?php
include "db_notice.php";

	   //$conn = mysqli_connect("localhost", "root", "root","club");
	

	if(empty($_REQUEST["notice"]) || empty($_REQUEST["user"])){

		echo "<p class='updated' style=' font-weight: lighter; font-family: Tw Cen MT,ROBOTO,helvetica; color: #b35c00;
	background-color: #ffe6cc;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin: 20px 0 10px 35%;
	text-align: center;'>No field can be empty.</p>";

	}


	else{

        $sql="INSERT INTO notice_table(notice, time_date, posted_by, club_ID) values ('".$_REQUEST["notice"]."', now(), '".$_REQUEST["user"]."','".$_REQUEST["club"]."')";

	//	$reslt = mysqli_query($conn, $sql);

		
		$a=getDataFromDB($sql);
		//echo "abc";

		
}

?>