<?php

	include('app/init.php');
	$Template->set_data('page_class', 'product');
	
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		// mostra o produto
		
		$product = $Products->get($_GET['id']);
		
		if ( ! empty($product))
		{
            // passa a informação do produto para a vista
			$Template->set_data('prod_id', $_GET['id']);
			$Template->set_data('prod_name', $product['name']);
			$Template->set_data('prod_description', $product['description']);
			$Template->set_data('prod_price', $product['price']);
			$Template->set_data('prod_image', IMAGE_PATH . $product['image']);
		
			// cria a categoria da nav
			$category_nav = $Categories->create_category_nav($product['category_name']);
			$Template->set_data('page_nav', $category_nav);
			
			// mostra a vista
			$Template->load('app/views/v_public_product.php', $product['name']);
		}
		else 
		{
			// erro
			$Template->redirect(SITE_PATH);
		}
	}
	else
	{
		// erro
		$Template->redirect(SITE_PATH);
	}