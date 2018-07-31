<?php
include '../dbconnect.php';

if(isset($_REQUEST["eventid"])){
	
		if($_REQUEST["value"]=='Y'){

		$sql="INSERT INTO event_join(event_ID, club_ID, joined_Member_ID)
         values ('".$_REQUEST["eventid"]."','".$_REQUEST["clubid"]."','".$_REQUEST["userid"]."')";
        $reslt = mysqli_query($db, $sql);
			

		header("Location: homepage.php");

		}

		if($_REQUEST["value"]=='N'){

		$sql="INSERT INTO event_join(event_ID, club_ID, joined_Member_ID,show_Event)
         values ('".$_REQUEST["eventid"]."','".$_REQUEST["clubid"]."','".$_REQUEST["userid"]."','N')";
        $reslt = mysqli_query($db, $sql);
			
		header("Location: homepage.php");

		}	
		
	}


?>