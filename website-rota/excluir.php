<?php
include_once 'dao/clienteDAO.class.php';

   if(isset($_GET['cpf'])){
         $cliDAO = new ClienteDAO();
         $cliDAO->deletarCliente($_GET['cpf']);
         $cliDAO->reiniciarId();
         header('location: dados.php');
   }

 ?>
