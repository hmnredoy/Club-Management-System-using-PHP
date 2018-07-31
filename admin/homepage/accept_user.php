<?php
include '../../dbconnect.php';

	if(isset($_REQUEST["username"])){
		
		
		$sql="UPDATE studentinfo SET is_active='Y' where username='".$_REQUEST["username"]."'";
		mysqli_query($db, $sql)or die(mysqli_error($db));
		
		$sql_="UPDATE club_relation SET status='Y' where user_ID='".$_REQUEST["username"]."'";
		mysqli_query($db, $sql_)or die(mysqli_error($db));

}

?>