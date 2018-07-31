
<script src="jQuery.js"></script>
<script src="script.js"></script>



<script type="text/javascript">


function updateProfile() {

	a = document.getElementById("msg");

	var temp = '-';

	var dob_d=document.getElementById('dob_d').value;
	var dob_m=document.getElementById('dob_m').value;
	var dob_y=document.getElementById('dob_y').value;

	var dobrth = dob_d.concat(temp,dob_m,temp,dob_y);


	var xmlhttp = new XMLHttpRequest();
	var str=document.getElementById('sid').innerHTML;
    var phn=document.getElementById('pn').value;
    var mail=document.getElementById('em').value;
	var yr=document.getElementById('ay').value;
	var e = document.getElementById('dept');
    var department = e.options[e.selectedIndex].text;
	var e1 = document.getElementById('sem');
    var smstr = e1.options[e1.selectedIndex].text;
	var e2 = document.getElementById('gen');
    var gn = e2.options[e2.selectedIndex].text;
    document.getElementById("updateSpinner").style.visibility= "visible";

	xmlhttp.onreadystatechange = function() {
		//alert(xmlhttp.rxmlhttpeadyState);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			//document.getElementById("spinner").style.visibility= "hidden";
		//a.style.color="#86b300";
		document.getElementById("updateSpinner").style.visibility= "hidden";
		//m.innerHTML="Name field cannot be empty.";
		a.innerHTML = xmlhttp.responseText ;

			
		}
	};
 	var url="server.php?username="+str+"&phone="+phn+"&email="+mail+"&dobr="+dobrth+"&dobd="+dob_d+"&dobm="+dob_m+"&doby="+dob_y+"&year="+yr+"&dpt="+department+"&smster="+smstr+"&gndr="+gn;
    
	xmlhttp.open("GET", url,true);
	xmlhttp.send();


}
		
  function edit(){
		 
		//  document.getElementById("dpt").style.display='none';
		 // d.innerHTML="gghgdh";
		document.getElementById("dept").style.visibility = 'visible';
		document.getElementById("sem").style.visibility = 'visible';
		document.getElementById("ay").style.visibility = 'visible';
		document.getElementById("dob_d").style.visibility = 'visible';
		document.getElementById("dob_m").style.visibility = 'visible';
		document.getElementById("dob_y").style.visibility = 'visible';
		document.getElementById("gen").style.visibility = 'visible';
		document.getElementById("pn").style.visibility = 'visible';
		document.getElementById("em").style.visibility = 'visible';
		document.getElementById("_visible").style.visibility = 'visible';

		  
	  }

	  function edit2(){

	  	document.getElementById("dept").style.visibility = 'hidden';
		document.getElementById("sem").style.visibility = 'hidden';
		document.getElementById("ay").style.visibility = 'hidden';
		document.getElementById("dob_d").style.visibility = 'hidden';
		document.getElementById("dob_m").style.visibility = 'hidden';
		document.getElementById("dob_y").style.visibility = 'hidden';
		document.getElementById("gen").style.visibility = 'hidden';
		document.getElementById("pn").style.visibility = 'hidden';
		document.getElementById("em").style.visibility = 'hidden';
		document.getElementById("_visible").style.visibility = 'hidden';
	  
	  }

</script>


<?php

require '../dbconnect.php';

	$user = $_SESSION['username'];



		//$password = md5($password);
		$query = "SELECT * FROM studentinfo WHERE username='$user'";
		$results = mysqli_query($db, $query);

		
	while($row = mysqli_fetch_assoc($results)) {

		
		$username=$row["username"];
		//$clubname=$row["clubname"];
		$full_name=$row["name"];
		$avatar=$row["avatar"];
		$gender=$row["gender"];
		$dob=$row["dob"];
		$email=$row["email"];
		$phone=$row["phone"];
		$dept=$row["dept"];
		$semester=$row["semester"];
		$admissionyear=$row["admissionyear"];
		
	

	}


	
