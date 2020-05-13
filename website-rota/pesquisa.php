<?php

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';
include_once  'excluir.php';

//recebemos nosso parâmetro vindo do form
	$parametro = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : null;
	$msg = "";

	 if($parametro == ""){

	 }else{

	//começamos a concatenar nossa tabela
 	$msg .= "<div class='table-responsive-md'>";
	$msg .= "<table class='table table-dark table-bordered table-hover table-condensed'>";
	 $msg .= "	<thead align='center'>";
	 $msg .= "		<tr>";
	 $msg .= "			<th>Ações</th>";
	 $msg .= "			<th>Nome</th>";
	 $msg .= "			<th>E-mail</th>";
	 $msg .= "			<th>Descrição</th>";
	 $msg .= "		</tr>";
	 $msg .= "	</thead>";
	$msg .= "	<tbody>";

				//requerimos a classe de conexão

					try {

					   $cliDAO = new ClienteDAO();

						$resultado = $cliDAO->selecionar("select * from clientes WHERE cpf LIKE '$parametro%' and cpf != '000.000.000-00' and cpf != '111.111.111-11'");

						}catch (PDOException $e){
							echo $e->getMessage();
						}
						//resgata os dados na tabela
						if(count($resultado)){
							foreach ($resultado as $result) {

	$msg .= "<tr>";
	$msg .= "<td align='center'><a href='download.php?id=$result->id'  class='btn border border-light text-dark' style='background: silver'><img src='img/download.png' title='Baixar Arquivo'></a>
			 </td>";
	$msg .="<td>".$result['nome']."</td>";
	$msg .="<td>".$result['email']."</td>";
	$msg .="<td>".$result['descricao']."</td>";
	$msg .="</tr>";

		}

   	}else{

	$msg = "";
	$msg .="<h4 align='center'><strong>Sua pesquisa não retornou nenhum Registro!</strong></h4>";
						}
	$msg .="</tbody>";
	$msg .="</table>";
    $msg .= "</div>";
	//retorna a msg concatenada
	echo $msg;
 }

?>
