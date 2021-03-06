<?php
session_start();
ob_start();

include_once "dao/clienteDAO.class.php";
$cliDAO = new ClienteDAO();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Website Rota">
  <meta name="keywords" content="HTML,CSS,Bootstrap">
  <meta name="author" content="Lucas Matos">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="shortcut icon" type="image/x-icon" href="img/icon-rota.ico">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Rota</title>
</head>

<body class="animated fadeIn">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="#"><img src="img/logo-rota.png" title="Rota-Security" class="animated pulse zoom" alt="Logo indisponível"></a>
    <button class="navbar-toggler rounded border-0" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <img src="img/menu.svg">
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?#cont1">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sair.php">Area do CLiente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato.php">Contato</a>
        </li>
      </ul>
    </div>
  </nav>

  <div id="cadastre_se" class="container texto cadastro">
    <div class="card-body">
        <a href="gerenciar_imagens.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">editar imagem</h3>
          </li>
          <hr>
        </div>
     <form method="POST" action="" name="dadosArquivo" enctype="multipart/form-data">
       <div class="form-group col-md-8">
           <label>Selecione a nova imagem:</label>
           <input type="file" name="foto" id="arquivo" accept=".png,.jpg,.jpeg" required="true" onchange="ValidarTamanhoArquivo(this)">
          </div>
        <button id="btn-enviar" type="submit" name="salvar" class="btn mr-2 button-form ml-3">Salvar</button>
        <button id="btn-limpar" type="reset" name="limpar" class="btn mr-2 button-form">
   Cancelar</button>
      </div>
     </form>

 <?php

  if(isset($_SESSION['msg'])){
     echo $_SESSION['msg'];
      unset($_SESSION['msg']);
  }
 ?>

 <?php

    if(isset($_POST['salvar'])){

          include_once 'model/imagem.class.php';
          include_once 'dao/clienteDAO.class.php';
          $img = new Imagem();

          $fotos = array();
          $caminho = "imagens/";
          chmod($caminho, 0777);

        if(isset($_FILES['foto'])){
          $imagem = $_GET['imagem'];

          if(file_exists($caminho.$imagem)){
                unlink($caminho.$imagem);

             //salvando dentro da pasta img.
            $img->imagem = sha1($_FILES['foto']['name']).".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
               move_uploaded_file($_FILES['foto']['tmp_name'], $caminho.$img->imagem);
            ?>

            <div class="alert alert-info alert-dismissible" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Imagem alterada com sucesso!</strong>
            </div>

            <?php

                if(!empty($_FILES['foto']['name'])){

          }else{
             echo "erro ao deletar $imagem";
          }

        }else{

          $img->imagem = sha1($_FILES['foto']['name']).".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
             move_uploaded_file($_FILES['foto']['tmp_name'], $caminho.$img->imagem);
           ?>
           <div class="alert alert-warning alert-dismissible" role="alert">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Ops! notei que a imagem a ser alterado não existe ou não está cadastrado na base de dados. más não se preocupe irei fazer isso para você.</strong>
           </div>
           <div class="alert alert-success alert-dismissible" role="alert">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Imagem inserida com sucesso!</strong>
           </div>

           <?php
        }
                //inserindo dentro da variavel fotos o nome da imagem.
                array_push($fotos, $img->imagem);

            $cliDAO = new ClienteDAO();
            $cliDAO->alterarImagem($img,$imagem);

            $img->__destruct();
  }
}


  ?>
  <script type="text/javascript">
  function ValidarTamanhoArquivo(file){
      var FileSize = file.files[0].size / 1024 / 1024; // in MB
      if(FileSize > 19){
          alert('Arquivo excede 20MB.');
          $(file).val(''); //for clearing with Jquery
      } else {

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
