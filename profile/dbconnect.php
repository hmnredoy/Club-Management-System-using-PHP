<?php

$db = mysqli_connect("localhost","root","","club");
//server,username,password,database_name

//error handler
if(!$db){
	die("Connection failed: ".mysql_connect_error());
			/*Do not use mysql_connect_error() in real website as you will be prone to SQL injection (hacking)*/

}