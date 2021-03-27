<?php
session_start();
ob_start();

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';
include_once  'model/imagem.class.php';
include_once 'util/padronizacao.class.php';

$p = new Padronizacao();
$cliDAO = new ClienteDAO();
$cliDAO->verificarTabela("cliente","clientes");
$cli = new Cliente();
$array = $cliDAO->buscarCliente();
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
<body class="animated fadeIn" id="cont" onload="carrega();">
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

  <?php
      if(isset($array)){
          if(count($array) == 0){

  ?>
            <div class="col-md-12" style='top: 85px;'>
              <h3 align='center' class='alert mt-3' role='alert' style='background: black; color: white;'>Não há registros cadastrados no sistema!
              <a href='index.php' style='color: red;'>Voltar a Página Inicial</a>
              </h3>

              </div>

                <?php
                unset($_SESSION['id']);
                return;
    }
   ?>
   <a href="dados.php" style="float: left; margin-top: 85px; margin-right: 20px;" title="voltar">
     <img src="img/arrow-left.png">
   </a>
   <div class="container col-12" style="top: 100px;">
     <form name="filtrar-dados" method="post" style="float: left">
      <div class="row">
         <div class="form-group col-md-6" id="pesquisa_dados">
           <input type="text" name="txtfiltro" class="form-control" placeholder="pesquisar..." autocomplete="off" required="true">
           <p id="mensagem" style="color: red; margin: 4px 0px 0px 0px; display: none; white-space: nowrap;">* Informe o CPF com a formatação XXX.XXX.XXX-XX</p>
         </div>
         <div class="form-group col-md-4" id="filtro_pesquisa">
           <select name="filtro" class="form-control" onclick="return verificarCombo();">
             <option value="nome">Nome</option>
             <option value="cpf">CPF</option>
           </select>
         </div>
       </div>

         <div class="form-group">
           <button type="submit" name="filtrar" value="Filtrar" id="btn-backup" class="btn w-50" id="pesquisa"><img src="img/search.svg" class="mr-1">Pesquisar</button>
           <button type="button" id="btn-backup" name="atualizar" class="btn mt-2 mb-2" onclick="window.location.href = './busca_cliente.php';"><img src='img/atualizar.svg' class="mr-1">Atualizar</button>
         </div>
     </form>

     <?php

      if(isset($_POST['filtrar'])){
       $search = $_POST['txtfiltro'];
       $filtro = $_POST['filtro'];

       $array = $cliDAO->filtrar($filtro, $search);

      //nova verificação depois da versão do PHP 7.2
       $verifica = (is_array($array) ? count($array) : 0);
        if($verifica == 0){
                echo "<h4 id='pesq'><strong>Sua pesquisa não retornou nenhum Registro!</strong></h4>";
          return;
    }else{

    }
   }
 }
    ?>
   <div class="table-responsive-md">
     <table id="tabela" class="table table-dark table-bordered table-hover table-condensed">
       <thead align="center">
     <tr>
     <th scope="col">Nome</th>
     <th scope="col">E-mail</th>
     <th scope="col">CPF</th>
     <th scope="col">Arquivo</th>
     <th scope="col">Descrição</th>
     <th scope="col">Status</th>
     </tr>
     </thead>
     <tbody>

     <?php

         foreach($array as $cli){

           $dados = $cliDAO->buscarArquivoPorId($cli->id);

            foreach($dados as $row){
               $caminho = "arquivos";
               $pasta = $caminho."/".$cli->nome."/";

           echo "<tr><ul>";
             echo "<td>$cli->nome</td>";
             echo "<td>$cli->email</td>";
             echo "<td>$cli->cpf</td>";
             if(is_dir($pasta)){
               if(file_exists($pasta.$row['arq'])){
                   echo "<td><a class='text-danger' title='Baixar Arquivo' style='text-style: bold; font-weight: bold;' href='$pasta"."$row[arq]' download>$row[arq]</a><br>
                        <a class='btn btn-danger' style='text-style: bold; font-weight: bold;' href='$pasta'>Visualizar Todos os Arquivos.</a></td>";
             }else{
                echo "<td class='text-danger'>Arquivo indisponível,<br>Arquivo não existe na pasta <strong class='text-light'>$pasta.</strong>";
                //verifica se a pasta está vazia.
                if(count(glob("$pasta/*")) === 0){

                }else{
                  echo "<a class='btn btn-danger' style='text-style: bold; font-weight: bold;' href='$pasta'>Visualizar Todos os Arquivos.</a></td>";
                }
             }
           }else{
             echo "<td class='text-danger'>diretório <strong class='text-light'>$pasta</strong><br>não existe.</td>";
           }
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
   <br>
 </div>

  <script type="text/javascript">
  function verificarCombo(){

    var msg = document.getElementById("mensagem");

         if(msg.style.display === 'none'){
              msg.style.display = 'block';
         }else{
                msg.style.display = 'none';
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
