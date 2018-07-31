<?php
		
	include ("../dbconnect.php");


    $clubID = mysqli_real_escape_string($db,$_REQUEST["clubID"]);
    $username = mysqli_real_escape_string($db,$_REQUEST["username"]);

    $join_qry = "SELECT * FROM club_relation WHERE club_ID = '$clubID' AND user_ID = '$username' AND status = 'N'";
	$chck_join = mysqli_query($db, $join_qry);


	if (mysqli_num_rows($chck_join) > 0){

		echo "You already sent request for this club!";
	}

	else{

	 $sql="INSERT INTO club_relation
	 (club_ID,club_Name, user_ID)
	 VALUES ('$clubID',
	 (SELECT club_Name FROM clubinfo
	 		 	WHERE club_ID = '$clubID'),'$username')";


     $reslt = mysqli_query($db, $sql);

     echo "Join request sent!";

}
?>
