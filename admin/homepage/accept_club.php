<?php
include '../../dbconnect.php';

if(isset($_REQUEST["id"])){
		
		
	$sql="UPDATE club_relation SET status='Y' where id = '".$_REQUEST["id"]."'";
	mysqli_query($db, $sql)or die(mysqli_error($db));

}

if(isset($_REQUEST["idR"]))
{
	$sql="DELETE FROM club_relation where id = '".$_REQUEST["idR"]."'";
	mysqli_query($db, $sql)or die(mysqli_error($db));
}

?>