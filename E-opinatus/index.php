<?php

include('app/init.php');

require("app/pagination/class_pagination.php");

// busca a página actual para a paginação
$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;

$pagination = null;

$Template->set_data('page_class', 'home');

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	// busca produtos de uma categoria específica
	$category = $Categories->get_categories($_GET['id']);
	
	// verifica se é válido
	if ( ! empty($category))
	{
		// busca a categoria da nav
		$category_nav = $Categories->create_category_nav($category['name']);
		$Template->set_data('page_nav', $category_nav);
		
		// busca todos os produtos dessa categoria
		$cat_products = $Products->create_product_table(4, $_GET['id'], $pagination);
		
		if ( ! empty($cat_products))
		{
			$Template->set_data('products', $cat_products);
		}	
		else 
		{
			$Template->set_data('products', '<li>No products exist in this category!</li>');	
		}
		$Template->load('app/views/v_public_home.php', $category['name']);


	}
	else 
	{
		// se a categoria não é válida
		$Template->redirect(SITE_PATH);	
	}
}
else 
{
	// busca todos os produtos de todas as categorias	
	
	// busca a categoria da nav
	$category_nav = $Categories->create_category_nav('home');
	$Template->set_data('page_nav', $category_nav);
	
	// busca os produtos
	$products = $Products->create_product_table();
	$Template->set_data('products', $products);
	
	$Template->load('app/views/v_public_home.php', 'E-Opinatus');
    
    
}