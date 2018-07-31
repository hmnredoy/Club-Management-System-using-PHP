<script src="jquery.js"></script>

<table>

<tr>
	
	<td>
		




<?php include 'event_handler.php'; ?>
<div class="join_request" style="margin-top: 30px;">
	<form enctype="multipart/form-data" method="POST" name="event-form" action="">
<?php 

	include('ev_error.php');
/*
	if(isset($_GET['event'])){
 		   	
 		   	echo "<div style=

					'color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 20px;
					width:300px;
					margin: 20px 0 10px 35%;
					text-align: center;
					border:1px solid #cc6900;'
					>".$_GET['event']."</div>";

 		   
			}
			else{
				echo "";
			}	*/	

 ?>
 	
		<h3>Events :</h3>
		<p id="phone-err"></p>
		<p id="ev_msg"></p>
		<div class="event">
			<label>Select Image : </label>
			<input type="file" name="fileToUpload" id="fileToUpload"><br>
			<input type="text" name="ev_head" id="ev_head" size="66" style="padding: 5px 0px 5px 5px;" placeholder="Write Event Header"><br><br>
			<textarea name="event_box" id="event_box" style="padding: 10px 0 0 10px;" rows="2" cols="50" placeholder="Write Event Detail here" size="200"></textarea>
		</div><br>

		
		<input type="text" name="venue" id="venue" placeholder="Venue"><br>
	
		<input type="text" name="capacity" id="capacity" placeholder="Capacity"><br><br>

		Date :
		<select name="day" class="combine" id="ev_d"> 
			  <option>Day</option>
			  <option value="01">1</option>
			  <option value="02">2</option>
			  <option value="03">3</option>
			  <option value="04">4</option>
			  <option value="05">5</option>
			  <option value="06">6</option>
			  <option value="07">7</option>
			  <option value="08">8</option>
			  <option value="09">9</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			  <option value="13">13</option>
			  <option value="14">14</option>
			  <option value="15">15</option>
			  <option value="16">16</option>
			  <option value="17">17</option>
			  <option value="18">18</option>
			  <option value="19">19</option>
			  <option value="20">20</option>
			  <option value="21">21</option>
			  <option value="22">22</option>
			  <option value="23">23</option>
			  <option value="24">24</option>
			  <option value="25">25</option>
			  <option value="26">26</option>
			  <option value="27">27</option>
			  <option value="28">28</option>
			  <option value="29">29</option>
			  <option value="30">30</option>
			  <option value="31">31</option>
			</select>

			 <select name="month" class="combine" id="ev_m">
			  <option value="">Month</option>
			  <option value="01">Jan</option>
			  <option value="02">Feb</option>
			  <option value="03">Mar</option>
			  <option value="04">Apr</option>
			  <option value="05">May</option>
			  <option value="06">Jun</option>
			  <option value="07">July</option>
			  <option value="08">Aug</option>
			  <option value="09">Sep</option>
			  <option value="10">Oct</option>
			  <option value="11">Nov</option>
			  <option value="12">Dec</option>
			</select>

			 <select name="year" class="combine" id="ev_y">
			  <option value="">Year</option>
			  <option value="2018">2018</option>
			  <option value="2019">2019</option>
			  <option value="2020">2020</option>
			  <option value="2021">2021</option>
			  
			</select><br><br>

		Time :
		<select name="time" class="combine1" id="ev_t">
			  <option value="01:00">01:00</option>
			  <option value="02:00">02:00</option>
			  <option value="03:00">03:00</option>
			  <option value="04:00">04:00</option>
			  <option value="05:00">05:00</option>
			  <option value="06:00">06:00</option>
			  <option value="07:00">07:00</option>
			  <option value="08:00">08:00</option>
			  <option value="09:00">09:00</option>
			  <option value="10:00">10:00</option>
			  <option value="11:00">11:00</option>
			  <option value="12:00">12:00</option>
			  <option value="13:00">13:00</option>
			  <option value="14:00">14:00</option>
			  <option value="15:00">15:00</option>
			  <option value="16:00">16:00</option>
			  <option value="17:00">17:00</option>
			  <option value="18:00">18:00</option>
			  <option value="19:00">19:00</option>
			  <option value="20:00">20:00</option>
			  <option value="21:00">21:00</option>
			  <option value="22:00">22:00</option>
			  <option value="23:00">23:00</option>
			  <option value="00:00">00:00</option>

		</select>
		<br><br>

	    <?php
	   include '../../dbconnect.php'; 


        $query = "SELECT * FROM clubinfo";
		$results = mysqli_query($db, $query);

		
        echo '<select name="club" size="1" id="event_drop">';
		echo '<option value="">Select Club</option>';
		while($row = mysqli_fetch_assoc($results)) {
        echo '<option value="'.$row['club_ID'].'">'.$row['club_Name']. '</option>';
		//echo $row['id'];
		
		}
   echo '</select>';

