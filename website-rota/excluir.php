<?php
include_once 'dao/clienteDAO.class.php';

   if(isset($_GET['id'])){
         $cliDAO = new ClienteDAO();
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

 ?>
