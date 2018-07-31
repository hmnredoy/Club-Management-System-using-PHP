<header>
	<div class="headbar">
		<div class="row">
		<?php include 'menu.php'; ?>
		</div>
	</div>
	<div class="clear"></div>
</header>

<?php 

$expiry = 1800;//session expiry required after 30 mins (30*60)
    if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {
    	$_SESSION = array();

	 	unset($_SESSION);
        session_unset();
        session_destroy();
        header("Location:../index.php");
    }
    $_SESSION['LAST'] = time();


 ?>