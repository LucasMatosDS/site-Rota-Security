<?php
session_start();
ob_start();

 include_once 'dao/clienteDAO.class.php';

$cliDAO = new ClienteDAO();
$dados_postagem = $cliDAO->buscarPostagem();
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

  <div id="editar_img" class="container texto cadastro">
    <div class="card-body">
        <a href="dados.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">Gerenciamento de Postagens</h3>
        <form method="post" onsubmit="return verificaExclusaoP()">
          <input type="submit" id="btn-limpar" class="btn float-top" name="excluir_postagens" value="Excluir todas as postagens">
        </form>
        </div>
        <hr>
        <?php

        if(isset($_POST['excluir_postagens'])){
          include_once 'dao/clienteDAO.class.php';
          $cliDAO = new ClienteDAO();
          $cliDAO->deletarTodasAsPostagens();
          $cliDAO->reiniciarId();
        }

       if(empty($dados_postagem)){

       ?>
         <div align="center" class="mt-4 mb-4">
               <strong style="font-size: 20px; color: red;">Ainda não há postagens inseridas!</strong>
           </div>
        <?php

       }else{

            foreach($dados_postagem as $conteudo){

                ?>
                <div class="card mb-2" id="cont_post">
                  <div class="card-body">
                    <h4 style="text-decoration: underline;"><?php echo $conteudo['titulo_postagem'];?></h4>
                      <p><?php echo $conteudo['conteudo'];?></p>
                      <hr>
                    <a href="excluir.php?postagem=<?php echo $conteudo['titulo_postagem']; ?>" class="btn btn-danger deletar mb-2"><img src="img/trash.svg" class="mr-2" width="25px">Excluir</a>
                    <a href="editar_postagem.php?postagem=<?php echo $conteudo['id_postagem'];?>" class="btn btn-primary deletar mb-2"><img src="img/edite.png"  class="mr-2" width="25px">Editar</a>
                  </div>
                </div>
                <?php
          }
        }
       ?>
      </div>

  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
