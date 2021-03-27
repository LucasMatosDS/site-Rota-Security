<?php
session_start();

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';

//recebemos nosso parâmetro vindo do form
	$parametro = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : null;
	$msg = "";

	 if($parametro == ""){

	 }else{

	//começamos a concatenar nossa tabela
 	$msg .= "<div class='table-responsive-md mt-4'>";
	$msg .= "<table class='table table-dark table-bordered table-hover table-condensed'>";
	 $msg .= "	<thead align='center'>";
	 $msg .= "		<tr>";
	 $msg .= "			<th scope='col'>Ações</th>";
	 $msg .= "			<th scope='col'>Nome</th>";
	 $msg .= "			<th scope='col'>E-mail</th>";
	 $msg .= "			<th scope='col'>Arquivo</th>";
	 $msg .= "			<th scope='col'>Descrição</th>";
	 $msg .= "		</tr>";
	 $msg .= "	</thead>";
	$msg .= "	<tbody>";

				//requerimos a classe de conexão

					try {

					   $cliDAO = new ClienteDAO();
						 $result = new Cliente();

						$resultado = $cliDAO->selecionar($parametro);
            $array = $cliDAO->buscarCliente();

						}catch (PDOException $e){
							echo $e->getMessage();
						}
						//resgata os dados na tabela
						if(count($resultado)){
							foreach ($resultado as $result){
								$caminho = "arquivos";
                $pasta = $caminho."/".$result['nome']."/";

	$msg .= "<tr>";
	$msg .= "<td align='center'><a href='$pasta$result[arquivo]' download class='btn border border-light text-dark' style='background: silver'><img src='img/download.png' title='Baixar Arquivo'></a>
			 </td>";
	$msg .="<td>".$result['nome']."</td>";
	$msg .="<td>".$result['email']."</td>";
	if(is_dir($caminho)){
		if(file_exists($pasta.$result['arquivo'])){
				 $msg .= "<td><a class='text-danger' style='font-size: 18px; text-style: bold; font-weight: bold;' href='$pasta"."$result[arquivo]' title='visualizar o arquivo'>$result[arquivo]</a><br>".
         "<a class='btn btn-danger' style='text-style: bold; font-weight: bold;' href='$pasta'>Visualizar Todos os Arquivos.</a></td>";

	  }else{
		$msg .= "<td class='text-danger'>Arquivo indisponível para <li class='text-light d-inline'>download</li> no momento.<br>";
    //verifica se a pasta está vazia.
    if(count(glob("$pasta/*")) === 0){

    }else{
      $msg .= "<a class='btn btn-danger' style='text-style: bold; font-weight: bold;' href='$pasta'>Visualizar Todos os Arquivos.</a></td>";
     }
	  }
}else{
	$msg .= "<td class='text-danger'>diretório <strong class='text-light'>$pasta</strong> não existe.</td>";
}
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
