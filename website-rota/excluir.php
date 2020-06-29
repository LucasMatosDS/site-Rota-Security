<?php
include_once 'dao/clienteDAO.class.php';

   if(isset($_GET['id'])){
         $cliDAO = new ClienteDAO();
         $caminho = "arquivos/";
         $arquivo = $_GET['arq'];
         unlink($caminho.$arquivo);
         $cliDAO->deletarCliente($_GET['id']);
         $cliDAO->reiniciarId();
         header('location: dados.php');
   }

   if(isset($_GET['imagem'])){
     $cliDAO = new ClienteDAO();
     $caminho = "imagens/";
     $imagem = $_GET['imagem'];

     if(file_exists($caminho)){
        unlink($caminho.$imagem);
        $cliDAO->deletarImagem($_GET['imagem']);
        $cliDAO->reiniciarId();
        header('location: gerenciar_imagens.php');
     
     }else{

        echo "erro ao deletar $imagem";

   }
 }

 if(isset($_GET['postagem'])){
    $cliDAO = new ClienteDAO();
    $cliDAO->deletarPostagem($_GET['postagem']);
    header('location: gerenciar_postagens.php');

  }
 ?>
