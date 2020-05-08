<?php

//receber os dados do formulário.
include_once 'dao/clienteDAO.class.php';
include_once 'restore.php';

$cliDAO = new clienteDAO();

$arquivo = $_FILES['arquivo'];
$banco = $arquivo['tmp_name'];

$servidor = $_POST['servidor'];
$usuario = $_POST['usuario_server'];
$senha = $_POST['senha_server'];
$dbname = $_POST['db_name'];

//criar conexao.
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

//ler os dados do arquivo e converter em string.
$dados = file_get_contents($banco);

//executar a query do backup
mysqli_multi_query($conn, $dados);
$_SESSION['msg'] = "<h6 style='color: green;'>Backup restaurado com sucesso!</h6>";
header("location: restore.php");
