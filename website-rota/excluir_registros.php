<?php
         include_once 'dao/clienteDAO.class.php';

         $cliDAO = new ClienteDAO();
         $cliDAO->deletarTodosOsRegistros();
         $cliDAO->reiniciarId();

         $caminho = "arquivos/";
         system("rm -rf $caminho");
         header('location: dados.php');
 ?>
