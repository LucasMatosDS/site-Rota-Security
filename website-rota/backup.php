<?php
session_start();

 if(!isset($_SESSION['id'])){
      header('location: area_cliente.php');
      exit;
 }
 
// Incluindo o autoload do Composer para carregar a biblioteca
require_once 'vendor/autoload.php';

// Incluindo a classe que criamos
require_once 'model/BackupDatabase.php';

// Como a geração do backup pode ser demorada, retiramos
// o limite de execução do script
set_time_limit(0);

// Utilizando a classe para gerar um backup na pasta 'backups'
// e manter os últimos dez arquivos

$backup = new BackupDatabase('backups', 10);
$backup->setDatabase('localhost', 'rota', 'root', '');
$backup->generate();

echo "<script>setTimeout(function(){location.href='./dados.php'} , 2000);</script>";




