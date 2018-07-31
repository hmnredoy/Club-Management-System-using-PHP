<?php 
include '../../dbconnect.php';

if(isset($_REQUEST["username"])){
	$img_query = "SELECT * FROM studentinfo WHERE username='".$_REQUEST["username"]."'";
	$img_rslt = mysqli_query($db, $img_query);


	if (mysqli_num_rows($img_rslt) == 1) {

	while($row = mysqli_fetch_assoc($img_rslt)) {

		unlink('../../profile_images/'.$row['avatar']);
		
		}
	}

	$sql="DELETE FROM studentinfo WHERE username='".$_REQUEST["username"]."'";
	mysqli_query($db, $sql)or die(mysqli_error($db));

	$sql1="DELETE FROM club_relation WHERE user_ID='".$_REQUEST["username"]."'";
	mysqli_query($db, $sql1)or die(mysqli_error($db));

}

?>