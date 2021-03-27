<?php
session_start();

// Incluindo o autoload do Composer para carregar a biblioteca
require_once 'vendor/autoload.php';

// Incluindo a classe que criamos
require_once 'model/BackupDatabase.php';

// Utilizando a classe para gerar um backup na pasta 'backups'
// e manter os últimos dez arquivos

$backup = new BackupDatabase('backups', 10);
//$backup->setDatabase("sql307.epizy.com:3306	
//","epiz_27287140_rotateste", "epiz_27287140", "ipcxJiBhxU");
$backup->setDatabase('localhost', 'rota', 'root', '');
$backup->generate();

echo "<script>setTimeout(function(){location.href='./dados.php'} , 4000);</script>";
