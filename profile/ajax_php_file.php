<?php

include '../dbconnect.php';
include '../server.php';
$username = $_SESSION["username"];

if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("../profile_images/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$target_file = $_FILES['file']['name'];
$target_file = time().$target_file;

move_uploaded_file($_FILES['file']['tmp_name'],"../profile_images/".$target_file) ; // Moving Uploaded file
echo "<div class='success_wrap'><span id='success'>Image Updated Successfully!</span><br/>";
echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br></div>";


$img_query = "SELECT avatar FROM studentinfo WHERE username= '$username'";
$img_rslt = mysqli_query($db, $img_query);

if (mysqli_num_rows($img_rslt) == 1) {

while($row = mysqli_fetch_assoc($img_rslt)) {

	unlink('../profile_images/'.$row['avatar']);
	
	}


}


$sql_="UPDATE studentinfo SET avatar = '$target_file' where username = '$username'";
$result_ = mysqli_query($db, $sql_)or die(mysqli_error($db));



}
}
}
else
{
echo "<span id='invalid'>Invalid file Size or Type<span>";
}
}
?>