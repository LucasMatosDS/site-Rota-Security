<?php
session_start();
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

  <div id="cadastre_se" class="container texto cadastro w-75">
    <div class="card-body">
        <a href="gerenciar_postagens.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">editar postagem</h3>
          </li>
          <hr>

        <?php

          $id_postagem = $_GET['id_post'];
          $dados_postagem = $cliDAO->buscarPostagemIndiv($id_postagem);

          foreach($dados_postagem as $conteudo){
                $caminho = "imagens/";
        ?>

      <form method="POST" action="" enctype="multipart/form-data">
      <label>insira o título da pstagem:</label>
      <input type="text" class="form-control col-md-4 mb-2" style="font-weight: bold;" name="titulo" value="<?php echo $conteudo['titulo_postagem'];?>" placeholder="informe o titulo da postagem" autocomplete="off" required>
      <label>insira o conteudo da postagem:</label>
      <textarea class="form-control mb-2" id="postagem" name="conteudo" maxlength="4000" placeholder="ESCREVA AQUI ..." autocomplete="off" required><?php echo $conteudo['conteudo'];?></textarea>
      <div class="form-group col-md-8">
        <div class="thumbnail">
          <label style="display: block;">Imagem cadastrada:</label>
          <?php
            $caminho = "imagens/";
            if(is_dir($caminho)){
             if(file_exists($caminho.$conteudo['imagem']) && $conteudo['imagem'] != "" && $conteudo['imagem'] != null){
                ?>
                <img src="imagens/<?php echo $conteudo['imagem'];?>" id="imagem2" class="img-thumbnail border rounded" style="cursor: pointer;" title="visualizar imagem" alt="Imagem Indisponível" onclick="window.location.href = 'imagens/<?php echo $conteudo['imagem'];?>'">
                <?php
             }else{
               ?>
               <h5 style="color: black;">Imagem não existe na pasta <strong style="color: red;"><?php echo $caminho;?></strong>.</h5>
               <p style="color: red;">Imagem pode não ter sido cadastrada ou foi deletada.</p>
               <?php
            }

           }else{
             ?>
             <h5 style="color: black;">Diretório <strong style="color: red;"><?php echo $caminho?></strong> não existe.</h5>
             <p style="color: black">verifique se o diretório <strong style="color: red;"><?php echo $caminho;?></strong> existe.</p>
             <?php
          }
           ?>
        </div>
          <label>Selecione a nova imagem:</label>
          <input type="file" name="foto[]" id="arquivo" accept=".png,.jpg,.jpeg" style="display: block" multiple onchange="ValidarTamanhoArquivo(this)">
      </div>
        <button id="btn-enviar" type="submit" name="salvar" class="btn mr-2 button-form ml-3" onclick="return validarFileChooser()">salvar</button>
        <button id="btn-limpar" type="reset" name="limpar" class="btn mr-2 button-form">
   Cancelar</button>
      </div>
     </form>

 <?php

  }

  if(isset($_SESSION['msg'])){
     echo $_SESSION['msg'];
      unset($_SESSION['msg']);

  }

    if(isset($_POST['salvar'])){

          $id_postagem = $_GET['id_post'];
          $titulo_postagem = $_POST['titulo'];
          $conteudo = $_POST['conteudo'];
          $cap_imagem = $_GET['imagem'];

          $fotos = array();
          $caminho = "imagens/";
          chmod($caminho, 0777);

          if($cap_imagem == '' || $cap_imagem == null){
            if(isset($_FILES['foto'])){
               if(file_exists($caminho.$cap_imagem)){
                   //salvando dentro da pasta imagens.
                   for($i = 0; $i < count($_FILES['foto']['name']); $i++){
                      $cap_imagem = sha1($_FILES['foto']['name'][$i]).".".pathinfo($_FILES['foto']['name'][$i], PATHINFO_EXTENSION);
                         move_uploaded_file($_FILES['foto']['tmp_name'][$i], $caminho.$cap_imagem);
                   }
                          if(!empty($_FILES['foto']['name'])){
                         ?>

                     <div class="alert alert-info alert-dismissible" role="alert">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong>Postagem alterada com sucesso!</strong>
                     </div>

                       <?php
                      }else{
                        ?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Erro ao alterar postagem!</strong>
                    </div>

                        <?php
                      }

                    }else{
                      for($i = 0; $i < count($_FILES['foto']['name']); $i++){
                         $cap_imagem = sha1($_FILES['foto']['name'][$i]).".".pathinfo($_FILES['foto']['name'][$i], PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES['foto']['tmp_name'][$i], $caminho.$cap_imagem);
                      }
                      ?>
                      <div class="alert alert-warning alert-dismissible" role="alert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Ops! notei que o arquivo a ser alterado não existe ou não está cadastrado na base de dados. más não se preocupe irei fazer isso para você.</strong>
                      </div>
                  <div class="alert alert-success alert-dismissible" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Postagem inserida com sucesso!</strong>
                  </div>
                  <?php
                }

              }else{
                  ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>necessário selecionar uma imagem!</strong>
                  </div>
                  <?php
                }

          }else{

               if(file_exists($caminho.$cap_imagem)){
                  unlink($caminho.$cap_imagem);
                   //salvando dentro da pasta imagens.
                   for($i = 0; $i < count($_FILES['foto']['name']); $i++){
                      $cap_imagem = sha1($_FILES['foto']['name'][$i]).".".pathinfo($_FILES['foto']['name'][$i], PATHINFO_EXTENSION);
                         move_uploaded_file($_FILES['foto']['tmp_name'][$i], $caminho.$cap_imagem);
                   }
                          if(!empty($_FILES['foto']['name'])){
                         ?>

                     <div class="alert alert-info alert-dismissible" role="alert">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong>Postagem alterada com sucesso!</strong>
                     </div>

                       <?php
                      }else{
                        ?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Erro ao alterar postagem!</strong>
                    </div>

                        <?php
                      }

                    }else{
                      for($i = 0; $i < count($_FILES['foto']['name']); $i++){
                         $cap_imagem = sha1($_FILES['foto']['name'][$i]).".".pathinfo($_FILES['foto']['name'][$i], PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES['foto']['tmp_name'][$i], $caminho.$cap_imagem);
                      }
                      ?>
                      <div class="alert alert-warning alert-dismissible" role="alert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Ops! notei que o arquivo a ser alterado não existe ou não está cadastrado na base de dados. más não se preocupe irei fazer isso para você.</strong>
                      </div>
                      <div class="alert alert-success alert-dismissible" role="alert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Postagem cadastrada com sucesso!</strong>
                      </div>
                  <?php
                }
          }

          array_push($fotos, $cap_imagem);

          include_once 'dao/clienteDAO.class.php';
          $cliDAO = new ClienteDAO();
          $cliDAO->alterarPostagem($id_postagem,$titulo_postagem,$conteudo,$cap_imagem);

        }else{

        }
  ?>

  <script type="text/javascript">

   function validarFileChooser(){
      var fileChooser = document.getElementById('arquivo').value;

         if(fileChooser === "" || fileChooser === null){
           var decisao = confirm("você desejá alterar a postagem sem selecionar uma imagem ?");
            if(decisao == true){
                  return true;
            }else{
                return false;
            }

         }else{

         }

   }

   function ValidarTamanhoArquivo(file){
       var FileSize = file.files[0].size / 1024 / 1024; // in MB
       if(FileSize > 19){
           alert('Arquivo excede 20MB.');
           $(file).val(''); //for clearing with Jquery
       }else{

       }
   }
  </script>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
