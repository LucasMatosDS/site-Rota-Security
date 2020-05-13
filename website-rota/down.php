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
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div align="center" title="baixar">
   <a id="btn-down" href='<?php echo $caminho.$row['arq']?>'><img src="img/download.png" height="40px" style="padding: 0px;"><?php echo $row['arq']?></a>
</div>
</body>
</html>
<?php
 }else{
   echo "Arquivo não existe na pasta $caminho.";
 }

 }else{
   echo "Diretório não existe.";
 }
}

?>
