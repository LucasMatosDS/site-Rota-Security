<?php
session_start();

 if(!isset($_SESSION['id'])){
      header('location: area_cliente.php');
      exit;
 }
 
include_once 'dao/clienteDAO.class.php';
$cliDAO = new ClienteDAO();
$cliDAO->deletarTabelas();

//código que deleta oque a dentro da pasta arquivos/
$caminho = "arquivos/";
system("rm -rf $caminho");

$_SESSION['del_t'] = "Tabelas deletadas com sucesso!";
header('location: restore.php');
