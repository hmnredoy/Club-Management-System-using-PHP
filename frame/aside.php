<script type="text/javascript">

function showHint() {

	
	var  xmlhttp = new XMLHttpRequest();
	var str=document.getElementById('mytext').value;
	
	xmlhttp.onreadystatechange = function() {
		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			
			var m=document.getElementById("txtHint");
			m.innerHTML=xmlhttp.responseText;
		}
	};
 	var url="../homepage/server.php?uname="+str;
	
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
}






function JoinAnotherClub() {

	
	var checkedValue = null; 
	var inputElements = document.getElementsByClassName('clubJoin');
	for(var i=0; inputElements[i]; ++i){
	      if(inputElements[i].checked){
	      		flag = 1;
	           checkedValue = inputElements[i].value;
	           break;
	      }
	}

	
	var  xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
		
			//var m=document.getElementById("txtHint");
			//.innerHTML=xmlhttp.responseText;
			alert(xmlhttp.responseText);
		}
	};
	var un="<?php echo $_SESSION['username']; ?>";
 	var url="../frame/joinClub.php?clubID="+checkedValue+"&username="+un;
	//alert(checkedValue);
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
	
	
}
</script>



<?php

require '../dbconnect.php';

	$user = $_SESSION['username'];

	$query = "SELECT * FROM studentinfo WHERE username='$user'";
	$results = mysqli_query($db, $query);

	while($row = mysqli_fetch_assoc($results)) {

		$full_name=$row["name"];
		$avatar=$row["avatar"];

	}


	
?>



<aside>
	<div id="sidebar">

		<div class="toggle-btn" style="cursor: pointer;" onclick="toggleSidebar()">
			<span></span>
			<span></span>
			<span></span>
		</div>
			<div id="profileImage__">
			
				<?php
				//for showing profile image
		
				echo'<div class="profile__">'
						.'<img style="height:180px; width:146px; ;display: block;" src="../profile_images\\'.$avatar.'" alt="profile image" />'.
					'</div>';
								 
				?>
				
				<h6 style="text-align: center; color: #fff;
				font-size: 13px;">Member Type : </h6>
				<p>General Member</p>
				<span></span>
				<center><a href="../profile/profile.php"><b style="font-size: 16px;"><?php echo  $_SESSION['full_name'] ; ?></b></a>
				</center>
				<span></span>
			</div>
		<ul>
			<a href="#event"><li>Recent Events</li></a>
			<a href="../imageGallery/imageGallery.php"><li>Image Gallery</li></a>
			
			<input type="text" onkeyup="showHint()" id="mytext" placeholder="Search Member">
			<i class="fa fa-search" onclick="showHint()"></i>
			<h4 id="txtHint"></h4>

			<li class="jn-club" style="background-color: rgba(77, 102, 0,0.8);">Join Another Club
				<ul class="join_another">



	<?php
			include '../dbconnect.php';

			$clubID = $_SESSION['clubID'];

			//$qry = "SELECT * FROM clubinfo WHERE club_ID NOT IN ('".$_SESSION['clubID']."')";
			$qry = "SELECT * FROM clubinfo 
					WHERE club_ID NOT IN (SELECT club_ID FROM club_relation WHERE user_ID = '".$_SESSION['username']."')";


			$rslt = mysqli_query($db, $qry);

			if (mysqli_num_rows($rslt) > 0) {

				while($row = mysqli_fetch_assoc($rslt)) {

				echo "<li class='clblist'>
					".$row['club_Name']."
					<input class='clubJoin' type='checkbox' name='c1' onclick = 'JoinAnotherClub();' value='".$row['club_ID']."' >
					</li>";
				
				}
			}
			else{
					echo "<li style='color: #fff; background-color: rgb(255, 51, 51); text-align: center; border-bottom: 1px solid rgb(255, 51, 51);'>
					No Club Available</li>";
			 
			}
?>

				</ul>
			</li>
			

			

		</ul>
	</div>
</aside>

<style type="text/css">


	

	.clblist{
		text-align:center;
		border-bottom: 1px solid rgb(129, 152, 48);
		width: 200px;
		background-color: rgb(57, 77, 0);
		
		overflow: hidden;
	}


	.join_another{
	visibility: hidden;
	opacity: 0;
	transition: all 0.3s;
	position: absolute;
	left: 0;

	bottom: -17%;
	overflow: auto;
	height: 500px;
	}

	ul li:hover > ul{
	opacity: 1;
	visibility: visible;
}

	#profileImage__ p{
		text-align: center;
		color: #99cc00;
		font-size: 15px;
		font-family: 'Ubuntu';
	}

	.ds{

		width: 100px;
		height: 100px;
		top: 10%;
		left: 20%;
	}

	ul li{
		text-align: center;
	}


	#mytext{
		padding: 10px 0;
		text-align: center;
		width: 150px;
		margin-left: 10px;
		margin-top: 20px;
		overflow: hidden;
		margin-bottom: 10px;
	}

	.fa-search{
		padding-left: 2px;
		font-size: 1.7em;
		color: #e6e6e6;
		cursor: pointer;

	}

	#txtHint{

		color: #0066ff;
		font-size: 15px;
		height: 100px;
		width: 150px;
		white-space: nowrap; 
  	    overflow: auto;
	    text-overflow: ellipsis;
	    margin-left: 20px;

	}



	#txtHint a:hover{
		transition: 0.3s;
		text-decoration: underline;
		
	}

	#search{
		cursor: pointer;
	  text-overflow: ellipsis;
	  white-space: nowrap;
	  overflow: hidden;
	  font-size: 12px;
	  height: 40px;
	  background-color: #516ec8;
	  color: #fff;
	  border: 1px solid rgba(255, 255, 255, 0.15);
	
	  border-radius: 2px;
	  -webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
	  transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
}

#search:hover,
#search:focus {
  background-color: #314b9b;
  color: #ffffff;
  border-color: rgba(255, 255, 255, 0.3);
  box-shadow: 0 0 rgba(0, 0, 0, 0);
}



</style>





<script type="text/javascript">

//------Sidebar start------
	function toggleSidebar(){
		document.getElementById("sidebar").classList.toggle('active');
		document.getElementById("logo").classList.toggle('active');
		document.getElementById("footer").classList.toggle('active');

	}
//------Sidebar ends-----




</script>