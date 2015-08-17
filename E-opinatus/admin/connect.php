<?php
$db_host		= 'hostingmysql325.amen.pt';
    $db_user		= 'opinatus_bruno';
    $db_pass		= 'Dlatt10';
    $db_database	= 'tutshop'; 

$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');
    mysql_select_db($db_database,$link);
    mysql_query("SET names UTF8");
    $currency = 'USD';
?>
