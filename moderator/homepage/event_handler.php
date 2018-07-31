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
	$event_time = $_POST['time'].":".$_POST['day_night'];

	$clubID = $_SESSION['moderator_Club_ID'];
	
	if (empty($ev_head)) { array_push($errors, "Event name is required"); }
	if (empty($event_box)) { array_push($errors, "Event detail is required"); }
	if (empty($venue)) { array_push($errors, "Venue is required"); }
	if (empty($capacity)) { array_push($errors, "Capacity is required"); }
	else if (!is_numeric($capacity) && $capacity<1) { array_push($errors, "Capacity has to be a positive integer number."); 
	}
	if (empty($event_date)) { array_push($errors, "Event date is required"); }
	if (empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year'])) { array_push($errors, "Event date is required"); }
	if (empty($event_time)) { array_push($errors, "Event time is required"); }
	if (empty($_POST['time'])) { array_push($errors, "Event time is required"); }
	include 'upload-picture.php';


	if (count($errors) == 0) {

		

        $sql="INSERT INTO event_table(event_head, event_detail, venue, capacity, date, time, event_img, club_ID)
        values ('$ev_head','$event_box','$venue','$capacity','$event_date','$event_time','$target_file','$clubID')";
        $reslt = mysqli_query($db, $sql);

       
        array_push($errors, "Event Posted!");
			
}
	

}

 ?>