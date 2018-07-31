<?php
include '../../dbconnect.php';

	if(isset($_REQUEST["del_id"])){
	$id=$_POST['del_id'];
	$user=$_POST['user'];
	/*$delete = "DELETE FROM message WHERE senderID = '".$_POST['del_id']."'";
	$result = mysqli_query($db, $delete)or die(mysqli_error($db));*/

	$sql_chk = "SELECT * FROM group_chat WHERE groupName = '$id' AND receiverID = '$user'";
	$result = mysqli_query($db, $sql_chk);

	if (mysqli_num_rows($result) > 0) {

		$sql_2="UPDATE group_chat SET showMessage = 'N' where groupName = '$id' AND receiverID = '$user'";
		mysqli_query($db, $sql_2)or die(mysqli_error($db));

	}
	else{


	$check_deleted = mysqli_query($db, "SELECT deleted_by_member FROM message WHERE ((`senderID`='$user' AND `recieverID`='$id') OR (`senderID`='$id' AND `recieverID`='$user')) AND (`deleted_by_member`='$user' OR `deleted_by_member`='$id')") or die(mysqli_error($db));

    if(mysqli_num_rows($check_deleted)==0)
    {
       mysqli_query($db, "UPDATE message SET deleted_by_member = '$user' WHERE ((`senderID`='$user' AND `recieverID`='$id') OR (`senderID`='$id' AND `recieverID`='$user'))") OR die(mysqli_error($db));
    }
    else{

    	mysqli_query($db, "DELETE FROM message where (recieverID ='$id' AND senderID = '$user') OR (recieverID = '$user' AND senderID = '$id')") OR die(mysqli_error($db));
    }


		//$messageIDs = explode(",",$_REQUEST["messageID"]);

		//echo $messageIDs;
		//$sql="UPDATE message SET showMessage = 'N' where senderID = '$id' AND recieverID = '$user'";
		//mysqli_query($db, $sql)or die(mysqli_error($db));

	  /*  $var = explode(',',$_REQUEST["messageID"]);
	    foreach($var as $row)
	    {
	     
	    $sql="INSERT INTO message_delete (message_id, user_ID, show_hide) VALUES('$row','$user','N')";
		mysqli_query($db, $sql)or die(mysqli_error($db));
		
	    }
	*/


	    
	}

	//$verif_check= mysqli_query($connection, "SELECT id FROM mychattable WHERE ((`from`='$id_of_member_a' AND `to`='$id_of_member_b') OR (`from`='$id_of_member_b' AND `to`='$id_of_member_a')) AND (is_deleted_by_member<'0' OR is_deleted_by_member='$id_of_member_a' ") or die(mysqli_error($connection));
}

	if(isset($_REQUEST["student_id"])){
		
	$student_id = $_POST['student_id'];
	$user=$_POST['user'];

	$sql3="DELETE FROM message where (recieverID ='$student_id' AND senderID = '$user') OR (recieverID = '$user' AND senderID = '$student_id')";
	mysqli_query($db, $sql3)or die(mysqli_error($db));
}

?>