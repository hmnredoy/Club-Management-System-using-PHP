<?php 

$target_file = $_REQUEST["avatar"]['name'];
$target_file = time().$target_file;

$target_dir = "moderator_img/";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_REQUEST["avatar"])) {
    $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_REQUEST["avatar"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {


if(file_exists($target_file)){

    $uploadOk == 1;
    count($errors) == 0;
    
}
else{
    if (move_uploaded_file($_REQUEST["avatar"]['tmp_name'], "moderator_img/".$target_file)){
        count($errors) == 0;
    } else {
        echo "Sorry, there was an error uploading your file.";
     }
    }
}


 ?>