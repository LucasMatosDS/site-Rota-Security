<?php
if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
}else if(session_status() !== PHP_SESSION_NONE){
    //echo "sessãos habilitadas! mas nenhuma existe.";
}else if(session_status() !== PHP_SESSION_DISABLED){
    //echo "sessões desabilitadas.";    
}else{
    //echo "sessão habilitada!";
}
ob_start();

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';
include_once  'model/imagem.class.php';

$cliDAO = new ClienteDAO();
$cliDAO->verificarTabela("cliente","clientes");
$cli = new Cliente();
$array = $cliDAO->buscarCliente();

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
  <link rel="shortcut icon" href="img/icon-rota.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Rota</title>
</head>
<body class="animated fadeIn" id="cont" onload="carrega();">
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

  <?php
      if(isset($array)){
          if(count($array) == 0){
  ?>
            <div class="col-md-12" style='top: 85px;'>
              <h3 align='center' class='alert mt-3' role='alert' style='background: black; color: white;'>Não há registros cadastrados no sistema!
              <a href='sair.php' style='color: red;'>Voltar a Página Inicial</a>
              </h3>
              <fieldset class="fieldset-border col-md-2 controle_dados">
                <legend class="legend-border">Controles</legend>
                  <button type="button" id="btn-backup" name="inserir_img" class="btn mt-2 mb-2" onclick="window.location.href = './inserir_imagem.php';"><img src='img/upload_img.png' class="mr-1">Inserir imagens</button>
                  <button type="button" id="btn-backup" name="inserir_img" class="btn mt-2 mb-2" onclick="window.location.href = './inserir_postagens.php';"><img src='img/upload_img.png' class="mr-1">Inserir postagens</button>
                  <button type="button" id="btn-backup" class="btn mt-2 mb-2" onclick="window.location.href = './gerenciar_imagens.php';"><img src='img/edit_img.png'>Gerenciar imagens</button>
                  <button type="button" id="btn-backup" class="btn mt-2 mb-2" onclick="window.location.href = './gerenciar_postagens.php';"><img src='img/edit_img.png'>Gerenciar postagens</button>
                  <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './restore.php';"><img src='img/backup_restore.png' class="mr-1">Restaurar Backup</button>
                  <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './visualizacao.php'"><img src='img/archive.png' class="mr-1">visualizar Arquivos</button>
                </fieldset>
              </div>
                <?php
                return;
    }
   ?>
   <div class="container col-12" style="top: 100px;">
   <fieldset class="fieldset-border" style="width: 75%;">
     <legend class="legend-border">Controles</legend>
       <button type="button" id="btn-limpar" class="btn mt-2 mb-2" onclick="window.location.href = 'sair.php';"><img src='img/exit.png' class="mr-1">sair</button>
       <button type="button" id="btn-limpar" class="btn mt-2 mb-2" onclick="return verificarExclusaoDeRegistros()"><img src='img/trash-all.png' class="mr-1">Excluir Registros</button>
       <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './visualizacao.php'"><img src='img/archive.png' class="mr-1">visualizar Arquivos</button>
       <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './backup.php';"><img src='img/backup.png' class="mr-1">Realizar Backup</button>
       <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './restore.php';"><img src='img/backup_restore.png' class="mr-1">Restaurar Backup</button>
       <button type="button" id="btn-backup" name="inserir_img" class="btn mt-2 mb-2" onclick="window.location.href = './inserir_imagem.php';"><img src='img/upload_img.png' class="mr-1">Inserir imagens</button>
       <button type="button" id="btn-backup" name="inserir_img" class="btn mt-2 mb-2" onclick="window.location.href = './inserir_postagens.php';"><img src='img/post.png' class="mr-1">Inserir postagens</button>
       <button type="button" id="btn-backup" class="btn mt-2 mb-2" onclick="window.location.href = './gerenciar_imagens.php';"><img src='img/edit_img.png' class="mr-1">Gerenciar imagens</button>
       <button type="button" id="btn-backup" class="btn mt-2 mb-2" onclick="window.location.href = './gerenciar_postagens.php';"><img src='img/post_doc.png'>Gerenciar postagens</button>
       <button type="submit" id="btn-backup" name="atualizar" class="btn mt-2 mb-2" onclick="window.location.href = './dados.php';"><img src='img/atualizar.svg' class="mr-1">Atualizar</button>
       <button type="button" name="filtrar" value="Filtrar" id="btn-backup" class="btn mt-2 mb-2" onclick="window.location.href = './busca_cliente.php';"><img src="img/search.png" class="mr-1">Localizar</button>
     </fieldset>
     <?php
      }
    ?>

    <!--trazendo dados da página load.-->
   <div id="carrega_conteudo" class="table-responsive-md">

   </div>
   <br>
 </div>

  <script type="text/javascript">
  function verificarCombo(){

    var msg = document.getElementById("mensagem");

         if(msg.style.display === 'none'){
              msg.style.display = 'block';
         }else{
                msg.style.display = 'none';
         }
 }
     function verificarExclusaoDeRegistros(){

       var decisao1 = confirm('Desejá Excluir todos os Registros ?');

      if(decisao1 == true){
          alert('Registros excluidos com sucesso!')
          window.location.href = "excluir_registros.php";
          return true;

       }else{
          return false;
       }
     }

     function carrega(){
       var req = new XMLHttpRequest();
       req.onreadystatechange = function(){
         if (req.readyState == 4 && req.status == 200) {
           document.getElementById('carrega_conteudo').innerHTML = req.responseText;
         }
       }
       req.open('POST', 'load.php', true);
       req.send();
     }
    setInterval(function(){carrega();}, 1000);
  </script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
 </body>
</html>
