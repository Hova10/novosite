<?php 

include('app/init.php');

if (isset($_POST))
{
	// cria o objecto pagamento
	include('app/models/m_payments.php');
	$Payments = new Payments();
	
    // busca a informação dos itens
	$items = $Cart->get();
	
	// busca os detalhes
	$details['subtotal'] = $Cart->get_total_cost();
	$details['shipping'] = 0;
	foreach ($items as $item)
	{
		$details['shipping'] += $Cart->get_shipping_cost($item['price']);
	}
	$details['shipping'] = number_format($details['shipping'], 2);
	$details['tax'] = number_format($details['subtotal'] * SHOP_TAX, 2);
	$details['total'] = number_format(
		$details['subtotal'] + $details['shipping'] + $details['tax'], 2);
		
	// envia para o PayPal
	$error = $Payments->create_payment($items, $details);
	if ($error != NULL)
	{
		$Template->set_alert($error, 'error');
		$Template->redirect('cart.php');
	}
}
else 
{
	$Template->redirect('cart.php');
}