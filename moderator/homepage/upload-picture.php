<?php 




/*--------------Image Upload---------------*/

$target_file = $_FILES['fileToUpload']['name'];
$target_file = time().$target_file;

$target_dir = "../../slider/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["reg_user"])) {
    $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    //    echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        array_push($errors, "File is not an image.");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry, file already exists.");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    array_push($errors, "Sorry, your file is too large.");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    array_push($errors, "Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {


if(file_exists($target_file)){

    $uploadOk == 1;
    count($errors) == 0;
    
}
else{
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../../slider/".$target_file)){
        /*echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";*/count($errors) == 0;
    } else {
        array_push($errors, "Sorry, there was an error uploading your file.");
     }
    }
}


 ?>