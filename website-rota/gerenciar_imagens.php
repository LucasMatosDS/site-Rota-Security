<?php
session_start();
ob_start();

 include_once 'dao/clienteDAO.class.php';
 include_once 'model/imagem.class.php';

$cliDAO = new ClienteDAO();
$img = new Imagem();
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
  <title>Rota</title>
</head>

<body class="animated fadeIn">
  <!-- Navigation -->
<!--   <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
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
          <a class="nav-link" href="index.php">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="area_cliente.php">Area do CLiente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato.php">Contato</a>
        </li>
      </ul>
    </div>
  </nav> -->

  <div id="editar_img" class="container texto cadastro">
    <div class="card-body">
        <a href="dados.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">Gerenciamento de Imagens</h3>
        <form method="post" onsubmit="return verificaExclusao()">
          <input type="submit" id="btn-limpar" class="btn float-top" name="excluir_imagens" value="Excluir todas as imagens">
        </form>
        </div>
        <hr>
        <?php
        if(isset($_POST['excluir_imagens'])){
          include_once 'dao/clienteDAO.class.php';
          $cliDAO = new ClienteDAO();
          $cliDAO->deletarTodasAsImagens();
          $caminho = "imagens/";
          system("rm -rf $caminho");

          $cliDAO->reiniciarId();
        }

       if(empty($dados)){

        ?>

        <div align="center">
            <strong style="font-size: 20px; color: red;">Ainda não há imagens cadastradas!</strong>
        </div>

        <?php
       }else{
            foreach($dados as $imagem){

                ?>
                <div class="card" id="imagem2" style="cursor: inherit;">
                  <div class="card-body">
                      <img src="imagens/<?php echo $imagem['foto'];?>" class="img-fluid" id="imagem3" title="visualizar imagem" alt="Imagem Indisponível" onclick="window.location.href = 'imagens/<?php echo $imagem['foto'];?>';">
                    <hr>
                    <a href="excluir.php?imagem=<?php echo $imagem['foto']; ?>" class="btn btn-danger col-md-12 deletar mb-2"><img src="img/trash.svg" class="mr-2" width="25px">Excluir</a>
                    <a href="editar_imagem.php?imagem=<?php echo $imagem['foto'];?>" class="btn btn-primary col-md-12 deletar"><img src="img/edite.png"  class="mr-2" width="25px">Editar</a>
                  </div>
                </div>
                <?php
          }
        }
       ?>
       <hr>
      </div>

  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
