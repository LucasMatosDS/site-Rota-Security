<?php
if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        //echo "sessão ativa.";
}else if(session_status() !== PHP_SESSION_NONE){
        //echo "sessãos habilitadas! mas nenhuma existe.";
}else if(session_status() !== PHP_SESSION_DISABLED){
    //echo "sessões desabilitadas.";    
}else{

}
ob_start();

if(!isset($_SESSION['id'])){

}else{

}

include_once  'dao/clienteDAO.class.php';
include_once  'model/cliente.class.php';

$cliDAO = new ClienteDAO();
$cli = new Cliente();
$array = $cliDAO->buscarCliente();
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
     <button type="button" id="btn-limpar" class="btn mt-2 mb-2" onclick="window.location.href ='sair.php';">sair</button>
    <div>
      <form name="form_pesquisa" id="form-pesquisa" method="post" action="" onkeypress="validaCampo()">
            <div class="mt-1">
             <p style="color: red;">*Informe seu CPF ou E-mail no campo de texto para iniciar a pesquisa.</p>
             <p id="mensagem" style="color: red; display: none; margin-top: 0px;">*Para CPF é necessário informar a máscara.<br>exemplo: XXX.XXX.XXX-XX.</p>
              <input type="text" name="pesquisa" id="pesquisa" class="form-control col-md-3" placeholder="Insira seu CPF ou E-mail" autocomplete="off" onkeypress="validaCampo()"/>
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
     <script type="text/javascript">
     function validaCampo(){

         var campo = document.getElementById('mensagem');

          if(campo.style.display === 'none'){
               campo.style.display = 'block';

          }else{

          }
     }
     </script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/refresh.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
 </body>
</html>
