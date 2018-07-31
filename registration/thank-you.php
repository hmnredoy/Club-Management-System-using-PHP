<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Thank you!</title>
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">
</head>
<body>

	<div class="center-div">
		<h1>Thank You!&nbsp;&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></h1>
		<p>Your request has been submitted. Please wait for confirmation.</p>
		<a href="../login.php"><button class="btn">Go to Login Page&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i></button></a>
	</div>
</body>
</html>

<style type="text/css">
	

	body
	{
	  background-color: #fcfcfc;
	  color: #4d9900;
	}
	
	.center-div
	{
	  position: absolute;
	  margin: auto;
	  top: 0;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  width: 350px;
	  height: 250px;
	  background-color: rgb(214, 245, 214);
	  border-radius: 3px;
	  border: 2px dashed #4d9900;
	}

	p{
		margin-left: 35px;
	}
	h1{
		margin-left: 45px;
	}

	button{
		margin-left: 30%;
	}


	.btn {

	position: relative;
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
	font-size: 18px;
	background-color: #4d9900;
	color: #fff;
	border: 1px solid rgba(255, 255, 255, 0.15);
	box-shadow: 0 0 rgba(0, 0, 0, 0);
	border-radius: 2px;
	-webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
	transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;

	padding: 10px 7px;
  	font-weight: bold;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	text-align: center;
	margin: 10px 25%;
}

.btn:hover,
.btn:focus {

	cursor : pointer;
	-webkit-box-shadow: 0px 1px 30px 0px rgb(191, 191, 191);
	-moz-box-shadow: 0px 1px 30px 0px rgb(191, 191, 191);
	box-shadow: 0px 1px 30px 0px rgb(191, 191, 191);
}

</style>