<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Home</title>
  <?php session_start();?>
</head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         function adicionarNovaDiv() {
          
          $.ajax({
            url: 'script/novadiv.php', // Caminho para o arquivo PHP que gera o HTML da nova div
            method: 'POST', // Ou 'POST', dependendo das suas necessidades
            success: function(div) {
              
                
                
                var noticias = document.getElementById('noticias');
                noticias.insertAdjacentHTML('beforeend',div);
               

              
              //$('#noticias').insertAdjacentHTML(div);
            },
            error: function(xhr, status, error) {
              console.log('Ocorreu um erro ao adicionar nva div');
              console.log(error);
            }
          });
        }

        
        
        $(document).ready(
          
          function() {
            adicionarNovaDiv();
            atualizarDados();
            
            
        });

        function atualizarDados() {
            $.ajax({
                url: 'script/buscanoticia.php',
                method: 'POST',
                dataType: 'json', 
              
                success: function(data) {  
                    
                    console.log(data);
                    console.log(data.length);
                    var imageUrl = 'data:image/jpeg;base64,' + data.imagem;
                    
                    $('#tituloNovaNoticia').html(data.titulo);
                    $('#conteudoNovaNoticia').html(data.conteudo);
                    $('#imagemNovaNoticia').attr('src',imageUrl);
                    $('#autorNovaNoticia').html(data.autor);
                    $('#publicadoNovaNoticia').html(data.publicado);

            

                    
                },
                error: function() {
                    console.log('Ocorreu um erro ao buscar os dados.');
                }
            });
           
        }

     
    </script>
<style>
    body {
    
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #363636;
    flex-direction: column;
    
  }
  
  
  #centro{
  
    background-color: #252525;
    color: white;
    text-align: center;
    width: 750px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    position: static;
    margin: 10px;
    padding: 10px;

  }
  #cima{
    display: inline-block;
    background-color: #252525;
    width: 750px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    margin: 10px;
    padding: 10px;
    position: static;
    color: white;
  }
  #superior{
    display:flex;
    grid-template-columns: 1fr 1fr;
   
  }

  a{
    width: 100px;
    height: 40px;
    font-size: 12px;
    margin-right: 15px;
    color: #252525;
  }
  #botoes{
    margin-top: 10px;
  }

  #titulo{

    padding-right: 50px;
    font-size: 30px;
    margin-right: 50px;

    
  }


  #noticias{
    display: flex;
  }

  #botaoPesquisa{
    background-color: #252525;
  }

  .meta{
    display: flex;
  }
  #pesquisa{
    margin-top: 15px;
    margin-left: 100px;
    padding-right: 30px;
    margin-right: 80px;
    
  }
  #banner{
    display:flex;
    font-size: large;
    overflow: auto;
  }

  #botaoPesquisa{
    color: white;
  }

  #apresentacao{
    font-size: 20px;
    text-align: center;
  }

  .texto{
    margin: 20px;
    background-color: #363636;
    padding: 15px;
    max-width: 300px;
    display:inline-block;
    word-wrap:break-word;
  }
  .novaNoticia{
    display: inline-flex;
    
  }
  
</style>
<body>
  <!--cima-->
  <div id="cima">
    <div id="superior">
     
      <div id="banner">
        <img src="images/logo50.png" alt="logo">
        <p id="nomeSite"></p>
      </div>
       <form id="pesquisa" method="post">
          <input type="text" name="pesquisar"></input>
          <input type="submit" id="botaoPesquisa" value="Pesquisar">
       </form>

        <div id="botoes">
          <?php
         
            if(!isset($_SESSION['tipoUser'])):
          ?>
          <a href="login.html">
            <img src="images/login30.png" alt="Logar">
          </a>
          <a href="cadastro.html">
            <img src="images/registrar30.png" alt="Cadastrar">
          </a>
          <?php
            endif;
            ?>
          <?php
          if(isset($_SESSION['tipoUser'])):
           if($_SESSION['tipoUser']=="adm"):
          ?>
          <a href="novanoticia.php">
            <img src="images/plus30.png" alt="Nova noticia">
          </a>
          <a href="telaeditarnoticia.php">
                <img src="images/edit30.png" alt="Nova noticia">
          </a>
          <?php
            endif;
          endif;
          ?>
          </div>
       </div>
       <div id="apresentacao">
       <p> Bem-vindo <?php if(isset($_SESSION['nome'])){ echo ', '.$_SESSION['nome'];} ?> </p>
       </div>
      </div>
      
      </div>
     
    </div>
    <!--cima-->
    <!--centro-->
    <div id="centro">
    
       <!--article noticias-->
      <div id="noticias">
        
     
      </div>
        <!--article noticias-->
    </div>
    <!--centro-->
</body>
</html>
<!--<article class="noticia">
        <div class="imagemNoticia">
          <img id="imgImagem" src="" style="margin : 20px;"></img>
        </div>
          <div class="texto">
            <div class="tituloNoticia"> <h1 id="h1Titulo">Titulo</h1> </div>
            <div class="conteudoNoticia"><p id="pConteudo"></p>
          </div>
            <div class="meta"><p id="publicado" style="margin-right : 30px; margin-left: 30px;"></p><p id="autor">Autor</p></div>
        </div>
        </article> -->


