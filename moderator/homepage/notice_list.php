
<?php 

	if(isset($_GET['notice'])){
 		   	
 		   	echo "<div style=

					'color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 2px;
					width:300px;
					
					margin-top: 20px;
					margin-left: 40%;
					margin-right: 40%;
					text-align: center;'
					>".$_GET['notice']."</div>";

 		   
			}
			else{
				echo "";
			}

 ?>

 <br><br>
<div class="join_request">
	
	<h3>Notice :</h3>


<table  class="ntc">

	<tr>
		<th style='width:50px; '>Notice</th>
		<th>Time/Date</th>
		<th>Posted by</th>
		<th>Delete</th>
	</tr>

<?php
	
	include '../../dbconnect.php';
	
	$sql = "SELECT * FROM notice_table WHERE club_ID = '$club_id_session'";


	$result = mysqli_query($db, $sql);



	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    	
	    	echo "<tr>
    				<td><div class='long_text_ntc'>".$row["notice"]."</div></td>".
	    			"<td>" . $row["time_date"]."</td>".
	    			"<td>" . $row["posted_by"]."</td>".
	  
	    			"<td>
               
                <a style='color:#fff;' href='notice_list_approve.php?id=". $row["id"]."&value=N'><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
             				
			</td>
			</tr>";


	    }
	} else {
	    echo "0 results";
	}

	
	
?>

	</table>




</div>


<style type="text/css">
	

		.long_text_ntc{
			height: auto;
			word-break: break-all;
			background-color: #e6e6e6;
			color: #333;
		}


.ntc{
	width: 100%;
}

</style>