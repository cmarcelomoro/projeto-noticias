<?php
    class NoticiaController{
        

        public function processaForm(){
            
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            include('noticiamodel.php');
            $model = new NoticiaModel();
            $model->titulo = $_POST['titulo'];
            $model->conteudo = $_POST['conteudo'];
            $imagem = $_FILES['imagem']['tmp_name'];

            $arquivo_temporario = $_FILES['imagem']['tmp_name'];
            $nome_arquivo = basename($_FILES['imagem']['name']);
            $diretorio_destino = 'arquivos/' . $nome_arquivo;

            $bytesImagem = file_get_contents($diretorio_destino);
            $model->imagem = $bytesImagem;
            
            if (!move_uploaded_file($arquivo_temporario, $diretorio_destino)) {
                die('O arquivo não pôde ser enviado. Por favor, tente novamente.');
                }
    
            }   
            include('noticiaDAO.php');
             $noticiaDAO = new noticiaDAO();
             $noticiaDAO->insert($model);
             
            
        }
        
        
        public function __construct($titulo, $imagem, $conteudo){
            $this->titulo = $titulo; 
            $this->imagem = $imagem;
            $this->conteudo = $conteudo;
        }
    }


    $titulo ='';
    $imagem = null;
    $conteudo ='';
    $noticia = new NoticiaController($titulo,$imagem,$conteudo);
    $noticia->processaForm();
    
    
    
    

?>