?>

		<input type="checkbox" id="event_all" name="event_all">Post Event for all clubs
		<input  class="btn btn-block btn-primary"  type="submit" id="post_event" name="post_event" value="Post Event" onclick="return postEvent();">
	</form>
</div>
<br>
		
<div>


<script type="text/javascript">	
function Notice() {

	var	user = "<?php echo $_SESSION['admin_name']; ?>";
	var xmlhttp = new XMLHttpRequest();
    var str=document.getElementById('notice_box').value;
	var e = document.getElementById('notice_drop');
    var clb = e.options[e.selectedIndex].value;
    var msg = document.getElementById('notice_msg');
    var ntc_all = 0;

    if(document.getElementById("notice_all").checked==true){
		var ntc_all = 1;
		
	}
	document.getElementById("ntc_spinner").style.visibility= "visible";

	xmlhttp.onreadystatechange = function() {
		document.getElementById("ntc_spinner").style.visibility= "hidden";
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
	
		msg.innerHTML = xmlhttp.responseText ;
		
		}
	};
 	var url="notice.php?notice="+str+"&club="+clb+"&user="+user+"&ntc_all="+ntc_all;
    
	xmlhttp.open("GET", url,true);
	xmlhttp.send();


}
	

</script>
<div class="join_request">
	<form  action="notice.php" method="GET" name="notice-form">
		
		<h3>Post Notice :</h3>
		<img id="ntc_spinner" src="loading.gif" width="23px" height="23px" style="visibility:hidden; position: relative;">
		<p id="notice_msg"></p>

		<textarea style="padding: 10px 0 0 10px;" rows="4" cols="50" name="nb" id="notice_box" placeholder="Write Notice here" size="500"></textarea><br>
<?php
	   include '../../dbconnect.php'; 


        $query = "SELECT * FROM clubinfo";
		$results = mysqli_query($db, $query);

		
        echo '<select name="club" size="1" id="notice_drop">';
		echo '<option value="">Select Club</option>';
		while($row = mysqli_fetch_assoc($results)) {
        echo '<option value="'.$row['club_ID'].'">'.$row['club_Name']. '</option>';
		//echo $row['id'];
		
		}
   echo '</select>';

?>
	<input type="checkbox" id="notice_all" name="notice_all">Post notice for all clubs
	<button class="btn btn-block btn-primary" type="button" onclick="Notice()">Post Notice</button> 
	</form>
	
</div>
<br>
</div>

 <div class="mng_zone">Manage Zone</div>

<?php 

	/*if(isset($_GET['decision'])){
 		   	
 		   	echo "<div style=

					'color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 20px;
					width:300px;
					margin: 20px 0 20px 35%;
					text-align: center;
					border:1px solid #cc6900;'
					>".$_GET['decision']."</div>";

 		   
			}
			else{
				echo "";
			}*/

 ?>


<div class="join_request">
	
	<h3>Join Requests :</h3>

<table  class="join_table" align='center'>

	<tr>
		<th>Club Name</th>
		<th>ID</th>
		<th>Name</th>
		<th>Request Date</th>
		<th>State</th>
		<th colspan='3'>Accept/Reject</th>
	</tr>

<?php
	
	$sql = "SELECT * FROM studentinfo WHERE is_active='N' OR is_active='D'";
	$result = mysqli_query($db, $sql);

	if (mysqli_num_rows($result) > 0) {

		echo "<div class='.show_m' style='font-family: ROBOTO,helvetica; color: #fff; font-size: 16px; background-color: #46a049; padding: 5px 5px;'>New request(s)!</div>";


		while($row = mysqli_fetch_assoc($result)) {

	    	$_SESSION['user'] = $row["username"];

	    	
	    	
	    	echo "<tr class='memberRow'>
	    			<td>" . $row["clubname"]."</td>".
    				"<td>" . $row["username"]."</td>".
	    			"<td>" . $row["name"]."</td>".
	    			"<td>" . $row["dateTime"]."</td>";

	    		if($row["is_active"]=='D')
	    		{
	    		echo "<td style='background-color: rgba(230, 115, 0,0.9);'>Deactivated</td>";
	    		}
	    		else{
	    			echo "<td>".$row["is_active"]."</td>";
	    		}

	    	echo "<td>
                <a style='color:#fff;' class='accept_user' id=".$row["username"]."><i class='cmnrow fa fa-check' aria-hidden='true'></i></a>
                <a style='color:#fff;' class='reject_user' id=".$row["username"]."><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
				
			</td>
			</tr>";


	    }

	} else {
	    echo "0 results";
	}

	
	
