<?php

$dbhost = "hostingmysql325.amen.pt";
$dbname = "tutshop";
$dbuser = "opinatus_bruno";
$dbpass = "Dplatt10";

//	Conexão
global $search_db;

$search_db = new mysqli();
$search_db->connect($dbhost, $dbuser, $dbpass, $dbname);
$search_db->set_charset("utf8");

//	Verifica Conexão
if ($search_db->connect_errno) {
    printf("Connect failed: %s\n", $search_db->connect_error);
    exit();
}

/* ------------------------------------------
  Search Functionality
--------------------------------------------- */

// Define o output em HTML
$html = '';
$html .= '<li class="result">';
$html .= '<a href="urlString">';
$html .= '<h3>nameString</h3>';
$html .= '<h4>functionString</h4>';
$html .= '</a>';
$html .= '</li>';

// Busca a Search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $search_db->real_escape_string($search_string);


// Verifica se a pesquisa tem mais que 1 caracter
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	// Constrói o Query
	$query = 'SELECT * FROM products WHERE name LIKE "%'.$search_string.'%" OR description LIKE "%'.$search_string.'%"';

	// Efectua a Search
	$result = $search_db->query($query);
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
	}

	// Verifica se temos resultados
	if (isset($result_array)) {
		foreach ($result_array as $result) {

			
			// Formata os Output Strings e sublinha os resultados
			$display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['name']);
			$display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['description']);
            $display_url = 'http://brunofeijao.com/E-opinatus/product.php?id='.urlencode($result['id']);

			// Insere o Nome
			$output = str_replace('nameString', $display_name, $html);

			// Insere a descrição
			$output = str_replace('functionString', $display_function, $output);

			// Insere o URL
			$output = str_replace('urlString', $display_url, $output);

			// Output
			echo($output);
		}
	}else{

		// Formato se não houver resultados
		$output = str_replace('urlString', 'javascript:void(0);', $html);
		$output = str_replace('nameString', '<b>No Results Found.</b>', $output);
		$output = str_replace('functionString', 'Sorry :(', $output);

		// Output
		echo($output);
	}
}



?>