<?php 

include '../../dbconnect.php';

$username = $_SESSION['username'];
$sql = "SELECT count(*) as count FROM message WHERE recieverID = '$username'";
$qry = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($qry);
echo $row['count']; 



 ?>