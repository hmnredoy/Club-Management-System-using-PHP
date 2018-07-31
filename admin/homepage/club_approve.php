<?php
include '../../dbconnect.php';
	if(isset($_REQUEST["username"])){
		if($_REQUEST["value"]=='Y' || $_REQUEST["value"]=='N'){
			$sql="UPDATE club_relation SET status='".$_REQUEST["value"]."' where user_ID='".$_REQUEST["username"]."'";
			$result = mysqli_query($db, $sql)or die(mysqli_error($db));
			
		}

		if($_REQUEST["value"]=='X'){
				$sql="DELETE FROM club_relation WHERE id='".$_REQUEST["id"]."'";
				$result = mysqli_query($db, $sql)or die(mysqli_error($db));


			}

		/*	if($_REQUEST["value"]=='Y'){
			$message = urlencode("Approved!");
			header("Location: homepage.php?club_decision=".$message);	
			}
			if($_REQUEST["value"]=='X'){
			$message = urlencode("Rejected!");
			header("Location: homepage.php?club_decision=".$message);	
			}
			if($_REQUEST["value"]=='N'){
			$message = urlencode("Sent to waiting list.");
			header("Location: homepage.php?club_decision=".$message);	
			}*/
			header("Location: homepage.php");
		}
	

?>