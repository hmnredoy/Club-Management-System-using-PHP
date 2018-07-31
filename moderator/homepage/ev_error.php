<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>

<style type="text/css">
	
	.error {
	color: #b35c00;
	background-color: #ffe6cc;
	padding: 5px 0;
	border-radius: 2px;
	width:300px;
	margin: 20px 0 10px 35%;
	text-align: center;
}
}
</style>