<?php

include('app/init.php');
$Template->set_data('page_class', 'success');

// cria o objecto de Pagamento
include('app/models/m_payments.php');
$Payments = new Payments();

// executa o pagamento para finalizar
$payer_id = htmlspecialchars($_GET['PayerID']);
$payment_id = $_SESSION['payment_id'];
$results = $Payments->execute_payment($payer_id, $payment_id);

//echo '<pre>';
//print_r($results);
//exit;

$Template->set_data('name', $results->payer->payer_info->first_name . ' ' .
	$results->payer->payer_info->last_name);

// limpa o carrinho
$Cart->empty_cart();
$Template->set_data('cart_total_items', 0);
$Template->set_data('cart_total_cost', '0.00');

// busca a categoria da nav
$category_nav = $Categories->create_category_nav('');
$Template->set_data('page_nav', $category_nav);

$Template->load('app/views/v_public_success.php', 'Thanks!');






















