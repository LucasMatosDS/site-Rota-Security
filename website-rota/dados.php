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

  <?php
      if(isset($array)){
          if(count($array) == 0){
                echo "<div class='col-md-12' style='top: 85px;'>
                <h3 align='center' class='alert mt-3' role='alert' style='background: black; color: white;'>Não há registro cadastrado no sistema!
                <a href='index.html' style='color: red;'>Voltar a Página Inicial</a>
                </h3>
                </div>";
                unset($_SESSION['id']);
                return;
    }
   ?>
   <div class="container col-md-10" style="top: 100px;">
       <button type="button" id="btn-limpar" class="btn mt-2 mb-2" onclick="window.location.href = 'sair.php';"><img src='img/exit.png' class="mr-1">sair</button>
       <button type="button" id="btn-limpar" class="btn mt-2 mb-2" onclick="return verificarExclusaoDeRegistros()"><img src='img/trash-all.png' class="mr-1">Excluir Registros</button>
  <div class="table-responsive-md">
      <table class="table table-dark table-bordered table-hover table-condensed">
        <thead align="center">
    <tr>
      <th>Ações</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">CPF</th>
      <th scope="col">Senha</th>
    </tr>
  </thead>
  <tbody>
      <?php
          foreach($array as $cli){
            echo "<tr>";
              echo "<td><a href='dados.php' class='btn btn-warning border border-light text-dark'><img src='img/download.png' title='Baixar Arquivo'></a>
              <a href='dados.php?cpf=$cli->cpf' class='btn btn-danger border border-light text-dark btn-deletar' onclick='return verificarExclusaoPeloCPF()' title='Excluir Registro'><img src='img/trash.svg'></a></td>
              ";
              echo "<td>$cli->nome</td>";
              echo "<td>$cli->email</td>";
              echo "<td>$cli->cpf</td>";
              echo "<td>$cli->senha</td>";
            echo "</tr>";
          }
        }
       ?>
   </tbody>
  </table>
 </div>
</div>
  <script>

    function verificarExclusaoPeloCPF(cpf){

        var decisao = confirm('Desejá Excluir o Registro ?');

          if(decisao == true){
                alert('Registro excluido com sucesso!');
                window.location.href = "excluir.php?cpf=" + cpf;
                return true;

              }else{
                  return false;
              }
    }

   function verificarExclusaoDeRegistros(){

      var decisao1 = confirm('Desejá Excluir todos os Registros ?');

     if(decisao1 == true){
         alert('Registros excluidos com sucesso!');
         window.location.href = "excluir-registros.php";
         return true;

      }else{
         return false;
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
