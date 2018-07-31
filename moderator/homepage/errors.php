<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>

<style type="text/css">
	
	.error {
	width: 300px; 
	margin-left: 40%;
	margin-right: 40%;
	border: 1px solid #a94442; 
	border-radius: 2px; 
	text-align: center;
	color: #b35c00;
	background-color: #ffe6cc;
	padding: 5px 0;
	
}
}
</style>