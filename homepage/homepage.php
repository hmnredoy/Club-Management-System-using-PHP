<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

	/*if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../login.php");
	}*/

?>



<!DOCTYPE html>
<html>
<?php  if (isset($_SESSION['username'])) : ?>

<?php include '../frame/head.php'; ?>
<?php include 'server.php'; ?>


<body id="home">

<?php include'top-bar.php'; ?>
<?php include '../frame/header.php'; ?>
<?php include '../frame/aside.php'; ?>

<?php include 'slider.php'; ?>

<!--Container-->

<?php include '../frame/messageBox.php'; ?>
<?php include 'container.php'; ?>

<?php// include '../frame/footer.php'; ?>
<?php include '../frame/members.php'; ?>
<?php endif ?>

</body>


<script>


//---------Slider Start---------
   let sliderImages = document.querySelectorAll('.slide'),
   arrowLeft = document.querySelector('#arrow-left'),
   arrowRight = document.querySelector('#arrow-right'),
   current = 0;

   // Clear all images
   function reset(){
   	for(let i = 0; i < sliderImages.length; i++){
   		sliderImages[i].style.display = 'none';
   	}
   }

   // Init slider
   function startSlide(){
   	reset();
   	sliderImages[0].style.display = 'block';
   }

   // Show prev
	function slideLeft(){
		reset();
		sliderImages[current - 1].style.display = 'block';
		current--;
	}


	//Show next
	function slideRight(){
		reset();
		sliderImages[current+1].style.display = 'block';
		current++;
	}


	// Left arrow click
	arrowLeft.addEventListener('click', function(){
		if(current === 0){
		current = sliderImages.length;
		}
		slideLeft();
	});

	// Right arrow click
	arrowRight.addEventListener('click', function(){
		if(current === sliderImages.length - 1){
		current = -1;
		}
		slideRight();
	});

   startSlide();

//--------Slider Ends--------

</script>

</html>

