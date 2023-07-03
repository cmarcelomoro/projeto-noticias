<?php
	include("conexao.php");
	 if(isset($_POST['nome']) && isset($_POST['senha'])){
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
	 	$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

		if(isset($_POST['token'])){
			
			$token = $_POST['token'];

			if($token == '123'){
				$nome = $_POST['nome'];
				$senha = $_POST['senha'];
				$senhaHash = password_hash($senha, PASSWORD_DEFAULT);
				
				 $sqlADM = "INSERT INTO pessoa (nome, senha, adm) VALUES ('$nome','$senhaHash',1)";

				 if ($conexao->query($sqlADM) === TRUE) {
					print("dados_inseridos");
				}
				else{
				   print("erro_ao_inserir");
				}
			   return;
			}else{
				print("erro_post");
				
		   }
		}
	
	 	$sql = "INSERT INTO pessoa (nome, senha) VALUES ('$nome','$senhaHash')";
			
			if ($conexao->query($sql) === TRUE) {
				print("dados_inseridos");
			}
			else{
				print("erro_ao_inserir");
			}
	}



?>