<?php include('../server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/registration.css">


<script type="text/javascript">
	
	function validate(){
	var flag=true;
	
	//alert(document.fm.fileToUpload.value);
	//alert(document.fm.uName.value);
	a = document.getElementById("name-err");
	b = document.getElementById("username-err");
	c = document.getElementById("dept-err");
	d = document.getElementById("dob-err");
	e = document.getElementById("admissionyear-err");
	f = document.getElementById("phone-err");
	g = document.getElementById("email-err");
	h = document.getElementById("password-err");
	i = document.getElementById("avatar-err");
	j = document.getElementById("clubname-err");

	if(document.fm.clubname.value.length==0){
		document.fm.clubname.style.border="1px solid #ff6666";
		//m.innerHTML="Name field cannot be empty.";
		j.style.color="#ff6666";
		j.innerHTML = "Select a club.";
		flag=false;
	}

	if(document.fm.name.value.length==0){

		a.style.color="#ff6666";
		document.fm.name.style.border="1px solid #ff6666";
		//m.innerHTML="Name field cannot be empty.";
		a.innerHTML = "Name field cannot be empty.";
		flag=false;
	}

	if(document.fm.username.value.length==0){

		//document.fm.username.focus();
		b.style.color="#ff6666";
		document.fm.username.style.border="1px solid #ff6666";
		b.innerHTML = "Username field cannot be empty.";
		flag=false;
	}

	if(document.fm.dept.value.length==0){

			//document.fm.dept.focus();
			c.style.color="#ff6666";
			document.fm.dept.style.border="1px solid #ff6666";
			c.innerHTML = "Select a Department.";
			flag=false;
		}

	if(document.fm.dob_d.value.length==0 || document.fm.dob_m.value.length==0
	|| document.fm.dob_y.value.length==0 ){

			//document.fm.dob.focus();
			//document.fm.dob.style.border="1px solid #ff6666";
			d.style.color="#ff6666";
			d.innerHTML = "DOB field cannot be empty.";
			flag=false;
		}

	if(document.fm.admissionyear.value.length==0){
			
			document.fm.admissionyear.style.border="1px solid #ff6666";
			e.style.color="#ff6666";
			e.innerHTML = "Select admission year.";
			flag=false;
		}
	

	if(document.fm.phone.value.length==0){

		f.style.color="#ff6666";
		document.fm.phone.style.border="1px solid #ff6666";
		f.innerHTML = "Phone number must be entered.";
		flag=false;
	}

	if(document.fm.email.value.length==0){
	
		g.style.color="#ff6666";
		document.fm.email.style.border="1px solid #ff6666";
		g.innerHTML = "Email field cannot be empty.";
		flag=false;
	}

	if(document.fm.password.value.length==0 || document.fm.password2.value.length==0){
		
		h.style.color="#ff6666";
		document.fm.password.style.border="1px solid #ff6666";
		document.fm.password2.style.border="1px solid #ff6666";
		h.innerHTML = "Password fields cannot be empty.";
		flag=false;
	}

	if(document.fm.fileToUpload.value.length==0){

			document.fm.fileToUpload.style.border="1px solid #ff6666";
			i.style.color="#ff6666";
			i.innerHTML = "Avatar is not selected.";
			flag=false;
	}

	return flag;
}

</script>






</head>
<body>
	<div class="body-content">
		<div class="module">
			<h1>Create Student Account</h1>
			<form id="fm" action="register.php" enctype="multipart/form-data" method="POST" name="fm">
				
				<?php include('../errors.php'); ?>


				<?php
				   include '../dbconnect.php'; 


			        $query = "SELECT * FROM clubinfo";
					$results = mysqli_query($db, $query);

					
			        echo '<select name="clubname" id="clubname">';
					echo '<option value="">Select Club</option>';
					while($row = mysqli_fetch_assoc($results)) {
			        echo '<option value="'.$row['club_ID'].'">'.$row['club_Name']. '</option>';
					//echo $row['id'];
					
					}
			   echo '</select>';

			?>

				<p id="clubname-err"></p>

				 <input type="text" placeholder="Full Name" name="name" id="name"/>
				 <p id="name-err"></p>

				 <input type="text" placeholder="University ID" id="username" name="username" value="<?php echo $username; ?>">
				<p id="username-err"></p>

				 <select name="dept" id="dept" value="">
				  <option value="">Select Department</option selected>
				  <option value="FSIT">FSIT</option>
				  <option value="Engineering">Engineering</option>
				  <option value="FBA">FBA</option>
				  <option value="FAS">FAS</option>
				 </select>
				 <p id="dept-err"></p>
		
				  <b>Semester :</b>
				  <input type="radio" name="semester" value="Spring" checked>Spring
				  <input type="radio" name="semester" value="Summer">Summer
				  <input type="radio" name="semester" value="Fall">Fall
				<br><br>
				<b>Gender : </b>
				<input type="radio" name="gender" value="male" checked> Male
				<input type="radio" name="gender" value="female"> Female
				<input type="radio" name="gender" value="other"> Other<br><br>
				
				<label>DOB : </label>

					<select name="day" class="combine" id="dob_d">
					  <option>Day</option>
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

					 <select name="month" class="combine" id="dob_m">
					  <option value="">Month</option>
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

					 <select name="year" class="combine" id="dob_y">
					  <option value="">Year</option>
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
					<p id="dob-err"></p>

					<select name="admissionyear" id="admissionyear">
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
					<span id="admissionyear-err"></span>

				<input type="text" placeholder="Phone"  id="phone" name="phone"/>
				<p id="phone-err"></p>

				<input type="text" placeholder="Email"  id="email" name="email" value="<?php echo $email; ?>">
				<p id="email-err"></p>

				<input type="password" placeholder="Password"  id="password" name="password_1"/>
				<p id="password-err"></p>

				<input type="password" placeholder="Confirm Password" name="password_2" autocomplete="new-password" id="password2"/>

				<div class="avatar"><label>Select your avatar: </label>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<!--<input type="file" name="avatar" id="avatar" accept="image/*"/>-->
				</div>
				
				<span id="avatar-err"></span>
				<input type="submit" onclick="return validate();" value="Register" name="reg_user"
				class="btn btn-block btn-primary"/>

				<div class="sign-in">Already have an account? <a href="../login.php">Sign in</a></div>
			</form>
		</div>
	</div>

</body>
</html>

