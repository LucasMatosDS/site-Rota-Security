<?php
session_start();

include_once 'dao/clienteDAO.class.php';
$cliDAO = new clienteDAO();
$cliDAO->buscarTabelas();

//receber os dados do formulário
$arquivo = $_FILES['arquivo'];
$banco = $arquivo['tmp_name'];

$servidor = $_POST['servidor'];
$usuario = $_POST['usuario_server'];
$senha = $_POST['senha_server'];
$dbname = $_POST['db_name'];

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


if($conn){

//Ler os dados do arquivo e converter em string
$dados = file_get_contents($banco);

//Executar as query do backup
mysqli_multi_query($conn, $dados);

$_SESSION['msg'] = "Backup restaurado com sucesso!";

header("location: restore.php");

}else{

  $_SESSION['msgE'] = "Erro ao restaurar Backup!";
  header("location: restore.php");
}
