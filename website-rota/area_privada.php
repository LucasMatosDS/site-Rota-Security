<?php
session_start();
ob_start();

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';
include_once 'excluir.php';

$cliDAO = new ClienteDAO();
$array = $cliDAO->buscarCliente();

   if(!isset($_SESSION['id'])){

      header("location: area_cliente.php");
      exit;
   }

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
  <!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
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
  </nav> -->

  <?php
      if(isset($array)){
          if(count($array) == 0){
                echo "<div class='col-md-12'>
                <h3 align='center' class='alert mt-3' role='alert' style='background: black; color: white;'>Não há registro cadastrado no sistema!
                <a href='index.html' style='color: red;'>Voltar a Página Inicial</a>
                </h3>
                </div>";
                unset($_SESSION['id']);
                return;
    }
  }
   ?>
   <div class="container col-md-10" style="top: 100px;">
     <button type="button" href="sair.php" id="btn-limpar" class="btn mt-2 mb-2" onclick="window.location.href = 'sair.php';">sair</button>
    <form action="" method="POST" id="form-pesquisa">
     <input type="text" class="form-control" name="pesquisa" id="pesquisa" autocomplete="off" placeholder="Informe seu CPF"/>    
    </form>
  <div class="table-responsive-md">
    <table class="table table-dark table-bordered table-hover table-condensed">
        <thead align="center">
    <tr>
      <th>Ações</th>
      <th>Nome</th>
      <th>CPF</th>
    </tr>
  </thead>
  <tbody class="resultado">

   </tbody>
  </table>
 </div>
</div>

  <script type="text/javascript">
    function verificarExclusaoPeloCPF(cpf){
        var bol = true;
        var decisao = confirm('Desejá Excluir o Registro ?');

         if(bol == true){
          if(decisao == true){
            bol = false;
                alert('Registro excluido com sucesso!');
                window.location.href = "excluir.php?cpf=" + cpf;
                return true;
          }else{
             if(bol == false){
              alert('erro ao excluir Registro!');
              return false;
              }
           }
        }
    }
</script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/refresh.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
 </body>
</html>
