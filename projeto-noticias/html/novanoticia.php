<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Criar nova noticia</title>
</head>
<body>

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
		<form  action="script/noticiacontroller.php" method="POST" enctype="multipart/form-data" accept=".jpg">		
			<h1>Nova notícia</h1>
			<p>Título:</p>
			<input type="text" id="titulo" name="titulo" required>
			<br>
			<br>
			<p>Conteúdo:</p>
			<textarea type="text" id="conteudo" name="conteudo" required></textarea>
            <br>
            <br>
			<p>Imagem:</p>
			<input type="file" id="imagem" name="imagem" required>
            <br>
            <br>
			<input type="submit" value="Inserir" id="botaoInserir">
			<a href="index.php"> Voltar </a>
		</form>
		
		
	
	
	</div>
	

</body>
</html>