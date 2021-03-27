<?php
session_start();
ob_start();

 include_once 'dao/clienteDAO.class.php';
 include_once 'util/gera_senha.php';
 $cliDAO = new ClienteDAO();
 $geraSenha = new geraSenha();

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
        <a href="area_cliente.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title logo-login">
        <div align="center" id="logo">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">recuperação de senha</h3>
          </li>
          <hr>
        </div>
     <form  name="recuperarDados" action="recuperar_senha.php" method="POST">
       <div class="form-group col-md-8">
          <label>E-mail:</label>
          <input type="email" name="email" class="form-control redefinir" autocomplete="off" placeholder="Informe seu E-mail" maxlength="22" style="color: red;"/>
          <input type="checkbox" name="cpf" onclick="verificarCheckBox()" title="utilizar CPF">
          <label title="utilizar CPF" id="rotulo">utilizar CPF</label><br>
          <div id="bloco" style="display: none;">
          <label>CPF:</label>
          <input name="cpf" data-mask="000.000.000-00" class="form-control redefinir" placeholder="Informe o CPF" autocomplete="off" style="color: red;">
          <!-- <label>nova senha:</label> -->
         <!--  <input type="hidden" name="senha" class="form-control redefinir" maxlength="8" autocomplete="off" placeholder="Insira sua nova senha"> -->
          <!-- <label>confirmar senha:</label>        -->
          <!-- <input type="hidden" name="senha_c" class="form-control redefinir" maxlength="8" autocomplete="off" placeholder="confirme sua senha"> -->
        </div>
       </div>
        <button id="btn-enviar" type="submit" name="entrar" class="btn mr-2 button-form ml-3">Recuperar
       </button>
      </div>
        <?php

        if(isset($_POST['email'])){

        $email = addslashes($_POST['email']);
        $cpf = addslashes($_POST['cpf']);

          if(!empty($email) || !empty($cpf)){
        $senha = $geraSenha->geraS(8, true, true);

                if($cliDAO->recuperarSenha($email,$cpf,$senha)){
                  ?>

          <div class="alert alert-info alert-dismissible" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo "sua nova senha é: "."<strong>".$senha; "</strong>"?>
          </div>

                <?php

                }else{

                  ?>

                <div class="alert alert-danger alert-dismissible" role="alert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>E-mail ou CPF incorreto, tente novamente!</strong>
                </div>

                  <?php
                }
              }else{

                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong>Necessário informar E-mail ou CPF para recuperar a senha!</strong>
                </div>
                <?php
              }
              }
           ?>
     </form>
    </div>
<script type="text/javascript">

  function verificarCheckBox(){

    var bloco = document.getElementById("bloco");
    var rotulo = document.getElementById("rotulo");

        if(bloco.style.display === 'none'){
             bloco.style.display = 'block';
             rotulo.style.color = "red";
        }else{
             bloco.style.display = 'none';
             rotulo.style.color = '';
        }
}
</script>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
