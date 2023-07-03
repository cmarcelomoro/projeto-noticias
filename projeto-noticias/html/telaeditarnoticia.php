<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Deletar noticia</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
			function atualizarDados() {
				$.ajax({
					url: 'script/buscaportitulo.php',
					method: 'POST',
					dataType: 'json', 
				
					success: function(data) {  
						
						console.log(data);
						
						//var imageUrl = 'data:image/jpeg;base64,' + data.imagem;
						
						$('#titulo').html(data.titulo);
						$('#conteudo').html(data.conteudo);
						//$('#imagem').attr('src',imageUrl);
					
						
					},
					error: function() {
						console.log('Ocorreu um erro ao buscar os dados.');
					}
				});
			
			}     
    </script>

	<style>

		body{
			color: white;
			background-color: #252525;
			display: flex;
			justify-content: center;
			
		}
		form{
			
			background-color:#363636;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
			padding: 35px;
		}
		
		a{
			color: white;
			
		}
		#botaoEntrar{
			margin-right: 30px;
		}

	</style>
	<div class="centro">
		<form  id="formulario" method="POST">		
			<h1>Editar notícia</h1>
			<p>Título:</p>
			<input type="text" id="titulo" name="titulo" required>
			<br>
            <br>
			<p>Conteúdo:</p>
			<textarea id="conteudo"></textarea>
			<br>
			<br>
			<input type="submit" value="Alterar" id="botaoAlterar" onclick="atualizarDados()"> 
		
			
            </input>
            <a href="script/deletarnoticiascript.php">
                <img src="images/x30.png" alt="Deletar">
            </a>
			<a href="index.php"> Voltar </a>
		</form>
       
		
	
	
	</div>
	

</body>
</html>