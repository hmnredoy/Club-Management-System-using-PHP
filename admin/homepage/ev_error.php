<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>

<style type="text/css">
	
	.error {
	color: #fff;
	background-color: #CF4847;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin: 15px 33% 0 33%;
	text-align: center;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
	border: 2px dashed #fff;
}
</style>