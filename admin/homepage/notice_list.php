<br>
 <br>
<div class="noticelst join_request" style="width: 95%;">
	
	<h3>Notice :</h3>


<table  class="ntc">

	<tr>
		<th>Club Name</th>
		<th style='width:50px; '>Notice</th>
		<th>Time/Date</th>
		<th>Posted by</th>
		<th>Delete</th>
	</tr>

<?php
	
	include '../../dbconnect.php';
	
	$sql = "SELECT notice_table.* , clubinfo.* FROM notice_table INNER JOIN clubinfo ON notice_table .club_ID = clubinfo. club_ID";


	$result = mysqli_query($db, $sql);



	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    	
	    	echo "<tr class='noticeRow'>
	    			<td>".$row["club_Name"]."</td>".
    				"<td><p>".$row["notice"]."</p></td>".
	    			"<td>" . $row["time_date"]."</td>".
	    			"<td>" . $row["posted_by"]."</td>".
	  
	    			"<td>
               
                <a style='color:#fff;' href='#' id=". $row["id"]." class='noticeDelete'><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
             				
			</td>
			</tr>";


	    }

	    echo '<button href="#" id="All" style="margin: 20px 0 10px 80%;" class="deleteAllNotice btn btn-block btn-primary">Delete All</button>';
	} else {
	    echo "0 results";
	}

	
	
?>

	</table>





<script type="text/javascript">

$(function() {
$(".noticeDelete").click(function(){
var element = $(this);
var id = element.attr("id");
//var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this Notice?"))
{
 $.ajax({
   type: "POST",
   url: "delete_notice.php",
  // data: info,
   data:{'id':id},
   success: function(){
 }
});
  $(this).parents(".noticeRow").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});



$(function() {
$(".deleteAllNotice").click(function(){
var element = $(this);
var id = element.attr("id");
//var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete all Notice?"))
{
 $.ajax({
   type: "POST",
   url: "delete_notice.php",
  // data: info,
   data:{'id':id},
   success: function(){
 }
});
  $(this).parents(".noticeRow").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});

</script>







</div>










</div>


<style type="text/css">
	
.ntc p{
	width: 100%;
}

.ntc{
	width: 100%;
}

</style>