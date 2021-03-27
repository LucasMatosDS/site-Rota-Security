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
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Sobre</a>
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

  <div class="container cadastro mb-2" data-aos="fade-down">
    <div class="card-body">
      <div align="center">
      <img src="img/logo-rota.png">
      </div>
      <div class="card-title">
        <h3 id="titulo-email">Fale conosco:</h3>
        <hr>
        </div>
     <form action="./email.php" method="POST" name="dados" onsubmit="validarFormContato()">
      <div class="form-row">
       <div class="form-group col-md-6">
           <label>Nome:</label>
           <input type="text" class="form-control mb-1" name="nome" maxlength="30" autocomplete="off" placeholder="Informe seu Nome" onchange="this.value = this.value.toUpperCase()" required="true"/>
          </div>
          <div class="form-group col-md-3">
            <label>Telefone:</label>
            <input id="tel" type="text" class="form-control" name="tel" autocomplete="off" placeholder="(XX) XXXXX-XXXX" required="true" data-mask="(00) 00000-0000"/>
          </div>
          <div class="form-group col-md-6">
            <label>E-mail:</label>
            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Informe seu E-mail" required="true" maxlength="30"/>
          </div>
          <div class="form-group col-md-6">
            <label>Assunto:</label><br>
            <select name="assunto" class="form-control col-md-4">
              <option selected disabled="true">--selecione--</option>
              <option>contrato</option>
              <option>vaga de emprego</option>
              <option>outros</option>
            </select>
          </div>
        <div class="form-group col-md-6">
          <label>Mensagem:</label>
          <textarea name="mensagem" cols="50" rows="8" maxlength="800" class="form-control" autocomplete="off" placeholder="Digite aqui sua Mensagem..." onchange="this.value = this.value.toUpperCase()" required="true"></textarea>
          </div>
          </div>
  <button id="btn-enviar" type="submit" name="cadastrar" class="btn mr-2 button-form">
   Enviar</button>
  <button id="btn-limpar" type="reset" name="limpar" class="btn button-form">Cancelar</button>
     </form>
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
  <script src="js/validacao.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
