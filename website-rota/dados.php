<?php
session_start();
ob_start();

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';

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
<body class="animated fadeIn" id="cont">
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
          <a class="nav-link" href="index.php">Sobre</a>
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
            ?>

            <div class='col-md-12' style='top: 85px;'>
              <h3 align='center' class='alert mt-3' role='alert' style='background: black; color: white;'>Não há registro cadastrado no sistema!
              <a href='index.php' style='color: red;'>Voltar a Página Inicial</a>
              </h3>
              <fieldset class="fieldset-border col-md-2 controle_dados">
                <legend class="legend-border">Controles</legend>
                  <button type="button" id="btn-backup" name="inserir_img" class="btn mt-2 mb-2" onclick="window.location.href = './inserir_imagem.php';"><img src='img/upload_img.png' class="mr-1">Inserir imagens</button>
                  <button type="button" id="btn-backup" class="btn mt-2 mb-2" onclick="window.location.href = './gerenciar_imagens.php';"><img src='img/edit_img.png'>Gerenciar imagens</button>
                  <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './restore.php';"><img src='img/backup_restore.png' class="mr-1">Restaurar Backup</button>
                </fieldset>
              </div>

                <?php
                unset($_SESSION['id']);
                return;
    }
   ?>
   <div class="container col-md-10" style="top: 100px;">
   <fieldset class="fieldset-border">
     <legend class="legend-border">Controles</legend>
       <button type="button" id="btn-limpar" class="btn mt-2 mb-2" onclick="window.location.href = 'sair.php';"><img src='img/exit.png' class="mr-1">sair</button>
       <button type="button" id="btn-limpar" class="btn mt-2 mb-2" onclick="return verificarExclusaoDeRegistros()"><img src='img/trash-all.png' class="mr-1">Excluir Registros</button>
       <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './backup.php';"><img src='img/backup.png' class="mr-1">Realizar Backup</button>
       <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './restore.php';"><img src='img/backup_restore.png' class="mr-1">Restaurar Backup</button>
       <button type="button" id="btn-backup" name="inserir_img" class="btn mt-2 mb-2" onclick="window.location.href = './inserir_imagem.php';"><img src='img/upload_img.png' class="mr-1">Inserir imagens</button>
       <button type="button" id="btn-backup" class="btn mt-2 mb-2" onclick="window.location.href = './gerenciar_imagens.php';"><img src='img/edit_img.png' class="mr-1">Gerenciar imagens</button>
       <button type="button" id="btn-backup" name="atualizar" class="btn mt-2 mb-2" onclick="window.location.href = './dados.php';"><img src='img/atualizar.svg' class="mr-1">Atualizar</button>
     </fieldset>
     <form name="filtrar-dados" method="post" style="float: left">
      <div class="row">
         <div class="form-group col-md-6" id="pesquisa_dados">
           <input type="text" name="txtfiltro" class="form-control" placeholder="pesquisar..." autocomplete="off" required="true">
         </div>
         <div class="form-group col-md-4" id="filtro_pesquisa">
           <select name="filtro" class="form-control">
             <option value="nome">Nome</option>
             <option value="cpf">CPF</option>
           </select>
         </div>
       </div>

         <div class="form-group">
           <button type="submit" name="filtrar" value="Filtrar" id="btn-backup" class="btn w-50" id="pesquisa"><img src="img/search.svg" class="mr-1">Pesquisar</button>
         </div>
     </form>

     <?php

      if(isset($_POST['filtrar'])){
       $search = $_POST['txtfiltro'];
       $filtro = $_POST['filtro'];

       $cliDAO = new ClienteDAO();

       $array = $cliDAO->filtrar($filtro, $search);

      //nova verificação depois da versão do PHP 7.2
       $verifica = (is_array($array) ? count($array) : 0);
        if ($verifica == 0) {
                echo "<h4 style='margin-top: 100px;'><strong>Sua pesquisa não retornou nenhum Registro!</strong></h4>";
          return;
    }
   }
    ?>

  <div class="table-responsive-md">
      <table id="tabela" class="table table-dark table-bordered table-hover table-condensed">
        <thead align="center">
    <tr>
      <th>Ações</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">CPF</th>
      <th scope="col">Arquivo</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>

      <?php

          foreach($array as $cli){

            ?>

            <?php

            echo "<tr>
            <ul>
              <td align='center'><li class='m-2'><a href='download.php?id=$cli->id' class='btn border border-light text-dark' style='background: silver'><img src='img/download.png' title='Baixar Arquivo'></a></li>
              <li class='m-2'><a href='alterar_arquivo.php?id=$cli->id' class='btn btn-light border border-light text-dark btn-deletar'><img src='img/edite.png' title='Editar'></a></li>
              <li class='m-2'><a href='excluir.php?id=$cli->id' class='btn btn-danger border border-light text-dark btn-deletar' onclick='return verificarExclusaoPeloCPF()' title='Excluir Registro'><img src='img/trash.svg'></a></li></td>
              ";
              echo "<td>$cli->nome</td>";
              echo "<td>$cli->email</td>";
              echo "<td>$cli->cpf</td>";
              echo "<td><img src='img/document.svg'></td>";
              echo "<td>$cli->descricao</td>";
              echo "<td>$cli->data</td>";
              echo "</ul>";
            echo "</tr>";
         }
        }
       ?>
   </tbody>
  </table>
  </div>
 </div>

 <script type="text/javascript">

$(document).ready(function(){

  $("#baixar").click();

});
// $(document).ready(function() {
 $.ajax({
 type: 'POST',
     url: 'dados.php',
     data: {tabela:tabela},
     success: function(res) {
             $('#tabela').html(res).delay(2000);
     }
    // });
  });

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
         window.location.href = "excluir_registros.php";
         return true;

      }else{
         return false;
      }
   }
</script>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
 </body>
</html>
