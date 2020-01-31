<?php
 include_once 'dao/clienteDAO.class.php';
 $cliDAO = new clienteDAO;
 $cliDAO->cadastrarAdministradores();
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

  <div id="login" class="container texto cadastro">
    <div class="card-body">
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">Login</h3>
          </li>
          <hr>
        </div>
     <form name="dadosLogin" method="POST" onsubmit="validarLogin()">
       <div class="form-group col-md-8">
           <label>CPF:</label>
           <input id="cpf" type="text" class="form-control mb-1" name="cpf" autocomplete="off" placeholder="Informe o CPF" required="true"/>
          </div>
          <div class="form-group col-md-8">
            <label>Senha:</label>
            <input type="password" class="form-control mb-2" name="senha" maxlength="8" autocomplete="off" placeholder="Informe a Senha" required="true"/>
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

       			$cliDAO->conectar("rota", "localhost", "root", "");

      				if($cliDAO->logar($cpf,$senha)){

                if($cpf == '000.000.000-00' && $senha == '00000000' || $cpf == '111.111.111-11' && $senha == '11111111'){

                      header("location: dados.php");

                }else{

                  header("location: area_privada.php");

                    }

      			}else if(strlen($senha) < 8){
               

               }else{
                
      				?>

      		<div class="alert alert-danger alert-dismissible" role="alert">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  CPF e/ou senha estão incorretos!
          </div>      			

      <?php
              }
      			}
          

      		}else{

          }      	
      ?>
     </form>
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
  </script>

</body>
</html>
