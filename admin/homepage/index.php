<?php

session_start();

if($_SESSION['userType'] == 'admin')
	{
   		include 'homepage.php';
  	 }
  	 else{
  	 	header('Location:../../logout.php');
  	 }



 ?>