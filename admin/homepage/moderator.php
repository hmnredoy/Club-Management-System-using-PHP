
<script type="text/javascript">
	
	function addModerator(){

		
	
	var a = document.getElementById("moderator_msg");

	a.innerHTML = "";
	a.style.color="";
	a.style.padding = "";
	a.style.width = "";
	a.style.borderRadius= "";
	a.style.margin = "";
	a.style.backgroundColor= "";
	a.style.border= "";

	var mod_password_1 = document.getElementById('mod_password_1').value;
	var mod_password_2 = document.getElementById('mod_password_2').value;


	if(document.moderator_create_fm.moderatorName.value.length==0){

		document.moderator_create_fm.moderatorName.style.border="1px solid #ff3333";
		
		a.innerHTML = "Moderator Name field is empty.";
		a.style.color="#b35c00";
		a.style.padding = "5px 10px 5px 10px";
		a.style.width = "250px";
		a.style.borderRadius= "20px";
		a.style.margin = "0px 36% 0px 36%";
		a.style.backgroundColor= "#ffe6cc";
		a.style.border= "1px dashed #b35c00";
	}

	else if(document.moderator_create_fm.moderatorID.value.length==0){

		document.moderator_create_fm.moderatorID.style.border="1px solid #ff3333";

		a.innerHTML = "Moderator ID field is empty.";
		a.style.color="#b35c00";
		a.style.padding = "5px 10px 5px 10px";
		a.style.width = "250px";
		a.style.borderRadius= "20px";
		a.style.margin = "0px 36% 0px 36%";
		a.style.backgroundColor= "#ffe6cc";
		a.style.border= "1px dashed #b35c00";
	
	}
	else if(document.moderator_create_fm.club.value.length==0){

		document.moderator_create_fm.club.style.border="1px solid #ff3333";

		a.innerHTML = "Please select a club.";
		a.style.color="#b35c00";
		a.style.padding = "5px 10px 5px 10px";
		a.style.width = "250px";
		a.style.borderRadius= "20px";
		a.style.margin = "0px 36% 0px 36%";
		a.style.backgroundColor= "#ffe6cc";
		a.style.border= "1px dashed #b35c00";
	
	}

	else if(document.moderator_create_fm.mod_email.value.length==0){

		document.moderator_create_fm.mod_email.style.border="1px solid #ff3333";

			a.innerHTML = "Email field is empty.";
			a.style.color="#b35c00";
			a.style.padding = "5px 10px 5px 10px";
			a.style.width = "250px";
			a.style.borderRadius= "20px";
			a.style.margin = "0px 36% 0px 36%";
			a.style.backgroundColor= "#ffe6cc";
			a.style.border= "1px dashed #b35c00";
			
		}
	else if(document.moderator_create_fm.mod_password_1.value.length==0){

		document.moderator_create_fm.mod_password_1.style.border="1px solid #ff3333";

			a.innerHTML = "Password field is empty.";
			a.style.color="#b35c00";
			a.style.padding = "5px 10px 5px 10px";
			a.style.width = "250px";
			a.style.borderRadius= "20px";
		a.style.margin = "0px 36% 0px 36%";
		a.style.backgroundColor= "#ffe6cc";
		a.style.border= "1px dashed #b35c00";
			
		}
	else if(document.moderator_create_fm.mod_password_2.value.length==0){

		document.moderator_create_fm.mod_password_2.style.border="1px solid #ff3333";

			a.innerHTML = "Please retype the password.";
			a.style.color="#b35c00";
			a.style.padding = "5px 10px 5px 10px";
			a.style.width = "250px";
			a.style.borderRadius= "20px";
			a.style.margin = "0px 36% 0px 36%";
			a.style.backgroundColor= "#ffe6cc";
			a.style.border= "1px dashed #b35c00";
			
		}
	else if(mod_password_1!=mod_password_2){

			a.innerHTML = "Two passwords didn't match.";
			a.style.color="#b35c00";
			a.style.padding = "5px 10px 5px 10px";
			a.style.width = "250px";
			a.style.borderRadius= "20px";
			a.style.margin = "0px 36% 0px 36%";
			a.style.backgroundColor= "#ffe6cc";
			a.style.border= "1px dashed #b35c00";
		}
		else{

		var mod_xmlhttp = new XMLHttpRequest();
		var moderatorName = document.getElementById('moderatorName').value;
	    var moderatorID = document.getElementById('moderatorID').value;
	    var mod_gender = document.getElementById('mod_gender').value;
	    var mod_email = document.getElementById('mod_email').value;
	    var e = document.getElementById('mod_drop');
    	var mod_Club_ID = e.options[e.selectedIndex].value;
    	var mod_club_name = e.options[e.selectedIndex].text;
	    
  		mod_xmlhttp.onreadystatechange = function() {
		
		if (mod_xmlhttp.readyState == 4 && mod_xmlhttp.status == 200) {			
			
			var mss = document.getElementById("moderator_msg");
			mss.innerHTML=mod_xmlhttp.responseText;
			
			}
		};
	 	var url="manage-moderators/moderator_server.php?name="+moderatorName+"&id="+moderatorID+"&gender="+mod_gender+"&email="+mod_email+"&password="+mod_password_1+"&confpass="+mod_password_2+"&clubID="+mod_Club_ID+"&clubName="+mod_club_name;
	
		mod_xmlhttp.open("GET", url,true);
		mod_xmlhttp.send();
		}
	}

