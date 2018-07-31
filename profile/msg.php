<?php  if (count($msg) > 0) : ?>
	<div class="msg">
		<?php foreach ($msg as $ms) : ?>
			<p><?php echo $ms ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>

<style type="text/css">
	
	.msg {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: center;
}
}
</style>