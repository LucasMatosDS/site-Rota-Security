<?php
session_start();
include_once 'dao/clienteDAO.class.php';
$cliDAO = new ClienteDAO();
$cliDAO->deletarTabelas();

//código qie deleta oque a dentro da pasta arquivos/
$caminho = "arquivos/";
system("rm -rf $caminho");

$_SESSION['del_t'] = "Tabelas deletadas com sucesso!";
header('location: restore.php');
