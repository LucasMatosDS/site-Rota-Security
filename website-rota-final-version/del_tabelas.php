<?php
session_start();
include_once 'dao/clienteDAO.class.php';
$cliDAO = new ClienteDAO();
$cliDAO->deletarTabelas();  

   $_SESSION['del_t'] = "Tabelas deletadas com sucesso!";
   echo "<script>location.replace('restore.php');</script>";
