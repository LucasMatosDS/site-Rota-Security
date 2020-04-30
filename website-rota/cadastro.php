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
       <a href="area_cliente.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">cadastre-se</h3>
          </li>
          <hr>
        </div>
     <form method="POST" action="cadastro.php" name="dadosCadastro">
       <div class="form-group col-md-8">
          <label>Nome Completo:</label>
          <input type="text" class="form-control" name="nome" value='' autocomplete="off" placeholder="Informe seu Nome" required="true" onkeypress="return SomenteLetras(event)"/>
       </div>
       <div class="form-group col-md-8">
          <label>E-mail:</label>
          <input type="email" class="form-control" name="emailC" autocomplete="off" placeholder="Informe seu E-mail" required="true"/>
       </div>
       <div class="form-group col-md-8">
           <label>CPF:</label>
           <input id="cpf" type="text" class="form-control mb-1" name="cpf" autocomplete="off" placeholder="XXX.XXX.XXX-XX" required="true"/>
          </div>
          <div class="form-group col-md-8">
            <label>Senha:</label>
            <input type="password" class="form-control mb-2" name="senha" maxlength="8" autocomplete="off" placeholder="Informe a Senha" required="true"/>
          </div>
          <div class="form-group col-md-8">
            <label>Repetir Senha:</label>
            <input type="password" class="form-control mb-2" name="Rsenha" maxlength="8" autocomplete="off" placeholder="Confirmar Senha" required="true" />
          </div>
        <button id="btn-enviar" type="submit" name="cadastrar" class="btn mr-2 button-form ml-3"  onclick="return validarCadastro()">Cadastrar</button>
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

          include_once "model/cliente.class.php";
          include_once "dao/clienteDAO.class.php";
          include_once "util/padronizacao.class.php";

          $cliDAO = new ClienteDAO();
          $cli = new Cliente();
          $cli->nome = Padronizacao::converterinMain($_POST['nome']);
          $cli->email = Padronizacao::converterinMain($_POST['emailC']);
          $cli->cpf = addslashes($_POST['cpf']);
          $cli->senha = addslashes($_POST['senha']);

          $senha = addslashes($_POST['senha']);
          $Rsenha = addslashes($_POST['Rsenha']);


          if(strlen($_POST['cpf']) < 14){
                      exit;

                    }else if(strlen($_POST['senha']) < 8){
                      exit;

                    }else{

          if($cliDAO->validarDados($cli)){

          ?>

        <div class="alert alert-danger alert-dismissible" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Impossivél cadastrar usuário, E-mail e/ou CPF já cadastrado no sistema!</strong>
        </div>


        <?php

     }else{

         if($senha == $Rsenha){
            $cliDAO->cadastrarCliente($cli);
          //  $cliDAO->cadastrarArquivo();

             $cli->__destruct();

           ?>

       <div class="alert alert-success alert-dismissible" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Cadastro efetuado com sucesso!</strong>
       </div>

          <?php

       }else{

         ?>

       <div class="alert alert-danger alert-dismissible" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>senhas incompatíveis!</strong>
       </div>

         <?php
       }
     }
   }
 }
?>

    </div>
  <script src="js/validacao.js"></script>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $("#cpf").mask("000.000.000-00", {reverse: true});
  })

  function SomenteLetras(e){
    var tecla=(window.event)?event.keyCode:e.which;
    if((tecla>47 && tecla<58)) return false;
    else{
      if (tecla==8 || tecla==0) return false;
  else  return true;
    }
}

 function validarCadastro(){

    var email = dadosCadastro.emailC.value;
    var cpf = dadosCadastro.cpf.value;
    var senha = dadosCadastro.senha.value;
    var rsenha = dadosCadastro.Rsenha.value;

    if(email === "" && cpf === "" && senha === "" && rsenha === ""){
          alert('Necessário preencher os campos!')
          return false;

    }else if(email === ""){
           alert('email invalído!')
           return false;

    }else if(cpf === "" || cpf.length < 14){
           alert('CPF invalído!')
           return false;

    }else if(rsenha === ""){
           alert('campo repetir senha invalído!')
           return false;

    }else if(senha == rsenha){
            alert('senhas não compatíveis!')
            return false;

     }else if(senha.length && rsenha.length < 8){
          alert('senha invalída!')
          alert('senha muito pequena, \n insira até 8 dígitos!')
            return false;
     }else{
          alert('erro')
 }
}
  </script>
</body>
</html>
