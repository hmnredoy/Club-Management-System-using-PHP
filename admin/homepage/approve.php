<?php
include '../../dbconnect.php';
	if(isset($_REQUEST["username"])){
		
			if($_REQUEST["value"]=='Y' || $_REQUEST["value"]=='N'){
				$sql="UPDATE studentinfo SET is_active='".$_REQUEST["value"]."' where username='".$_REQUEST["username"]."'";
				$result = mysqli_query($db, $sql)or die(mysqli_error($db));
				
				$sql_="UPDATE club_relation SET status='".$_REQUEST["value"]."' where user_ID='".$_REQUEST["username"]."'";
				$result_ = mysqli_query($db, $sql_)or die(mysqli_error($db));
				

			}
			if($_REQUEST["value"]=='X'){


				$img_query = "SELECT * FROM studentinfo WHERE username='".$_REQUEST["username"]."'";
				$img_rslt = mysqli_query($db, $img_query);


				if (mysqli_num_rows($img_rslt) == 1) {

				while($row = mysqli_fetch_assoc($img_rslt)) {

					unlink('../../profile_images/'.$row['avatar']);
					
					}


				}
				$sql="DELETE FROM studentinfo WHERE username='".$_REQUEST["username"]."'";
				$result = mysqli_query($db, $sql)or die(mysqli_error($db));

				$sql1="DELETE FROM club_relation WHERE user_ID='".$_REQUEST["username"]."'";
				$result1 = mysqli_query($db, $sql1)or die(mysqli_error($db));


			}

				/*if($_REQUEST["value"]=='Y'){
				$message = urlencode("Approved!");
				header("Location: homepage.php?decision=".$message);	
				}
				if($_REQUEST["value"]=='X'){
				$message = urlencode("Rejected!");
				header("Location: homepage.php?decision=".$message);	
				}
				if($_REQUEST["value"]=='N'){
				$message = urlencode("Sent to waiting list.");
				header("Location: homepage.php?decision=".$message);	
				}
*/	header("Location: homepage.php");

	}

?>