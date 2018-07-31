<?php 
session_start();

if($_SESSION['userType'] == 'moderator')
	{
   		header('Location:homepage');
  	 }
  	 else{
  	 	header('Location:../logout.php');
  	 }


 ?>