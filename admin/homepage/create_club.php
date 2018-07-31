<?php// include'create-club/createClub_server.php';
?>



<script type="text/javascript">

	function create_validate(){

	
	a = document.getElementById("add_clubName-err");
	b = document.getElementById("add_clubID-err");
	c = document.getElementById("add_assignModerator-err");
	a.innerHTML = "";
	b.innerHTML = "";
	c.innerHTML = "";
	a.style.backgroundColor= "";
	b.style.backgroundColor= "";
	c.style.backgroundColor= "";
	a.style.border= "";
	b.style.border= "";
	c.style.border= "";


	if(document.createClub_form.add_clubName.value.length==0){

		document.createClub_form.add_clubName.style.border="1px solid #ff3333";
		a.style.color="#b35c00";
		a.style.padding = "5px 10px 5px 10px";
		a.style.width = "200px";
		a.style.margin = "0px 39% 7px 39%";
		a.style.backgroundColor= "#ffe6cc";
		a.innerHTML = "Club Name filed is empty.";
		a.style.borderRadius= "20px";
		a.style.border= "1px solid #b35c00";
	}

	if(document.createClub_form.add_clubID.value.length==0){

		document.createClub_form.add_clubID.style.border="1px solid #ff3333";
		b.style.color="#b35c00";
		b.style.padding = "5px 10px 5px 10px";
		b.style.width = "200px";
		b.style.margin = "0px 39% 0px 39%";
		b.style.backgroundColor= "#ffe6cc";
		b.innerHTML = "Club ID filed is empty.";
		b.style.borderRadius= "20px";
		b.style.border= "1px solid #b35c00";
	
	}


		else{

		var xmlhttpp = new XMLHttpRequest();
		var add_clubName=document.getElementById('add_clubName').value;
	    var add_clubID=document.getElementById('add_clubID').value;


  		xmlhttpp.onreadystatechange = function() {
		
		if (xmlhttpp.readyState == 4 && xmlhttpp.status == 200) {			
			
			var m = document.getElementById("add_clubNameMsgs");
			m.innerHTML=xmlhttpp.responseText;;
			
			}
		};
	 	var url="create-club/createClub_server.php?clubname="+add_clubName+"&clubid="+add_clubID;
		xmlhttpp.open("GET", url,true);
		xmlhttpp.send();
		}


}


function delete_club(){


	var n=document.getElementById("delete_clb_msg");
	var flag = 0;

   
   var checkedValue = null; 
	var inputElements = document.getElementsByClassName('delete_club');
	for(var i=0; inputElements[i]; ++i){
	      if(inputElements[i].checked){
	      		flag = 1;
	           checkedValue = inputElements[i].value;
	           break;
	      }
	}

	if(flag==0){

		n.innerHTML = "Please select a club first.";
		n.style.color="#b35c00";
		n.style.padding = "5px 10px 5px 10px";
		n.style.width = "250px";
		n.style.borderRadius= "2px";
		n.style.margin = "0px 38% 20px 38%";
		n.style.backgroundColor= "#ffe6cc";
		n.style.borderRadius= "20px";
		n.style.border= "1px solid #b35c00";

	}

	if(flag==1){
		n.innerHTML = "";
		n.style.padding = "";
		n.style.width = "";
		n.style.borderRadius= "";
		n.style.margin = "";
		n.style.backgroundColor= "";
		n.style.borderRadius= "";
		n.style.border= "";

		//alert("This action will delete the members of the selected club.");
	if(confirm("Are you sure you want to delete this? (Existing members will also be deleted)"))
	{

		

	var  xmlhttpp = new XMLHttpRequest();

	xmlhttpp.onreadystatechange = function() {
		
		if (this.readyState == 4 && this.status == 200) {			
		
			
			n.innerHTML=xmlhttpp.responseText;
		
		}
	};
	
 	var url="create-club/club_delete.php?deleteclub="+checkedValue;
	
	xmlhttpp.open("GET", url, true);
	xmlhttpp.send();
		}
	}
}


</script>



