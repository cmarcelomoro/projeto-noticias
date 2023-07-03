
<?php

        function buscar(){
        include('conexao.php');
        $sql= "SELECT titulo,conteudo,imagem,nome as autor,CONCAT(DAY(datapublicacao), '-',
        MONTH(datapublicacao), '-',
        YEAR(datapublicacao)) AS publicado 
        FROM noticia
        inner join pessoa on noticia.fk_autor=pessoa.id;";
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0) {
            $dados = array();
            while ($linha = mysqli_fetch_assoc($resultado)) {
                
                 $dadosArray['titulo'] = $linha['titulo'];
                 $dadosArray['conteudo'] = $linha['conteudo'];
                 $dadosArray['imagem'] = base64_encode($linha['imagem']);
                 $dadosArray['autor'] = $linha['autor'];
                 $dadosArray['publicado'] = $linha['publicado'];
                           
            }  
               $json = json_encode($dadosArray,JSON_UNESCAPED_UNICODE);
                header('Content-Type: image/jpg');
                print($json);
                $conexao->close();
                
                }else{
                print('n deu');
            }
           
       }

      


       buscar();

?>