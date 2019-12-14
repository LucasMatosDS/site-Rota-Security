<?php
   if(isset($_GET['cpf'])){
     $cliDAO = new ClienteDAO();
         $cliDAO->deletarCliente($_GET['cpf']);
         header('location: dados.php');
   }
 ?>