<div class="createClb_wrap" id="createClb_wrap">

	<div class="club_fill_form">
		<div class="moderator_cont">
		<span class="createClb_close">&times;</span>

			

			<h3 class="mod_head">Create Club</h3>
			<p id="add_clubNameMsgs"></p>
			<p id="add_clubName-err"></p>
			<p id="add_clubID-err"></p>
			<p id="add_assignModerator-err"></p><br>
		<div class="club_fill_form_container">
			<form id="createClub_form" name="createClub_form">
				<input type="text" name="add_clubName" id="add_clubName" placeholder="Write club name">
				<br>
				<input type="text" name="add_clubID" id="add_clubID" placeholder="Write Club ID (ID must be unique)">

				<br><input class="btn"  onclick="create_validate();" type="button" name="create_club" value="Submit">
			</form>
		</div>
		<span class="club_tooltiptext">note: Single club deletion is possible.</span>
		<p id="delete_clb_msg"></p>
		<div class="existingClub">
			<fieldset>
				<legend align="center">Existing Clubs</legend>

					<div class="list_club">
						<div>Club ID</div>
						<div>Club Name</div>
						<div>Total Members</div>
						<div>Delete</div>
					</div>


				<?php
	
					include '../../dbconnect.php';

					$sql = "SELECT * FROM clubinfo";
					$result = mysqli_query($db, $sql);

					
					

					if (mysqli_num_rows($result) > 0) {
					
					    while($row = mysqli_fetch_assoc($result)) {

					    	$clbid = $row["club_ID"];

					    	$sql_count = "SELECT COUNT(username) FROM studentinfo WHERE (clubID =".$row['club_ID'].") AND (is_active='Y')";
							$result_count = mysqli_query($db, $sql_count);
							$row_count=mysqli_fetch_array($result_count);

					 
					    	echo "<div id='list_club_value'>
									    <div>". $row["club_ID"]."</div>
									    <div>" . $row["club_Name"]."</div>
									    <div>" . $row_count["0"]."</div>
									
										<div>
										<input class='delete_club' type='checkbox' name='delete_club' value='".$row["club_ID"]."'>
										</div>
								</div>";


					    }
					} else {
					    echo "0 results";
					}

					
					
				?>


			</fieldset>
			<br><input class="btn" onclick="delete_club();" name="delete_club_btn" type="button" value="Delete">
		</div>
		</div>
	</div>
<br><br><br><br><br>
<br><br><br><br><br>
</div>


<script type="text/javascript">
	
var createClb_wrap = document.getElementById('createClb_wrap');

var createClb_button = document.getElementById("createClb_button");

var span = document.getElementsByClassName("createClb_close")[0];

createClb_button.onclick = function() {
    createClb_wrap.style.display = "block";
}

span.onclick = function() {
    createClb_wrap.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == createClb_wrap) {
        createClb_wrap.style.display = "none";
    }
}


</script>




<style type="text/css">

.club_tooltiptext{
	display: none;
	position: absolute;
    width: 260px;
    background-color: rgba(51, 51, 51,0.5);
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    z-index: 1;
    top: 43%;
    left: 37%;
    right: 37%;

}

.moderator_cont:hover .club_tooltiptext{
	display: block;
}


#list_club_value {
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
}

.list_club{
	display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    font-weight: bold;
}



.existingClub{
	margin-bottom: 5%;

  overflow-x: auto;

}

.existingClub fieldset{
	height: 100%;
	width: 60%;
	margin-left: 18%;
	margin-right: 18%;
	font-size: 17px;
	font-family: Tw Cen MT,ROBOTO,helvetica;
}


.club_fill_form_container{

	padding-bottom: 30px;
	 border-radius: 10px;
}




.club_fill_form{

	 position: relative;
    background-color: #e6e6e6;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 70%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s

}


.createClb_wrap {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 50px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}



/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.createClb_close {
    color: #000;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-right: 15px;
    margin-top: 10px;
}

.createClb_close:hover,
.createClb_close:focus {
    color: #4d4d4d;
    text-decoration: none;
    cursor: pointer;
}


</style>