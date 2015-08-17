<?php

/*
	Definições de configuração básicas
*/

// conexão à base de dados
$server = 'hostingmysql325.amen.pt';
$user = 'opinatus_bruno';
$pass = 'Dplatt10';
$db = 'tutshop';
$Database = new mysqli($server, $user, $pass, $db);

// error reporting
mysqli_report(MYSQLI_REPORT_ERROR);
ini_set('display_errors', 1);

// definição das constantes
define('SITE_NAME', 'E-Opinatus');
define('SITE_PATH', 'http://brunofeijao.com/E-opinatus/');
define('IMAGE_PATH', 'http://brunofeijao.com/E-opinatus/resources/images/');

define('SHOP_TAX', '0.0875');

define('PAYPAL_MODE', 'sandbox'); // ou sandbox ou live
define('PAYPAL_CURRENCY', 'USD'); 
define('PAYPAL_DEVID', 'ARnO8hC76PHEzD1uF-rpd_-Hzej82iwHgeXytAAiT6tBILhKDzEJ9WCyjtjU'); 
define('PAYPAL_DEVSECRET', 'EFU5bRDKReP42pwx4RUZKHbKWS6C3FQUye9vFHrE-SJ6Zi0Y4wtmhPfb4kUZ'); 
define('PAYPAL_LIVEID', ''); 
define('PAYPAL_LIVESECRET', ''); 

// inclusão dos objectos
include($_SERVER['DOCUMENT_ROOT'] . 'E-opinatus/app/models/m_template.php');
include($_SERVER['DOCUMENT_ROOT'] . 'E-opinatus/app/models/m_categories.php');
include($_SERVER['DOCUMENT_ROOT'] . 'E-opinatus/app/models/m_products.php');
include($_SERVER['DOCUMENT_ROOT'] . 'E-opinatus/app/models/m_cart.php');

// criação dos objectos
$Template = new Template();
$Categories = new Categories();
$Products = new Products();
$Cart = new Cart();


session_start();


// global
$Template->set_data('cart_total_items', $Cart->get_total_items());
$Template->set_data('cart_total_cost', $Cart->get_total_cost());


