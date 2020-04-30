<?php
session_start();
ob_start();
  
 if(isset($_GET['id'])){        
        
      include_once 'model/cliente.class.php';
      include_once 'dao/clienteDAO.class.php';

      $cliDAO = new ClienteDAO();

          $array = $cliDAO->filtrar('id', $_GET['id']);          

          $cli = $array[0];
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
  </nav> -->

  <div id="cadastre_se" class="container texto cadastro">
    <div class="card-body">
        <a href="dados.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
      <div class="card-title">
        <div align="center">
        <img src="img/logo-rota.png">
        </div>
        <h3 id="titulo-login" align="center">editar arquivo</h3>
          </li>
          <hr>
        </div>
     <form method="POST" action="" name="dadosArquivo" enctype="multipart/form-data">       
       <div class="form-group col-md-8">
          <label>Descrição do Arquivo:</label>
          <textarea type="text" class="form-control"  id="descricao" name="descricao" autocomplete="off" required="true" placeholder="Informe a descrição do Arquivo..." maxlength="200"></textarea>
       </div>  
       <div class="form-group col-md-8">
           <label>Selecione o Arquivo:</label>           
           <input type="file" name="arq" id="arquivo" accept=".png,.jpg,.mp4,.pdf,.doc,.docx" required="true">                      
          </div>    
        <button id="btn-enviar" type="submit" name="cadastrar" class="btn mr-2 button-form ml-3">Cadastrar</button>
        <button id="btn-limpar" type="reset" name="limpar" class="btn mr-2 button-form">
   Cancelar</button>
      </div>
     </form>

 <?php

  if(isset($_SESSION['msg'])){
     echo $_SESSION['msg'];
      unset($_SESSION['msg']);

  }
 ?>

 <?php

    if(isset($_POST['cadastrar'])){
                          
          include_once 'model/cliente.class.php';
          include_once 'dao/clienteDAO.class.php';

          $cli->id = $_GET['id'];
          $cli->descricao = addslashes($_POST['descricao']);         


          $fotos = array();

        if(isset($_FILES['arq'])){               
              //salvando dentro da pasta img.
             $cli->nome_arq = md5(uniqid($_FILES['arq']['name']));
                move_uploaded_file($_FILES['arq']['tmp_name'], 'arquivos/'.$cli->nome_arq);
                //echo "<p>movendo...".$_FILES['arq']['name']."</p>";

                 if(!empty($_FILES['arq']['name'])){
                     
                    ?>

                <div class="alert alert-success alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Dados alterados com sucesso!</strong>
                </div>

                    <?php
                 
                 }else{ 

                 }

                //salvar nomes para enviar para o banco.

                //inserindo dentro da variavel fotos o nome da imagem.
                array_push($fotos, $cli->nome_arq);                      
           
            $cliDAO = new ClienteDAO();
            $cliDAO->alterar($cli);           

             $cli->__destruct();                             
  }
}


  ?>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
  function baixarMidia(){
    var img =  confirm('voce desejá fazer o donwload do arquivo ?');

     if(img == true){                 
     $('a#download').attr({target: '_blank', 
                    href  : 'img/<?php echo $arq->nome_arq['foto_capa'];?>'});                         
                    
          
     }else if(img != true){

     }
  }
  </script>
</body>
</html>
