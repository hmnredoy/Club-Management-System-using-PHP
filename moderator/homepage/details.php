<?php
require("../dbconnect.php");
//echo "i am talking from server<br>";
//echo "Hello : ".$_REQUEST['uname'];

if(isset($_REQUEST["uid"])){
	$sql="select * from studentinfo where username='".$_REQUEST["uid"]."'";
	//echo $sql;
	$a=getDataFromDB($sql);
	//echo "<pre>";print_r($a);echo "<pre>";
	foreach($a as $v){
		echo "<p>".$v["name"]." user ID : ".$v["username"]."</p>";
	}
}
?>