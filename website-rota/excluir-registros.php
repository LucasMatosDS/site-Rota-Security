<?php
         include_once 'dao/clienteDAO.class.php';
         $cliDAO = new ClienteDAO();
         $cliDAO->deletarTodosOsRegistros();
         $cliDAO->reiniciarId();
         header('location: dados.php');
 ?>
