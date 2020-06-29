<?php
session_start();

include_once 'dao/clienteDAO.class.php';
$cliDAO = new clienteDAO();
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

  <div id="cadastre_se" class="container texto cadastro m-20 col-md-4" style="padding-bottom: auto;">
    <div class="card-body">
        <a href="dados.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">Restaurar Backup</h3>
          </li>
          <hr>
        </div>
     <form method="post" name="recBackup" action="./processa.php" enctype="multipart/form-data">
        <div class="form-group col-md-8 recBackup">
        <div id="controles">
        <h6><strong><u>Função:</u></strong></h6>
        <li style="color: red;">OBS: este recurso forçara a exclusão das tabelas do Banco de Dados, para poder subir/enviar um novo Backup.</li>
        <input type="submit" id="btn-limpar" class="btn float-top" name="deletar_tabela" value="resetar tabelas" onclick="verificaCampos()">
      </div>
       <label>Servidor:</label>
       <input type="text" class="form-control mb-2" name="servidor" autocomplete="off" placeholder="Insira o caminho do servidor" required>
       <label>Usuario:</label>
       <input type="text" class="form-control mb-2" name="usuario_server" value="root" autocomplete="off" required readonly>
       <label>Senha:</label>
       <input type="password" class="form-control mb-2" name="senha_server" autocomplete="off" placeholder="Insira senha (se necessário)">
       <label>Base de Dados:</label>
       <input type="text" class="form-control mb-2"  name="db_name" value="" autocomplete="off" placeholder="Insira o nome do BD" required>
       <label>selecione o arquivo do Backup:</label>
       <input type="file" class="mb-2 arquivo" name="arquivo" accept=".sql" required>
       <button id="btn-enviar" type="submit" name="importar" class="btn button-form importar">importar</button>
     </div>
     <?php

   if(isset($_SESSION['msg'])){

           ?>
          <div class="alert alert-success alert-dismissible mt-2" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><?php echo $_SESSION['msg'];?></strong>
           </div>
     </form>
                <?php

            unset($_SESSION['msg']);

        }else if(isset($_SESSION['msgE'])){

             ?>
           <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><?php echo $_SESSION['msgE'];?></strong>
           </div>
             <?php
             unset($_SESSION['msgE']);

        }else if(isset($_SESSION['del_t'])){

            ?>
 <div class="alert alert-warning alert-dismissible mt-2" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><?php echo $_SESSION['del_t'];?></strong>
           </div>
            <?php
            unset($_SESSION['del_t']);
        }
      ?>
    </div>
   </body>

<script>

 function verificaCampos(){

    var decisao = confirm("você desejá resetar as tabelas do banco de dados ?");

     if(decisao == true){

        var servidor = recBackup.servidor.hasAttribute('required');
        var arquivo = recBackup.arquivo.hasAttribute('required');

        if(servidor && arquivo === true){
            window.location.href = './del_tabelas.php';
        }

        return true;

      }else if(decisao == false){

        return false;

       }
      }

    </script>

   <script src="js/jquery.slim.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/jquery.mask.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
</html>
