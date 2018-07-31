<?php 

include '../dbconnect.php';


if(isset($_REQUEST["userID"])){

	$query = "UPDATE message SET seen_unseen = 'seen' where recieverID = '".$_REQUEST['userID']."' AND seen_unseen = 'unseen' OR senderID = '".$_REQUEST['userID']."' AND seen_unseen = 'unseen'";
	$results = mysqli_query($db, $query);


}

?>