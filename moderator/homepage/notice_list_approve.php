<?php
include '../../dbconnect.php';
	if(isset($_REQUEST["id"])){

		

			
		$sql="DELETE FROM notice_table WHERE id='".$_REQUEST["id"]."'";
		$result = mysqli_query($db, $sql)or die(mysqli_error($db));
		
		$message = urlencode("Deleted!");
		header("Location: homepage.php?notice=".$message);	


	
	}

?>