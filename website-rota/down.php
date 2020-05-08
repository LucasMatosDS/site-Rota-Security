<?php


// Aqui vale qualquer coisa, desde que seja um diretório seguro :)
define('ARQ', './arquivos/');

include_once 'dao/clienteDAO.class.php';
include_once 'model/cliente.class.php';

  $cliDAO = new ClienteDAO();
  $cli = new cliente();
  $id = $_GET['id'];
  // $dados = $cliDAO->buscarDadosCliente($id);
  $array = $cliDAO->buscarArquivo($id);

      ?>
      <iframe src="arquivos/<?php echo $cli->nome_arq?>"></iframe>
      <?php

// Vou dividir em passos a criação da variável $id pra ficar mais fácil de entender, mas você pode juntar tudo
// Retira caracteres especiais
$id = filter_var($id, FILTER_SANITIZE_STRING);
// Retira qualquer ocorrência de retorno de diretório que possa existir, deixando apenas o nome do arquivo.
$id = basename($id);

// Aqui a gente só junta o diretório com o nome do arquivo
$caminho_download = ARQ . $id;

// Verificação da existência do arquivo
if (!file_exists($caminho_download))
   die('Arquivo não existe!');

header('Content-type: octet/stream');

// Indica o nome do arquivo como será "baixado". Você pode modificar e colocar qualquer nome de arquivo
header('Content-disposition: attachment; filename="'.$id.'";');

// Indica ao navegador qual é o tamanho do arquivo
header('Content-Length: '.filesize($caminho_download));

// Busca todo o arquivo e joga o seu conteúdo para que possa ser baixado
readfile($caminho_download);

exit;