?>

	</table>


	<script type="text/javascript">
	

	$(function() {
	$(".accept_user").click(function(){
	var element = $(this);
	var username = element.attr("id");
	//var info = 'id=' + del_id;
	//if(confirm("Are you sure?"))
	//{
	 $.ajax({
	   type: "POST",
	   url: "accept_user.php",
	  // data: info,
	   data:{'username':username},
	   success: function(){
	 }
	});
	  $(this).parents(".memberRow").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "hide" }, "slow");
	// }
	//return false;
	});
	});


	$(function() {
	$(".reject_user").click(function(){
	var element = $(this);
	var username = element.attr("id");
	//var info = 'id=' + del_id;
	if(confirm("Are you sure?"))
	{
	 $.ajax({
	   type: "POST",
	   url: "reject_user.php",
	  // data: info,
	   data:{'username':username},
	   success: function(){
	 }
	});
	  $(this).parents(".memberRow").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "hide" }, "slow");
	 }
	return false;
	});
	});


	</script>




</div>
<br><br>


<?php 

	/*if(isset($_GET['club_decision'])){
 		   	
 		   	echo "<div style=

					'color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 20px;
					width:300px;
					margin: 0 0 10px 35%;
					text-align: center;
					border:1px solid #cc6900;'
					>".$_GET['club_decision']."</div>";

 		   
			}
			else{
				echo "";
			}
*/
 ?>

<div class="join_request">
	
	<h3>Club Request :</h3>


<table  class="join_table" align='center'>

	<tr>
		<th>Club Name</th>
		<th>ID</th>
		<th>State</th>
		<th colspan='3'>Accept/Reject</th>
	</tr>

<?php
	
	

	$sql_clb = "SELECT DISTINCT club_relation.* FROM club_relation RIGHT JOIN studentinfo ON club_relation .user_ID = studentinfo .username WHERE club_relation .status='N' AND studentinfo .is_active = 'Y'";

	$result_clb = mysqli_query($db, $sql_clb);
	if (mysqli_num_rows($result_clb) > 0) {
	   
	   echo "<div class='.show_m' style='font-family: ROBOTO,helvetica; color: #fff; font-size: 16px; background-color: #46a049; padding: 5px 5px;'>New club join request(s)!</div>";

  
	    while($row = mysqli_fetch_assoc($result_clb)) {

	    	
	    	echo "<tr class='club_row'>
	    			<td>" . $row["club_Name"]."</td>".
    				"<td>" . $row["user_ID"]."</td>".
	    			"<td>" . $row["status"]."</td>".
	    			"<td>";

            echo "<a style='color:#fff;' class='club_accept' id=".$row["id"]."><i class='cmnrow fa fa-check' aria-hidden='true'></i></a>
                <a style='color:#fff;' class='club_reject' id=".$row["id"]."><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
         
				
			</td>
			</tr>";


	    }
	} 
//}

else {
	    echo "0 results";
	}

	
?>

	</table>

<script type="text/javascript">
	

	$(function() {
	$(".club_accept").click(function(){
	var element = $(this);
	var id = element.attr("id");
	//var ret = str.split("&");
	//var id = ret[0];
	//var userID = ret[1];
	
	//var info = 'id=' + del_id;
	//if(confirm("Are you sure?"))
	//{
	
	 $.ajax({
	   type: "POST",
	   url: "accept_club.php",
	  // data: info,
	   data:{'id':id},
	   //success: function(){
	// }
	});
	  $(this).parents(".club_row").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "hide" }, "slow");
	// }
	//return false;
	});
	});



	$(function() {
	$(".club_reject").click(function(){
	var element = $(this);
	var idR = element.attr("id");

	 $.ajax({
	   type: "POST",
	   url: "accept_club.php",
	  // data: info,
	   data:{'idR':idR},
	   //success: function(){
	// }
	});
	  $(this).parents(".club_row").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "hide" }, "slow");

	});
	});
