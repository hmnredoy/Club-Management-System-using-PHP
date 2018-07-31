<?php
session_start();

if($_SESSION['userType'] == 'admin')
	{
   		header('Location:homepage');
  	 }
  	 else{
  	 	header('Location:../logout.php');
  	 }


 ?>