</script>

<div class="moderator_wrap" id="moderator_wrap">

	

	<div class="moderato_fill_form">
		<div class="moderator_cont">
		<span class="moderator_close">&times;</span><br>

			<h3 class="mod_head">Add Moderator</h3>

			

			<p id="moderator_msg"></p>
			<p id="moderator_msg_server"></p><br>

		<div class="moderato_fill_form_container">
			<form id="moderator_create_fm" name="moderator_create_fm">
				<input type="text"  id="moderatorName" name="moderatorName" placeholder="Full name of moderator"><br>
				<input type="text" id="moderatorID" name="moderatorID" placeholder="ID of moderator"><br>

				Gender <input type="radio" name="mod_gender" id="mod_gender" value="male" checked> Male
					<input type="radio" name="mod_gender" id="mod_gender" value="female"> Female
					<input type="radio" name="mod_gender" id="mod_gender" value="other"> Other

				<br>
				Assign to a Club
					<?php
					   include '../../dbconnect.php';


				        $query = "SELECT * FROM clubinfo";
						$results = mysqli_query($db, $query);

						
				        echo '<select name="club" size="1" id="mod_drop">';
						echo '<option value="">Select Club</option>';
						while($row = mysqli_fetch_assoc($results)) {
				        echo '<option value="'.$row['club_ID'].'">'.$row['club_Name']. '</option>';
						//echo $row['id'];
						
						}
				   echo '</select>';

				?>
<br>
				<input type="text" placeholder="Email" name="mod_email" id="mod_email"/><br>

				<input type="password" placeholder="Password" name="mod_password_1" id="mod_password_1"/><br>

				<input type="password" placeholder="Confirm Password" name="mod_password_2" id="mod_password_2" autocomplete="new-password"/>
				<br>
				<input type="button" name="mod_submit" onclick="addModerator();" id="mod_submit" value="Submit" class="btn">
			</form>
		</div>



<script type="text/javascript">


		function delete_Mod(){


	var dm=document.getElementById("delete_mod_msg");
	var flag = 0;

   
   var checkedValue = null; 
	var inputElements = document.getElementsByClassName('delete_mod');
	for(var i=0; inputElements[i]; ++i){
	      if(inputElements[i].checked){
	      		var flag = 1;
	           checkedValue = inputElements[i].value;
	           break;
	      }
	}


	if(flag==0)
	{
		dm.innerHTML = "Please select a moderator first.";
		dm.style.color="#b35c00";
		dm.style.padding = "5px 10px 5px 10px";
		dm.style.width = "250px";
		dm.style.borderRadius= "2px";
		dm.style.margin = "0px 38% 20px 38%";
		dm.style.backgroundColor= "#ffe6cc";
		dm.style.borderRadius= "20px";
		dm.style.border= "1px solid #b35c00";
	}

	if(flag==1)
	{

	dm.innerHTML = "";
	dm.style.color="";
	dm.style.padding = "";
	dm.style.width = "";
	dm.style.borderRadius= "";
	dm.style.margin = "";
	dm.style.backgroundColor= "";
	dm.style.borderRadius= "";
	dm.style.border= "";

	var  xmlhttpp = new XMLHttpRequest();

	xmlhttpp.onreadystatechange = function() {
		
		if (this.readyState == 4 && this.status == 200) {			
		
			
			dm.innerHTML=xmlhttpp.responseText;
		
		}
	};
	
 	var url="manage-moderators/moderator_delete.php?clubID="+checkedValue;
	
	xmlhttpp.open("GET", url, true);
	xmlhttpp.send();

	}
}