</script>


</div>

<br><br>

<?php 

/*

	if(isset($_GET['member_delete'])){
 		   	
 		   	echo "<div style=

					'color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 20px;
					width:300px;
					margin: 0 33% 10px 33%;
					text-align: center;
					border:1px solid #cc6900;'
					>".$_GET['member_delete']."</div>";

 		   
			}
			else{
				echo "";
			}
*/
 ?>



<div class="join_request">
	<img src="success_icon.svg" width="50px" style="position: absolute; display: none; float: right; transition: 300ms ease;" id="done">
	
	<h3>Recently Joined Members :</h3>


<table  class="join_table" align='center'>

	<tr>
		<th>Club Name</th>
		<th>ID</th>
		<th>Name</th>
		<th>Request Date</th>
		<th>State</th>
		<th>Delete</th>
		
	</tr>
	
<?php
	
	$sql = "SELECT * FROM studentinfo WHERE is_active = 'Y' ORDER BY id DESC LIMIT 5";
	$result = mysqli_query($db, $sql);


	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    	$_SESSION['user'] = $row["username"];//$sql="UPDATE studentinfo SET is_active = 'verify".$row["username"]."' WHERE username='".$row["username"]."'";
	    	
	    	echo "<tr class='userRow'>
	    			<td>" . $row["clubname"]."</td>".
    				"<td>" . $row["username"]."</td>".
	    			"<td>" . $row["name"]."</td>".
	    			"<td>" . $row["dateTime"]."</td>".
	    			"<td>".$row["is_active"]."</td>".
	    			"<td>
	    			<a style='color:#fff;' href='#' class='delete_user' id = ".$row["username"]."><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
	    			<td>".
    			"</tr>";


	    }
	     echo '<button id="All" style="margin: 20px 0 10px 70%;" class="delete_all_member btn btn-block btn-primary">Delete All</button>';
	} else {
	    echo "No member registered.";
	}

	
	
?>
	</table>



