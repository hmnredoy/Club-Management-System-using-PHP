<?php
include '../../../dbconnect.php';	

	if($_REQUEST["deleteclub"]!="null"){

		$sql="DELETE FROM clubinfo WHERE club_ID='".$_REQUEST["deleteclub"]."'";
		$res1 = mysqli_query($db, $sql)or die(mysqli_error($db));

		$sql_cr="DELETE FROM club_relation WHERE club_ID='".$_REQUEST["deleteclub"]."'";
		$res2 = mysqli_query($db, $sql_cr)or die(mysqli_error($db));

		$sql_st="DELETE FROM studentinfo WHERE clubID='".$_REQUEST["deleteclub"]."'";
		$res3 = mysqli_query($db, $sql_st)or die(mysqli_error($db));

		$sql_mod="UPDATE moderatorinfo SET Club_Name = 'None', Club_ID = 'None' WHERE Club_ID = '".$_REQUEST["deleteclub"]."'";
		$res4 = mysqli_query($db, $sql_mod)or die(mysqli_error($db));

		if($res1 && $res2 && $res3 && $res4 = true)
		{
			echo "<div style='color: #fff;
					background-color: rgba(26, 26, 26,0.9);
					padding: 7px 0;
					border-radius: 2px;
					width:300px;
					margin: -29px 0 10px 35%;
					text-align: center;
					border-radius:2px;
					position: absolute;
					z-index:1;'
					>
				 Deleted!
				</div>";
		}
		else{
			echo "<div style='color: #fff;
					background-color: rgba(26, 26, 26,0.9);
					padding: 7px 0;
					border-radius: 2px;
					width:300px;
					margin: -29px 0 10px 35%;
					text-align: center;
					border-radius:2px;
					position: absolute;
					z-index:1;'
					>Oops! Something went wrong.</div>";
		}
	
	}
	else{

		echo "<div style='color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 2px;
					width:300px;
					margin: 20px 0 10px 35%;
					text-align: center;
					border-radius:20px;
					border:1px solid #b35c00;'
					>
				Please select a club first.
				</div>";

	}

?>