<?php
include '../../dbconnect.php';

	if(isset($_REQUEST["username"])){

		$img_query = "SELECT * FROM studentinfo WHERE username = '".$_REQUEST["username"]."'";

		$img_rslt = mysqli_query($db, $img_query);

		if (mysqli_num_rows($img_rslt) > 0) {

		while($row = mysqli_fetch_assoc($img_rslt)) {

			unlink('../../profile_images/'.$row['avatar']);
			
			}

		}
		
		$sql="DELETE FROM studentinfo WHERE username='".$_REQUEST["username"]."'";
		$result = mysqli_query($db, $sql)or die(mysqli_error($db));

		$sql1="DELETE FROM club_relation WHERE user_ID='".$_REQUEST["username"]."'";
		$result1 = mysqli_query($db, $sql1)or die(mysqli_error($db));

/*
		$message = urlencode("Member Deleted!");
		header("Location: homepage.php?member_delete=".$message);	*/

		
}


if($_REQUEST["delete"] == 'All'){


		$img_query = "SELECT * FROM studentinfo";

		$img_rslt = mysqli_query($db, $img_query);

		if (mysqli_num_rows($img_rslt) > 0) {

		while($row = mysqli_fetch_assoc($img_rslt)) {

			unlink('../../profile_images/'.$row['avatar']);
			
			}

		}

	    $sql="DELETE FROM studentinfo";
		$result = mysqli_query($db, $sql);

		$sql_clb="DELETE FROM club_relation";
		$result_clb = mysqli_query($db, $sql_clb);


		if(!$result && !$result_clb)
		{
		$message = urlencode("Couldn't Delete.");
		header("Location: homepage.php?member_delete=".$message);
		}

		header("Location: homepage.php");
		
	}