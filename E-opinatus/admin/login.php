<?php
	session_start();
	require "connect.php";
	
    // Função para "limpar" os valores recebidos do formulário. Evita o "SQL injection"
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
    // Limpa os valores do POST
	$login = clean($_POST['user']);
	$password = clean($_POST['password']);
	
	//Cria o query
	$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";
	$result=mysql_query($qry);
	
	//Verifica se o query foi bem sucedido ou não
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login bem sucedido
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['user_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['position'];
			session_write_close();
			
			header("location: admin/index.php");
			exit();
		}else {
			//Login falhou
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>