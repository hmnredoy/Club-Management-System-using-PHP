<?php
function getDataFromDB($sql){
	include '../dbconnect.php';
	$result = mysqli_query($db, $sql)or die(mysqli_error($db));
	$arr=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return $arr;
}

if(isset($_REQUEST["uname"])){
	$sql="SELECT * FROM studentinfo WHERE name like '".$_REQUEST["uname"]."%' OR username like '".$_REQUEST["uname"]."%'";

	$a=getDataFromDB($sql);

	foreach($a as $v){
		//echo "<p>".$v["name"]." from ".$v["dept"]."</p>";
		//echo "<p>".$v["name"]."</p>";
		echo "<a href='details.php?uid=".$v['username']."'>".$v["name"]."</a><br/>";
		

	}
}
?>