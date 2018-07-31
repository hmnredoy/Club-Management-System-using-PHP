<?php 

function getDataFromDB($sql){
	$db = mysqli_connect("localhost","root","","club");
	$result = mysqli_query($db, $sql)or die(mysqli_error($db));
	$arr=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return $arr;
} ?>