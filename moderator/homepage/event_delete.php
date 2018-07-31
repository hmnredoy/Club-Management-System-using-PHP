<?php
include '../../dbconnect.php';

	if(isset($_REQUEST["id"])){


		$img_query = "SELECT * FROM event_table WHERE id='".$_REQUEST["id"]."'";

		$img_rslt = mysqli_query($db, $img_query);

		if (mysqli_num_rows($img_rslt) > 0) {

		while($row = mysqli_fetch_assoc($img_rslt)) {

			unlink('../../slider/'.$row['event_img']);
			
			}

		}

		
		$sql="DELETE FROM event_table WHERE id = '".$_REQUEST["id"]."'";
		$result = mysqli_query($db, $sql)or die(mysqli_error($db));

		$sql_ev ="DELETE FROM event_join WHERE event_ID = '".$_REQUEST["id"]."'";
		$result_ev = mysqli_query($db, $sql_ev)or die(mysqli_error($db));
		
		$message = urlencode("Deleted!");
		header("Location: homepage.php?eventlist=".$message);	


	
	}

?>