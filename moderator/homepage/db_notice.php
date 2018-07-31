<?php

function getDataFromDB($sql){
	include '../../dbconnect.php';
	//echo $sql;
	$result = mysqli_query($db, $sql)or die(mysqli_error($db));
	//$stmt = $conn->prepare($sql);
	//$stmt->execute();
	  echo "<p class='updated' style=' font-family: Tw Cen MT,ROBOTO,helvetica; margin-left:39%; color: rgb(86, 132, 46); width: 200px; background-color: rgb(216, 235, 198); text-align: center; border-radius:10px; padding: 7px 5px;'>Notice Posted!</p>";
}
?>
