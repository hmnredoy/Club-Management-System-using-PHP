<?php
session_start();

	if($_SESSION['userType'] == 'moderator')
	{
	include 'homepage.php';
	}
	 else{
	 	header('Location:../../logout.php');
	 }

 ?>