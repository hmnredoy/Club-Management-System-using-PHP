<?php
include '../../../dbconnect.php';
	

	if($_REQUEST["clubID"]!="null"){

		$sql="DELETE FROM moderatorinfo WHERE Club_ID='".$_REQUEST["clubID"]."'";
		$result = mysqli_query($db, $sql)or die(mysqli_error($db));

		$sql_club ="UPDATE clubinfo SET moderator = 'None', moderator_ID = null WHERE club_ID = '".$_REQUEST["clubID"]."'";
		$result_club = mysqli_query($db, $sql_club);
		
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
				Deleted!
				</div>";

	

	
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
				Please select a moderator first.
				</div>";

	}

?>