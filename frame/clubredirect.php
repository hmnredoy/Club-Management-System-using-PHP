<?php

include '../dbconnect.php';
include '../server.php';

if(isset($_GET["id"])){

		$clubID_ = $_GET["id"];
		$_SESSION['clubID'] =  $_GET["id"];
		
		$query = "SELECT * FROM studentinfo WHERE username='".$_SESSION['username']."'";
		$results = mysqli_query($db, $query);

		
		if (mysqli_num_rows($results) == 1) {

			while($row = mysqli_fetch_assoc($results)) {

			$_SESSION['full_name'] = $row['name'];
			$_SESSION['avatar'] = $row['avatar'];
			$_SESSION['clubname'] = $row['clubname'];

		}

		$query_clb = "SELECT * FROM clubinfo WHERE club_ID = '$clubID_'";
		$results_clb = mysqli_query($db, $query_clb);

		while($row_clb = mysqli_fetch_assoc($results_clb)) {

			$_SESSION['clubname'] = $row_clb['club_Name'];

		}


		
		$notice_qry = "SELECT * FROM notice_table WHERE club_ID ='$clubID_' ORDER BY id DESC LIMIT 1";

		$notice_rslt = mysqli_query($db, $notice_qry);

		if (mysqli_num_rows($notice_rslt) > 0) {

			while($row = mysqli_fetch_assoc($notice_rslt)) {

			$_SESSION['notice'] = $row['notice'];
			$_SESSION['notice_time'] = $row['time_date'];
			$_SESSION['notice_by'] = $row['posted_by'];
			$_SESSION['clubid'] = $row['club_ID'];
			$_SESSION['notice_id'] = $row['id'];
			
			}

		}
		else{

			$_SESSION['notice'] = "No Notice Posted.";
			$_SESSION['notice_time'] = "---";
			$_SESSION['notice_by'] = "---";
			
		}


		header("location: ../homepage/?id=".$_SESSION['username']);

	}
}

 ?>