?>







	<div class="profile_container">
		<fieldset>
			<legend align="center"><?php echo $full_name ?></legend>
			
			<table>
				<tr>
					<p id="msg"></p>
					<img id="updateSpinner" src="ajax-spinner-preloader.svg" style="visibility:hidden; margin-left: 47%;margin-right: 47%; margin-top: 20%; position:absolute;
   						z-index:1000; width: 100px;">
					<td>
						
						<div class="profile_1">
							<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
								<div id="image_preview"><img id="previewing" style="height:180px; width:160px; ;display: block; border:5px solid rgba(51, 51, 51, 0.8); margin-left: 12%;" src=<?php echo '../profile_images\\'.$avatar; ?> /></div>
								<div id="selectImage">
								<input type="file" name="file" id="file" required /><br><br>
								<input type="submit" value="Update Image" class="btn" style="width: 171px; margin-left: 12%;" />
								</div>
								<img id="loading" src="ajax-spinner-preloader.svg">
							</form>
							<div id="message"></div>
						</div>
					</td>


		<td class='profile_right'>
				<form action="deactive.php" method="POST" enctype="multipart/form-data">		
				<div class="info_table">
				<table>
					<tr>
						<td><h4>ID :</h4></td>
						<td class="info"><p id="sid"><?php echo $username ?></p></td>
							<td>
							<a onclick="edit();" href="#">Edit</a>
							

						</td>

						<td><a id="_visible" onclick="edit2();" href="#" style="" class="fa fa-eye-slash" aria-hidden="true"></a>

						<script>
		               		document.getElementById("_visible").style.visibility = "hidden";
					   	</script></td>

						

						
					</tr>
					
					<tr>
						<td><h4>Joined Club(s) :</h4></td>
						<td class="info">
						<?php 

							$sql_club = "SELECT * FROM club_relation WHERE user_ID = '$user' and status = 'Y'";
				             $result_club = mysqli_query($db, $sql_club);

				                  
				             while($row_clb = mysqli_fetch_assoc($result_club)) {

				                  echo "<p style='border-bottom: 1px solid #8c8c8c; background-color: rgba(77, 77, 77,0.7); padding:5px 2px; color: #f2f2f2; border-radius: 5px; text-align: center;'>".$row_clb["club_Name"]."</p>";

				               }

							 ?>
						</td>
						<td><span></span></td>
					</tr>
					<tr>
						<td><h4>Department :</h4></td>
						<td class="info">
						<p id="dpt"><?php echo $dept ?>
						</td>
						<td>
					<select name="dept" id="dept" value="a">
				         <option value="a">Select Department</option selected>
				         <option value="FSIT">FSIT</option>
				         <option value="Engineering">Engineering</option>
				         <option value="FBA">FBA</option>
				         <option value="FAS">FAS</option>
					 </select> 	
  
					 <script type="text/javascript">
		               document.getElementById("dept").style.visibility = "hidden";
					   		//document.getElementById("dept").style.visibility = 'visible';
                     </script>
					 </td>
					
					
							
					
					</tr>
					<tr>
						<td><h4>Joined Semester :</h4></td>
						<td class="info"><p id="jsptag"><?php echo $semester ?></p></td>
						<td>
							<select name="semester" id="sem" value="a">
						         <option value="a">Select Semester</option selected>
						         <option value="Spring">Spring</option>
						         <option value="Summer">Summer</option>
						         <option value="Fall">Fall</option>
							 </select>   
							 <script type="text/javascript">
				               document.getElementById("sem").style.visibility = "hidden";
							   		//document.getElementById("dept").style.visibility = 'visible';

				 
		                     </script>
						</td>
					
					</tr>
					<tr>
						<td><h4>Admission Year :</h4></td>
						<td class="info"><p id="ayp"><?php echo $admissionyear ?></p></td>
						<td>
						<select id="ay" name="ayear">
					  <option value="">Admission Year</option>
					  <option value="2017">2017</option>
					  <option value="2016">2016</option>
					  <option value="2015">2015</option>
					  <option value="2014">2014</option>
					  <option value="2013">2013</option>
					  <option value="2012">2012</option>
					  <option value="2011">2011</option>
					  <option value="2010">2010</option>
					</select>
						
						
							 <script type="text/javascript">
		               document.getElementById("ay").style.visibility = "hidden";
					   		//document.getElementById("dept").style.visibility = 'visible';

		 
                     </script>
						</td>
						
					
					</tr>
					<tr>
						<td><h4>Gender :</h4></td>
						<td class="info"><p><?php echo $gender ?></p></td>
						<td>
						 <select name="gender" id="gen" value="">
				         <option value="">Select Gender</option selected>
				         <option value="Male">Male</option>
				         <option value="Female">Female</option>
				         <option value="Others">Others</option>
					 </select> 
					 
					 	 <script type="text/javascript">
		               document.getElementById("gen").style.visibility = "hidden";
					   		//document.getElementById("dept").style.visibility = 'visible';

		 
                     </script>
					 
						</td>
					
					</tr>
					<tr>
						<td><h4>DOB :</h4></td>
						<td class="info"><p><?php echo $dob ?></p></td>
						<td>
					<select name="day" class="combine1" id="dob_d"/>
					  <option value="">D</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="8">8</option>
					  <option value="9">9</option>
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

					 <select name="month" class="combine1" id="dob_m">
					  <option value="">M</option>
					  <option value="Jan">Jan</option>
					  <option value="Feb">Feb</option>
					  <option value="Mar">Mar</option>
					  <option value="Apr">Apr</option>
					  <option value="May">May</option>
					  <option value="Jun">Jun</option>
					  <option value="Jul">July</option>
					  <option value="Aug">Aug</option>
					  <option value="sep">Sep</option>
					  <option value="Oct">Oct</option>
					  <option value="Nov">Nov</option>
					  <option value="Dec">Dec</option>
					</select>

					 <select name="year" class="combine1" id="dob_y">
					  <option value="">Y</option>
					  <option value="2000">2000</option>
					  <option value="1999">1999</option>
					  <option value="1998">1998</option>
					  <option value="1997">1997</option>
					  <option value="1996">1996</option>
					  <option value="1995">1995</option>
					  <option value="1994">1994</option>
					  <option value="1993">1993</option>
					  <option value="1992">1992</option>
					  <option value="1991">1991</option>
					  <option value="1990">1990</option>
					</select>
						
							 <script type="text/javascript">
		               document.getElementById("dob_d").style.visibility = "hidden";
		               document.getElementById("dob_m").style.visibility = "hidden";
		               document.getElementById("dob_y").style.visibility = "hidden";
					   		//document.getElementById("dept").style.visibility = 'visible';

		 
                     </script>
						
						</td>
						
					</tr>
					<tr>
						<td><h4>Phone :</h4></td>
						<td class="info"><p><?php echo $phone ?></p></td>
						<td>
						<input type="text" id="pn"  placeholder="Phone Number" value="" name="spn"/>	
						
								 <script type="text/javascript">
		               document.getElementById("pn").style.visibility = "hidden";
					   		//document.getElementById("dept").style.visibility = 'visible';

		 
                     </script>
						
						</td>
					
					</tr>
					<tr>
						<td><h4>Email :</h4></td>
						<td class="info"><p><?php echo $email ?></p></td>
						<td>
						<input type="text" id="em"  placeholder="Email" value="" name="smail"/>	
					<script type="text/javascript">
		               document.getElementById("em").style.visibility = "hidden";
					   		//document.getElementById("dept").style.visibility = 'visible';

		 
                     </script>
						
						</td>
					
					</tr>

					<tr>
						<td>

							<input  class="btn" type="submit" value="Deactivate" name="deactivate">
						</td>
						<td>

							<input  class="btn" type="button" value="Update Profile" onclick="updateProfile()"
							></td>

					</tr>
								
				</table>
			</div>
					</form>
					</td>
				</tr>

			</table>
		
			
		</fieldset>
		
	
