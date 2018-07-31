<?php
function getDataFromDB($sql){
	include '../dbconnect.php';
	//echo $sql;
	$result = mysqli_query($db, $sql)or die(mysqli_error($db));
	$stmt = $db->prepare($sql);
	  $stmt->execute();
	  echo "<h3 class='updated' style='
font-family: Tw Cen MT,ROBOTO,helvetica;
margin-left:38%;
margin-right:38%;
color: rgb(86, 132, 46);
width: 200px;
background-color: rgb(216, 235, 198);
text-align: center;
border-radius:20px;
padding: 5px 5px;
border: 1px solid rgb(86, 132, 46);
margin-top: 20px;'>
	 Updated successfully.&nbsp;<a style=' transition: all 400ms; text-decoration: none; color: rgb(86, 132, 46);' href='profile.php' class='fa fa-refresh' aria-hidden='true'></a></h3>";
}
?>

<style type="text/css">
	.updated a:hover{
		transform: scale(1.2);
	}
</style>