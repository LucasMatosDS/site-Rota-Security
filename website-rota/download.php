<?php

 include_once 'dao/clienteDAO.class.php';
 include_once 'model/cliente.class.php';

	 $cliDAO = new ClienteDAO();
	 $cli = new cliente();

if(isset($_GET['id']) && !empty($_GET['id'])){

   $id = $_GET['id'];
	 $array = $cliDAO->buscarArquivo($id);
   $array = $cliDAO->buscarDadosCliente($id);
	 $local = "arquivos".$cli->nome_arq;

	 readfile($local);
	 if($local = fopen($local, 'r') && $local = fopen($local, 'w')){
	 	echo "tem acesso!<br>";
	 	echo "pode editar!";
	 }else{
	 	echo "Erro: você não tem permissão para editar o arquivo!";
	 }

	foreach($array as $cli){

		?>

	 <!DOCTYPE html>
	 <html>
	 <head>
  <meta charset="utf-8">
  <meta name="description" content="Website Rota">
  <meta name="keywords" content="HTML,CSS,Bootstrap">
  <meta name="author" content="Lucas Matos">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="shortcut icon" type="image/x-icon" href="img/icon-rota.ico">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	 	<title>Rota</title>
	 </head>
	 <body>
     <strong><?php echo $cli-> __toString();?></strong>
	 	<iframe src="arquivos/<?php echo $cli->nome_arq['arq'];?>" width="300px" height="300px"></iframe>
		<a class="btn btn-primary" id="download" onclick="baixarImagem()" download>Download</a>

	 <script type="text/javascript">

	function baixarImagem(){
		var img =  confirm('voce desejá fazer o donwload do arquivo ?');

		 if(img == true){
		 $('a#download').attr({target: '_blank',
                    href  : 'arquivos/<?php echo $cli->nome_arq['arq'];?>'});
                    // window.location.href = 'download.php';


		 }else if(img != true){

		 }
	}
	 </script>

  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

	 </body>
	 </html>

	  	<?php
	}

}else{

   header("location: dados.php");

}
