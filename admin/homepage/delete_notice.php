<?php
include '../../dbconnect.php';
	if(isset($_REQUEST["id"])){
		
		$sql="DELETE FROM notice_table WHERE id='".$_REQUEST["id"]."'";
		mysqli_query($db, $sql)or die(mysqli_error($db));

	}

	if($_REQUEST["id"] == 'All'){

	    $sql="DELETE FROM notice_table";
		mysqli_query($db, $sql);
	}


?>