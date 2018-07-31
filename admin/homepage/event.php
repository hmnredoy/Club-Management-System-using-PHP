<?php
require '../../dbconnect.php';


	   //$conn = mysqli_connect("localhost", "root", "root","club");
	if(empty($_REQUEST["ev_head"]) || empty($_REQUEST["event"]) || 
		empty($_REQUEST["venue"]) || empty($_REQUEST["capacity"]) || empty($_REQUEST["ev_date"])
		|| empty($_REQUEST["ev_time"]) || empty($_REQUEST["club_slct"])){

		echo "<h3 class='updated' style=' font-weight: lighter; font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:43%; color: #cc0000; width: 200px; background-color: #ffb3b3; text-align: center; border-radius:20px; padding: 5px 5px;'>No field can be empty.</h3>";

	}else{

		$_FILES['fileToUpload']= $_REQUEST["fileToUpload"];

		include 'upload_event.php';

        $sql="INSERT INTO event_table(event_head, event_detail, venue, capacity, date, time, event_img, club_ID) values ('".$_REQUEST["ev_head"]."','".$_REQUEST["event"]."','".$_REQUEST["venue"]."','".$_REQUEST["capacity"]."','".$_REQUEST["ev_date"]."','".$_REQUEST["ev_time"]."','$file_data','".$_REQUEST["club_slct"]."')";

	//	$reslt = mysqli_query($conn, $sql);

		
		$a=getDataFromDB($sql);
		//echo "abc";
		
}

?>