</script>




			<h3 class="mod_head" style="width: 92%; margin-left: 4%; margin-right: 4%;">Manage Moderator(s)</h3>
			<div class="existingMod">
				<p id="delete_mod_msg"></p>
				<fieldset>
					<legend align="center">Existing Moderators</legend>

					<div class="list_mod">
						<div>Name</div>
						<div>ID</div>
						<div>Club Name</div>
						<div>Gender</div>
						<div>Email</div>
						<div>Activation date</div>
						<div>Delete</div>
					</div>


				<?php
	
					

					$sql = "SELECT * FROM moderatorinfo";
					$result = mysqli_query($db, $sql);

					
					if (mysqli_num_rows($result) > 0) {
					
					    while($row = mysqli_fetch_assoc($result)) {

					    	
					    	echo "<div id='list_mod_value'>
									    <div>". $row["Name"]."</div>
									    <div>" . $row["user_ID"]."</div>
									    <div>" . $row["Club_Name"]."</div>
									    <div>" . $row["Gender"]."</div>
									    <div>" . $row["Email"]."</div>
									    <div>" . $row["Date_Time"]."</div>
									
										<div>
										<input class='delete_mod' type='checkbox' value='".$row["Club_ID"]."'>
										</div>
								</div>";


					    }
					} else {
					    echo "0 results";
					}

					
					
				?>

				</fieldset>
				<br><input class="btn" onclick="delete_Mod();" name="delete_mod_btn" type="button" value="Delete">
			</div>


			
				<div class="assignModerator">
					<p id="asMod_msg"></p>
				<fieldset>
					<legend align="center">Club Info Table</legend>
					<div class="list_as_mod">
						<div>Club ID</div>
						<div>Club Name</div>
						<div>Assigned Moderator</div>
						<div>Moderator ID</div>
					</div>

					<?php
	

					$sql_club = "SELECT * FROM clubinfo";
					$result_club = mysqli_query($db, $sql_club);

					
				
					if (mysqli_num_rows($result_club) > 0) {
					
					    while($row = mysqli_fetch_assoc($result_club)) {

				    		echo "<div class='list_club_value'>
								    <div>".$row["club_ID"]."</div>
								    <div>".$row["club_Name"]."</div>
								    <div>".$row["moderator"]."</div>
								    <div>".$row["moderator_ID"]."</div>
								</div>";

							}
						}
					 
					else {
					    echo "0 results";
					}

					
				?>
		
			</fieldset>
			</div>
		</div>
	</div>
	<br><br><br><br><br>
<br>
</div>


<script type="text/javascript">
	
var moderator_wrap = document.getElementById('moderator_wrap');

var moderator_button = document.getElementById("moderator_button");

var spann = document.getElementsByClassName("moderator_close")[0];

moderator_button.onclick = function() {
    moderator_wrap.style.display = "block";
}

spann.onclick = function() {
    moderator_wrap.style.display = "none";
}


window.onclick = function(events) {
    if (events.target == moderator_wrap) {
        moderator_wrap.style.display = "none";

    }
}


</script>




<style type="text/css">




.list_as_mod{
	display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    font-weight: bold;
    text-decoration: underline;

}


.list_club_value {
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
     padding: 5px 0;
}


.assignModerator fieldset{

	height: 100%;
	width: 70%;
	margin-left: 14%;
	margin-right: 14%;
	font-size: 17px;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	margin-bottom: 5%;
}


.inside_fieldset{



}




.list_mod{
	display: grid;
    grid-template-columns: 15% 15% 15% 15% 15% 15% 15%;
    font-weight: bold;
}



#list_mod_value{
	display: grid;
    grid-template-columns: 15% 15% 15% 15% 15% 15% 15%;
}



.existingMod{

	margin-bottom: 5%;

  overflow-x: auto;
}


.existingMod fieldset{
	height: 100%;
	width: 90%;
	margin-left: 4%;
	margin-right: 4%;
	font-size: 15px;
	font-family: Tw Cen MT,ROBOTO,helvetica;
}


.moderator_cont{
	border: 7px solid #b3b3b3;

}


.mod_head{

	border: 1px solid #333;
	padding: 10px 0;
	background-color: rgb(102, 102, 102);
	color: #fff;
	width: 50%;
	margin-left: 25%;
	margin-right: 25%;
}



.moderato_fill_form_container{

	padding-bottom: 30px;
	 border-radius: 10px;
	 
}




.moderato_fill_form{

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


.moderator_wrap {
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
.moderator_close {
    color: #000;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-right: 15px;
    margin-top: 10px;
}

.moderator_close:hover,
.moderator_close:focus {
    color: #4d4d4d;
    text-decoration: none;
    cursor: pointer;
}






</style>