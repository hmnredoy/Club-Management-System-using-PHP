<?php
include("db_rw.php");
//echo "i am talking from server<br>"; 
	if(isset($_REQUEST["username"])){

	$flag = 0;
	$mssg = "not updated";

	if(empty($_REQUEST["phone"]) || empty($_REQUEST["email"]) || 
		empty($_REQUEST["dobd"]) || empty($_REQUEST["dobm"]) || empty($_REQUEST["doby"])
		|| empty($_REQUEST["year"]) || empty($_REQUEST["dpt"]) || empty($_REQUEST["smster"])
		|| empty($_REQUEST["gndr"])){

		$a= $mssg;
	}

	if($_REQUEST["phone"]!=null){
		if(strlen($_REQUEST["phone"])==11){
			$sql="UPDATE studentinfo SET phone='".$_REQUEST["phone"]."' where username='".$_REQUEST["username"]."'";
			//$a=getDataFromDB($sql);

	$flag = 1;
		}
	
	

	}
	if($_REQUEST["email"]!=null && (filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL))){
	$sql="UPDATE studentinfo SET email='".$_REQUEST["email"]."' where username='".$_REQUEST["username"]."'";
	//$a=getDataFromDB($sql);

		$flag = 1;
	}
	if($_REQUEST["dobr"]!=null && !empty($_REQUEST["dobd"]) && !empty($_REQUEST["dobm"]) && !empty($_REQUEST["doby"])){

		$date = $_REQUEST["dobd"]."-".$_REQUEST["dobm"]."-".$_REQUEST["doby"];

		$sql="UPDATE studentinfo SET dob='".$date."' where username='".$_REQUEST["username"]."'";
			//$a=getDataFromDB($sql);
			$flag = 1;   
}
	if($_REQUEST["year"]!=null && $_REQUEST["year"]<2018){
	$sql="UPDATE studentinfo SET admissionyear='".$_REQUEST["year"]."' where username='".$_REQUEST["username"]."'";
	//$a=getDataFromDB($sql);
	$flag = 1;
	}
	if($_REQUEST["dpt"]!="Select Department"){
	$sql="UPDATE studentinfo SET dept='".$_REQUEST["dpt"]."' where username='".$_REQUEST["username"]."'";
	//$a=getDataFromDB($sql);
	$flag = 1;
	}
	if($_REQUEST["smster"]!="Select Semester"){
	$sql="UPDATE studentinfo SET semester='".$_REQUEST["smster"]."' where username='".$_REQUEST["username"]."'";
	//$a=getDataFromDB($sql);
	$flag = 1;
	}
	
	if($_REQUEST["gndr"]!="Select Gender"){
	$sql="UPDATE studentinfo SET gender='".$_REQUEST["gndr"]."' where username='".$_REQUEST["username"]."'";
	//$a=getDataFromDB($sql);
	$flag = 1;
	}
	//echo $_REQUEST["name"];

	if($flag==1){

		$a=getDataFromDB($sql);
		
	}
	

}
	
	



?>