<?php 

include '../../dbconnect.php';
//server,username,password,database_name

//error handler
if(!$db){
	die("Connection failed: ".mysql_connect_error());
			/*Do not use mysql_connect_error() in real website as you will be prone to SQL injection (hacking)*/

}

$query = "SELECT * FROM clubinfo";
		$results = mysqli_query($db, $query);

		
        echo '<select name="club" size="1">';
		echo '<option value="0">select club</option>';
		while($row = mysqli_fetch_assoc($results)) {
        echo '<option value="' . $row['id'] . '">' . $row['clubname'] . '</option>';
		//echo $row['id'];
		
		
	

	}
   echo '</select>';


 ?>