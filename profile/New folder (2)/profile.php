
<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

	

	/*if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../login.php");
	}*/


	//$results = mysqli_query($db);

?>



<!DOCTYPE html>
<html>
	<head>
	<title>Profile</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu">
	<link rel="stylesheet" type="text/css" href="../css/homepage.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">
</head>



<body id="profile">
<?php  if (isset($_SESSION['username'])) : ?>
	
<?php include '../frame/header.php'; ?>
<?php include '../frame/aside.php'; ?>


<?php include 'container.php'; ?>
<?php include '../frame/footer.php'; ?>

<?php endif ?>



</body>



<style type="text/css">

	body{
	font-family: 'Raleway', sans-serif;
	height: 100vh;
	background-size: cover;
	background-position: center;
	color: #262626;
	font-size: 15px;
	background-image: url('../img/background.png');
}


	
</style>


</html>