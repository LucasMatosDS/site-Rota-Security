<?php
if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
}else if(session_status() !== PHP_SESSION_NONE){
        echo "sessãos habilitadas! mas nenhuma existe.";
}else if(session_status() !== PHP_SESSION_DISABLED){
    echo "sessões desabilitadas.";    
}else{
    echo "sessão habilitada.";
}

 include_once 'dao/clienteDAO.class.php';
 include_once 'model/cliente.class.php';

 $cliDAO = new clienteDAO();
 $cli = new Cliente();

  if(!isset($_SESSION['id'])){
    echo "<script>location.replace('index.php');</script>";
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

  <div id="login" class="container texto cadastro">
    <div class="card-body">
      <div class="card-title">
        <a href="verificaLogin.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" class="titulo-login1" align="center">Verificação em duas Etapas</h3>
          </li>
          <hr>
        </div>
     <form name="dadosLogin" method="post" action="">
       <div class="form-group col-md-8">
           <label>E-mail:</label>
           <input type="email" class="form-control mb-1" name="email" autocomplete="off" maxlength="30" placeholder="Informe seu E-mail" style="color: red;"/>
          </div>
        <button id="btn-enviar" type="submit" name="entrar" class="btn mr-2 button-form ml-3">Entrar</button>
        <button id="btn-limpar" type="reset" name="limpar" class="btn mr-2 button-form">
        Cancelar</button>
      </div>
      <?php
      if(isset($_POST['entrar'])){

       		$email = addslashes($_POST['email']);

       		if(!empty($_POST['email'])){
            $cliDAO->buscarPorEmail($email);

            }else{
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Necessário preencher os campos!</strong>
                </div>
                <?php
            }
          }
      ?>
     </form>
    </div>

  <script src="js/jquery.slim.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
