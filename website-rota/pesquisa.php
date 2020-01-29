<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "rota";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';
include_once  'excluir.php';

$cliDAO = new ClienteDAO();
$array = $cliDAO->buscarCliente();

$resultado = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "select * from clientes where cpf like '%$resultado%' LIMIT 20";
$resultado_user = mysqli_query($conn, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0)){
	 while($row_user = mysqli_fetch_assoc($resultado_user)){
	  foreach($array as $cli){
		 echo "
			 <tr>".
			 "<td><a href='' class='btn btn-warning border border-light text-dark'><img src='img/download.png' title='Baixar Arquivo'></a>
			 <a href='area_privada.php?cpf='$cli->cpf' class='btn btn-danger border border-light text-dark btn-deletar' onclick='return verificarExclusaoPeloCPF();' title='Excluir Registro'><img src='img/trash.svg' onclick='window.location.href = 'excluir.php'';></a></td>
			 ".
			 "<td>".$row_user['nome']."</td>".
			 "<td>".$row_user['cpf']."</td>".
			 "</tr>";
		   }
		 }

}else{
	echo "Nenhum cliente encontrado ...";
}

?>
