<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();

 	unset($_SESSION);
 	session_unset();
	session_destroy();
	header("location: index.php");
	exit;

?>