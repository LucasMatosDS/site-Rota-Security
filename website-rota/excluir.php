<?php
include_once 'dao/clienteDAO.class.php';

   if(isset($_GET['cpf'])){
         $cliDAO = new ClienteDAO();
         $cliDAO->deletarCliente($_GET['cpf']);
         $cliDAO->reiniciarId();
         header('location: dados.php');
   }

   if(isset($_GET['imagem'])){
       $cliDAO = new ClienteDAO();
       $cliDAO->deletarImagem($_GET['imagem']);
       $cliDAO->reiniciarId();
       header('location: gerenciar_imagens.php');
   }

 ?>
