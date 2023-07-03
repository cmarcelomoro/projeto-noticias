<?php
	$ip = "localhost";
	$usuario = "root";
	$senha = "";
	
	$conexao = new mysqli($ip, $usuario, $senha);
	mysqli_set_charset($conexao, 'utf8');
	//conexão com o banco
		$conexao->select_db("dbnoticias");
		
		if ($conexao->connect_error) {
			die("Conexão falhou: " . $conexao->connect_error); // Termina se houver algum problema
		}
	
	

?>