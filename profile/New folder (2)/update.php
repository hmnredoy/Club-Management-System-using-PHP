<?php 

include 'container';
if(isset($_POST['submit'])){

 $update_sql = "UPDATE studentinfo SET clubname='$_SESSION['clubname']', dept ='$_SESSION['dept']', semester='$_SESSION['semester']' , admissionyear='$_SESSION['admissionyear']' , gender = '$_SESSION['gender']' , dob = '$_SESSION['dob']' , phone = '$_SESSION['phone']' , email = '$_SESSION['email']' WHERE username='$username'";

 $_SESSION['msg'] = "Updated Successfully.";
 //	array_push($msg, "<font color='#a94442'>Updated Successfully!</font>");


}

}

 ?>