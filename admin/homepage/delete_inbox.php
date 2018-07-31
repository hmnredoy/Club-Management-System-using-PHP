<?php
include '../../dbconnect.php';

	$id = $_REQUEST['del_id'];
	$user = $_REQUEST['user'];
	
	/*$delete = "DELETE FROM message WHERE senderID = '".$_POST['del_id']."'";
	$result = mysqli_query($db, $delete)or die(mysqli_error($db));*/


	$check_deleted = mysqli_query($db, "SELECT deleted_by_member FROM message WHERE ((`senderID`='$user' AND `recieverID`='$id') OR (`senderID`='$id' AND `recieverID`='$user')) AND (`deleted_by_member`='$user' OR `deleted_by_member`='$id')") or die(mysqli_error($db));

    if(mysqli_num_rows($check_deleted)==0)
    {
       mysqli_query($db, "UPDATE message SET deleted_by_member = '$user' WHERE ((`senderID`='$user' AND `recieverID`='$id') OR (`senderID`='$id' AND `recieverID`='$user'))") OR die(mysqli_error($db));
    }
    else{

    	mysqli_query($db, "DELETE FROM message where (recieverID ='$id' AND senderID = '$user') OR (recieverID = '$user' AND senderID = '$id')") OR die(mysqli_error($db));



    }

    $sql_2="DELETE FROM group_chat where groupName = '$id'";
	mysqli_query($db, $sql_2)or die(mysqli_error($db));

?>