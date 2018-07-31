<?php
include '../../dbconnect.php';

if(isset($_POST['id']) && isset($_POST['venue']) && isset($_POST['date']) && isset($_POST['time'])){


	if(!preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$_POST['date'])){

		echo "<tr><td></td><td></td><td></td><td></td><td style='background-color:#ff4d4d; color:#fff; padding: 5px 5px; border: 1px dashed #fff; position: absolute; left: 45%; right: 45%; width: 200px;'>Wrong date format!</td><td></td><td></td><td></td><td></td><td></td></tr>";

	$sql = "SELECT event_table.* , clubinfo.* FROM event_table INNER JOIN clubinfo ON event_table .club_ID = clubinfo. club_ID";
	$result = mysqli_query($db, $sql);

	   
	    while($row = mysqli_fetch_assoc($result)) {

	    	
	    	echo "<tr id='". $_POST["id"] ."'>
	    			<td>" . $row["id"]."</td>".
	    			"<td>" . $row["club_Name"]."</td>".
	    			"<td>" . $row["event_head"]."</td>".
	    			"<td class='evnt_detail'>" . $row["event_detail"]."</td>".
    				"<td class='editable' id='venue'>" . $row["venue"]."</td>".
	    			"<td class='editable' id='date'>" . $row["date"]."</td>".
	    			"<td class='editable' id='time'>" . $row["time"]."</td>".
	    			"<td>".$row["capacity"]."</td>".
	    			"<td class='link'><a onclick='setEditable(". $_POST["id"] .")' class='editLink' alt='Edit' name='Edit'><img class='linkImage' src='edit.png' / >Edit</a></td> ".
	    			"
	    			<td>
               
                <a style='color:#fff;' href='event_delete.php?id=". $row["id"]."&value=N'><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
             				
				</td>

	    		</tr>";
	    		break;

	    }

	}

	else if(!preg_match('/^([01]?[0-9]|2[0-3])\:+[0-5][0-9]$/', $_POST['time'])) {

		echo "<tr><td></td><td></td><td></td><td></td><td style='background-color:#ff4d4d; color:#fff; padding: 5px 5px; border: 1px dashed #fff; position: absolute; left: 45%; right: 45%; width: 200px;'>Wrong time format!</td><td></td><td></td><td></td><td></td><td></td></tr>";

		$sql = "SELECT event_table.* , clubinfo.* FROM event_table INNER JOIN clubinfo ON event_table .club_ID = clubinfo. club_ID";
	$result = mysqli_query($db, $sql);

	   
	    while($row = mysqli_fetch_assoc($result)) {

	    	
	    	echo "<tr id='". $_POST["id"] ."'>
	    			<td>" . $row["id"]."</td>".
	    			"<td>" . $row["club_Name"]."</td>".
	    			"<td>" . $row["event_head"]."</td>".
	    			"<td class='evnt_detail'>" . $row["event_detail"]."</td>".
    				"<td class='editable' id='venue'>" . $row["venue"]."</td>".
	    			"<td class='editable' id='date'>" . $row["date"]."</td>".
	    			"<td class='editable' id='time'>" . $row["time"]."</td>".
	    			"<td>".$row["capacity"]."</td>".
	    			"<td class='link'><a onclick='setEditable(". $_POST["id"] .")' class='editLink' alt='Edit' name='Edit'><img class='linkImage' src='edit.png' / >Edit</a></td> ".
	    			"
	    			<td>
               
                <a style='color:#fff;' href='event_delete.php?id=". $row["id"]."&value=N'><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
             				
				</td>

	    		</tr>";
	    		break;

	    }

	}

else{

	$query = "UPDATE event_table SET venue = '" . $_POST['venue'] . "' , date = '" . $_POST['date'] . "' , time = '" . $_POST['time'] . "' WHERE id = '" . $_POST['id'] . "' ;";
	$status = $db->query($query);

	$notif_delete = "DELETE FROM notification WHERE date_time < (ROUND(UNIX_TIMESTAMP(CURTIME(4)) * 1000) - INTERVAL 1 DAY)";
 	$notif_delete = $db->query($notif_delete);

	$notif_sql = "INSERT INTO notification(eventID, club_ID, message, date_time) values ('".$_POST["id"]."','".$_POST["clubID"]."','Event Updated! <br>Venue : " . $_POST['venue'] . "<br>Date : " . $_POST['date'] . " <br>Time : " . $_POST['time'] . "', ROUND(UNIX_TIMESTAMP(CURTIME(4)) * 1000))";
 	$notif_status = $db->query($notif_sql);
	
//DELETE FROM locks WHERE time_created < (NOW() - INTERVAL 10 MINUTE)
//"DELETE FROM notification WHERE date_time < (NOW() - INTERVAL 1 MINUTE)"
	

	
	if($status)
	{

		$sql = "SELECT event_table.* , clubinfo.* FROM event_table INNER JOIN clubinfo ON event_table .club_ID = clubinfo. club_ID";
	$result = mysqli_query($db, $sql);

	   
	    while($row = mysqli_fetch_assoc($result)) {

	    	
	    	echo "<tr id='". $_POST["id"] ."'>
	    			<td  class='editablee' id='clubID' style='width:2px;'>" . $row["club_ID"]."</td>".
	    			"<td>" . $row["club_Name"]."</td>".
	    			"<td>" . $row["event_head"]."</td>".
	    			"<td class='evnt_detail'>" . $row["event_detail"]."</td>".
    				"<td class='editable' id='venue'>" . $_POST["venue"]."</td>".
	    			"<td class='editable' id='date'>" . $_POST["date"]."</td>".
	    			"<td class='editable' id='time'>" . $_POST["time"]."</td>".
	    			"<td>".$row["capacity"]."</td>".
	    			"<td class='link'><a onclick='setEditable(". $_POST["id"] .")' class='editLink' alt='Edit' name='Edit'><img class='linkImage' src='edit.png' / >Edit</a></td> ".
	    			"
	    			<td>
               
                <a style='color:#fff;' href='event_delete.php?id=". $row["id"]."&value=N'><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
             				
				</td>

	    		</tr>";
	    		break;

	    }
	}
	
	}
}
else echo 'Nothing found';
?>