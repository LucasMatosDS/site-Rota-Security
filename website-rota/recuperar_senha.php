<?php
 ob_start();
 include_once 'dao/clienteDAO.class.php';
 $cliDAO = new ClienteDAO();
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
      <div class="card-title logo-login">
        <div align="center" id="logo">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">recuperação de senha</h3>
          </li>
          <hr>
        </div>
     <form  name="recuperarDados" action="recuperar_senha.php" method="POST" onsubmit="recuperarSenha()">
       <div class="form-group col-md-8">
          <label>E-mail:</label>
          <input type="email" name="email" class="form-control redefinir" autocomplete="off" placeholder="Informe seu E-mail" />          
          <!-- <label>nova senha:</label> -->
          <input type="hidden" name="senha" class="form-control redefinir" maxlength="8" autocomplete="off" placeholder="Insira sua nova senha"> 
          <!-- <label>confirmar senha:</label>        -->
          <input type="hidden" name="senha_c" class="form-control redefinir" maxlength="8" autocomplete="off" placeholder="confirme sua senha">  
       </div>      
        <button id="btn-enviar" type="submit" name="entrar" class="btn mr-2 button-form ml-3">Recuperar
       </button>        
      </div>
        <?php

        if(isset($_POST['email'])){

        $email = addslashes($_POST['email']);
        // $senha = addslashes($_POST['senha']);
        // $senha_c = addslashes($_POST['senha_c']);        
        $senha = $cliDAO->geraSenha(8, true, true);
                $cliDAO->conectar("rota", "localhost", "root", "");

                // if($senha != $senha_c){

                  ?>
                  
                <!--   <div class="alert alert-danger" role="alert">senhas incompatíveis!</div> -->

                  <?php
                   // exit;

                // }else{


                if($cliDAO->recuperarSenha($email, $senha)){
                  
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
                        E-mail incorreto, tente novamente!
                </div>

                  <?php
                }
              //}
              }
           ?>
     </form>       
    </div>

  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