<script type="text/javascript">
$(function() {
$(".delete_user").click(function(){
var element = $(this);
var username = element.attr("id");
//var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this member?"))
{
 $.ajax({
   type: "POST",
   url: "member_delete.php",
  // data: info,
   data:{'username':username},
   success: function(){
 }
});
  $(this).parents(".userRow").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});


$(function() {
$(".delete_all_member").click(function(){
var element = $(this);
var deleteAll = element.attr("id");
//var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete all members?"))
{
 $.ajax({
   type: "POST",
   url: "member_delete.php",
  // data: info,
   data:{'delete':deleteAll},
   success: function(){
 }
});
  document.getElementById("done").style.display = "block";
  document.getElementById("done").style.display = "block";
 }
return false;
});
});


window.onscroll  = function() {
     document.getElementById("done").style.display = "none";
     document.getElementById("done").style.width = "200px";
     document.getElementById("done").style.WebkitTransition = "width .35s ease-in-out;";

}


</script>

	


	<br>
	<button style=' margin: 0 0 0 72%;' class='btn btn-block btn-primary' id='viewDetail'>See All</button>


	<?php //include 'deleteAllMember.php'; ?>
</div>
<?php include 'viewInfo.php'; ?>

<?php include 'notice_list.php'; ?>

<br><br>
<?php 
/*
	if(isset($_GET['eventlist'])){
 		   	
 		   	echo "<div style=

					'color: #b35c00;
					background-color: #ffe6cc;
					padding: 5px 0;
					border-radius: 20px;
					width:300px;
					
					margin-top: 20px;
					margin-bottom: 20px;
					margin-left: 50%;
					margin-right: 600px;
					text-align: center;
					border: 1px solid #b35c00;'
					>".$_GET['eventlist']."</div>";

 		   
			}
			else{
				echo "";
			}
*/
 ?>





<script src="jquery_Event.js"></script>
<script language="javascript">

function setEditable(row_id){

	var tr = document.getElementById(row_id);

	

	var tr_elements = $("#" + row_id).find(".editable");
	
	for( var i = 0; i<tr_elements.length; i++){ // set the row td's Editible
		tr_elements[i].contentEditable = "true";
		tr_elements[i].style.borderRadius= "20px";
		tr_elements[i].style.marginTop = "10%";
		tr_elements[i].style.backgroundColor= "#333333";
		tr_elements[i].style.border= "1px dashed #b35c00";
		tr_elements[0].focus();
	}	
	var updateLinkHTML = "<a onclick='editStudent(" + row_id + ")' class='updateLink' ><img class='linkImage' src='update.png' />Update</a>";
				
	$("#" + row_id).find(".editLink").fadeOut('slow' ,function(){$(this).replaceWith(updateLinkHTML).fadeIn()});
	
}

function editStudent(row_id){
	var venue = $("#" + row_id).find(".editable")[0].textContent;
	var date = $("#" + row_id).find(".editable")[1].textContent;
	var time = $("#" + row_id).find(".editable")[2].textContent;
	var clubID = $("#" + row_id).find(".editablee")[0].innerHTML;
	

	$.post("editEvent.php" , {id:row_id,venue:venue,date:date,time:time,clubID:clubID} , function(data){
		$("#result").html(data);
		$("#" + row_id).fadeOut('slow' , function(){$(this).replaceWith(data).fadeIn('slow');});
	} );
}
</script>



	<div class="join_request" style="width: 95%;">
		
		<h3>Event List</h3>
		<table class="ntc" align = "center">
				<tr class="t_head">
					<th>Club ID</th>
					<th>Club</th>
					<th>Name</th>
					<th>Detail</th>
					<th>Venue</th>
					<th>Date</th>
					<th>Time</th>
					<th>Capacity</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				
<?php

	$sql = "SELECT event_table.* , clubinfo.* FROM event_table INNER JOIN clubinfo ON event_table .club_ID = clubinfo. club_ID";
	$result = mysqli_query($db, $sql);



	if (mysqli_num_rows($result) > 0) {
	   
	    while($row = mysqli_fetch_assoc($result)) {

	    	
	    	echo "<tr id='". $row["id"] ."' class='eventRow'>
	    			<td class='editablee' id='clubID' style='width:2px;'>" . $row["club_ID"]."</td>".
	    			"<td>" . $row["club_Name"]."</td>".
	    			"<td>" . $row["event_head"]."</td>".
	    			"<td class='evnt_detail'>" . $row["event_detail"]."</td>".
    				"<td class='editable' id='venue'>" . $row["venue"]."</td>".
	    			"<td class='editable' id='date'>" . $row["date"]."</td>".
	    			"<td class='editable' id='time'>" . $row["time"]."</td>".
	    			"<td>".$row["capacity"]."</td>".
	    			"<td class='link'><a onclick='setEditable(".$row["id"].")' class='editLink' alt='Edit' name='Edit'><img class='linkImage' src='edit.png' / >Edit</a></td> ".
	    			"
	    			<td>
               
                <a style='color:#fff;' href='#' id=". $row["id"]." class='eventDelete'><i class='cmnrow fa fa-times' aria-hidden='true'></i></a>
             				
				</td>

	    		</tr>";


	    }

	    echo '<button href="#" id="All" style="margin: 20px 0 10px 87%;" class="deleteAllEvent btn btn-block btn-primary">Delete All</button>';
	} else {
	    echo "0 results";
	}

	
	
?>

</table>


<script type="text/javascript">

$(function() {
$(".eventDelete").click(function(){
var element = $(this);
var id = element.attr("id");
//var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this event?"))
{
 $.ajax({
   type: "POST",
   url: "event_delete.php",
  // data: info,
   data:{'id':id},
   success: function(){
 }
});
  $(this).parents(".eventRow").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});



$(function() {
$(".deleteAllEvent").click(function(){
var element = $(this);
var id = element.attr("id");
//var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete all events? This action will delete the joined member of all events."))
{
 $.ajax({
   type: "POST",
   url: "event_delete.php",
  // data: info,
   data:{'id':id},
   success: function(){
 }
});
  $(this).parents(".eventRow").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});

</script>








</div>

</td>


	<?php include 'right_bar.php'; ?>


		
	</tr>

</table>









	<style type="text/css">


	.evnt_detail{

		width: 290px;
		height: auto;
		overflow: auto;
		word-break: break-word;
		background-color: #e6e6e6;
		color: #333;
	}




	.editLink,.updateLink
{
	text-decoration:none;

}
.editLink:hover , .updateLink:hover
{
	text-decoration:underline;
	cursor:pointer;

}





	.fa{
		font-size: 20px;
	}

	.fa-check{
		padding: 5px 5px;
		border-radius: 30px;
		
	}

	.fa-times{
		padding: 5px 6px;
	border-radius: 30px;
	margin-right: 5px;
	}
	.fa-times:hover{
		background-color: #ff3333;
		color: #fff;
		font-size: 22px;
	}
	.join_request .fa-check:hover{
		background-color: #66cc00;
			
		color: #fff;
		font-size: 22px;
	}
	

	.cmnrow{
		padding: 0 15px;
		-webkit-transition-timing-function: ease;
		font-size: 16px;
		transition: 0.3s;
		cursor: pointer;
	}


	.right_bar{

		position: absolute;
		width:300px;
		margin-top: 5%;
		right: 0;
	}
		
		.join_request table tr th{
			padding: 0px 40px 0px 40px;


		}

		.join_request th{
			border: 1px solid #bfbfbf;

		}


		.join_request h3{
			color: #fff;
			background-image: linear-gradient(rgba(0, 0, 0,0),rgba(26, 26, 26,0.7),rgba(0, 0, 0,0));
			padding: 20px 0;

		}

			.join_request{

			color: #fff;
			border: 3px inset #bfbfbf;
			border-radius: 10px;
			margin: 0 0px 0 50px;
			padding-bottom: 20px;
			background-color : rgba(15, 15, 15,0.7);
			
			width: 930px;
			word-wrap: break-word;
		}

		.join_request tr td{
			width: 200px;
			word-wrap: break-word;
			padding: 13px 0;
			border-bottom: 1px solid #DDDDDE;
			border-bottom-width: 70%
		}
		


	
textarea
{
  height:130px;
  width:56%;
  display: inline-block;
  vertical-align: middle;
  padding: 0 10px;
  margin-top: 3px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 20px;
  border: 1px solid #fff;
  background-color: rgba(255, 255, 255, 1);
  color: rgba(0, 0, 0, 0.7);
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 2px;
}

input[type="text"],
input[type="password"],
input[type="email"]
{
	height:30px;
  width:56%;;
  display: inline-block;
  vertical-align: middle;
  height: 34px;
  padding: 0 10px;
  margin-top: 3px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 20px;
  border: 1px solid #fff;
  background-color: rgba(255, 255, 255, 1);
  color: rgba(0, 0, 0, 0.7);
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 2px;
}

	select{
  height:30px;
  width:15%;
  display: inline-block;
  vertical-align: middle;
  padding: 0 10px;
  margin-top: 3px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 20px;
  border: 1px solid #fff;
  background-color: rgba(255, 255, 255, 1);
  color: rgba(0, 0, 0, 0.7);
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 2px;
	}



.btn {

	font-family: Tw Cen MT,ROBOTO, 'Raleway', sans-serif;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  font-size: 17px;
  line-height: 20px;
  height: 32px;
  background-color: #cc3300;
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.15);
  box-shadow: 0 0 rgba(0, 0, 0, 0);
  border-radius: 2px;
  -webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
  transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
}

.btn:hover,
.btn:focus {
	cursor: pointer;
  background-color: #b32d00;
  color: #fff;
  border-color: rgba(255, 255, 255, 0.3);
  box-shadow: 0 0 rgba(0, 0, 0, 0);
}


.mng_zone{

	border: 1px solid #e63900;
	text-align: center;
	padding: 10px 0;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f85032+0,f16f5c+50,f6290c+51,f02f17+71,e73827+100;Red+Gloss+%231 */
	background: rgb(248,80,50); /* Old browsers */
	background: -moz-linear-gradient(top, rgba(248,80,50,1) 0%, rgba(241,111,92,1) 50%, rgba(246,41,12,1) 51%, rgba(240,47,23,1) 71%, rgba(231,56,39,1) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, rgba(248,80,50,1) 0%,rgba(241,111,92,1) 50%,rgba(246,41,12,1) 51%,rgba(240,47,23,1) 71%,rgba(231,56,39,1) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, rgba(248,80,50,1) 0%,rgba(241,111,92,1) 50%,rgba(246,41,12,1) 51%,rgba(240,47,23,1) 71%,rgba(231,56,39,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f85032', endColorstr='#e73827',GradientType=0 ); /* IE6-9 */
	color: #fff;
	width: 930px;
	margin: 0 0px 0 50px;
	font-size: 23px;
	font-weight: bold;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	
	border-top-right-radius: 10px;
	border-top-left-radius: 10px; 
}





	</style>