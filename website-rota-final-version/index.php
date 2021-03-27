<?php
session_start();
ob_start();

include_once  'dao/clienteDAO.class.php';
include_once  'model/imagem.class.php';

$cliDAO = new ClienteDAO();
$dados_postagem = $cliDAO->buscarPostagem();
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
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#cont1">Sobre</a>
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
          </div>
        </div>

        <div id="banner2" class="carousel-item img-fluid">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>

        <div id="banner3" class="carousel-item img-fluid">
          <div class="carousel-caption d-none d-md-block">
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
<?php

if(empty($dados_postagem)){

  ?>
   <div align="center" class="container mt-4 mb-4 p-4 texto">
         <strong style="font-size: 20px; color: red;">Ainda não há postagens inseridas!</strong>
     </div>
  <?php

}else{
?>
<div class="container mt-4 mb-4 texto cancel_dark">
<?php
foreach($dados_postagem as $conteudo){
      ?>
    <div class="card-body">
      <div class="card-title">
        <h3 class="titulo"><?php echo $conteudo['titulo_postagem'];?></h3>
        </div>
        <hr>
      <p class="conteudo mb-4"><?php echo $conteudo['conteudo'];?></p>
      <?php
        $caminho = "imagens/";
        if(is_dir($caminho)){
         if(file_exists($caminho.$conteudo['imagem']) && $conteudo['imagem'] != "" && $conteudo['imagem'] != null){
            ?>
            <div style="width: 70%; margin: auto;">
              <img src="imagens/<?php echo $conteudo['imagem'];?>" id="imagens1" class="img-fluid border rounded"  style="margin-top: 10px;" title="visualizar imagem" alt="Imagem Indisponível" onclick="window.location.href = 'imagens/<?php echo $conteudo['imagem'];?>'">
            </div>
            <?php
         }else{

        }
       }else{
         ?>
         <h5 style="color: black;">Diretório <strong style="color: red;"><?php echo $caminho?></strong> não existe.</h5>
         <?php
      }
       ?>
       <hr>
    </div>
   <?php
  }
 }
?>
</div>

  <div id="cont1" class="container mt-4 mb-4 texto cancel_dark">
    <div class="card-body">
      <div class="card-title">
        <h3>Serviços Prestados</h3>
        <hr>
      </div>
           <?php

          if(empty($dados)){
           ?>

           <div align="center">
               <strong style="font-size: 20px; color: red;">Ainda não há imagens inseridas!</strong>
           </div>

         <?php

         }else{

               foreach($dados as $imagem){
                 if(is_dir($caminho)){
                 if(file_exists($caminho.$imagem['foto'])){
                   ?>
                     <img src="imagens/<?php echo $imagem['foto'];?>" data-aos="fade-down" data-aos-duration="900" id="imagens" class="img-thumbnail border rounded zoom" title="visualizar imagem" alt="Imagem Indisponível" onclick="window.location.href = 'imagens/<?php echo $imagem['foto'];?>'">
                   <?php
                 }else{
                   ?>
                    <img src="img/image_not_found.png" data-aos="fade-down" data-aos-duration="900" id="imagens" class="img-thumbnail border rounded" style="cursor: default;" title="visualizar imagem" alt="Imagem Indisponível">
                   <?php
                 }
                }else{
                  ?>
                    <p style="color: red">Diretório <strong style="color: black;"><?php echo $caminho;?></strong> não existe!</p>
                  <?php
               }
             }
           }
          ?>
    </div>
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
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  </body>

</html>
