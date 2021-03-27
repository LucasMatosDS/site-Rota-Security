<?php
session_start();
 if(!isset($_SESSION['id'])){
    echo "<script>location.replace('area_cliente.php');</script>";
 	  exit;
 }
         include_once 'dao/clienteDAO.class.php';

         $cliDAO = new ClienteDAO();
         $cliDAO->deletarTodosOsRegistros();
         $cliDAO->reiniciarId();

         $caminho = "arquivos/";
         //código que chama função que deleta oque a dentro da pasta arquivos/
         //$del->deltree($caminho);
         unlink($caminho);
         //código que cria novamente o diretório e habilita as permissões necessárias para inserção de arquivos.
          mkdir($caminho);
          //definindo as permissões.
          chmod($caminho, 0777);

         echo "<script>location.replace('dados.php');</script>";
 ?>
