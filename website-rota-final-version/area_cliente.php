<?php
 include_once 'dao/clienteDAO.class.php';
 include_once 'model/cliente.class.php';

 $cliDAO = new clienteDAO();
 $cli = new Cliente();
 $cliDAO->verificarTabela("cliente","clientes");
 $cliDAO->cadastrarAdministradores();

 unset($_SESSION['id']);
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
  <link rel="stylesheet" href="css/aos.css">
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

  <div id="login" class="container texto cadastro mb-4" data-aos="fade-down">
    <div class="card-body">
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" class="titulo-login1" align="center">Login</h3>
          </li>
          <hr>
        </div>
     <form name="dadosLogin" method="POST">
       <div class="form-group col-md-8">
           <label>CPF:</label>
           <input id="cpf" type="text" class="form-control mb-1" name="cpf" autocomplete="off" placeholder="Informe o CPF" style="color: red;"/>
          </div>
          <div class="form-group col-md-8">
          <label>Senha:</label>
           <div class="input-group">
            <input type="password" class="form-control mb-2" name="senha" maxlength="8" autocomplete="off" placeholder="Informe a Senha" id="password" style="color: red;"/>
                    <div class="input-group-btn ml-1">
                    <button class="btn rounded border-dark" type="button" id="showPassword" value="mostrar"><img src="img/hide.png" id="image_btn"></button>
              </div>
            </div>
            <li><a id="cad" href="cadastro.php">cadastre-se</a></li>
            <li><a id="rsenha" href="recuperar_senha.php">esqueceu a senha?</a></li>
          </div>
        <button id="btn-enviar" type="submit" name="entrar" class="btn mr-2 button-form ml-3">Entrar</button>
        <button id="btn-limpar" type="reset" name="limpar" class="btn mr-2 button-form">
   Cancelar</button>
      </div>
      <?php
       if(isset($_POST['cpf'])){

       		$cpf = addslashes($_POST['cpf']);
       		$senha = addslashes($_POST['senha']);

       		if(!empty($cpf) && !empty($senha)){

      			if($cliDAO->logar($cpf,$senha)){


            }else if(strlen($cpf) < 14 && strlen($senha) < 8){

              ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>CPF e senha incorretos!</strong>
                 </div>
              <?php

              }else if(strlen($cpf) < 14){

                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong>CPF informado não contém 14 caracteres!</strong>
                </div>
                <?php

    			    }else if(strlen($senha) < 8){

                 ?>
                 <div class="alert alert-danger alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>senha não contém 8 caracteres!</strong>
                 </div>
                 <?php

            }else{

              ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Usuário não cadastrado no sistema!</strong><br>
                     <a href="./cadastro.php" style="color: red;"><strong>Cadastre-se</strong></a>
              </div>
              <?php
             }
      			}else{

               ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Necessário preencher os campos!</strong>
          </div>
               <?php
            }

      		}else{

          }
      ?>
     </form>
    </div>

 <footer id="sticky-footer" class="py-4 text-white-50 cancel_dark">
    <div class="container">
      <img src="img/logo1.jpg" width="130" class="img-fluid float-left mt-5">
      <h3 id="contato">contato:</h3>
      <li class="text-right"><a class="text-white texto-redes">(51) 3110-0703<img src="img/tel.png" title="Telefone" class="redes"></a></li>
      <li class="text-right"><a href="https://api.whatsapp.com/send?phone=5551" target="_blank" class="text-white texto-redes">-<img src="img/whats.png" title="acessar WhatsApp" class="redes"></a></li>
      <li class="text-right"><a class="text-white texto-redes">Facebook<img src="img/face.png" title="Facebook" class="redes"></a></li>
      <li class="text-right"><a class="text-white texto-redes">rotasecurit@gmail.com<img src="img/email.png" title="E-mail" class="redes"></a></li>
      <li class="text-right mt-4"><a class="text-white" id="endereco">Av. Dom Pedro 690, centro - Esteio - RS</a></li>
    </div>

    <hr id="linha">
    <div class="container text-center">
      2020 - &copy;copyright - Desenvolvedor <a id="dev" href="https://github.com/LucasMatosDS" target="_blank" rel="noopener">Lucas Matos</a>
      <img src="img/github.svg">
      <a class="btn-topo" href="#"><img src="img/arrowUp.png" width="35" title="voltar ao topo" class="zoom-image"></a>
    </div>
  </footer>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">

  $(document).ready(function(){
    $("#cpf").mask("000.000.000-00", {reverse: true});
  })

 // Check javascript has loaded
$(document).ready(function(){
   var img = document.getElementById('image_btn');

  // Click event of the showPassword button
  $('#showPassword').on('click', function(){

    // Get the password field
    var passwordField = $('#password');

    // Get the current type of the password field will be password or text
    var passwordFieldType = passwordField.attr('type');

    // Check to see if the type is a password field
    if(passwordFieldType == 'password')
    {
        // Change the password field to text
        passwordField.attr('type', 'text');

        // Change the Text on the show password button to Hide
       // $(this).val('ocultar');
       img.src = 'img/show.png';
    } else {
        // If the password field type is not a password field then set it to password
        passwordField.attr('type', 'password');

        // Change the value of the show password button to Show
        img.src = 'img/hide.png';
    }
  });
});
  </script>
</body>
</html>
