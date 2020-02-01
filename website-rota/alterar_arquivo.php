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
          <a class="nav-link" href="index.html">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.html">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="area_cliente.php">Area do CLiente</a>
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
     <form method="POST" action="" name="dadosArquivo">
       <div class="form-group col-md-8">
          <label>Descrição do Arquivo:</label>
          <input type="text" class="form-control" name="descricao" autocomplete="off" placeholder="Informe a descrição do arquivo" required="true"/>
       </div>  
       <div class="form-group col-md-8">
           <label>Selecione o Arquivo:</label>           
           <input type="file" name="arq" required="true">                      
          </div>    
        <button id="btn-enviar" type="submit" name="cadastrar" class="btn mr-2 button-form ml-3">Cadastrar</button>
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

    if(isset($_POST['cadastrar'])){

          include_once "model/arquivo.class.php";
          include_once "dao/clienteDAO.class.php";

          $cliDAO = new ClienteDAO();

          $arq = new Arquivo();

          $arq->id_arq = $_GET['id'];
          $arq->nome_arq = addslashes($_POST['arq']);
          $arq->descricao = addslashes($_POST['descricao']);         
          
            $cliDAO->alterar($arq);                                     

             $arq->__destruct();                             
 }


  ?>

    </div>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $("#cpf").mask("000.000.000-00", {reverse: true});
  })
  </script>
</body>
</html>
