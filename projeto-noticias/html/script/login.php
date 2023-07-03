<?php
	include("conexao.php");
	
	if(isset($_POST['nome']) && isset($_POST['senha'])){
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		
	 	$sql = "SELECT * FROM pessoa WHERE nome = '$nome';";
		$resultado = $conexao->query($sql);
		
	 	if ($resultado->num_rows > 0) {
			while ($linha = mysqli_fetch_assoc($resultado)) {
				
				if(password_verify($senha, $linha['senha'])){
					//Se for adm
					if($linha["adm"]==1){
						session_start();
						$_SESSION['tipoUser'] = 'adm' ;
						$_SESSION['nome'] = $linha['nome'];
						$_SESSION['id']= $linha['id'];
						header('Location: ../index.php');
						return;
					}
					//Se for normal
					$_SESSION['tipoUser'] ='normal';
					header('Location: ../index.php');

	 			}
				
			}
			
		}else{
			echo '<p> A conta informada não existe. </p>';
		}

	}


?>