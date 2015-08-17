<?php include("includes/public_header.php"); global $pagination; ?>

<div id="content">
	<h2 class="title text-center">Latest Products</h2>
	<?php  		
		//mostra a paginação
		if($pagination != null)
			$pagination->pagination(); 
		?>
	<ul class="alerts">
		<?php $this->get_alerts(); ?>
	</ul>
	
	<p><?php $this->get_data('header'); ?></p>
	
	<ul class="products">
		<?php $this->get_data('products'); 		 
		?>
	</ul>
<?php  		
        //mostra a paginação
		if($pagination != null)
			$pagination->pagination(); 
		?>
</div>
<?php include("includes/public_footer.php"); ?>



