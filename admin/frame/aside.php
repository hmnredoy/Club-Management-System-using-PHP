
</script>

<aside>
	<div id="sidebar">

		<div class="toggle-btn" onclick="toggleSidebar()">
			<span></span>
			<span></span>
			<span></span>
		</div>
			<div id="profileImage">
			
				<?php
				//for showing profile image
		
				echo'<div class="profile">'
						.'<img style="height:145px; width:145px; ;display: block;" src="../../profile_images\\admin.png" alt="profile image" />'.
					'</div>';
								 
				?>
				
				<h6 style="text-align: center; color: #fff;
				font-size: 13px;">Member Type : <p>Admin</p></h6>

				<span></span>
				<center><a href="../../profile/profile.php"><b style="font-size: 16px;"><?php echo  $_SESSION['admin_name'] ; ?></b></a>
				
				<span></span></center>
			</div>
	<div class="aside_list">
		<ul>
			<a href=""><li>Recent Events</li></a>
			<a href=""><li>Image Gallery</li></a>
			

		</ul>
	</div>
		
	</div>
</aside>

<style type="text/css">



	#profileImage p{
		text-align: center;
		color: #99cc00;
		font-size: 15px;
		font-family: 'Ubuntu';
	}




	



</style>





<script type="text/javascript">

//------Sidebar start------
	function toggleSidebar(){
		document.getElementById("sidebar").classList.toggle('active');
		
	}
//------Sidebar ends-----




</script>