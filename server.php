<?php

session_start();

// variable declaration
$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";


include 'dbconnect.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
	// receive all input values from the form

	$clubID = mysqli_real_escape_string($db,$_POST['clubname']);
	$name = mysqli_real_escape_string($db,$_POST['name']);
	$dept = mysqli_real_escape_string($db,$_POST['dept']);
	$semester = mysqli_real_escape_string($db,$_POST['semester']);
	$gender = mysqli_real_escape_string($db,$_POST['gender']);

	$dob = mysqli_real_escape_string($db,$_POST['day']."/".$_POST['month']."/".$_POST['year']);

	$admissionyear = mysqli_real_escape_string($db,$_POST['admissionyear']);

	$phone = mysqli_real_escape_string($db,$_POST['phone']);
	//$avatar = mysqli_real_escape_string($db,$_POST['avatar']);


	
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($clubID)) { array_push($errors, "Club name is required"); }
	if (empty($name)) { array_push($errors, "Name is required"); }

	if (str_word_count($name)< 2 or !preg_match("/^[a-zA-Z ]*$/",$name))
	{
		array_push($errors, "Name should contain at least two words and should have upper case and or lower case letters.");
	}

	/*if(strlen($password)<6 or !preg_match('/^[a-zA-Z0-9]+$/',$password))
	{
		array_push($errors, "Password must be greater than 6 character and can contain letters and numbers.");
	}*/

	
	if (empty($username)) { array_push($errors, "University ID is required"); }
	

	$format = '/^[0-9]{2}-[0-9]{5}-[0-9]{1}$/';

	if (!preg_match($format, $username)) {
	    array_push($errors, "<font color='#a94442'>Invalid ID format. ID looks like XX-XXXXX-X.</font>");
	}


	if (empty($dept)) { array_push($errors, "Department is required"); }
	if (empty($dob)) { array_push($errors, "DOB is required"); }
	if (empty($admissionyear)) { array_push($errors, "Admission year is required"); }
	if (empty($phone)) { array_push($errors, "Phone number is required"); }
	else if(strlen($phone)!=11) { array_push($errors, "Phone number must contain 11 digits.");}
	if (empty($email)) { array_push($errors, "Email is required"); }
	else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) { array_push($errors, "Enter a valid Email."); }
	
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if(strlen($password_1)<6 or !preg_match('/^[a-zA-Z0-9]+$/',$password_1))
		{
			array_push($errors, "Password must be greater than 6 character and can contain letters and numbers.");
		}

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	//user existance check
	$user_qry = "SELECT * FROM studentinfo WHERE username='$username'";
	$chck_user = mysqli_query($db, $user_qry);


	if (mysqli_num_rows($chck_user) == 1) {

		array_push($errors, "User already exists.");	
	}

	//Email existance check
	$email_qry = "SELECT * FROM studentinfo WHERE email='$email'";
	$chck_email = mysqli_query($db, $email_qry);


	if (mysqli_num_rows($chck_email) == 1){

		array_push($errors, "This email has been used.");	
	}

	//Phone existance check
	$phone_qry = "SELECT * FROM studentinfo WHERE phone='$phone'";
	$chck_phone = mysqli_query($db, $phone_qry);


	if (mysqli_num_rows($chck_phone) == 1){

		array_push($errors, "Phone number is already used.");	
	}





	// register user if there are no errors in the form
	if (count($errors) == 0) {


		include 'registration/upload.php';
        $clb_query = "SELECT * FROM clubinfo WHERE club_ID='$clubID'";
		$clb_rslt = mysqli_query($db, $clb_query);


		if (mysqli_num_rows($clb_rslt) == 1) {

		while($row = mysqli_fetch_assoc($clb_rslt)) {


			$clubname = $row['club_Name'];
			
			}
			
		}


		//$password = md5($password_1);//encrypt the password before saving in the database
		$query = "INSERT INTO studentinfo (clubname, name, username, dept, semester, gender, dob, admissionyear, phone, email, password, avatar, dateTime, clubID)
								VALUES ('$clubname','$name','$username','$dept','$semester'
										,'$gender','$dob','$admissionyear','$phone','$email','$password_1','$target_file', now(),$clubID)";
		
		$query_2 = "INSERT INTO club_relation (club_ID, club_Name, user_ID)
		VALUES ('$clubID','$clubname','$username')";

		$reslt2 = mysqli_query($db, $query_2);
		

		$reslt = mysqli_query($db, $query);


		$_SESSION['avatar'] = $target_file;
		$_SESSION['username'] = $username;
		$_SESSION['name'] = $name;
		//$_SESSION['success'] = "Please login now";
	
		header('location: thank-you.php');
	

	}


}


