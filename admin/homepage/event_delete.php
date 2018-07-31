<?php
include '../../dbconnect.php';


	if($_REQUEST["id"] == 'All'){


		$img_query = "SELECT * FROM event_table";

		$img_rslt = mysqli_query($db, $img_query);

		if (mysqli_num_rows($img_rslt) > 0) {

		while($row = mysqli_fetch_assoc($img_rslt)) {

			unlink('../../slider/'.$row['event_img']);
			
			}
		}

			$sql="DELETE FROM event_table";
			mysqli_query($db, $sql);

			$sql_ev ="DELETE FROM event_join";
			mysqli_query($db, $sql_ev);

			$sql_ntc ="DELETE FROM notification";
			mysqli_query($db, $sql_ntc);



	}
	else{
		$id = $_REQUEST["id"];

		$img_query = "SELECT * FROM event_table WHERE id= '$id' AND $id NOT IN 
		 (SELECT id FROM event_table GROUP BY event_img HAVING COUNT(event_img) > 1)";
		 //To restrict multiple event delete for the same event image

		$img_rslt = mysqli_query($db, $img_query);

		if (mysqli_num_rows($img_rslt) == 1) {

		while($row = mysqli_fetch_assoc($img_rslt)) {

			unlink('../../slider/'.$row['event_img']);
			
			}

		}

		
		$sql="DELETE FROM event_table WHERE id='".$_REQUEST["id"]."'";
		mysqli_query($db, $sql)or die(mysqli_error($db));

		$sql_ev ="DELETE FROM event_join WHERE event_ID = '".$_REQUEST["id"]."'";
		mysqli_query($db, $sql_ev)or die(mysqli_error($db));

		$sql_ntc ="DELETE FROM notification WHERE event_ID = '".$_REQUEST["id"]."'";
		mysqli_query($db, $sql_ntc)or die(mysqli_error($db));
	}

?>