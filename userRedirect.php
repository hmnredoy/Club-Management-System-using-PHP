<?php
session_start();

if(isset($_GET['user'])){
 		   	
	 		   if($_GET['user'] == 'admin')
	 		   {
	 		   	header("location: admin/index.php");
	 		   }
	 		   else if($_GET['user'] == 'moderator')
	 		   {
	 		   	header("location: moderator/index.php");
	 		   }
	 		   else if($_GET['user'] == 'student')
	 		   {
	 		   	header("location: homepage/?id=".$_SESSION['username']);
	 		   }
	 		   else{
					
				header("location: login.php");
	 		   }
			}

			else{

 		   	if($_SESSION['userType'] == 'admin')
		 		   {
		 		   	header("location: admin/index.php");
		 		   }
		 		   else if($_SESSION['userType'] == 'moderator')
		 		   {
		 		   	header("location: moderator/index.php");
		 		   }
		 		   else if($_SESSION['userType'] == 'student')
		 		   {
		 		   	header("location: homepage/?id=".$_SESSION['username']);
		 		   }
		 		   else{
		 		  	header("location: login.php");
		 		   }
 		   }



 ?>