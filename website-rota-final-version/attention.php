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
    <div class='col-md-12'>
        <h2 id="titulo-base">Nenhuma Base de Dados foi selecionada!</h2>
        <img src="img/database.png">
      <fieldset class="fieldset-border col-md-2 controle_dados">
        <legend class="legend-border">Controles</legend>
          <button type="button" id="btn-backup" name="backup" class="btn mt-2 mb-2" onclick="window.location.href = './restore.php';"><img src='img/backup_restore.png' class="mr-1">Restaurar Backup</button>
        </fieldset>
      </div>
  </body>
</html>
