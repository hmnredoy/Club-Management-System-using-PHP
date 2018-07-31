<div class="profile_container">
	<form action="" method="POST" enctype="multipart/form-data">
		<fieldset>
			<legend><?php echo  $_SESSION['full_name'] ; ?></legend>
			
			<table>
				<tr>
					<td>
						
						<div class="profile_1">
				<?php 
				echo'<div class="profileImage">'
				.'<img style="height:180px; width:146px; ;display: block; border:5px solid rgba(51, 51, 51, 0.8); margin-left: 2%;" src="../profile_images\\'.$_SESSION['avatar'].'" alt="profile image" />'.
			'</div>';			 
				?>
			</div>
				
				<input style="padding-left: 15px; padding-top: 5px;" type="file" name="fileToUpload" id="fileToUpload">
					

			<form method="post" action="server.php" >
				<div class="input-group">
					<label>Name</label>
					<input type="text" name="name" value="">
				</div>
				<div class="input-group">
					<label>Address</label>
					<input type="text" name="address" value="">
				</div>
				<div class="input-group">
					<button class="btn" type="submit" name="save" >Save</button>
				</div>
			</form>

					</td>


					<td>
						
						<div class="info_table">
				<table>
					<tr>
						<td><h4>ID :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['username'] ; ?></p></td>
						
					</tr>
					<tr>
						<td><h4>Joined Club :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['clubname'] ; ?></p></td>
						<td><span>
				<!-- <?php //echo'<div class="msg">'.$_SESSION['msg'].'</div>';
						 ?> --></span></td>
					</tr>
					<tr>
						<td><h4>Department :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['dept'] ; ?></p></td>
						<td>
							<a href="#">Edit</a>
						</td>

					
							
					
					</tr>
					<tr>
						<td><h4>Joined Semester :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['semester'] ; ?></p></td>
						<td>
							<a href="#">Edit</a>
						</td>
					</tr>
					<tr>
						<td><h4>Admission Year :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['admissionyear'] ; ?></p></td>
						<td>
							<a href="#">Edit</a>
						</td>
					</tr>
					<tr>
						<td><h4>Gender :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['gender'] ; ?></p></td>
						<td>
							<a href="#">Edit</a>
						</td>
					</tr>
					<tr>
						<td><h4>DOB :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['dob'] ; ?></p></td>
						<td>
							<a href="#">Edit</a>
						</td>
					</tr>
					<tr>
						<td><h4>Phone :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['phone'] ; ?></p></td>
						<td>
							<a href="#">Edit</a>
						</td>
					</tr>
					<tr>
						<td><h4>Email :</h4></td>
						<td class="info"><p><?php echo  $_SESSION['email'] ; ?></p></td>
						<td>
							<a href="#">Edit</a>
						</td>
					</tr>

					<tr>
						<td></td>
						<td><input type="submit" class="btn" id="submit" name="submit" value="Update Profile"></td>
					</tr>
								
				</table>
			</div>

					</td>
				</tr>

			</table>

			
			
		</fieldset>
	</form>
</div>

<style type="text/css">
	
	.profile_container{
	position: relative;
	left:20%;
	right:20%;
	top:20%;

	width: 55%;
	background-color: rgba(179, 179, 179,0.4);
	padding-top: 15px;
	padding-bottom: 2%;
	padding-left: 2%;
	padding-right: 2%;
	}

legend{
	font-size: 25px;
	font-weight: bold;

	}

	.info{
		padding-left: 20px;
		
	}

	.info p{
		font-size: 17px;
		font-weight: bold;
	}

	.profile_container h4{
		font-size: 17px;
		font-weight: normal;

	}

	
.btn, .info_table a {
	position: relative;
	
	cursor : pointer;
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
	font-size: 15px;
	background-color: rgba(51, 51, 51,0.6);
	color: #fff;
	border: 1px solid rgba(255, 255, 255, 0.15);
	box-shadow: 0 0 rgba(0, 0, 0, 0);
	border-radius: 2px;
	padding: 10px 30px;
	transition: 0.3s;
}

.btn:hover,
.btn:focus, .info_table a {
  background-color: rgba(51, 51, 51,1);
}




table{
	margin-top: 20px;
	margin-left: 10px;
}


.info_table a{


	text-decoration: none;
	color: #f2f2f2;
	/*border: 1px solid #4d4d4d;
	*/border-radius: 2px;
	background-color: rgba(51, 51, 51,0.6);
	padding: 2px 10px;
	margin: 5px 0;

}


.info_table a:hover{
	color: #f2f2f2;
	background-color: rgba(51, 51, 51,1);

}

.info_table{
	
	position: relative;
	margin-bottom: 5%;
	margin-left: 20%;


}

td h4, td p{
	border-bottom: 1px solid rgba(100,100,100,1);
}

select,
textarea,
input[type="text"],
input[type="password"]
{
  height:30px;
  width:100%;;
  display: inline-block;
  vertical-align: middle;
  height: 34px;
  padding: 0 10px;
  margin-top: 3px;
  margin-bottom: 10px;
  font-size: 15px;
  line-height: 20px;
  border: 1px solid rgb(255, 255, 255);
  background-color: rgba(255, 255, 255, 0.8);
  color: rgba(0, 0, 0, 0.7);
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 2px;
}

#submit{

	margin-top:10px;
	margin-left: 20%;

}

</style>