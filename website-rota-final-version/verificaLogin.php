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
 include_once 'vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';

 $cli = new Cliente();
 $cliDAO = new clienteDAO();
 $ga = new GoogleAuthenticator();


   if(!isset($_SESSION['auth_secret'])){
       $secret = $ga->createSecret();
       $_SESSION['auth_secret'] = $secret;
   }

   $qrCodeUrl = $ga->getQRCodeGoogleUrl('rota', $_SESSION['auth_secret'], 'rotasecurit@gmail.com');

   if(!isset($_SESSION['failed'])){
       $_SESSION['failed'] = false;
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
   <div id="login" class="container texto cadastro mb-3">
     <div class="card-body">
       <div class="card-title">
            <a href="sair.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
         <div align="center">
         <img src="img/logo-rota.png">
         </div>
         <h3 id="titulo-login" class="titulo-login1" align="center">Verificação em duas Etapas</h3>
           </li>
           <hr>
         </div>
      <form name="dadosLogin" method="POST" action="check.php">
        <div style="text-align: center;">
                <label>Entre com o código do Google Authenticator:</label>
                <p style="color: black;">Insira o código de verificação gerado pelo aplicativo Google Authenticator em seu telefone.</p>
                <img style="text-align: center; border: 2px solid red;" class="img-fluid" src="<?php echo $qrCodeUrl; ?>" alt="QRCode Google Authenticator"><br><br>
                <?php
                  if(empty($qrCodeUrl) || $qrCodeUrl == null){
                  ?>
                  <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>QRCode está vazio!</strong>
                    </div>
                   <?php
                }else{

                }
                ?>
                <input type="text" class="form-control" name="code" placeholder="******" maxlength="6" style="color: red; font-size: 20px;font-weight: bold;width: 200px; margin: auto; margin-bottom: 8px; text-align: center;" required>
                <button id="btn-enviar" type="submit" class="btn button-form d-block" style="margin: auto;">Entrar</button>
                <a id="cad" href="verificaEmailLogin.php">outra forma de Login</a>
                <?php
                if($_SESSION['failed']){
                ?>
                  <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Código Inválido!</strong>
                  </div>
                    <?php
                        $_SESSION['failed'] = false;
                      }
                    ?>
                    <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank" title="Baixe o Google Authenticator"><img class="col-4 d-block text-center mt-2" style="margin: auto;" src="img/android.png"/></a>
         </div>
       </form>
       </div>
      </div>
      <script src="js/jquery.slim.min.js"></script>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.mask.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
