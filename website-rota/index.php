<?php
session_start();
ob_start();

include_once  'dao/clienteDAO.class.php';
include_once  'model/imagem.class.php';

$cliDAO = new ClienteDAO();
$dados = $cliDAO->buscarImagem();

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

<body data-aos="fade-down">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="#"><img src="img/logo-rota.png" title="Rota-Security" class="animated pulse zoom" alt="Logo indisponível"></a>
    <button class="navbar-toggler rounded border-0" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <img src="img/menu.svg">
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#cont1">Sobre</a>
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
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner" role="listbox">

        <div id="banner1" class="carousel-item active img-fluid">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">subtitulo</h3>
            <p class="lead">texto</p>
          </div>
        </div>

        <div id="banner2" class="carousel-item img-fluid">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">subtitulo</h3>
            <p class="lead">texto</p>
          </div>
        </div>

        <div id="banner3" class="carousel-item img-fluid">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">subtitulo</h3>
            <p class="lead">texto</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <div class="container mt-4 mb-4 texto">
    <div class="card-body">
      <div class="card-title">
        <h3 class="subtitulo">dsds</h3>
        </div>
        <hr>
      <p class="conteudo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>

  <hr id="linha-doc">
  <div id="cont1" class="container mt-4 mb-4 texto">
    <div class="card-body">
      <div class="card-title">
        <h3>Serviços Prestados</h3>
        <hr>
      </div>
           <?php

          if(empty($dados)){

           ?>

           <div align="center">
               <strong style="font-size: 20px; color: red;">Ainda não há imagens cadastradas!</strong>
           </div>

           <?php
         }else{
               foreach($dados as $imagem){

                   ?>

                  <img src="imagens/<?php echo $imagem['foto'];?>" data-aos="fade-up" data-aos-duration="900" id="imagens" class="img-thumbnail border rounded zoom" title="visualizar imagem" alt="Imagem Indisponível" onclick="window.location.href = 'imagens/<?php echo $imagem['foto'];?>'">

                   <?php
             }
           }
          ?>


    </div>
  </div>

  <footer id="sticky-footer" class="py-4 text-white-50">
    <div class="container">
      <img src="img/logo1.jpg" width="130" class="img-fluid float-left mt-5">
      <h3 id="contato">contato:</h3>
      <li class="text-right"><a class="text-white texto-redes">(51) 3110-0703<img src="img/tel.png" title="Telefone" class="redes"></a></li>
      <li class="text-right"><a class="text-white texto-redes">número whats<img src="img/whats.png" title="WhatsApp" class="redes"></a></li>
      <li class="text-right"><a class="text-white texto-redes">Facebook<img src="img/face.png" title="Facebook" class="redes"></a></li>
      <li class="text-right"><a class="text-white texto-redes">rotasecurity@gmail.com<img src="img/email.png" title="E-mail" class="redes"></a></li>
      <li class="text-right mt-4"><a class="text-white" id="endereco">Av. Dom Pedro, 690, centro - Esteio - RS</a></li>
    </div>

    <hr id="linha">
    <div class="container text-center">
      2019 - &copy;copyright - Desenvolvedor <a id="dev" href="https://github.com/LucasMatosDS" target="_blank" rel="noopener">Lucas Matos</a>
      <img src="img/github.svg">
      <a class="btn-topo" href="#"><img src="img/arrowUp.png" width="35" title="voltar ao topo" class="zoom-image"></a>
    </div>
  </footer>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
