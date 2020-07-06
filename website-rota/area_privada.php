<?php
session_start();
ob_start();

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';
include_once 'excluir.php';

$cliDAO = new ClienteDAO();
$array = $cliDAO->buscarCliente();

   if(!isset($_SESSION['id'])){

      header("location: area_cliente.php");
      exit;
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
  <script src="js/jquery-2.1.0.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){

    //Aqui a ativa a imagem de load
    function loading_show(){
    $('#loading').html("<center><img src='img/loading1.gif' width='40px'/></center>").fadeIn('fast');
    }

    //Aqui desativa a imagem de loading
    function loading_hide(){
        $('#loading').fadeOut('fast');
    }


    // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json
    function load_dados(valores, page, div)
    {
        $.ajax
            ({
                type: 'POST',
                dataType: 'html',
                url: page,
                beforeSend: function(){//Chama o loading antes do carregamento
                  loading_show();
        },
                data: valores,
                success: function(msg)
                {
                    loading_hide();
                    var data = msg;
              $(div).html(data).fadeIn();
                }
            });
    }

    //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
   load_dados(null, 'pesquisa.php', '#MostraPesq');


    //Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
    $('#pesquisa').keyup(function(){

        var valores = $('#form-pesquisa').serialize()//o serialize retorna uma string pronta para ser enviada

        //pegando o valor do campo #pesquisaCliente
        var $parametro = $(this).val();

        if($parametro.length >= 1)
        {
            load_dados(valores, 'pesquisa.php', '#MostraPesq');
        }else
        {
            load_dados(null, 'pesquisa.php', '#MostraPesq');
        }
    });

  });
  </script>
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

   <div class="container col-md-10" style="top: 100px;">
     <button type="button" href="sair.php" id="btn-limpar" class="btn mt-2 mb-2" onclick="window.location.href = 'sair.php';">sair</button>
    <div>
      <form name="form-pesquisa" id="form-pesquisa" method="post" action="">
            <div class="mt-1">
             <p style="color: red;">*Informe seu CPF no campo de texto para iniciar a pesquisar.</p>
              <input type="text" name="pesquisa" id="pesquisa" class="form-control" placeholder="Insira seu CPF" autocomplete="off" />
            </div>
      </form>
    </div>

      <div id="contentLoading">
        <div id="loading"></div>
      </div>
      <div>
        <div id="MostraPesq"></div>
       </div>
      </div>
     </div>

  <script src="js/jquery.mask.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/refresh.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
 </body>
</html>
