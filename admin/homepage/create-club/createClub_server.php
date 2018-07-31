<?php

include '../../../dbconnect.php';

	if(isset($_REQUEST["clubname"])){


		if(empty($_REQUEST["clubname"]) || empty($_REQUEST["clubid"])){

		echo "<div style='color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 2px;
					width:300px;
					margin: 20px 0 10px 35%;
					text-align: center;'
					>
				No field can be empty.
				</div>";
		}
		else if(!is_numeric($_REQUEST["clubid"]) && $_REQUEST["clubid"]<1){

			echo "<div style='color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 2px;
					width:300px;
					margin: 20px 0 10px 35%;
					text-align: center;'
					>
				Invalid ID.
				</div>";
		}
	else{
		$query = "SELECT * FROM clubinfo WHERE club_ID=".$_REQUEST['clubid']."";
		$rslt = mysqli_query($db, $query);


		if (mysqli_num_rows($rslt) > 0) {

			echo "<div style='color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					width:300px;
					margin:0 36%;
					border-radius:20px;
					border:1px solid #b35c00;
					text-align: center;'
					>
				Club ID must be unique.
				</div>";	
		}
		else{


        $sql="INSERT INTO clubinfo(club_ID, club_Name) values ('".$_REQUEST["clubid"]."','".$_REQUEST["clubname"]."')";

			
		echo "<p style='font-size:15px;
				margin:0 36%;
				color: #239023;
				width: 300px;
				background-color: #c2f0c2;
				text-align: center;
				border-radius:20px;
				border:1px solid #239023;
				padding: 5px 0;
				margin-bottom: -10px;'>Club Created.</p>";

		$reslt = mysqli_query($db, $sql);
		
	
		}
	}

}



?>