</div>

<style type="text/css">


.profile_right{
	padding-left: 75px;

}



.success_wrap{

	margin-top: 10px;
	width: 210px;
	height: 200px;
	border: 1px dashed #333;
	background-color: rgba(51, 51, 51,0.6);
	padding: 5px 10px;
	border-radius: 10px;
	word-wrap: break-word;
	color: #e6e6e6;
}





#file {
color: #fff;
padding: 5px;
border: 2px solid #8c8c8c;
background-color: rgba(38, 38, 38,0.6);
margin-top: 10px;
border-radius: 5px;
box-shadow: 0 0 15px #626F7E;
width: 190px;
margin-left: 7px;
}




#success
{
color:#f2f2f2;
font-weight: bold;
}


#error
{
color:red;
}


#loading
{
display:none;

width: 100px;
height: 60px;
margin-left: 30%;
margin-right: 30%;
}




	tr td h4{
		width: 140px;

	}
	
	.profile_container{
	position: relative;
	left:17%;
	right:22%;
	top:20%;
	bottom: 20%;
	width: 58%;
	height: auto;
	background-color: rgba(179, 179, 179,0.4);
	padding-top: 15px;
	padding-bottom: 2%;
	padding-left: 2%;
	padding-right: 2%;
	margin-bottom: 15%;
	}

