<?php 

include('server.php')

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">


<script type="text/javascript">

	function validate() {

		var flag=true;

		a = document.getElementById("username-err");
		b = document.getElementById("password-err");


		if(document.fm.username.value.length==0){

		a.style.color="#ff6666";
		document.fm.username.style.border="1px solid #ff6666";
		//m.innerHTML="Name field cannot be empty.";
		a.innerHTML = "University Id field is empty.";
		flag=false;
	}

		if(document.fm.password.value.length==0){

			b.style.color="#ff6666";
			document.fm.password.style.border="1px solid #ff6666";
			//m.innerHTML="Name field cannot be empty.";
			b.innerHTML = "Password field is empty.";
			flag=false;
		}

		return flag;
}

</script>



</head>
<body>
	<div class="body-content">
		<div class="module">
			<form name="fm" name ="myForm" action="login.php" method="POST">
			<h2>AIUB Club Management System</h2>
			<center><img src="img/aiub.png"></center>
			<div class="sgn">Sign in with University ID and Password</div>

			<?php include 'session_error.php'; 
			if(isset($_GET['status'])){
 		   	
 		   	echo "<div style=

					'color: rgb(138, 109, 59);
					background-color: rgb(252, 248, 227);
					padding: 5px 0;
					border-radius: 2px;
					text-align: center;'
					>".$_GET['status']."</div>";

 		   
			}
			else{
				echo "";
			}
			?>

			
			<?php include('errors.php'); ?>
			<div class="uniid">
				<input type="text" name="username" id ="username" placeholder="University ID" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
			<p id="username-err"></p>
			</div>
			<input type="password" name="password" id="password" placeholder="Password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
			<p id="password-err"></p>
			<input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />&nbsp;<span style='color: #8c8c8c;'>Remember me</span>
<!--name="login_user"-->
			<input type="submit" onclick="return validate();" name="login_user" value="Sign in" class="btn btn-block btn-primary">

			<div class="join">
				
			<span id="c">or, Create Account</span>
			<a href="registration/register.php">Sign up</a>
			</div>
		</form>
	</div>
</div>


</body>
</html>


