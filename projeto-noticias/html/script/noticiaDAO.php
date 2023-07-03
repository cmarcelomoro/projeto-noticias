
<?php

    class noticiaDAO{
        
        function insert(NoticiaModel $noticia){
           
            include('conexao.php');
            session_start();
            if(isset($_SESSION['id'])){
                $idAutor = $_SESSION['id'];
            }

            $imagem = addslashes($noticia->imagem);
            
            $sql = "INSERT INTO noticia(titulo,imagem,conteudo,fk_autor) VALUES('$noticia->titulo','$imagem','$noticia->conteudo',$idAutor);";
            
            if ($conexao->query($sql) === TRUE) {
                
                print("dados_inseridos");
            
                header('Location: ../index.php');
 
            }
            else{
               print("erro_ao_inserir");
               print('<br>');
               print(mysqli_error($conexao));
            }
            
        }

        function delete($idNoticia){
            include('conexao.php');
            
            $sql = "DELETE FROM noticia WHERE id = $idNoticia;";
            if ($conexao->query($sql) === TRUE) {
                
                print("dados_deletados");
            
                header('Location: ../index.php');
 
            }
            else{
               print("erro_ao_deletar");
               print('<br>');
               print(mysqli_error($conexao));
            }
            

        }


        
    }
    ?>