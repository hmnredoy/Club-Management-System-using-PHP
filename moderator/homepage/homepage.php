<?php 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}


?>



<!DOCTYPE html>
<html>
<?php  if (isset($_SESSION['username'])) : ?>



<?php include '../frame/head.php'; ?>
<?php include 'server.php'; ?>


<body id="home">

	<div id="wrapper">
		
		<?php include '../frame/aside.php'; ?>
		<?php include '../frame/header.php'; ?>

		<?php //include 'slider.php'; ?>

		<!--Container-->

		<div id="content">
			<?php include 'container.php'; ?>
				<?php include 'event_handler.php'; ?>
		</div>


		<?php include '../frame/footer.php'; ?>
		<?php endif ?>
	</div>

</body>

</html>

