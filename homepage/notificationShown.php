<?php
include '../dbconnect.php';


if(isset($_REQUEST["user"])){

	$sql="INSERT INTO notif_seen (notifID, userID, seen_unseen) VALUES ('".$_REQUEST["notifID"]."','".$_REQUEST["user"]."','seen')";
	mysqli_query($db, $sql);
}