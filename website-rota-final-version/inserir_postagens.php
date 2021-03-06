<?php
session_start();
ob_start();

include_once 'dao/clienteDAO.class.php';
$cliDAO = new ClienteDAO();
$cliDAO->cadastrarIdPostagem();
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

<body>
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

  <div id="cadastre_se" class="container texto cadastro w-75">
    <div class="card-body">
        <a href="dados.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">inserir postagem</h3>
          </li>
          <hr>
        </div>
     <form method="POST" enctype="multipart/form-data">
      <label>insira o título da pstagem:</label>
      <input type="text" class="form-control col-md-4 mb-2"  style="font-weight: bold;" name="titulo" placeholder="informe o titulo da postagem" autocomplete="off" required>
      <label>insira o conteudo da postagem:</label>
      <textarea class="form-control mb-2" id="postagem" name="conteudo" maxlength="3000" placeholder="ESCREVA AQUI ..." autocomplete="off" required></textarea>
      <div class="form-group col-md-8">
          <label>Selecione a imagem:</label>
          <input type="file" name="foto[]" id="arquivo" accept=".png,.jpg,.jpeg" style="display: block" multiple onchange="ValidarTamanhoArquivo(this)">
         </div>
        <button id="btn-enviar" type="submit" name="cadastrar" class="btn mr-2 button-form ml-3">Cadastrar</button>
        <button id="btn-limpar" type="reset" name="limpar" class="btn mr-2 button-form">
   Cancelar</button>
      </div>
     </form>

 <?php

    if(isset($_POST['cadastrar'])){

           $titulo_postagem = $_POST['titulo'];
           $conteudo = $_POST['conteudo'];
           $arquivo = $_FILES['foto'];
           $fotos = array();

         if(isset($arquivo)){

               for($i = 0; $i < count($_FILES['foto']['name']); $i++){
                  $nome_img = sha1($_FILES['foto']['name'][$i]).rand(0,9999).".".pathinfo($_FILES['foto']['name'][$i], PATHINFO_EXTENSION);
                     move_uploaded_file($_FILES['foto']['tmp_name'][$i], 'imagens/'.$nome_img);
               }
                      if(!empty($_FILES['foto']['name'])){

                     ?>

                 <div class="alert alert-success alert-dismissible" role="alert">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Postagem inserida com sucesso!</strong>
                 </div>

                     <?php

                  }else{
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Erro ao inserir postagem!</strong>
                    </div>
                    <?php
                  }
          //salvar nomes para enviar para o banco.

                 //inserindo dentro da variavel fotos o nome da imagem.
                 array_push($fotos, $nome_img);

           include_once 'dao/clienteDAO.class.php';
           $cliDAO = new ClienteDAO();
           $cliDAO->cadastrarPostagem($titulo_postagem, $conteudo, $nome_img);

         }else{

           ?>
           <div class="alert alert-danger alert-dismissible" role="alert">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Erro ao inserir Postagem!</strong>
           </div>
           <?php
         }
    }
  ?>
   </div>

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
