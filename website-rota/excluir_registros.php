<?php
session_start();
 if(!isset($_SESSION['id'])){
 	  header('location: area_cliente.php');
 	  exit;
 }
         include_once 'dao/clienteDAO.class.php';

         $cliDAO = new ClienteDAO();
         $cliDAO->deletarTodosOsRegistros();
         $cliDAO->reiniciarId();

         $caminho = "arquivos/";
         system("rm -rf $caminho");
         header('location: dados.php');
 ?>
