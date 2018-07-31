<?php 
session_start();

	$db = mysqli_connect('localhost', 'root', '', 'club');

	$edit_state = false;

	$result = mysqli_query($db, "SELECT * FROM studentinfo");

 ?>