<?php
include_once 'dao/clienteDAO.class.php';
$cliDAO = new ClienteDAO();

   if(isset($_GET['id'])){
     $caminho = "arquivos/";
     $arquivo = $_GET['arq'];
     if(file_exists($caminho.$arquivo)){
         //automaticamente excluiu o arquivo do diretório.
         unlink($caminho.$arquivo);
         $cliDAO->deletarCliente($_GET['id']);
         $cliDAO->reiniciarId();
         echo "<script>location.replace('dados.php');</script>";
       }else{
         $cliDAO->deletarCliente($_GET['id']);
         $cliDAO->reiniciarId();
         echo "<script>location.replace('dados.php');</script>";
    }
   }

   if(isset($_GET['imagem'])){
     $caminho = "imagens/";
     $imagem = $_GET['imagem'];

     if(file_exists($caminho.$imagem)){
        //automaticamente excluiu o arquivo do diretório.
        unlink($caminho.$imagem);
        $cliDAO->deletarImagem($_GET['imagem']);
        $cliDAO->reiniciarId();
        echo "<script>location.replace('gerenciar_imagens.php');</script>";
     }else{
        $cliDAO->deletarImagem($_GET['imagem']);
        $cliDAO->reiniciarId();
        echo "<script>location.replace('gerenciar_imagens.php');</script>";
   }
 }

 if(isset($_GET['postagem'])){
    $cliDAO->deletarPostagem($_GET['postagem']);
    echo "<script>location.replace('gerenciar_postagens.php');</script>";
  }

  if(isset($_GET['arq'])){
    $arquivo = $_GET['arq'];
    unlink($arquivo);
    echo "<script>location.replace('visualizacao.php');</script>";
  }else{
      echo "erro ao deletar $arquivo Arquivo não existe na Pasta $arquivo.";
  }
 ?>
