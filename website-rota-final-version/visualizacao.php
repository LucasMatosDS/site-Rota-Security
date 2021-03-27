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
  <style type="text/css">
  #visuali{
    color: black;
  }

  #visuali:hover{
     color: red;
  }
  </style>
 <div class="col-md-4 mt-4 ml-4" style="overflow: auto;">
   <form method="get">
     <ul>
     <a href="./dados.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
  <?php
  include_once  'dao/clienteDAO.class.php';
  include_once  'model/cliente.class.php';
  $cliDAO = new ClienteDAO();
  $cli = new Cliente();
  $arquivos = $cliDAO->buscarArquivo();
  $array =  $cliDAO->buscarCliente();
  $caminho = "arquivos";
  $pasta = $caminho."/".$cli->nome."/";

    if(is_dir($pasta)){
      foreach($arquivos as $row){
       foreach($array as $cli){
         //$pasta = $caminho."/".$cli->nome."/";
         $pasta = $caminho."/".$cli->nome."-".$cli->id."/";

           if(file_exists($pasta.$row['arq'])){
             ?>
             <h6>Arquivo do <?php echo $cli->nome;?>:</h6>
             <iframe src='<?php echo $pasta.$row['arq'];?>' width="400" height="200"></iframe>
             <li><?php echo "<a href='$pasta"."$row[arq]' id='visuali' title='visualizar'>".$row['arq']."</a>";?></li>
               <a class="btn btn-danger" id="btn-limpar" href="excluir.php?arq=<?php echo $pasta.$row['arq'];?>">Deletar</a>
             <hr>
             <?php
           }else{
             ?>
             <!-- <hr>
             <h5 style="color: red;">Arquivo não existe no Diretório <strong style="color: black;"><?php echo $pasta?></strong></h5>
             <p style="color: red;">Arquivo pode não ter sido cadastrado ou foi deletado.</p>
             <hr> -->
             <?php
           }
      }
    }

    }else{
      ?>
      <h5 style="color: black;">Diretório <strong style="color: red;"><?php echo $caminho?></strong> não existe!</h5>
      <?php
    }
    ?>
   </ul>
  </form>
  <h6>Arquivos contidos na Pasta:</h6>
  <iframe src="arquivos/" width="400" height="200">
 </div>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</html>
