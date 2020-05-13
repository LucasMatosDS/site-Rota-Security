<?php
include_once 'dao/clienteDAO.class.php';

$cliDAO = new ClienteDAO();

$id = $_GET['id'];

$array = $cliDAO->buscarArquivo($id);

$caminho = "arquivos/";

foreach($array as $row){

    if(is_dir($caminho)){

       if(file_exists($caminho.$row['arq'])){

?>
<!Doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <a href="dados.php" id="arrow-left" title="voltar"><img src="img/arrow-left.png"></a>
<div align="center" title="baixar">
   <a id="btn-down" href='<?php echo $caminho.$row['arq']?>' download><img src="img/download1.svg" id="imagemDownload" alt='imagem indisponível'><?php echo $row['arq']?></a>
</div>
</body>
</html>
<?php
 }else{
   echo "Arquivo não existe na pasta <Strong>$caminho</strong>.";
 }

 }else{
   echo "Diretório não existe.";
 }
}

?>
