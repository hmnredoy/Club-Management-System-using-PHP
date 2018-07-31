<?php 

include '../../dbconnect.php';

$username = "";
$email    = "";
$_SESSION['success'] = "";
$errors = array(); 

if (isset($_POST['post_event'])) {
	

	$ev_head = $_POST['ev_head'];
	
	$event_box = $_POST['event_box'];
	$venue = $_POST['venue'];
	$capacity = $_POST['capacity'];
	$event_date = $_POST['day']."-".$_POST['month']."-".$_POST['year'];
	$event_time = $_POST['time'];

	$clubID = $_POST['club'];

	if (empty($ev_head)) { array_push($errors, "Event name is required"); }
	if (empty($event_box)) { array_push($errors, "Event detail is required"); }
	if (empty($venue)) { array_push($errors, "Venue is required"); }
	if (empty($capacity)) { array_push($errors, "Capacity is required"); }
	else if (!is_numeric($capacity) && $capacity<1) { array_push($errors, "Capacity has to be a positive integer number."); 
	}
	if (empty($event_date)) { array_push($errors, "Event date is required"); }
	if (empty($event_time)) { array_push($errors, "Event time is required"); }


	if(empty($clubID) && !isset($_POST['event_all'])){

		array_push($errors, "Please select a club.");

	}
	

include 'upload-picture.php';

	if (count($errors) == 0) {

		
		if(isset($_POST['event_all'])){

		$query = "SELECT * FROM clubinfo";
		$results = mysqli_query($db, $query);

		while($row = mysqli_fetch_assoc($results)) {

		

		$sql="INSERT INTO event_table(event_head, event_detail, venue, capacity, date, time, event_img, club_ID)
        values ('$ev_head','$event_box','$venue','$capacity','$event_date','$event_time','$target_file','".$row['club_ID']."')";

		$reslt = mysqli_query($db, $sql);
		
		}

		echo "<p class='updated' style=' font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:36%; margin-right:36%; color: rgb(86, 132, 46); width: 200px; background-color: rgb(216, 235, 198); text-align: center; border-radius:20px; padding: 5px 5px; border: 1px solid rgb(86, 132, 46);'>Event Posted to all clubs!</p>";
	}

	else{


        $sql="INSERT INTO event_table(event_head, event_detail, venue, capacity, date, time, event_img, club_ID)
        values ('$ev_head','$event_box','$venue','$capacity','$event_date','$event_time','$target_file','$clubID')";
        $reslt = mysqli_query($db, $sql);

       
       echo "<p class='updated' style=' font-size: 18px; font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:36%; margin-right:36%; color: rgb(86, 132, 46); width: 200px; background-color: rgb(216, 235, 198); text-align: center; border-radius: 2px; padding: 10px 5px; border: 1px solid rgb(86, 132, 46);'>Event Posted!</p>";

		
		}
        
			
	}
	

}

 ?>