// LOGIN USER
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "<font color='#a94442'>Username is required</font>");
	}


	$format = '/^[0-9]{2}-[0-9]{5}-[0-9]{1}|[0-9]{4}-[0-9]{3}-[0-9]{1}$/';

	if (!preg_match($format, $username)) {
	    array_push($errors, "<font color='#a94442'>Invalid ID format. ID looks like XX-XXXXX-X or XXXX-XXX-X.</font>");
	}


	if (empty($password)) {
		array_push($errors, "<font color='#a94442'>Password is required</font>");
	}

	$query_waiting = "SELECT * FROM studentinfo WHERE username='$username' AND password='$password' AND is_active='N'";
	$result_waiting = mysqli_query($db, $query_waiting);

	$query_deactivated = "SELECT * FROM studentinfo WHERE username='$username' AND password='$password' AND is_active='D'";
	$result_deactivated = mysqli_query($db, $query_deactivated);

		if (mysqli_num_rows($result_waiting) == 1) {

			array_push($errors, "<font size='2px' font color='#a94442'>Your account has not been activated.</font>");

			
		}

		if (mysqli_num_rows($result_deactivated) == 1) {

			array_push($errors, "<font size='2px' font color='#a94442'>Your account is deactivated. Please contact admin/moderator to reactivate your account.</font>");
	
		}


	if (count($errors) == 0) {


		//Admin check

		$admin_format = '/^[0-9]{4}-[0-9]{3}-[0-9]{1}$/';

		if (preg_match($admin_format, $username)) {

		$ad_query = "SELECT * FROM admininfo WHERE username='$username' AND password='$password'";
		$ad_results = mysqli_query($db, $ad_query);

		$mod_query = "SELECT * FROM moderatorinfo WHERE user_ID='$username' AND Password='$password'";
		$mod_results = mysqli_query($db, $mod_query);

		

		if (mysqli_num_rows($ad_results) == 1) {

		while($row = mysqli_fetch_assoc($ad_results)) {

			$_SESSION['admin_name'] = $row['name'];
			$_SESSION['admin_avatar'] = $row['avatar'];
			
			}
			
			$_SESSION['userType'] = "admin";
			$_SESSION['username'] = $username;
			//header("location: admin/index.php");
			
			header("Location: userRedirect.php?user=".$_SESSION['userType']);
		}

		if (mysqli_num_rows($mod_results) == 1) {

		while($row = mysqli_fetch_assoc($mod_results)) {

			$_SESSION['moderator_name'] = $row['Name'];
			$_SESSION['moderator_avatar'] = $row['Avatar'];
			$_SESSION['moderator_Club_ID'] = $row['Club_ID'];
			$_SESSION['moderator_Club_Name'] = $row['Club_Name'];
			
			}
			
			$_SESSION['userType'] = "moderator";
			$_SESSION['username'] = $username;
			//header("location: moderator/index.php");
			header("Location: userRedirect.php?user=".$_SESSION['userType']);
		}




	    
	}

		//$password = md5($password);
		$query = "SELECT * FROM studentinfo WHERE username='$username' AND password='$password' AND is_active='Y'";
		$results = mysqli_query($db, $query);

		

		if (mysqli_num_rows($results) == 1) {



			if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
				if(isset($_COOKIE["member_password"])) {
					setcookie ("member_password","");
				}
			}



			while($row = mysqli_fetch_assoc($results)) {

			$_SESSION['full_name'] = $row['name'];
			$_SESSION['avatar'] = $row['avatar'];
			$avatar = $row['avatar'];
			$_SESSION['clubname'] = $row['clubname'];
			$clubbID = $row['clubID'];
			$_SESSION['clubID'] = $row['clubID'];

		}
			$notice_qry = "SELECT * FROM notice_table WHERE club_ID ='$clubbID' ORDER BY id DESC LIMIT 1";

		$notice_rslt = mysqli_query($db, $notice_qry);

		if (mysqli_num_rows($notice_rslt) > 0) {

			while($row = mysqli_fetch_assoc($notice_rslt)) {

			$_SESSION['notice'] = $row['notice'];
			$_SESSION['notice_time'] = $row['time_date'];
			$_SESSION['notice_by'] = $row['posted_by'];
			$_SESSION['clubid'] = $row['club_ID'];
			$_SESSION['notice_id'] = $row['id'];
			
			}

		}
		else{

			$_SESSION['notice'] = "No Notice Posted.";
			$_SESSION['notice_time'] = "---";
			$_SESSION['notice_by'] = "---";
			
		}


		
		$_SESSION['username'] = $username;
		$_SESSION['userType'] = "student";
		//header("location: homepage/?id=".$_SESSION['username']);
		header("Location: userRedirect.php?user=".$_SESSION['userType']);
	

			
		}else {
			array_push($errors, "<font size='2px' font color='#a94442'>Wrong username/password combination.</font>");
		}
	

}

	
}


?>