legend{
	font-size: 25px;
	font-weight: bold;

	}

	.info{
		padding-left: 20px;
		
	}

	.info p{
		font-size: 15px;
		font-weight: bold;
	}

	.profile_container h4{
		font-size: 17px;
		font-weight: normal;

	}

	
.btn, .info_table a {
	position: relative;
	
	cursor : pointer;
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
	font-size: 15px;
	background-color: rgba(51, 51, 51,0.8);
	color: #fff;
	border: 1px solid rgba(255, 255, 255, 0.15);
	box-shadow: 0 0 rgba(0, 0, 0, 0);
	border-radius: 2px;
	padding: 10px 30px;
	transition: 0.3s;
}

.btn:hover,
.btn:focus, .info_table a {
  background-color: rgba(51, 51, 51,1);
}




table{
	margin-top: 20px;
	margin-left: 10px;
}


.info_table a{


	text-decoration: none;
	color: #f2f2f2;
	/*border: 1px solid #4d4d4d;
	*/border-radius: 2px;
	background-color: rgba(51, 51, 51,0.6);
	padding: 2px 10px;
	margin: 5px 0;

}


.info_table a:hover{
	color: #f2f2f2;
	background-color: rgba(51, 51, 51,1);

}

.info_table{
	
	
	margin-bottom: 5%;
	margin-left: 0;


}

td h4, td p{
	border-bottom: 1px solid rgba(100,100,100,1);
}

select,
textarea,
input[type="text"],
input[type="password"]
{
  height:30px;
  width:100%;;
  display: inline-block;
  vertical-align: middle;
  height: 34px;
  padding: 0 10px;
  margin-top: 3px;
  margin-bottom: 10px;
  font-size: 15px;
  line-height: 20px;
  border: 1px solid rgb(255, 255, 255);
  background-color: rgba(255, 255, 255, 0.8);
  color: rgba(0, 0, 0, 0.7);
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 2px;
}

#submit{

	margin-top:10px;
	margin-left: 20%;

}

.profile_1{
margin-bottom: 90%;

}


.combine1{

	width: 54px;
}

#_visible{
	 background-color: rgba(255, 77, 77,0.6);
	 margin-top:10px;
	 padding: 6px 10px;
	 text-decoration: none;
	 color: #fff;"
}

.info_table #_visible:hover{
	background-color: rgba(255, 77, 77,1);
}

</style>