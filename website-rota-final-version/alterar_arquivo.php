<?php
session_start();
ob_start();
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
        <a href="dados.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">editar arquivo</h3>
          </li>
          <hr>
        </div>
     <form method="POST" action="" name="dadosArquivo" enctype="multipart/form-data">
       <div class="form-group col-md-8">
          <label>Descrição do Arquivo:</label>
          <textarea type="text" class="form-control"  id="descricao" name="descricao" autocomplete="off" required="true" placeholder="Informe a descrição do Arquivo..." maxlength="200"></textarea>
       </div>
       <div class="form-group col-md-8">
           <label>Selecione o Arquivo:</label>
           <input type="file" name="arq[]" id="arquivo" accept=".pdf,.doc,.docx,.odg" required="true" multiple onchange="ValidarTamanhoArquivo(this)">
          </div>
        <button id="btn-enviar" type="submit" name="alterar" class="btn mr-2 button-form ml-3">Alterar</button>
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

    if(isset($_POST['alterar'])){

            if(!is_dir('arquivos/')){
                mkdir('arquivos/');
                chmod('arquivos/', 0777);
            }else{

            }

          include_once 'model/cliente.class.php';
          include_once 'dao/clienteDAO.class.php';
          include_once 'util/padronizacao.class.php';
          $cli = new Cliente();
          $p = new Padronizacao();

          $cli->descricao = addslashes($_POST['descricao']);
          $fotos = array();

        if(isset($_FILES['arq'])){

          $nome = $_GET['cli'];
          $caminho = "arquivos";
          $id_arq = trim($_GET['id']);
          $arq_decode = $p->base64_url_decode(trim($_GET['arq']));
          $pasta = $caminho."/".$nome."-".$id_arq."/";
          if(!is_dir($pasta)){
              mkdir($pasta);
          }else{

          }

          chmod($pasta, 0777);

        if(is_dir($pasta)){
          if(file_exists($pasta.$arq_decode)){
            // unlink($pasta.$arq_decode);
              for($i = 0; $i < count($_FILES['arq']['name']); $i++){
                 $cli->nome_arq = $_FILES['arq']['name'][$i];
                    move_uploaded_file($_FILES['arq']['tmp_name'][$i], $pasta.$cli->nome_arq);
              }
                     if(!empty($_FILES['arq']['name'])){
                    ?>

                <div class="alert alert-info alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Arquivos alterados com sucesso!</strong>
                </div>

                    <?php
                 }else{
                   ?>
                   <div class="alert alert-danger alert-dismissible" role="alert">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong>Erro ao alterar arquivo!</strong>
                   </div>
                   <?php
                 }

              }else{
                ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Ops! notei que o arquivo a ser alterado não existe ou não está cadastrado na base de dados. más não se preocupe irei fazer isso para você.</strong>
                </div>
                <?php
              for($i = 0; $i < count($_FILES['arq']['name']); $i++){
                $cli->nome_arq = $_FILES['arq']['name'][$i];
                   move_uploaded_file($_FILES['arq']['tmp_name'][$i], $pasta.$cli->nome_arq);
              }
                    if(!empty($_FILES['arq']['name'])){

              }else{

                   ?>
                   <div class="alert alert-danger alert-dismissible" role="alert">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong>Erro ao cadastrar arquivo!</strong>
                   </div>
                   <?php
              }
               ?>
               <div class="alert alert-success alert-dismissible" role="alert">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Arquivos cadastrados com sucesso!</strong>
               </div>
               <?php
              }
            }else{
              ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Diretório <strong style="color: black;"><?php echo $pasta?></strong> não existe!</strong>
              </div>
              <?php
            }
                //inserindo dentro da variavel fotos o nome da imagem.
                array_push($fotos, $arq_decode.$cli->nome_arq);

            $cliDAO = new ClienteDAO();
            $cliDAO->alterar($cli,$id_arq, $arq_decode);

            $cli->__destruct();
  }else{
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Erro ao alterar arquivo!</strong>
    </div>
    <?php
  }
}
  ?>
  <script type="text/javascript">
  function ValidarTamanhoArquivo(file){
      var FileSize = file.files[0].size / 1024 / 1024; // in MB
      if(FileSize > 2){
          alert('Arquivo excede 2MB.');
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
